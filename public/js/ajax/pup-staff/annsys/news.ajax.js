$(() => {
	loadNewsTables()

	pond = FilePond.create(document.querySelector('#announcement_image'), {
		instantUpload: false,
		allowProcess: false,
	})

	$('#NewNews').on('submit', function (e) {
		e.preventDefault() // prevent page refresh

		if ($('#announcement_id').val() == "") {
			addNews(pond)
		} else {
			editNews(pond)
		}
	})
})

loadNewsTables = () => {
	// * Phase 1: Populate all_news_table (except user's own news)
	const all_news_dt = $('#all_news_table')

	if (all_news_dt.length) {
		all_news_dt.DataTable({
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
						columns: [0, 1, 2, 3, 4],
					},
				},
			],
			bDestroy: true,
			ajax: {
				url: apiURL + 'annsys/pup_staff/get_all_news',
				type: 'GET',
				headers: AJAX_HEADERS,
			},
			columns: [
				// * Advisory Title
				{
					data: null,
					width: '30%',
					class: 'text-wrap text-center',
					render: (data) => {
						const newsTitle = data.announcement_title
						const newsLink =
							baseURL == 'http://localhost/myPUPQC/'
								? baseURL + `news/${data.reference_id}`
								: data.announcement_link
						const link = `<a href="${newsLink}" target="_blank">${newsTitle}</a>`
						return `${link}`
					},
				},
				// * Advisory Description
				{
					data: null,
					width: '60%',
					class: 'text-wrap',
					render: (data) => {
						const newsDescription = data.announcement_description
						return `${newsDescription}`
					},
				},
				// * Created By
				{
					data: null,
					render: (data) => {
						// * lagyan sana ng picture dito kagaya sa requests...
						const newsAuthor = data.announcement_assigned_to_user.user_profiles[0].full_name
						return `${newsAuthor}`
					},
				},
				// * Create Date
				{
					data: null,
					render: (data) => {
						let date = new Date(data.created_at)
						const article_date = date.toLocaleDateString('en-US', {
							year: 'numeric',
							month: 'long',
							day: 'numeric',
						})
						const article_time = date.toLocaleTimeString('en-US', {
							hour: 'numeric',
							minute: 'numeric',
							hour12: true,
						})
						return `${article_date}<br/>${article_time}`
					},
				},
				// * Status
				{
					data: null,
					render: (data) => {
						// * Has three status: Published, Hidden and Deleted
						const advisoryStatus = data.announcement_status
						if (advisoryStatus == 'Published') {
							return `<span class="badge rounded-pill bg-success">${advisoryStatus}</span>`
						} else {
							return `<span class="badge rounded-pill bg-danger">${advisoryStatus}</span>`
						}
					},
				},
			],
			order: [[0, 'asc']],
		})
	}

	// * Phase 2: Populate my_news_table (user's own news)
	const my_news_dt = $('#my_news_table')

	if (my_news_dt.length) {
		my_news_dt.DataTable({
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
						columns: [0, 1, 2, 3],
					},
				},
			],
			bDestroy: true,
			ajax: {
				url: apiURL + 'annsys/pup_staff/get_news_from_user',
				type: 'GET',
			},
			columns: [
				// * Advisory Title
				{
					data: null,
					width: '30%',
					class: 'text-wrap text-center',
					render: (data) => {
						const newsTitle = data.announcement_title
						const newsLink =
							baseURL == 'http://localhost/myPUPQC/'
								? baseURL + `news/${data.reference_id}`
								: data.announcement_link
						const link = `<a href="${newsLink}" target="_blank">${newsTitle}</a>`
						return `${link}`
					},
				},
				// * Advisory Description
				{
					data: null,
					width: '60%',
					class: 'text-wrap',
					render: (data) => {
						const newsDescription = data.announcement_description
						return `${newsDescription}`
					},
				},
				// * Create Date
				{
					data: null,
					render: (data) => {
						let date = new Date(data.created_at)
						const article_date = date.toLocaleDateString('en-US', {
							year: 'numeric',
							month: 'long',
							day: 'numeric',
						})
						const article_time = date.toLocaleTimeString('en-US', {
							hour: 'numeric',
							minute: 'numeric',
							hour12: true,
						})
						return `${article_date}<br/>${article_time}`
					},
				},
				// * Status
				{
					data: null,
					render: (data) => {
						// * Has three status: Published, Hidden and Deleted
						const advisoryStatus = data.announcement_status
						if (advisoryStatus == 'Published') {
							return `<span class="badge rounded-pill bg-success">${advisoryStatus}</span>`
						} else {
							return `<span class="badge rounded-pill bg-danger">${advisoryStatus}</span>`
						}
					},
				},
				// * Action
				{
					data: null,
					render: (data) => {
						const buttonColor =
							data.announcement_status == 'Published' ? 'btn-danger' : 'btn-success'
						const buttonLogo =
							data.announcement_status == 'Published' ? 'ri-close-fill' : 'ri-check-fill'
						const viewButton = `
                        <button type="button" class="btn ${buttonColor} btn-icon waves-effect waves-light" onclick="changeNewsStatus('${data.announcement_id}', '${data.announcement_status}')">
                            <i class="${buttonLogo}"></i>
                        </button>
                        `
						const editButton = `
                        <button type="button" class="btn btn-warning btn-icon waves-effect waves-light" onclick="getSpecificNews('${data.announcement_id}')">
                            <i class="ri-edit-2-fill"></i>
                        </button>
                        `
						const deleteButton = `
                        <button type="button" class="btn btn-dark bg-gradient btn-icon waves-effect waves-light" onclick="deleteNews('${data.announcement_id}')">
                            <i class="ri-delete-bin-fill"></i>
                        </button>
                        `
						return `<div class="text-center">
                        ${viewButton} ${editButton} ${deleteButton}
                        </div>
                        `
					},
				},
			],
			order: [[0, 'asc']],
		})
	}
}

