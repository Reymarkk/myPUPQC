$(() => {
	$.ajax({
		type: 'GET',
		url: apiURL + 'student/view/dpa_agreement',
		headers: AJAX_HEADERS,
		success: (result) => {
			if (result.data.length == 0) {
				$('#dataPrivacy').modal('show')
				$('#addMedicalAppointment').attr('disabled', true)
			} else {
				const signedDate = moment(result.data.is_signed).format('MMMM D, YYYY h:mm A')
				$('#dataPrivacy').modal('hide')
				$('#checkDataPrivacy').html(`
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><i class="mdi mdi-checkbox-marked-circle-outline"></i> You are DPA Compliant!</h4>
                <p class="mb-0">You can able to access all systems for myPUPQC. You have signed the Data Collection Policy and Warranty for Reporting Agreement on:
                    <span class="text-primary" id="dpaSignedDate">${signedDate}</span>
                </p>
                </div>`)
			}
		},
	})

	$('#dpaDisagreeButton').click(function () {
		$('#checkDataPrivacy').html(`
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"><i class="mdi mdi-information"></i> Data Privacy Agreement</h4>
            <p>To use all of the systems in myPUPQC, you must agree to the Data Collection Policy and Warranty for Reporting Agreement. If you are seeing this message, that means you haven't agreed to the form.</p>
            <hr>
            <p class="mb-0">To access the form again,
                <span class="text-primary" data-bs-toggle="modal" data-bs-target="#dataPrivacy" role="button">click here.</span>
            </p>
        </div>`)
	})

	$('#dpaAgreeButton').click(function () {
		$.ajax({
			type: 'POST',
			url: apiURL + 'student/submit/dpa_agreement',
			headers: AJAX_HEADERS,
			success: (result) => {
				if (result.data.is_signed) {
					location.reload()
				}
			},
		})
	})

	verifyMedicalAppointment()

	const currentDate = new Date()
	const tzoffset = currentDate.getTimezoneOffset() * 60000
	const localISOTime = new Date(currentDate.getTime() - tzoffset)
	const currentYear = localISOTime.getFullYear()
	const currentMonth = localISOTime.getMonth()
	const dates = []

	let current = new Date()
	while (current.getMonth() === currentMonth) {
		const year = current.getFullYear()
		const month = (current.getMonth() + 1).toString().padStart(2, '0')
		const day = current.getDate().toString().padStart(2, '0')
		const date = `${year}-${month}-${day}`

		if (current.getDay() !== 0 && current.getDay() !== 6) {
			dates.push(date)
		}

		current = new Date(current.getTime() + 24 * 60 * 60 * 1000)
	}

	let completeHolidayDetails
	let holidayDates = []
	$.ajax({
		url: apiURL + 'student/holidays',
		type: 'GET',
		headers: AJAX_HEADERS,
		async: false,
		success: (data) => {
			completeHolidayDetails = data.data
		},
	})

	completeHolidayDetails.forEach((holiday) => {
		holidayDates.push(holiday.holiday_date)
	})

	const updatedDates = dates.filter((date) => !holidayDates.includes(date))

	const calendarEl = document.querySelector('#medical-calendar')
	const calendar = new VanillaCalendar(calendarEl, {
		// Options
		settings: {
			iso8601: false,
			range: {
				min: new Date(currentYear, currentMonth, 1),
				max: new Date(currentYear, currentMonth + 1, 0),
				enabled: updatedDates,
			},
			selection: {
				month: false,
				year: false,
			},
			visibility: {
				today: false,
			},
			popups: {},
		},
		CSSClasses: {
			weekDay: 'text-primary',
			weekDayWeekend: 'text-success',
		},
	})
	calendar.init()

	$('#addMedicalAppointment').on('click', function (e) {
		e.preventDefault() // prevent page refresh

		grecaptcha.ready(function () {
			grecaptcha
				.execute('6LfBbEgnAAAAAFJ-ELYeg_wF-l5VX5G52W55Dnx2', {
					action: 'submit',
				})
				.then(function (token) {
					const data = {
						recaptchaToken: token,
					}
					$.ajax({
						url: apiURL + `verify-recaptcha`,
						type: 'POST',
						data: data,
						success: (result) => {
							if (result.success) {
								addNewMedicalCase(calendar)
							} else {
								Toast.fire({
									icon: 'info',
									title: 'Please verify that you are not a robot!',
								})
							}
						},
					})
				})
		})
	})
})

