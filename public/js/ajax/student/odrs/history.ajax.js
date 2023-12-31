$(function () {
	loadHistoryTable()
	initializeRaterJS()

	// Get rating value when submit button is clicked
	$('#clientSurveyForm').on('submit', function (e) {
		e.preventDefault() // prevent page refresh
		const requestID = $('#survey_request_id').val()
		submitSurvey(requestID)
	})
})

// Load History Table
loadHistoryTable = () => {
	const dt = $('#history-datatable')

	if (dt.length) {
		dt.DataTable({
			dom:
				"<'row'<'col-xl-12 mb-2'B>>" +
				"<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			buttons: [
				{
					extend: 'print',
					text: '<i class="ri-printer-fill"></i> Print',
					exportOptions: {
						columns: [0, 4, 5],
					},
				},
			],
			bDestroy: true,
			ajax: {
				url: `${apiURL}odrs/student/requests_history`,
				type: 'GET',
				headers: AJAX_HEADERS,
			},
			//No Sort Function
			"aoColumnDefs": [
				{ 'bSortable': false, 'aTargets': ['no-sort'] }
			],
			columns: [
				// Control Number
				{
					data: null,
					render: (data) => {
						return `<span class="text-primary fw-medium">${data.control_no}</span>`
					},
				},

				// Date Filed
				{
					data: null,
					render: (data) => {
						const date = moment(data.pending_for_clearance).format('DD, MMM. YYYY')
						const time = moment(data.pending_for_clearance).format('hh:mm A')

						return `
							<div class="d-flex align-items-center">
								<i class="ri-calendar-todo-fill text-primary"></i>
								<span class="ms-2">${date}<small class="text-muted ms-1">${time}</small></span>
							</div>
						`
					},
				},

				// Payment Status
				{
					data: null,
					render: (data) => {
						if (data.payment_status === 'Cancelled') {
							return `
								<div class="d-flex badge badge-soft-danger align-items-center justify-content-center">
									<i class="me-2 mdi mdi-cash-remove fs-15"></i>
									<span class="text-uppercase fw-bold">${data.payment_status}</span>
								</div>
							`
						} else if (data.payment_status === 'Paid') {
							return `
								<div class="d-flex badge badge-soft-success align-items-center justify-content-center">
									<i class="me-2 mdi mdi-cash-check fs-15"></i>
									<span class="text-uppercase fw-bold">${data.payment_status}</span>
								</div>
								<span class="mt-1 d-block badge badge-soft-dark badge-border">OR No. ${data.or_no} </span>
							`
						}
					},
				},

				// Details
				{
					data: null,
					width: '30%',
					render: (data) => {
						const course = data.user_assigned_to_request.education_profile.course_when_admitted
						const purpose = data.purpose_of_request
						return `
							<table>
								<tbody>
									<tr>
										<td>
											<span class="fw-medium badge bg-primary">Course: </span>
										</td>
										<td><span class="text-uppercase text-wrap">${course}</span></td>
									</tr>
									<tr>
										<td>
											<span class="fw-medium badge bg-primary me-3">Purpose: </span>
										</td>
										<td>${purpose}</td>
									</tr>
								</tbody>
							</table>
						`
					},
				},

				// Date Released/Cancelled
				{
					data: null,
					render: (data) => {
						if (data.status_of_request === 'Released') {
							const date = moment(data.released).format('DD, MMM. YYYY')
							const time = moment(data.released).format('hh:mm A')

							return `
								<div class="d-flex align-items-center justify-content-center">
									<i class="ri-calendar-todo-fill text-primary"></i>
									<span class="ms-2">${date}<small class="text-muted ms-1">${time}</small></span>
								</div>
							`
						} else {
							const date = moment(data.cancelled).format('DD, MMM. YYYY')
							const time = moment(data.cancelled).format('hh:mm A')

							return `
								<div class="d-flex align-items-center justify-content-center">
									<i class="ri-calendar-todo-fill text-primary"></i>
									<span class="ms-2">${date}<small class="text-muted ms-1">${time}</small></span>
								</div>
							`
						}
					},
				},

				// Request Status
				{
					data: null,
					render: (data) => {
						if (data.status_of_request === 'Released') {
							return `
								<div class="mt-2 d-grid fw-bolder badge badge-soft-success position-relative">
									<i class="m-2 ri-checkbox-circle-line fs-13"></i>
									<span class="pb-2 text-uppercase">${data.status_of_request}</span>
									<button type="button" class="btn btn-sm btn-secondary bg-gradient waves-effect waves-light rounded-circle position-absolute top-0 start-100 translate-middle" data-bs-toggle="modal" data-bs-target="#viewProcessStatusFlow">?</button>
								</div>
							`
						} else {
							return `
								<div class="mt-2 d-grid fw-bolder badge badge-soft-danger position-relative">
									<i class="m-2 mdi mdi-cancel fs-13"></i>
									<span class="pb-2 text-uppercase">${data.status_of_request}</span>
									<button type="button" class="btn btn-sm btn-secondary bg-gradient waves-effect waves-light rounded-circle position-absolute top-0 start-100 translate-middle" data-bs-toggle="modal" data-bs-target="#viewProcessStatusFlow">?</button>
								</div>
							`
						}
					},
				},

				// Action
				{
					data: null,
					class: 'text-center',
					render: (data) => {
						const evaluationStatus = data.is_evaluated

						if (evaluationStatus == true) {
							return `
								<div class="dropdown d-inline-block">
									<button type="button" class="btn btn-info btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewRequestDetails" onclick = "viewRequestDetails('${data.request_id}')">
										<i class="ri-eye-fill fs-5"></i>
									</button>
									<button type="button" class="btn btn-icon text-white waves-effect waves-light" data-bs-toggle="modal" style="background-color: #3577f1;" data-bs-target="#viewSurveyEvaluation" onclick="viewSurveyEvaluation('${data.document_request_evaluation.evaluation_id}')">
										<i class="ri-search-eye-fill fs-5"></i>
									</button>
								</div>
							`
						} else {
							return `
							<div class="dropdown d-inline-block">
								<button type="button" class="btn btn-info btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewRequestDetails" onclick = "viewRequestDetails('${data.request_id}')">
									<i class="ri-eye-fill fs-5"></i>
								</button>
								<button type="button" class="btn btn-icon text-white waves-effect waves-light" data-bs-toggle="modal" style="background-color: #4b38b3;" data-bs-target="#satisfactionSurveyModal" onclick="addId('${data.request_id}', 'client_satisfaction')">
									<i class="ri-survey-fill fs-5"></i>
								</button>
							</div>
						`
						}
					},
				},
			],
			order: [[0, 'desc']],
		})
	}
}

