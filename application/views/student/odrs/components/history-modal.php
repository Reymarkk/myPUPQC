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

<div id="viewRequestDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="RequestDetails" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="RequestDetails">Request Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 class="text-center"><span id="control_no" class="badge badge-outline-primary text-center fw-bold"></span></h2>
        <table class="mt-5 table table-bordered nowrap align-middle" style="width: 100%">
          <thead class="table-light ">
            <tr>
              <th colspan="2" class="bg-soft-primary text-dark">Requested Document/s:</th>
            </tr>
            <tr class="text-uppercase">
              <th>Document</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody id="documents">
          </tbody>
        </table>
        <div class="mt-4">
          <span class="badge rounded-pill bg-primary fs-12">Purpose of Request</span>
          <div class="bg-soft-secondary ms-1 text-wrap">
            <p id="purpose_of_request" class="p-2 fw-medium"></p>
          </div>
        </div>
        <div class="row mt-4">
          <div id="payment_status_col" class="d-none">
            <div class="p-2 border border-dashed rounded">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                  <div class="avatar-title rounded bg-soft-primary text-dark fs-24">
                    <i class="mdi mdi-cash-multiple"></i>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <p class="text-uppercase  mb-1">Payment Status :</p>
                  <h6 id="payment_status" class="mb-0"></h6>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div id="or_number_col" class="d-none">
            <div class="p-2 border border-dashed rounded">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                  <div class="avatar-title rounded bg-soft-primary text-dark fs-24">
                    <i class="mdi mdi-clipboard-list-outline"></i>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <p class="text-uppercase  mb-1">OR Number :</p>
                  <h6 id="or_no" class="mb-0"></h6>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div id="release_classification_col" class="d-none">
            <div class="p-2 border border-dashed rounded">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                  <div class="avatar-title rounded bg-soft-primary text-dark fs-24">
                    <i class="mdi mdi-briefcase-variant-outline"></i>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <p class="text-uppercase  mb-1">Release Classification :</p>
                  <h6 id="release_classification" class="mb-0"></h6>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div id="completed_date_col" class="d-none">
            <div class="p-2 border border-dashed rounded">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 avatar-sm align-self-center me-3">
                  <div class="avatar-title rounded bg-soft-primary text-dark fs-24">
                    <i class="mdi mdi-calendar-month-outline"></i>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <p id="completed_date" class="text-uppercase  mb-1"></p>
                  <h6 id="date_completed" class="mb-0"></h6>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <div class="m-2 mt-4 mb-3">
          <div class="h6 fs-15 text-primary">Request Status</div>
          <div class="profile-timeline">
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
                        <h6 class="fs-15 mb-0 fw-semibold">
                          Pending for Clearance -
                          <span id="pending_for_clearance_date" class="fw-normal"></span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </div>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">The Document Request is Pending for Approval and is being reviewed by the Officer-in-Charge, Student Records.</h6>
                    <p id="pending_for_clearance_datetime" class=" mb-0"></p>
                  </div>
                </div>
              </div>
              <div id="for_clearance" class="accordion-item border-0">
              </div>
              <div id="for_evaluation" class="accordion-item border-0">
              </div>
              <div id="ready_for_pickup" class="accordion-item border-0">
              </div>
              <div id="last" class="accordion-item border-0">
              </div>
            </div>
            <!--end accordion-->
          </div>
        </div>
        <div id="remarks" class="mt-4 mb-3">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-animation waves-effect waves-light" data-text="Close" data-bs-dismiss="modal"><span>Close</span></button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="satisfactionSurveyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="clientSatisfactionSurvey" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center px-4">
        <lord-icon src="https://cdn.lordicon.com/yhlmlhlk.json" trigger="loop" style="width:120px;height:120px">
        </lord-icon>

        <div class="mt-4">
          <h4 class="mb-3 fw-semibold">Client Satisfaction Survey</h4>
          <p class="text-muted mb-4">Thank you for using the Online Document Request and Tracking System. To help us improve our services, please take a moment to answer our client satisfaction survey by filling up the form below.</p>
          <input type="hidden" id="survey_request_id">
          <div class="card text-center p-3" style="background-color: #4b38b3">
            <blockquote class="card-blockquote m-0">
              <h5 class="text-white mb-4">How would you rate the service/s provided to you by the OIC, Student Records?</h5>
              <div class="text-white font-size-12 mt-3 mb-0">
                <table>
                  <thead>
                    <tr class="fs-12">
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><small>Outstanding</small></td>
                      <td><small>Exceeds Expectations</small></td>
                      <td><small>Meets Expectations</small></td>
                      <td><small>Needs Improvement</small></td>
                      <td><small>Poor</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </blockquote>
          </div>
          <form id="clientSurveyForm" class="mt-4 needs-validation" novalidate>
            <input type="hidden" id="survey_request_id">
            <div class="row mb-3">
              <div class="ps-5 col-lg-6 text-start">
                <label for="quality_service" class="form-label">Quality of Service</label>
              </div>
              <div class="col-lg-6">
                <div id="quality_service"></div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="ps-5 col-lg-6 text-start">
                <label for="timeliness_service" class="form-label">Timeliness of Service</label>
              </div>
              <div class="col-lg-6">
                <div id="timeliness_service"></div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="ps-5 col-lg-6 text-start">
                <label for="courtesy_staff" class="form-label">Courtesy of Staff</label>
              </div>
              <div class="col-lg-6">
                <div id="courtesy_staff"></div>
              </div>
            </div>
            <div class="text-center row mt-4">
              <div class="col-lg-12">
                <label for="comments" class="form-label">Comments/Suggestions/Recommendations</label>
              </div>
              <div class="col-lg-12">
                <textarea class="form-control" id="comments" name="comments" rows="4" placeholder="Please feel free to share any comments on how we can improve our services in the future. Your feedback is greatly appreciated and will be taken into consideration as we continue to improve our services. Thank you!"></textarea>
              </div>
            </div>
            <div class="mt-4 justify-content-center">
              <button type="submit" class="w-100 btn btn-dark bg-gradient fw-medium waves-effect waves-light" style="background-color: #4b38b3; border-color: #4b38b3!important;">Submit</button>
            </div>
          </form>
          <button class="mt-2 btn btn-light fw-medium w-100 waves-effect waves-light" data-bs-dismiss="modal">Dismiss</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewSurveyEvaluation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="viewClientSurveyEvaluation" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center px-4">
        <lord-icon src="https://cdn.lordicon.com/bzzdsrlh.json" trigger="loop" style="width:120px;height:120px">
        </lord-icon>

        <div class="mt-4">
          <h4 class="mb-3 fw-semibold">Client Satisfaction Survey Result</h4>
          <p class="text-muted mb-4">Thank you for taking the time to provide feedback on your experience using the Online Document Request and Tracking System. Your feedback is greatly appreciated and will be taken into consideration as we continue to improve our services.</p>
          <input type="hidden" id="survey_request_id">
          <div class="card text-center p-3" style="background-color: #4b38b3">
            <blockquote class="card-blockquote m-0">
              <div class="text-white font-size-12 mt-0 mb-0">
                <table>
                  <thead>
                    <tr class="fs-12">
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                      <th scope="col">
                        <i class="ri-star-fill text-warning"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><small>Outstanding</small></td>
                      <td><small>Exceeds Expectations</small></td>
                      <td><small>Meets Expectations</small></td>
                      <td><small>Needs Improvement</small></td>
                      <td><small>Poor</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </blockquote>
          </div>
          <div class="d-flex align-items-center row mb-3">
            <div class="ps-5 col-lg-6 text-start">
              <h6 class="mb-0" for="quality_rating">Quality of Service</h6>
            </div>
            <div id="quality" class="col-lg-6">
            </div>
          </div>
          <div class="d-flex align-items-center row mb-3">
            <div class="ps-5 col-lg-6 text-start">
              <h6 class="mb-0" for="timeliness_rating">Timeliness of Service</h6>
            </div>
            <div id="timeliness" class="col-lg-6">
            </div>
          </div>
          <div class="d-flex align-items-center row mb-3">
            <div class="ps-5 col-lg-6 text-start">
              <h6 class="mb-0" for="courtesy_staff">Courtesy of Staff</h6>
            </div>
            <div id="courtesy" class="col-lg-6">
            </div>
          </div>
          <div id="comment_survey" class="text-center row">
          </div>
          <button class="mt-4 w-100 btn btn-dark bg-gradient fw-medium waves-effect waves-light" style="background-color: #4b38b3; border-color: #4b38b3!important;" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>