verifyMedicalConsultationTime = () => {
	const currentTime = new Date().getHours()

	// runs only if the current time is between 6am to 9pm
	if (currentTime >= 6 && currentTime <= 21) {
		// * kapag 6AM to 9PM
		$('#no_medical_consultation').removeClass('d-none')
		$('#scheduled_medical_message').addClass('d-none')
	} else {
		// * kapag 9PM to 6AM
		$('#scheduled_medical_message').removeClass('d-none')
		$('#no_medical_consultation').addClass('d-none')
	}
}

// Remove form and load card
verifyMedicalAppointment = () => {
	$.ajax({
		url: apiURL + 'omsss/student/view_medical_appointment',
		type: 'GET',
		headers: AJAX_HEADERS,
		success: (data) => {
			if (data.data.length > 0) {
				// * kapag merong consultation data...
				$('#existing_medical_consultation').removeClass('d-none')
				$('#no_medical_consultation').addClass('d-none')

				// Load card details
				const appointmentDetails = data.data[0]
				const caseControlNumber = appointmentDetails.case_control_number
				const consultationReason = appointmentDetails.consultation_reason
				const attendingPhysician =
					appointmentDetails.attending_physician == null
						? 'Not Assigned Yet'
						: appointmentDetails.health_appointment_assigned_to_physician.user_profiles[0].full_name
				let consultationStatus = appointmentDetails.consultation_status
				if (consultationStatus == 'Approved' || consultationStatus == 'Pending') {
					$('#cancelButton').html(`
                <button role="button" onclick="cancelAppointment('${appointmentDetails.health_appointment_id}')" class="btn btn-danger bg-gradient waves-effect waves-light"><i class="mdi mdi-archive-remove-outline align-middle me-1"></i> Cancel Appointment</button>
                `)
					$('#existingConsultationMessage').html(`
                    <p class="fs-15">If you want to create a New Appointment and the status of your consultation is currently <b id="view_consultation_status"></b> and for <b id="view_appointment_type"></b> Appointment, you must cancel your Existing Appointment first. You'll be receiving updates by refreshing the page or through your email. <br /><br /> You can cancel the appointment by clicking the <b>Cancel Appointment</b> button below. Otherwise, wait for your appointment to be Done or Cancelled before creating a New Consultation.</p>
                    `)
				}
				if (consultationStatus == 'Pending') {
					consultationStatus = `<span class="badge rounded-pill bg-warning">${consultationStatus}</span>`
				} else if (
					consultationStatus == 'Cancelled by Student' ||
					consultationStatus == 'Cancelled by Staff'
				) {
					consultationStatus = `<span class="badge rounded-pill bg-info">${consultationStatus}</span>`
					$('#existingConsultationMessage').html(`
                    <p class="fs-15">The status of your consultation is currently <b id="view_consultation_status"></b> and for <b id="view_appointment_type"></b> Appointment. You'll be able to set a new consultation again once your consultation date passes.</p>
                    `)
				} else if (consultationStatus == 'Done' || consultationStatus == 'Approved') {
					consultationStatus = `<span class="badge badge rounded-pill bg-success">${consultationStatus}</span>`
				}

				let consultationDate = new Date(appointmentDetails.consultation_date)
				consultationDate = consultationDate.toLocaleDateString('en-US', {
					year: 'numeric',
					month: 'long',
					day: 'numeric',
				})

				let consultationList = `
                <tr>
                    <td>${consultationDate}</td>
                    <td>${attendingPhysician}</td>
                    <td>${consultationStatus}</td>
                </tr>
                `
				$('#medicalDetails').html(consultationList)
				$('#control_no').html(caseControlNumber)
				$('#consultation_reason_value').html(consultationReason)
				$('#view_consultation_status').html(consultationStatus)
				$('#view_appointment_type').html(appointmentDetails.appointment_type)
				$('#view_remarks').html(appointmentDetails.remarks)
			} else {
				// * kapag walang consultation data...
				// * verify time naman kung 6AM to 9PM naman siya
				verifyMedicalConsultationTime()
			}
		},
	})
}