initializeRaterJS = () => {
	document.querySelector('#quality_service') &&
		(qualityRating = raterJs({
			starSize: 22,
			rating: 3,
			element: document.querySelector('#quality_service'),
			rateCallback: function (e, t) {
				this.setRating(e), t()
			},
		}))

	document.querySelector('#timeliness_service') &&
		(timelinessRating = raterJs({
			starSize: 22,
			rating: 3,
			element: document.querySelector('#timeliness_service'),
			rateCallback: function (e, t) {
				this.setRating(e), t()
			},
		}))

	document.querySelector('#courtesy_staff') &&
		(courtesyRating = raterJs({
			starSize: 22,
			rating: 3,
			element: document.querySelector('#courtesy_staff'),
			rateCallback: function (e, t) {
				this.setRating(e), t()
			},
		}))
}

// View Request Details
viewRequestDetails = (request_id) => {

	$.ajax({
		type: 'GET',
		url: apiURL + `odrs/student/fetch_oic_records`,
		headers: AJAX_HEADERS,
		success: (result) => {
			const staff = result.data

	$.ajax({
		type: 'GET',
		url: `${apiURL}odrs/student/view_request/${request_id}`,
		dataType: 'json',
		headers: AJAX_HEADERS,
		success: (result) => {
			const data = result.data

			$('#control_no').html(data.control_no)

			let documentsList = ''
			data.documents_assigned_to_request.forEach((document) => {
				documentsList += `
					<tr>
						<td>
							<span>${document.document_information[0].document_name}</span>
						</td>
						<td class="text-center">${document.quantity}</td>
					</tr>
				`
			})
			$('#documents').html(documentsList)
			$('#purpose_of_request').html(data.purpose_of_request)

			$('#payment_status_col').removeClass()
			$('#or_number_col').removeClass()
			$('#release_classification_col').removeClass()
			$('#completed_date_col').removeClass()

			let date = ''
			let time = ''
			if (data.status_of_request === 'Released') {
				date = moment(data.released).format('DD, MMM. YYYY')
				time = moment(data.released).format('hh:mm A')
				$('#payment_status_col').addClass('col-lg-3 col-sm-6')
				$('#or_number_col').addClass('col-lg-3 col-sm-6')
				$('#release_classification_col').addClass('col-lg-3 col-sm-6')
				$('#completed_date_col').addClass('col-lg-3 col-sm-6')
				$('#completed_date').html('Date Released')

				$('#payment_status').html(
					`<span class="badge bg-success fs-11">${data.payment_status}</span>`,
				)
				$('#or_no').html(data.or_no)
				$('#release_classification').html(data.release_classification)
			} else if (data.ready_for_pickup !== null) {
				date = moment(data.cancelled).format('DD, MMM. YYYY')
				time = moment(data.cancelled).format('hh:mm A')
				$('#payment_status_col').addClass('col-lg-4 col-sm-12')
				$('#or_number_col').addClass('col-lg-4 col-sm-12')
				$('#release_classification_col').addClass('d-none')
				$('#completed_date_col').addClass('col-lg-4 col-sm-12')
				$('#completed_date').html('Date Cancelled')

				$('#payment_status').html(
					`<span class="badge bg-success fs-11">${data.payment_status}</span>`,
				)
				$('#or_no').html(data.or_no)
			} else {
				date = moment(data.cancelled).format('DD, MMM. YYYY')
				time = moment(data.cancelled).format('hh:mm A')
				$('#payment_status_col').addClass('col-lg-6 col-sm-12')
				$('#or_number_col').addClass('d-none')
				$('#release_classification_col').addClass('d-none')
				$('#completed_date_col').addClass('col-lg-6 col-sm-12')
				$('#completed_date').html('Date Cancelled')

				$('#payment_status').html(
					`<span class="badge bg-danger fs-11">${data.payment_status}</span>`,
				)
			}

			$('#date_completed').html(
				`<span>${date}<small class="text-muted ms-1">${time}</small></span>`,
			)

			pendingforClearanceDate = `
				${moment(data.pending_for_clearance).format('ddd')},
				${moment(data.pending_for_clearance).format('DD, MMM. YYYY')}
			`
			$('#pending_for_clearance_date').html(pendingforClearanceDate)

			pendingforClearanceDateTime = `
				${moment(data.pending_for_clearance).format('ddd')},
				${moment(data.pending_for_clearance).format('DD, MMM. YYYY')} -
				${moment(data.pending_for_clearance).format('hh:mm A')}
			`

			$('#pending_for_clearance_datetime').html(pendingforClearanceDateTime)

			if (data.status_of_request === 'Released') {
				$('#for_clearance').removeClass('d-none')
				$('#for_evaluation').removeClass('d-none')
				$('#ready_for_pickup').removeClass('d-none')

				let forClearance = `
					<div class="accordion-header" id="headingTwo">
						<a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 avatar-xs">
									<div class="avatar-title bg-danger bg-gradient rounded-circle">
										<i class="mdi mdi-nfc-search-variant"></i>
									</div>
								</div>
								<div class="flex-grow-1 ms-3">
									<h6 class="fs-15 mb-0 fw-semibold">
										For Clearance -
										<span class="fw-normal">
											${moment(data.for_clearance).format('ddd')},
											${moment(data.for_clearance).format('DD, MMM. YYYY')}
										</span>
									</h6>
								</div>
							</div>
						</a>
					</div>
					<div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
						<div class="accordion-body ms-2 ps-5 pt-0">
							<h6 class="mb-1">The Document Request is now Approved. The student must go to PUP QC to submit the requirements and pay the processing fees.</h6>
							<p class="text-muted mb-0">
								${moment(data.for_clearance).format('ddd')},
								${moment(data.for_clearance).format('DD, MMM. YYYY')} -
								${moment(data.for_clearance).format('hh:mm A')}
							</p>
						</div>
					</div>
				`
				$('#for_clearance').html(forClearance)

				let forEvaluation = `
					<div class="accordion-header" id="headingThree">
						<a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 avatar-xs">
									<div class="avatar-title bg-info bg-gradient rounded-circle">
										<i class="mdi mdi-file-sign"></i>
									</div>
								</div>
								<div class="flex-grow-1 ms-3">
									<h6 class="fs-15 mb-1 fw-semibold">
										For Evaluation / Processing -
										<span class="fw-normal">
											${moment(data.for_evaluation).format('ddd')},
											${moment(data.for_evaluation).format('DD, MMM. YYYY')}
										</span>
									</h6>
								</div>
							</div>
						</a>
					</div>
					<div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
						<div class="accordion-body ms-2 ps-5 pt-0">
							<h6 class="mb-1">The Document/s are Paid and the Request is now being Processed for signature, documentary stamp and school dry seal.</h6>
							<p class="text-muted mb-0">
								${moment(data.for_evaluation).format('ddd')},
								${moment(data.for_evaluation).format('DD, MMM. YYYY')} -
								${moment(data.for_evaluation).format('hh:mm A')}
							</p>
						</div>
					</div>
				`
				$('#for_evaluation').html(forEvaluation)

				let readyforPickup = `
					<div class="accordion-header" id="headingFour">
						<a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 avatar-xs">
									<div class="avatar-title bg-dark bg-gradient rounded-circle">
										<i class="ri-user-received-2-line"></i>
									</div>
								</div>
								<div class="flex-grow-1 ms-3">
									<h6 class="fs-15 mb-1 fw-semibold">
										Ready for Pickup -
										<span class="fw-normal">
											${moment(data.ready_for_pickup).format('ddd')},
											${moment(data.ready_for_pickup).format('DD, MMM. YYYY')}
										</span>
									</h6>
								</div>
							</div>
						</a>
					</div>
					<div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
						<div class="accordion-body ms-2 ps-5 pt-0">
							<h6 class="mb-1">The Requested Document/s can now be claimed at PUP QC. The student must bring the claim stub and other requirements, if necessary.</h6>
							<p class="text-muted mb-0">
								${moment(data.ready_for_pickup).format('ddd')},
								${moment(data.ready_for_pickup).format('DD, MMM. YYYY')} -
								${moment(data.ready_for_pickup).format('hh:mm A')}
							</p>
						</div>
					</div>
				`
				$('#ready_for_pickup').html(readyforPickup)

				let released = `
					<div class="accordion-header" id="headingFive">
						<a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
							<div class="d-flex align-items-center">
								<div class="flex-shrink-0 avatar-xs">
									<div class="avatar-title bg-success bg-gradient rounded-circle">
										<i class="ri-checkbox-circle-fill"></i>
									</div>
								</div>
								<div class="flex-grow-1 ms-3">
									<h6 class="fs-15 mb-1 fw-semibold">
										Released -
										<span class="fw-normal">
										${moment(data.released).format('ddd')},
										${moment(data.released).format('DD, MMM. YYYY')}
										</span>
									</h6>
								</div>
							</div>
						</a>
					</div>
					<div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
						<div class="accordion-body ms-2 ps-5 pt-0">
							<h6 class="mb-1">The requested documents has been successfully claimed by the student.</h6>
							<p class="text-muted mb-0">
								${moment(data.released).format('ddd')},
								${moment(data.released).format('DD, MMM. YYYY')} -
								${moment(data.released).format('hh:mm A')}
							</p>
						</div>
					</div>
				`
				$('#last').html(released)
			} else {
				processCancelled(data)
			}

			if (data.status_of_request === 'Cancelled by Staff') {
				remarks = `
					<div class="h6 fs-15 text-primary">Remarks</div>
					<div class="list-group">
						<div class="list-group-item list-group-item-action">
							<div class="d-flex mb-2 align-items-center">
								<div class="flex-shrink-0">
									<img src="${baseURL}public/images/profile/flat-faces-icons-circle-woman-9.png" alt="" class="avatar-sm rounded-circle" />
								</div>
								</div>
								<div class="flex-grow-1 ms-3">
									<h5 class="list-title fs-15 mb-1">${staff.user_assigned_to_role.user_profiles[0].full_name}</h5>
									<p class="list-text mb-0 fs-12">${staff.user_assigned_to_role.user_type}</p>
								</div>
							</div>
							<p>Good Day! Please be informed that the document/s you requested has been cancelled due to the following reason/s:</p>
							<p class="fw-medium">${data.remarks}</p>
							<p class="d-flex fw-medium align-items-center">
								<i class="ri-error-warning-fill me-2 fs-4 text-warning"></i>
								<span class="text-danger">Reminder: If you have further questions regarding the cancellation of the request, please call us at <b>8-287-82-04</b>.</span>
							</p>
						</div>
					</div>
				`
				$('#remarks').html(remarks)
			} else {
				remarks = ''
				$('#remarks').html(remarks)
			}
		},
	})
}

})
}

