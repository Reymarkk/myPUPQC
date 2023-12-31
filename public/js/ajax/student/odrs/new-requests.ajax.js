$(() => {
	$.ajax({
		type: 'GET',
		url: apiURL + 'student/view/dpa_agreement',
		headers: AJAX_HEADERS,
		success: (result) => {
			if (result.data.length == 0) {
				$('#dataPrivacy').modal('show')
				$('#addNewRequestButton').attr('disabled', true)
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

	checkCreatePermission()
})

const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 2000,
	timerProgressBar: true,
	didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	},
})

// Check if student has existing request. If yes, he cannot create a new request. If no, he can access the new request form.
checkCreatePermission = () => {
	$.ajax({
		type: 'GET',
		url: `${apiURL}odrs/student/view_request`,
		dataType: 'json',
		headers: AJAX_HEADERS,
		success: (result) => {
			const data = result.data

			if (data.length !== 0) {
				$('#decline_create_request').removeClass('d-none')
			} else {
				$('#allow_create_request').removeClass('d-none')
				$('#decline_create_request').addClass('d-none')
				loadDocuments()

				$('#createRequestForm').on('submit', function (e) {
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
											createRequest()
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
			}
		},
	})
}

// Load Documents
loadDocuments = () => {
	const typesID = [
		'documentsTOR',
		'documentsCert',
		'documentsUncl',
		'documentsCAV',
		'Transcript of Records',
		'Certifications',
		'Unclaimed',
		'CAV',
		'tor',
		'certificates',
		'unclaimed',
		'cav',
	]

	for (let i = 0; i < 4; i++) {
		const type = `#${typesID[i]}`
		const document_type = typesID[i + 4]

		$('#tabpanes').append(`
			<div class="tab-pane ${i === 0 ? 'active' : ''}" id="${typesID[i + 8]}" role="tabpanel">
				<table class="table dt-responsive align-middle" id="${typesID[i]}" style="width: 100%">
					<thead>
						<tr>
							<th data-ordering="false">Document</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		`)

		const dt = $(type)

		if (!dt.length) return

		dt.DataTable({
			bDestroy: true,
			ajax: {
				url: apiURL + 'odrs/student/view_documents/' + document_type,
				type: 'GET',
				ContentType: 'application/x-www-form-urlencoded',
				headers: AJAX_HEADERS,
				complete: function () {
					const checkbox = document.querySelectorAll('.docs')

					checkbox.forEach((item) => {
						item.addEventListener('change', (e) => {
							if (e.target.checked) {
								$('#not-visible').removeClass('d-none')
							}
							if ($('input:checkbox:checked').length === 0) {
								$('#not-visible').addClass('d-none')
							}
						})
					})
				},
			},
			dom: '',
			columns: [
				{
					data: null,
					render: (data) => {
						return `
						<div class="d-flex">
							<div class="form-check me-3">
								<input class="form-check-input fs-15 docs" type="checkbox" name="checkAll" value="${data.document_id}" />
							</div>
							<div class="d-flex flex-column">
								<span class="fw-medium">${data.document_name}</span>
								<div class="mt-2">
									<button type="button" class="btn btn-sm btn-info btn-label waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewDocumentDetails" onclick="loadDocumentInfo('${data.document_id}')">
										<i class="mdi mdi-eye label-icon align-middle fs-13 me-2"></i> 
										View Details
									</button>
								</div>
							</div>
						</div>`
					},
				},
				{
					data: null,
					class: 'text-end',
					render: (data) => {
						return `
						<div class="input-step step-primary">
							<button type="button" class="minus">–</button>
								<input type="number" class="product-quantity" id="${data.document_id}" value="1" min="1" max="100" readonly/>
							<button type="button" class="plus">+</button>
						</div>
            			`
					},
				},
			],
			order: [[0, 'asc']],
		})
	}
}

// Load Document Information
loadDocumentInfo = (document_id) => {
	$.ajax({
		type: 'GET',
		url: apiURL + `odrs/student/view_document/` + document_id,
		headers: AJAX_HEADERS,
		success: (result) => {
			const data = result.data

			$('#view_document_type').html(
				data.document_type === 'CAV' ? 'CAV (CHED/DFA/WES/CES)' : data.document_type,
			)
			$('#view_document_name').html(data.document_name)
			$('#view_document_details').html(data.document_details)
			$('#view_document_requirements').empty()
			if (data.document_requirements.length === 0) {
				$('#view_document_requirements').html('<i>No requirements are needed.</i>')
			} else {
				data.document_requirements.forEach((item) => {
					$('#view_document_requirements').append(`
						<li>${item.doc_req_name}</li>
					`)
				})
			}
		},
	})
}

// Create Request
createRequest = () => {
	if (!$('#createRequestForm')[0].checkValidity()) return

	const datas = [
		{
			purpose_of_request: $('#purpose').val(),
		},
	]
	$('input:checkbox:checked').each(function () {
		const document_id = $(this).val()

		$('input[type=number]').each(function () {
			if (document_id !== $(this).attr('id')) return

			const quantity = $(this).val()

			datas.push({ document_id: document_id, quantity: quantity })
		})
	})

	$.ajax({
		url: apiURL + 'odrs/student/add_request',
		type: 'POST',
		data: { data: datas },
		headers: AJAX_HEADERS,
		dataType: 'json',
		success: (result) => {
			if (result) {
				Toast.fire({
					icon: 'success',
					title: 'Added New Request Successfully!',
				}).then(function () {
					$('form#createRequestForm')[0].reset()

					window.location.href = `${baseURL}student/odrs/request`
				})
			}
		},
	}).fail((xhr) => {
		Swal.fire({
			html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong !</h4><p class="text-muted mx-4 mb-0">${
				JSON.parse(xhr.responseText).message
			}</p></div></div>`,
			showCancelButton: !0,
			showConfirmButton: !1,
			cancelButtonClass: 'btn btn-danger w-xs mb-1',
			cancelButtonText: 'Dismiss',
			buttonsStyling: !1,
			showCloseButton: !0,
		})
	})
}
