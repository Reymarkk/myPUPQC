<div id="viewProcessStatusFlow" class="modal fade" tabindex="-1" aria-labelledby="processStatusFlowLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="processStatusFlowLabel">Process Status Flow</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <h6 class="mb-3">
                    For Approved Requests
                </h6>
                <ul class="list-group">
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">1</span></b>
                        <div class="badge badge-soft-warning">
                            <i class="me-2 mdi mdi-progress-clock fs-13"></i>
                            <span class="text-uppercase">Pending for Clearance</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The request created by the student is pending for approval by the Officer-in-Charge of Student Records. The OIC (Sir Nandy) will have the option to approve or cancel the request.
                        </span>
                    </li>
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">2</span></b>
                        <div class="badge badge-soft-danger">
                            <i class="me-2 mdi mdi-nfc-search-variant fs-13"></i>
                            <span class="text-uppercase">For Clearance</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The request is approved and the student can now go to PUP QC for submission of requirements, and payment of requested documents.
                    </li>
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">3</span></b>
                        <div class="badge badge-soft-info">
                            <i class="me-2 mdi mdi-file-sign fs-13"></i>
                            <span class="text-uppercase">For Evaluation / Processing</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            Evaluation and Processing of records and required documents for releasing. Sir Nandy prints the documents, and gives it to the authorized personnel for signature.
                        </span>
                    </li>
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">4</span></b>
                        <div class="badge badge-soft-dark">
                            <i class="me-2 ri-user-received-2-line fs-13"></i>
                            <span class="text-uppercase">Ready for Pickup</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The requested document/s is/are already available for pickup at the releasing section of student records. The student must present the claim stub before receiving the documents requested at PUP QC.
                        </span>
                    </li>
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">5</span></b>
                        <div class="badge badge-soft-success">
                            <i class="me-2 ri-checkbox-circle-line fs-13"></i>
                            <span class="text-uppercase">Released </span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The requested document/s was/were successfully claimed by the student.
                        </span>
                    </li>
                </ul>
                <h6 class="mb-3 mt-4">
                    For Cancelled Requests
                </h6>
                <ul class="list-group">
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">1</span></b>
                        <div class="badge badge-soft-warning">
                            <i class="me-2 mdi mdi-progress-clock fs-13"></i>
                            <span class="text-uppercase">Pending for Clearance</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The document request is pending for approval by the Officer-in-Charge of Student Records. The OIC (Sir Nandy) will have the option to approve or cancel the request.
                        </span>
                    </li>
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">2</span></b>
                        <div class="badge badge-soft-danger">
                            <i class="me-2 mdi mdi-cancel fs-13"></i>
                            <span class="text-uppercase">Cancelled by Staff</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The document request was cancelled by Sir Nandy. The reason for cancelling is indicated in the remarks sent to the student. The student can comply with the requirements and request again.
                    </li>
                    <li class="list-group-item"><b style="width: 15px; height: 15px;" class="bg-dark text-white rounded-pill me-2 align-middle"><span class="mx-2 fs-10">2</span></b>
                        <div class="badge badge-soft-danger">
                            <i class="me-2 mdi mdi-cancel fs-13"></i>
                            <span class="text-uppercase">Cancelled by Student</span>
                        </div>
                        <br>
                        <span class="mt-2 fs-12">
                            The document request was cancelled by the Student. The student can only cancel if request is still <i>Pending for Clearance</i> or <i>For Clearance</i>. The student must create a new request if requesting the same or different type of documents.
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <div class="hstack flex-wrap gap-2 mb-3 mb-lg-0">
                    <button type="button" class="btn btn-primary btn-animation waves-effect waves-light" data-bs-dismiss="modal" data-text="Close"><span>Close</span></button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<div id="viewforApprovalRequest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewforApprovalRequest" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="user_id" name="user_id">
                <h6 class="mt-3 mb-3 text-primary">Request Details</h6>
                <ul class="list list-group list-group-flush mb-0">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Request Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="request_no" class="fw-medium mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Date Filed</h5>
                            </div>
                            <div id="date_filed" class="col-6"></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Purpose of Request</h5>
                            </div>
                            <div class="col-6">
                                <p id="purpose" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <!-- end list item -->
                </ul>
                <div class="ms-3">
                    <h6 class="mt-3 mb-3 text-dark">Document/s Requested</h6>
                    <div id="document_workflow">
                    </div>
                </div>
                <h6 class="mt-5 mb-3 text-primary">Student Details</h6>
                <ul class="list list-group list-group-flush mb-0">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Student Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="stud_no" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Student Name</h5>
                            </div>
                            <div class="col-6">
                                <p id="stud_name" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Course</h5>
                            </div>
                            <div class="col-6">
                                <p id="course" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Email Address</h5>
                            </div>
                            <div class="col-6">
                                <p id="stud_email" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Mobile Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="stud_phone" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                </ul>
                <h6 class="mt-4 mb-3 text-start text-primary d-none" id="remarks_text">Remarks</h6>
                <div id="remarks"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="viewApprovedRequest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewApprovedRequest" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h6 class="mt-3 mb-3 text-primary">Request Details</h6>
                <ul class="list list-group list-group-flush mb-0">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Request Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="requestNo" class="fw-medium mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Date Filed</h5>
                            </div>
                            <div id="dateFiled" class="col-6">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Purpose of Request</h5>
                            </div>
                            <div class="col-6">
                                <p id="purposeReq" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <!-- end list item -->
                </ul>
                <div class="ms-3">
                    <h6 class="mt-3 mb-3 text-dark">Document/s Requested</h6>
                    <div id="documentWorkflow">
                    </div>
                </div>
                <h6 class="mt-5 mb-3 text-primary">Student Details</h6>
                <ul class="list list-group list-group-flush mb-0">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Student Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="studNo" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Student Name</h5>
                            </div>
                            <div class="col-6">
                                <p id="studName" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Course</h5>
                            </div>
                            <div class="col-6">
                                <p id="studCourse" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Email Address</h5>
                            </div>
                            <div class="col-6">
                                <p id="studEmail" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Mobile Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="mobileNum" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                </ul>
                <h6 class="mt-4 mb-3 text-primary">Request Status</h6>
                <div class="ms-3 profile-timeline">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingOne">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-warning bg-gradient rounded-circle">
                                                <i class="mdi mdi-progress-clock"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0 fw-semibold text-dark">
                                                Pending for Clearance -
                                                <span id="pending_date" class="fw-normal"></span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    <p class="mb-1 text-dark">The Document Request is Pending for Approval and is being reviewed by the Officer-in-Charge, Student Records.</p>
                                    <p id="pending_datetime" class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingTwo">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-danger bg-gradient rounded-circle">
                                                <i class="mdi mdi-nfc-search-variant"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-0 fw-semibold text-dark">
                                                For Clearance -
                                                <span id="for_clearance_date" class="fw-normal">Mon, 28, Nov. 2022</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    <p class="mb-1 text-dark">The Document Request is now Approved. The student must go to PUP QC to submit the requirements and pay the processing fees.</p>
                                    <p id="for_clearance_datetime" class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <div class="accordion-header" id="headingThree">
                                <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-info bg-gradient rounded-circle">
                                                <i class="mdi mdi-file-sign"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="mb-1 fw-semibold text-dark">
                                                For Evaluation / Processing -
                                                <span id="processing_date" class="fw-normal"></span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body ms-2 ps-5 pt-0">
                                    <p class="mb-1 text-dark">The Document/s are Paid and the Request is now being Processed for signature, documentary stamp and school dry seal.</p>
                                    <p id="processing_datetime" class="mb-0"></p>
                                </div>
                            </div>
                        </div>
                        <div id="ready_for_pickup" class="accordion-item border-0">
                        </div>
                        <div id="last" class="accordion-item border-0">
                        </div>
                    </div>
                    <!--end accordion-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="viewOnHoldRequest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewOnHoldRequest" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h6 class="mt-3 mb-3 text-primary">Request Details</h6>
                <ul class="list list-group list-group-flush mb-0">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Request Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="control_no" class="fw-medium mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Date Filed</h5>
                            </div>
                            <div id="date_requested" class="col-6">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Purpose of Request</h5>
                            </div>
                            <div class="col-6">
                                <p id="purpose_of_request" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <!-- end list item -->
                </ul>
                <div class="ms-3">
                    <h6 class="mt-3 mb-3 text-dark">Document/s Requested</h6>
                    <div id="documents_requested">
                    </div>
                </div>
                <h6 class="mt-5 mb-3 text-primary">Student Details</h6>
                <ul class="list list-group list-group-flush mb-0">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Student Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="student_num" class="mb-0">2019-000003-CM-0</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Student Name</h5>
                            </div>
                            <div class="col-6">
                                <p id="student_name" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Course</h5>
                            </div>
                            <div class="col-6">
                                <p id="student_course" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Email Address</h5>
                            </div>
                            <div class="col-6">
                                <p id="student_email" class="mb-0"></p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="fs-13 mb-1 text-dark">Mobile Number</h5>
                            </div>
                            <div class="col-6">
                                <p id="student_mobile_number" class="mb-0">09473849278</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <h6 class="mt-4 mb-3 text-primary">Remarks</h6>
                <div id="signatory_remarks"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="approveRequestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="approveRequest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center px-4">
                <lord-icon src="https://cdn.lordicon.com/ncouatyu.json" trigger="loop" colors="primary:#000000,secondary:#fad3d1" style="width:130px;height:130px">
                </lord-icon>

                <div class="mt-2">
                    <h4 class="mb-3 fw-semibold" id="approve_docname_header"></h4>
                    <p class="text-muted mb-4">If yes, enter any comment you have regarding this document. Please ba advised that the remarks is optional and you can use it to enter instructions for the OIC, Student Records. Lastly, make sure to click the Approve button. Otherwise, click the Dismiss button.</p>

                    <form id="approveRequestForm" class="needs-validation" novalidate>
                        <input type="hidden" id="approve_request_id">
                        <input type="hidden" id="approve_document_id">
                        <div class="vstack gap-2 mb-4">
                            <div class="form-check card-checkbox shadow">
                                <input id="approveDocument" name="approveDocument" class="form-check-input">
                                <label class="form-check-label" for="approveDocument" style="background-color: #fff5da">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-primary text-white fs-18 rounded">
                                                    <i class="ri-file-text-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3" id="approve_doc_info">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="text-start card mt-3 card-height-100 border shadow">
                            <div class="card-body p-0">
                                <div class="alert alert-danger border-0 rounded-top alert-solid alert-label-icon rounded-0 m-0 d-flex align-items-center" style="background-color: #4b38b3!important" role="alert">
                                    <i class="mdi mdi-file-sign label-icon"></i>
                                    <div class="flex-grow-1 text-truncate">
                                        Signatories in this approval workflow
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="acitivity-timeline acitivity-main" id="approve_approval_workflow">
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="my-4">
                            <label for="remarks" class="h5 form-label" id="approve_docname_remarks"></label>
                            <textarea class="form-control mt-2" id="remarks" name="remarks" rows="5" placeholder="If you have additional remarks for the OIC, Student Records regarding this document, feel free to indicate it here. You can also set this document for approval with changes by indicating what needs to be revised in the document."></textarea>
                        </div>

                        <div class="justify-content-center">
                            <button type="submit" class="w-100 btn btn-success bg-gradient fw-medium waves-effect waves-light">Yes, Approve It!</button>
                        </div>
                    </form>
                    <button class="mt-2 btn btn-light fw-medium w-100 waves-effect waves-light" data-bs-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="onHoldRequestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="holdRequest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center px-4">
                <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="loop" style="width:130px;height:130px">
                </lord-icon>

                <div class="mt-2">
                    <h4 class="mb-3 fw-semibold" id="onhold_docname_header"></h4>
                    <p class="text-muted mb-4">If yes, input on the remarks the reason for puting this document on hold and the steps the OIC, Student Records must follow for the document's next round of evaluation. Lastly, make sure to click the Hold button. Otherwise, click the Dismiss button.</p>

                    <form id="holdRequestForm" class="needs-validation" novalidate>
                        <input type="hidden" id="hold_request_signatory_id">
                        <div class="vstack gap-2 mb-4">
                            <div class="form-check card-checkbox shadow">
                                <input id="holdDocument" name="holdDocument" class="form-check-input">
                                <label class="form-check-label" for="holdDocument" style="background-color: #fff5da">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-primary text-white fs-18 rounded">
                                                    <i class="ri-file-text-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3" id="onhold_doc_info">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="text-start card mt-3 card-height-100 border shadow">
                            <div class="card-body p-0">
                                <div class="alert alert-danger border-0 rounded-top alert-solid alert-label-icon rounded-0 m-0 d-flex align-items-center" style="background-color: #4b38b3!important" role="alert">
                                    <i class="mdi mdi-file-sign label-icon"></i>
                                    <div class="flex-grow-1 text-truncate">
                                        Signatories in this approval workflow
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="acitivity-timeline acitivity-main" id="onhold_approval_workflow">
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="my-4" id="showHoldRemarksDoc1">
                            <label for="remarks" class="h5 form-label" id="onhold_docname_remarks"></label>
                            <textarea class="form-control mt-2" id="remarks" name="remarks" rows="5" placeholder="Enter the reason why you are holding the processing of this document and the instructions that the OIC, Student Records must comply with for the smooth facilitation of request. Be sure to indicate revisions that must be done in the document." required></textarea>
                            <div class="invalid-feedback">
                                Please indicate your reason for holding this document.
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <button type="submit" class="w-100 btn btn-danger bg-gradient fw-medium waves-effect waves-light">Yes, Hold It!</button>
                        </div>
                    </form>
                    <button class="mt-2 btn btn-light fw-medium w-100 waves-effect waves-light" data-bs-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="revertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="revertRequest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center px-4">
                <lord-icon src="https://cdn.lordicon.com/avdqoblt.json" trigger="loop" style="width:100px;height:100px">
                </lord-icon>

                <div class="mt-4">
                    <h4 class="mb-3 fw-semibold">Is the Remarks already Resolved?</h4>
                    <p class="text-muted mb-4">If yes, tick the checkbox and click the Yes, It is! button. The On Hold Document will be subjected again for your approval and moved on the "Requests for Approval" tab. Otherwise, click the Dismiss button.</p>

                    <div class="vstack gap-2 mt-4 mb-4">
                        <div class="form-check card-checkbox shadow">
                            <input id="revertDocument" name="revertDocument" class="form-check-input">
                            <label class="form-check-label" for="revertDocument" style="background-color: #fff5da">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-primary text-white fs-18 rounded">
                                                <i class="ri-file-text-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3" id="revert_doc_info">
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="text-start card mt-3 card-height-100 border shadow">
                        <div class="card-body p-0">
                            <div class="alert alert-danger border-0 rounded-top alert-solid alert-label-icon rounded-0 m-0 d-flex align-items-center" style="background-color: #4b38b3!important" role="alert">
                                <i class="mdi mdi-file-sign label-icon"></i>
                                <div class="flex-grow-1 text-truncate">
                                    Signatories in this approval workflow
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="acitivity-timeline acitivity-main" id="revert_approval_workflow">
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->

                    <h6 class="mt-4 mb-3 text-start text-primary">Remarks</h6>
                    <div class="list-group text-start" id="revert_remarks_modal">
                    </div>

                    <form id="revertRequestForm" class="needs-validation" novalidate>
                        <input type="hidden" id="revert_request_signatory_id">
                        <div class="mt-4 form-check form-check-success mb-3">
                            <input class="form-check-input" type="checkbox" id="validateRevert" required>
                            <label class="form-check-label" for="validateRevert">
                                I hereby certify that the remarks I stated for holding this document has been resolved by the OIC, Student Records.
                            </label>
                            <div class="invalid-feedback">
                                You must agree that the OIC, Student Records complied with the remarks for this document before it is subjected for another round of evaluation.
                            </div>
                        </div>
                        <div class="mt-4 justify-content-center">
                            <button type="submit" class="w-100 btn btn-success bg-gradient fw-medium waves-effect waves-light">Yes, It is!</button>
                        </div>
                    </form>
                    <button class="mt-2 btn btn-light fw-medium w-100 waves-effect waves-light" data-bs-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</div>