processCancelled = (data) => {
	if (data.status_of_request === 'Cancelled by Student') {
		cancelledStudent(data)
	} else if (data.status_of_request === 'Cancelled by Staff') {
		cancelledStaff(data)
	}
}

cancelledStudent = (data) => {
	$('#for_evaluation').addClass('d-none')
	$('#ready_for_pickup').addClass('d-none')

	if (data.for_clearance !== null) {
		$('#for_clearance').removeClass('d-none')

		let forClearance = `
            <div class="accordion-header" id="headingTwo">
                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs">
                            <div class="avatar-title bg-danger bg-gradient rounded-circle">
                                <i class="mdi mdi-nfc-search-variant"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-15 mb-0 fw-semibold">
                                For Clearance -
                                <span class="fw-normal">
                                    ${moment(data.for_clearance).format('ddd')},
                                    ${moment(data.for_clearance).format('DD, MMM. YYYY')}
                                </span>
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">The Document Request is now Approved. The student must go to PUP QC to submit the requirements and pay the processing fees.</h6>
                    <p class="text-muted mb-0">
                        ${moment(data.for_clearance).format('ddd')},
                        ${moment(data.for_clearance).format('DD, MMM. YYYY')} -
                        ${moment(data.for_clearance).format('hh:mm A')}
                    </p>
                </div>
            </div>
        `
		$('#for_clearance').html(forClearance)
	} else {
		$('#for_clearance').addClass('d-none')
	}

	let cancelled = `
        <div class="accordion-header" id="headingFive">
            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-primary bg-gradient rounded-circle">
                            <i class="mdi mdi-cancel"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="fs-15 mb-1 fw-semibold">
                            ${data.status_of_request} -
                            <span class="fw-normal">
                            ${moment(data.cancelled).format('ddd')},
                            ${moment(data.cancelled).format('DD, MMM. YYYY')}
                            </span>
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFives" data-bs-parent="#accordionExample">
            <div class="accordion-body ms-2 ps-5 pt-0">
                <h6 class="mb-1">The Document Request has been cancelled by the Student.</h6>

                <p class="text-muted mb-0">
                    ${moment(data.cancelled).format('ddd')},
                    ${moment(data.cancelled).format('DD, MMM. YYYY')} -
                    ${moment(data.cancelled).format('hh:mm A')}
                </p>
            </div>
        </div>
    `

	$('#last').html(cancelled)
}

