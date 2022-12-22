$(function () {
	loadDocumentsTable()
})

// Load Documents Table
loadDocumentsTable = () => {
	const dt = $('#documents-datatable')

	if (!dt.length) return

	dt.DataTable({
		bDestroy: true,
		ajax: {
			url: apiURL + 'odrs/super_admin/view_documents',
			type: 'GET',
			headers: AJAX_HEADERS,
		},
		columns: [
			{
				data: null,
				width: '70%',
				render: (data) => {
					return `<a href="#!" class="fw-medium">${data.document_name}</a><br><small>${
						data.document_details == null ? '' : data.document_details
					}</small>`
				},
			},
			{
				data: null,
				width: '20%',
				render: (data) => {
					if (data.document_type === 'CAV') {
						return `<div class="d-block badge badge-soft-dark align-items-center">
						<i class="me-2 bx bxs-institution fs-13"></i>
						<span class="text-uppercase">${data.document_type} (CHED/DFA/WES/CES)</span>
					</div>`
					} else if (data.document_type === 'Certifications') {
						return `<div class="d-block badge badge-soft-success align-items-center">
						<i class="me-2 mdi mdi-certificate fs-13"></i>
						<span class="text-uppercase">${data.document_type}</span>
					</div>`
					} else if (data.document_type === 'Unclaimed') {
						return `<div class="d-block badge badge-soft-danger align-items-center">
						<i class="me-2 mdi mdi-package-variant fs-13"></i>
						<span class="text-uppercase">${data.document_type}</span>
					</div>`
					} else if (data.document_type === 'Transcript of Records') {
						return `<div class="d-block badge badge-soft-primary align-items-center">
						<i class="me-2 mdi mdi-format-annotation-plus fs-13"></i>
						<span class="text-uppercase">${data.document_type}</span>
					</div>`
					}
				},
			},
			{
				data: null,
				width: '10%',
				render: (data) => {
					return `<div class="d-flex gap-2 justify-content-center">
					<button type="button" class="btn btn-info btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewDocumentModal" onclick="loadDocumentInfo('${data.document_id}')">
						<i class="ri-eye-fill fs-5"></i>
					</button>
					<button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="deleteDocument('${data.document_id}')"><i class="bx bx-trash fs-4"></i></button>
				</div>`
				},
			},
		],
		order: [[0, 'asc']],
	})
}

// Get Document Info
loadDocumentInfo = (document_id) => {
	$.ajax({
		type: 'GET',
		url: `${apiURL}odrs/super_admin/view_document/${document_id}`,
		headers: AJAX_HEADERS,
		success: (result) => {
			const data = result.data

			$('#document_name').html(data.document_name)

			$('#document_type').html(
				data.document_type === 'CAV' ? 'CAV (CHED/DFA/WES/CES)' : data.document_type,
			)
			$('#document_details').html(data.document_details)

			$('#document_requirements').empty()
			if (data.document_requirements.length === 0) {
				$('#document_requirements').html('<i>No requirements are needed.</i>')
			} else {
				data.document_requirements.forEach((item) => {
					$('#document_requirements').append(`
						<li>${item.doc_req_name}</li>
					`)
				})
			}
		},
	})
}

// Delete Document
deleteDocument = (document_id) => {
	Swal.fire({
		html: `
      <div class="mt-3">
          <lord-icon src="https://cdn.lordicon.com/exkbusmy.json" trigger="loop" colors="outline:#121331,primary:#646e78,secondary:#f06548,tertiary:#ebe6ef" style="width:100px;height:100px"></lord-icon>
          <div class="mt-4 fs-13">
              <h4 class="mb-3 fw-semibold">Delete this Document?</h4>
              <div class="alert alert-warning alert-border-left alert-dismissible fade show" style="padding-right: 16px;" role="alert">
                  <div class="mb-2 d-flex align-items-center justify-content-center">
                      <i class="ri-alert-line me-2 align-middle fs-6"></i> <strong>WARNING</strong>
                  </div>
                  <span>
                      Deleting this document means that the document will not be visible to the Student and the PUP staff. <br><span class="fw-medium">You also cannot restore a deleted document</span>.
                  </span>
              </div>
          </div>
      </div>
    `,
		showCancelButton: true,
		confirmButtonClass: 'btn btn-danger fw-medium waves-effect waves-light me-2',
		confirmButtonText: 'Yes, Delete It!',
		cancelButtonClass: 'btn btn-light fw-medium waves-effect waves-light',
		buttonsStyling: false,
		showCloseButton: true,
	}).then(function (result) {
		if (result.value) {
			$.ajax({
				url: `${apiURL}odrs/super_admin/delete_document/${document_id}`,
				type: 'DELETE',
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
								'<p class="text-muted mx-4 mb-0">You have successfully deleted a document!</p>' +
								'</div>' +
								'</div>',
							showCancelButton: !0,
							showConfirmButton: !1,
							cancelButtonClass: 'btn btn-success fw-medium waves-effect waves-light',
							cancelButtonText: 'Dismiss',
							buttonsStyling: !1,
							showCloseButton: !0,
						}).then(function () {
							// Reload Documents Datatable
							loadDocumentsTable()
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
						'<p class="text-muted mx-4 mb-0">There was an error while deleting a document. Please try again.</p>' +
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