addNewMedicalCase = (calendar) => {
	// ganito magpull ng value sa calendar, ipapasok mo siya sa may function kapag nagsubmit ka na
	const selectedDate = calendar.selectedDates[0]

	// New Medical Case
	if ($('#NewMedicalCaseForm')[0].checkValidity()) {
		// no validation error
		const form = new FormData($('#NewMedicalCaseForm')[0])
		// for (var pair of form.entries()) {
		// 	console.log(pair[0] + ': ' + pair[1])
		// }
		data = {
			appointment_type: 'Medical',
			consultation_type: form.get('consultation_type'),
			consultation_reason: form.get('consultation_reason'),
			consultation_date: selectedDate,
		}
		$.ajax({
			url: apiURL + 'omsss/student/add_appointment',
			type: 'POST',
			data: data,
			dataType: 'json',
			headers: AJAX_HEADERS,
			success: (result) => {
				if (result) {
					Swal.fire({
						html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">You have successfully added a Medical Case!</p></div></div>',
						showCancelButton: !0,
						showConfirmButton: !1,
						cancelButtonClass: 'btn btn-success w-xs mb-1',
						cancelButtonText: 'Ok',
						buttonsStyling: !1,
						showCloseButton: !0,
					}).then(function () {
						setTimeout(() => {
							location.reload()
						}, 1000)
					})
				}
			},
		}).fail((xhr) => {
			Swal.fire({
				html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong !</h4><p class="text-muted mx-4 mb-0">There was an error while adding a Medical Case. ${xhr.responseJSON.message}</p></div></div>`,
				showCancelButton: !0,
				showConfirmButton: !1,
				cancelButtonClass: 'btn btn-danger w-xs mb-1',
				cancelButtonText: 'Dismiss',
				buttonsStyling: !1,
				showCloseButton: !0,
			})
		})
	}
}

cancelAppointment = (health_appointment_id) => {
	Swal.fire({
		html:
			'<div class="mt-3">' +
			'<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
			'<div class="mt-4 pt-2 fs-15 mx-5">' +
			'<h4>Are you Sure ?</h4>' +
			'<p class="text-muted mx-4 mb-0">Are you Sure You want to Cancel?</p>' +
			'</div>' +
			'</div>',
		showCancelButton: true,
		confirmButtonClass: 'btn btn-success w-xs me-2 mb-1',
		confirmButtonText: 'Yes, Cancel It!',
		cancelButtonClass: 'btn btn-light w-xs mb-1',
		buttonsStyling: false,
		showCloseButton: true,
	}).then(function (result) {
		if (result.value) {
			$.ajax({
				url: apiURL + 'omsss/student/cancel_appointment/' + health_appointment_id,
				type: 'PUT',
				dataType: 'json',
				headers: AJAX_HEADERS,
				success: (result) => {
					if (result) {
						Swal.fire({
							html:
								'<div class="mt-3">' +
								'<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
								'<div class="mt-4 pt-2 fs-15">' +
								'<h4>Well done !</h4>' +
								'<p class="text-muted mx-4 mb-0">You have successfully Cancel Appointment!</p>' +
								'</div>' +
								'</div>',
							showCancelButton: !0,
							showConfirmButton: !1,
							cancelButtonClass: 'btn btn-success w-xs mb-1',
							cancelButtonText: 'Ok',
							buttonsStyling: !1,
							showCloseButton: !0,
						}).then(function () {
							setTimeout(() => {
								location.reload()
							}, 1000)
						})
					}
				},
			}).fail((xhr) => {
				Swal.fire({
					html:
						'<div class="mt-3">' +
						'<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
						'<div class="mt-4 pt-2 fs-15">' +
						'<h4>Something went Wrong !</h4>' +
						'<p class="text-muted mx-4 mb-0">There was an error while canceling. Please try again.</p>' +
						'</div>' +
						'</div>',
					showCancelButton: !0,
					showConfirmButton: !1,
					cancelButtonClass: 'btn btn-danger w-xs mb-1',
					cancelButtonText: 'Dismiss',
					buttonsStyling: !1,
					showCloseButton: !0,
				})
			})
		}
	})
}
