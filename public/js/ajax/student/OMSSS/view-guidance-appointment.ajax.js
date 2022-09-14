$(function () {
	loadGuidanceTable()

	$('#NewGuidanceCaseForm').on('submit', function (e) {
		e.preventDefault() // prevent page refresh
		addNewGuidanceCase()
	})
})

addNewGuidanceCase = () => {
	// New Dental Case
	if ($('#NewGuidanceCaseForm')[0].checkValidity()) {
		// no validation error
		const form = new FormData($('#NewGuidanceCaseForm')[0])
		data = {
			appointment_type: 'Guidance',
			consultation_reason: form.get('consultation_reason'),
			consultation_date: form.get('consultation_date'),
			consultation_time: form.get('consultation_time'),
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
						html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">You have successfully added a PUP Staff!</p></div></div>',
						showCancelButton: !0,
						showConfirmButton: !1,
						cancelButtonClass: 'btn btn-primary w-xs mb-1',
						cancelButtonText: 'Ok',
						buttonsStyling: !1,
						showCloseButton: !0,
					}).then(function () {
						$('#addGuidanceModal').modal('hide')
						$('form#addNewGuidanceCaseForm')[0].reset()

						// Reload Guidance Consultation Datatable
						loadGuidanceTable()
					})
				}
			},
		}).fail(() => {
			Swal.fire({
				html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong !</h4><p class="text-muted mx-4 mb-0">There was an error while adding a PUP Staff. Please try again.</p></div></div>',
				showCancelButton: !0,
				showConfirmButton: !1,
				cancelButtonClass: 'btn btn-primary w-xs mb-1',
				cancelButtonText: 'Dismiss',
				buttonsStyling: !1,
				showCloseButton: !0,
			})
		})
	}
}

// Load datatables
loadGuidanceTable = () => {
	const dt = $('#guidance-datatable')

	$.ajaxSetup({
		headers: {
			Accept: 'application/json',
			Authorization: 'Bearer ' + TOKEN,
			ContentType: 'application/x-www-form-urlencoded',
		},
	})

	if (dt.length) {
		dt.DataTable({
			bDestroy: true,
			ajax: {
				url: apiURL + 'omsss/student/view_guidance_appointment',
				type: 'GET',
				// ContentType: 'application/x-www-form-urlencoded',
			},
			columns: [
				// Case Control No.
				{
					data: null,
					render: (data) => {
						const caseNo = data.case_control_number
						return `${caseNo}`
					},
				},

				// Status
				{
					data: null,
					render: (data) => {
						return data.consultation_status == 'Pending'
							? `<span class="badge rounded-pill bg-warning">Pending</span>`
							: `<span class="badge rounded-pill bg-success">Approved</span>`
					},
				},

				// Attending Consultant
				{
					data: null,
					render: (data) => {
						if (data.health_appointment_assigned_to_physician) {
							const healthPhysician =
								data.health_appointment_assigned_to_physician.user_profiles[0].full_name
						}
						const healthPhysician = 'N/A'

						return `${healthPhysician}`
					},
				},

				// Schedule
				{
					data: null,
					render: (data) => {
						const consultation_date = moment(data.consultation_date).format('LL')
						const consultation_time = data.consultation_time
						return `${consultation_date} (${consultation_time})`
					},
				},

				//Action
				{
					data: null,
					class: 'text-center',
					render: (data) => {
						return `
        <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-info btn-icon waves-effect waves-light" onclick="viewGuidanceDetails('${data.health_appointment_id}')" data-bs-toggle="modal" data-bs-target="#viewGuidanceModal"><i class="ri-eye-fill fs-5"></i></button>
        </div>`
					},
				},
			],
			order: [[0, 'asc']],
		})
	}
}

// View Guidance Consultation details
viewGuidanceDetails = (health_appointment_id) => {
	$.ajaxSetup({
		headers: {
			Accept: 'application/json',
			Authorization: 'Bearer ' + TOKEN,
			ContentType: 'application/x-www-form-urlencoded',
		},
	})

	$.ajax({
		type: 'GET',
		cache: false,
		url: apiURL + `omsss/student/view_appointment/${health_appointment_id}`,
		dataType: 'json',
		success: (result) => {
			const userData = result.data
			if (result.data.health_appointment_assigned_to_physician) {
				const userProfileData = data.health_appointment_assigned_to_physician.user_profiles[0]
			}
			const userProfileData = null

			$('#view_case_details').html(userData.case_control_number)
			$('#view_consultation_reason').html(userData.consultation_reason)
			$('#view_health_physcian').html(userProfileData != null ? userProfileData.full_name : 'N/A')
			// $('#view_date_of_symptoms').html(moment(userData.symptoms_date).format('LL'))
			$('#view_consultation_date').html(moment(userData.consultation_date).format('LL'))
			$('#view_consultation_time').html(userData.consultation_time)
			$('#view_status').html(
				userData.consultation_status == 'Pending'
					? '<span class="fs-12 badge rounded-pill bg-warning" >Pending</span>'
					: '<span class="fs-12 badge rounded-pill bg-success" >Approved</span>',
			)
		},
	})
}