addNews = (pond) => {
	if ($('#NewNews')[0].checkValidity()) {
		// * No error in validation
		const form = new FormData($('#NewNews')[0])
		form.set('announcement_type', 'News')
		if (form.get('filepond')) {
			form.delete('filepond')
		}

		pondFiles = pond.getFiles()
		for (var i = 0; i < pondFiles.length; i++) {
			// append the blob file
			form.append('announcement_image', pondFiles[i].file)
		}

		for (var pair of form.entries()) {
			console.log(pair[0] + ': ' + pair[1])
		}

		form.delete('announcement_id');

		$.ajax({
			url: apiURL + 'annsys/pup_staff/add_news',
			type: 'POST',
			headers: AJAX_HEADERS,
			data: form,
			processData: false,
			contentType: false,
			success: (result) => {
				if (result) {
					Swal.fire({
						html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">You have successfully added a news!</p></div></div>',
						showCancelButton: !0,
						showConfirmButton: !1,
						cancelButtonClass: 'btn btn-success w-xs mb-1',
						cancelButtonText: 'Ok',
						buttonsStyling: !1,
						showCloseButton: !0,
					}).then(function () {
						// reload Pending Reservations table
						refreshPage()
					})
				}
			},
		}).fail((xhr) => {
			Swal.fire({
				html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong!</h4><p class="text-muted mx-4 mb-0">${JSON.parse(xhr.responseText).message
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
}

editNews = (pond) => {
	if ($('#NewNews')[0].checkValidity()) {
		// * No error in validation
		const form = new FormData($('#NewNews')[0])
		form.set('announcement_type', 'News')
		if (form.get('filepond')) {
			form.delete('filepond')
		}

		pondFiles = pond.getFiles()
		for (var i = 0; i < pondFiles.length; i++) {
			// append the blob file
			form.append('announcement_image', pondFiles[i].file)
		}

		for (var pair of form.entries()) {
			console.log(pair[0] + ': ' + pair[1])
		}

		$.ajax({
			url: apiURL + 'annsys/pup_staff/edit_news/' + $('#announcement_id').val(),
			type: 'PUT',
			headers: AJAX_HEADERS,
			data: form,
			processData: false,
			contentType: false,
			success: (result) => {
				if (result) {
					Swal.fire({
						html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">You have successfully updated a news!</p></div></div>',
						showCancelButton: !0,
						showConfirmButton: !1,
						cancelButtonClass: 'btn btn-success w-xs mb-1',
						cancelButtonText: 'Ok',
						buttonsStyling: !1,
						showCloseButton: !0,
					}).then(function () {
						// reload Pending Reservations table
						refreshPage()
					})
				}
			},
		}).fail((xhr) => {
			Swal.fire({
				html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong!</h4><p class="text-muted mx-4 mb-0">${JSON.parse(xhr.responseText).message
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
}

changeNewsStatus = (announcement_id, announcement_status) => {
	let icon, title, text
	if (announcement_status == 'Published') {
		icon = `<lord-icon src="https://cdn.lordicon.com/nduddlov.json" trigger="loop" colors="outline:#f06548,primary:#ffffff,secondary:#f06548" style="width:100px;height:100px">
        </lord-icon>`
		title = `Are you sure you want to Hide this News?`
		text = `By hiding this news, the guests won't able to look for this news.`
		confirmButtonColor = '#f06548'
		cancelButtonColor = '#6c757d'
		confirmButtonText = 'Deactivate'
	} else {
		icon = `<lord-icon src="https://cdn.lordicon.com/ivayzoru.json" trigger="loop" colors="outline:#ffffff,primary:#ffffff,secondary:#0ab39c" style="width:100px;height:100px">
        </lord-icon>`
		title = `Are you sure you want to Publish this News?`
		text = `By publishing this news, the guests will able to look for this news.`
		confirmButtonColor = '#0ab39c'
		cancelButtonColor = '#6c757d'
		confirmButtonText = 'Activate'
	}
	Swal.fire({
		title: title,
		text: text,
		iconHtml: icon,
		customClass: {
			icon: 'border-white',
		},
		showCancelButton: true,
		confirmButtonColor: confirmButtonColor,
		cancelButtonColor: cancelButtonColor,
		confirmButtonText: confirmButtonText,
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: apiURL + 'annsys/pup_staff/change_news_status/' + announcement_id,
				type: 'PUT',
				headers: AJAX_HEADERS,
				success: (response) => {
					if (result) {
						Swal.fire({
							html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">You have successfully changed the news status!</p></div></div>',
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
			})
		}
	})
}

getSpecificNews = (announcement_id) => {
	$.ajax({
		url: apiURL + 'annsys/pup_staff/get_news/' + announcement_id,
		type: 'GET',
		headers: AJAX_HEADERS,
		success: (result) => {
			if (result) {

				if (!$('#collapseExample').is(':visible')) {
					$('#addNewsBtn').trigger('click');
					$('#addNewsBtn').hide();
				}

				$('#addNewButtonLabel').html('Edit News');
				$('#announcement_id').val(result.data.announcement_id);
				$('#announcement_title').val(result.data.announcement_title);
				$('#announcement_description').val(result.data.announcement_description);
				$('#announcement_content').val(result.data.announcement_content);
				tinymce.get("announcement_content").setContent(result.data.announcement_content);
			}
		},
	}).fail((xhr) => {
		Swal.fire({
			html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong!</h4><p class="text-muted mx-4 mb-0">${xhr.responseJSON.message}</p></div></div>`,
			showCancelButton: !0,
			showConfirmButton: !1,
			cancelButtonClass: 'btn btn-danger w-xs mb-1',
			cancelButtonText: 'Dismiss',
			buttonsStyling: !1,
			showCloseButton: !0,
		})
	})
}

deleteNews = (announcement_id) => {
	Swal.fire({
		title: `Are you sure you want to delete this news?`,
		text: `By deleting this advisory, users won't able to see this news and in the table.`,
		iconHtml: `<lord-icon
        src="https://cdn.lordicon.com/gsqxdxog.json"
        trigger="loop"
        colors="primary:#121331,secondary:#c71f16"
        style="width:100px;height:100px">
        </lord-icon>`,
		customClass: {
			icon: 'border-white',
		},
		showCancelButton: true,
		confirmButtonColor: '#f06548',
		cancelButtonColor: '#6c757d',
		confirmButtonText: 'Delete',
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: apiURL + 'annsys/pup_staff/delete_news/' + announcement_id,
				type: 'DELETE',
				headers: AJAX_HEADERS,
				success: (result) => {
					if (result) {
						Swal.fire({
							html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">You have successfully deleted a news!</p></div></div>',
							showCancelButton: !0,
							showConfirmButton: !1,
							cancelButtonClass: 'btn btn-success w-xs mb-1',
							cancelButtonText: 'Ok',
							buttonsStyling: !1,
							showCloseButton: !0,
						}).then(function () {
							// reload Pending Reservations table
							refreshPage()
						})
					}
				},
			}).fail((xhr) => {
				Swal.fire({
					html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Something went Wrong!</h4><p class="text-muted mx-4 mb-0">${xhr.responseJSON.message}</p></div></div>`,
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

goToAddNews = () => {
	$('#addNewsBtn').show();
	$('#addNewButtonLabel').html('Add New News');
	$('#announcement_id').val('');
	$('#announcement_title').val('');
	$('#announcement_description').val('');
	$('#announcement_content').val('');
	tinymce.get("announcement_content").setContent('');
}