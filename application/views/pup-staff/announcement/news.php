<div class="row mb-2">
    <div class="col-lg-12">
        <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
            <div class="flex-grow-1">
                <button type="button" id="addNewsBtn" class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample"><i class="ri-add-line align-bottom me-1"></i> Add News</button>
            </div>
        </div>
        <div class="collapse mb-3" id="collapseExample">
            <div class="card mb-0">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1" id="addNewButtonLabel">Add New News</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form id="NewNews" class="row g-3 needs-validation" novalidate>
                        <input type="hidden" class="form-control" id="announcement_id" name="announcement_id">
                        <div class="col-md-12">
                            <label for="announcement_title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" oninput="setupInputRestriction(this)" id="announcement_title" name="announcement_title" placeholder="Enter the title of the News" required>
                        </div>
                        <div class="col-md-12">
                            <label for="announcement_description" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" oninput="setupInputRestriction(this)" id="announcement_description" name="announcement_description" placeholder="Enter the short description/headline for this news" required>
                        </div>
                        <div class="col-md-12">
                            <label for="announcement_image" class="form-label">Attachment <span class="text-danger">*</span></label>
                            <input type="file" class="filepond filepond-input-multiple" id="announcement_image" multiple name="announcement_image" data-allow-reorder="true" data-max-files="1" required>
                        </div>
                        <div class="col-md-12">
                            <label for="announcement_content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea id="announcement_content" name="announcement_content" required></textarea>
                        </div>
                        <div class="col-12">
                            <div class="mt-2 d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-success w-lg waves-effect waves-light">Submit</button>
                                <button type="button" id="cancelBtn" onClick="return goToAddNews()" class="btn btn-danger w-lg waves-effect waves-light" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">List of News</h5>
                </div>
            </div>
            <div class="card-body pt-0">
                <div>
                    <ul class="nav nav-pills nav-primary nav-custom-warning arrow-navtabs nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#all_news" role="tab">
                                All News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#my_news" role="tab">
                                My News
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div class="tab-pane active" id="all_news" role="tabpanel">
                            <table id="all_news_table" class="table table-bordered dt-responsive nowrap table-striped align-middle text-center" style="width: 100%">
                                <thead class=" table-light">
                                    <tr class="text-uppercase">
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="my_news" role="tabpanel">
                            <table id="my_news_table" class="table table-bordered dt-responsive nowrap table-striped align-middle text-center" style="width: 100%">
                                <thead class=" table-light">
                                    <tr class="text-uppercase">
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
</div>