cancelledStaff = (data) => {
	if (data.ready_for_pickup !== null) {
		$('#for_clearance').removeClass('d-none')
		$('#for_evaluation').removeClass('d-none')
		$('#ready_for_pickup').removeClass('d-none')

		let forClearance = `
            <div class="accordion-header" id="headingTwo">
                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs">
                            <div class="avatar-title bg-danger bg-gradient rounded-circle">
                                <i class="mdi mdi-nfc-search-variant"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-15 mb-0 fw-semibold">
                                For Clearance -
                                <span class="fw-normal">
                                    ${moment(data.for_clearance).format('ddd')},
                                    ${moment(data.for_clearance).format('DD, MMM. YYYY')}
                                </span>
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">The Document Request is now Approved. The student must go to PUP QC to submit the requirements and pay the processing fees.</h6>
                    <p class="text-muted mb-0">
                        ${moment(data.for_clearance).format('ddd')},
                        ${moment(data.for_clearance).format('DD, MMM. YYYY')} -
                        ${moment(data.for_clearance).format('hh:mm A')}
                    </p>
                </div>
            </div>
        `
		$('#for_clearance').html(forClearance)

		let forEvaluation = `
            <div class="accordion-header" id="headingThree">
                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs">
                            <div class="avatar-title bg-info bg-gradient rounded-circle">
                                <i class="mdi mdi-file-sign"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-15 mb-1 fw-semibold">
                                For Evaluation / Processing -
                                <span class="fw-normal">
                                    ${moment(data.for_evaluation).format('ddd')},
                                    ${moment(data.for_evaluation).format('DD, MMM. YYYY')}
                                </span>
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">The Document/s are Paid and the Request is now being Processed for signature, documentary stamp and school dry seal.</h6>
                    <p class="text-muted mb-0">
                        ${moment(data.for_evaluation).format('ddd')},
                        ${moment(data.for_evaluation).format('DD, MMM. YYYY')} -
                        ${moment(data.for_evaluation).format('hh:mm A')}
                    </p>
                </div>
            </div>
        `
		$('#for_evaluation').html(forEvaluation)

		let readyforPickup = `
            <div class="accordion-header" id="headingFour">
                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs">
                            <div class="avatar-title bg-dark bg-gradient rounded-circle">
                                <i class="ri-user-received-2-line"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-15 mb-1 fw-semibold">
                                Ready for Pickup -
                                <span class="fw-normal">
                                    ${moment(data.ready_for_pickup).format('ddd')},
                                    ${moment(data.ready_for_pickup).format('DD, MMM. YYYY')}
                                </span>
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">The Requested Document/s can now be claimed at PUP QC. The student must bring the claim stub and other requirements, if necessary.</h6>
                    <p class="text-muted mb-0">
                        ${moment(data.ready_for_pickup).format('ddd')},
                        ${moment(data.ready_for_pickup).format('DD, MMM. YYYY')} -
                        ${moment(data.ready_for_pickup).format('hh:mm A')}
                    </p>
                </div>
            </div>
        `
		$('#ready_for_pickup').html(readyforPickup)
	} else if (data.for_clearance !== null) {
		$('#for_clearance').removeClass('d-none')
		$('#for_evaluation').addClass('d-none')
		$('#ready_for_pickup').addClass('d-none')

		let forClearance = `
            <div class="accordion-header" id="headingTwo">
                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs">
                            <div class="avatar-title bg-danger bg-gradient rounded-circle">
                                <i class="mdi mdi-nfc-search-variant"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-15 mb-0 fw-semibold">
                                For Clearance -
                                <span class="fw-normal">
                                    ${moment(data.for_clearance).format('ddd')},
                                    ${moment(data.for_clearance).format('DD, MMM. YYYY')}
                                </span>
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">The Document Request is now Approved. The student must go to PUP QC to submit the requirements and pay the processing fees.</h6>
                    <p class="text-muted mb-0">
                        ${moment(data.for_clearance).format('ddd')},
                        ${moment(data.for_clearance).format('DD, MMM. YYYY')} -
                        ${moment(data.for_clearance).format('hh:mm A')}
                    </p>
                </div>
            </div>
        `
		$('#for_clearance').html(forClearance)
	} else {
		$('#for_clearance').addClass('d-none')
		$('#for_evaluation').addClass('d-none')
		$('#ready_for_pickup').addClass('d-none')
	}

	let cancelled = `
        <div class="accordion-header" id="headingFive">
            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-primary bg-gradient rounded-circle">
                            <i class="mdi mdi-cancel"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="fs-15 mb-1 fw-semibold">
                            ${data.status_of_request} -
                            <span class="fw-normal">
                            ${moment(data.cancelled).format('ddd')},
                            ${moment(data.cancelled).format('DD, MMM. YYYY')}
                            </span>
                        </h6>
                    </div>
                </div>
            </a>
        </div>
        <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFives" data-bs-parent="#accordionExample">
            <div class="accordion-body ms-2 ps-5 pt-0">
				<h6 class="mb-1">The Document Request has been cancelled by the PUP Staff. The student can find the reason of cancelling on the Remarks of this request.</h6>
				<p class="text-muted mb-0">
					${moment(data.cancelled).format('ddd')},
					${moment(data.cancelled).format('DD, MMM. YYYY')} -
					${moment(data.cancelled).format('hh:mm A')}
				</p>
			</div>
		</div>
`
	$('#last').html(cancelled)
}

