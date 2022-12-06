$(function() {
    allReservationsTable()

    viewReservationDetails()

})

//View All Reservations
allReservationsTable = () => {
    const dt = $('#reservations-datatable')

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
                url: apiURL + 'evrsers/super_admin/view_list_reservation',
                type: 'GET',
                ContentType: 'application/x-www-form-urlencoded',
            },
            columns: [
                // Reservation Control Number
                {
                    data: null,
                    render: (data) => {
                        const reservation_number = data.reservation_number
                        return `${reservation_number}`
                    },
                },
                // Event Title
                {
                    data: null,
                    render: (data) => {
                        const event_title = data.event_title
                        return `${event_title}`
                    },
                },

                // Venue
                {
                    data: null,
                    render: (data) => {
                        const facility_name = data.facilities_assigned_to_reservation.facility_name
                        return `${facility_name}`
                    },
                },

                // Date
                {
                    data: null,
                    render: (data) => {
                        const reserve_date = moment(data.reserve_date).format('LL')

                        return `${reserve_date}`
                    },
                },

                // Time
                {
                    data: null,
                    render: (data) => {
                        const time_from = data.time_from
                        const time_to = data.time_to
                        return `${time_from + ' - ' + time_to}`
                    },
                },

                // Status
                {
                    data: null,
                    class: 'text-center',
                    render: (data) => {
                        const reserve_status = data.reserve_status
                            // return `${reserve_status}`
                        if (reserve_status == 'Pending') {
                            return `<span class="badge rounded-pill bg-secondary">${reserve_status}</span>`
                        } else if (reserve_status == 'Approved') {
                            return `<span class="badge rounded-pill bg-success">${reserve_status}</span>`
                        } else if (reserve_status == 'Declined') {
                            return `<span class="badge rounded-pill bg-danger">${reserve_status}</span>`
                        } else if (reserve_status == 'Cancelled') {
                            return `<span class="badge rounded-pill bg-info">${reserve_status}</span>`
                        }
                    },
                },

                //Action
                {
                    data: null,
                    class: 'text-center',
                    render: (data) => {
                        let reserve_status = data.reserve_status
                        if (reserve_status == 'Pending') {
                            return `
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#viewOwnReservation" onclick="viewReservationDetails('${data.reservation_id}')"><i class="ri-eye-fill fs-5"></i></button>
                                <button type="button" class="btn btn-warning btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editReservationModal" onclick = "editReservation('${data.reservation_id}')"><i class="ri-edit-2-fill fs-5"></i></button>
                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#cancelReservationModal" onclick="cancelReservation('${data.reservation_id}')"><i class="ri-close-fill fs-5"></i></button> 
                            </div>
                                `
                        } else if (reserve_status == 'Declined') {
                            return `<div class = "dropdown d-inline-block">
                                        <button type = "button" class = "btn btn-info btn-icon waves-effect waves-light" onclick = "viewReservationDetails('${data.reservation_id}')" data-bs-toggle = "modal" data-bs-target = "#viewOwnReservation" > <i class = "ri-eye-fill fs-5" > </i></button>
                                    </div>`
                        } else if (reserve_status == 'Cancelled') {
                            return `<div class = "dropdown d-inline-block">
                                        <button type = "button" class = "btn btn-info btn-icon waves-effect waves-light" onclick = "viewReservationDetails('${data.reservation_id}')" data-bs-toggle = "modal" data-bs-target = "#viewOwnReservation" > <i class = "ri-eye-fill fs-5" > </i></button>
                                    </div>`
                        } else {
                            return `<button type="button" class="btn btn-info btn-icon waves-effect waves-light" onclick="viewReservationDetails('${data.reservation_id}')" data-bs-toggle="modal" data-bs-target="#viewOwnReservation"><i class="ri-eye-fill fs-5"></i></button>`
                        }
                    },
                },
            ],
            order: [
                [4, 'desc']
            ],
        })
    }
}