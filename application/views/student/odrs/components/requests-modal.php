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