// Submit Client Satisfaction Survey
submitSurvey = (request_id) => {
	if ($('#clientSurveyForm')[0].checkValidity()) {
		// no validation error
		const form = new FormData($('#clientSurveyForm')[0])

		data = {
			quality_rating: qualityRating.getRating(),
			timeliness_rating: timelinessRating.getRating(),
			courtesy_rating: courtesyRating.getRating(),
			evaluation_comment: form.get('comments'),
		}

		$.ajax({
			url: `${apiURL}odrs/student/add_evaluation/${request_id}`,
			type: 'POST',
			data: data,
			dataType: 'json',
			headers: AJAX_HEADERS,
			success: (result) => {
				if (result) {
					Swal.fire({
						html:
							'<div class="mt-3">' +
							'<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
							'<div class="mt-4 pt-2 fs-15">' +
							'<h4>Well done!</h4>' +
							'<p class="text-muted mx-4 mb-0">You have successfully submitted an evaluation!</p>' +
							'</div>' +
							'</div>',
						showCancelButton: !0,
						showConfirmButton: !1,
						cancelButtonClass: 'btn btn-success w-xs mb-1',
						cancelButtonText: 'Ok',
						buttonsStyling: !1,
						showCloseButton: !0,
					}).then(function () {
						$('#satisfactionSurveyModal').modal('hide')
						$('form#clientSurveyForm')[0].reset()

						// Reload History Datatable
						loadHistoryTable()
					})
				}
			},
		}).fail(() => {
			Swal.fire({
				html:
					'<div class="mt-3">' +
					'<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
					'<div class="mt-4 pt-2 fs-15">' +
					'<h4>Something went Wrong!</h4>' +
					'<p class="text-muted mx-4 mb-0">There was an error while submitting your evaluation. Please try again.</p>' +
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
}

// View Client Satisfaction Survey
viewSurveyEvaluation = (document_request_evaluation_id) => {
	$.ajax({
		type: 'GET',
		url: `${apiURL}odrs/student/view_evaluation/${document_request_evaluation_id}`,
		dataType: 'json',
		headers: AJAX_HEADERS,
		success: (result) => {
			const data = result.data

			const quality = data.quality_rating
			const timeliness = data.timeliness_rating
			const courtesy = data.courtesy_rating

			let qualityStars = ''
			let timelinessStars = ''
			let courtesyStars = ''

			if (quality === 5 || timeliness === 5 || courtesy === 5) {
				qualityStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
				`

				timelinessStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
				`

				courtesyStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
				`
			} else if (quality === 4 || timeliness === 4 || courtesy === 4) {
				qualityStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				timelinessStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				courtesyStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`
			} else if (quality === 3 || timeliness === 3 || courtesy === 3) {
				qualityStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`
				timelinessStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				courtesyStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`
			} else if (quality === 2 || timeliness === 2 || courtesy === 2) {
				qualityStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				timelinessStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				courtesyStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`
			} else {
				qualityStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				timelinessStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`

				courtesyStars += `
					<i class="fs-3 ri-star-fill text-warning"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
					<i class="fs-3 ri-star-fill" style="color: #ced4da"></i>
				`
			}

			$('#quality').html(qualityStars)
			$('#timeliness').html(timelinessStars)
			$('#courtesy').html(courtesyStars)

			let comment = ''
			if (data.evaluation_comment !== null) {
				comment += `
					<div class="col-lg-12 mt-3">
					<h6 for="comments">Comments/Suggestions/Recommendations</h6>
					</div>
					<div class="col-lg-12">
						<blockquote class="mt-2 blockquote custom-blockquote blockquote-primary rounded shadow mb-0">
						<p class="fs-13 mb-2">${data.evaluation_comment}</p>
						</blockquote>
					</div>
				`
			}
			$('#comment_survey').html(comment)
		},
	})
}

addId = (request_id) => {
	$(`#survey_request_id`).val(request_id)
}
