<section class="admin-dashboard">
<div class="card">
        <div class="card-header alert alert-primary border-0 rounded-top rounded-0 d-flex align-items-center" role="alert">
                <i class="ri-line-chart-line text-primary me-2 fs-20"></i>
                <span class="fw-bold fs-15 m-1">ResearchCop Dashboard Analytics</span>
        </div>
        <!-- //Pending for Export Functions

        <div class="card-header align-items-center d-flex">
            <button type="button" class="btn btn-primary btn-label waves-effect waves-light">
                <i class="ri-upload-2-fill label-icon align-middle fs-16 me-2"></i>
                Export
            </button>
        </div>
        -->

            <div class="row">

                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Submitted Researches</p>
                                    <div id="chartOne">
                                    </div>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary text-info rounded-circle fs-4">
                                            <i class="ri-upload-2-line text-light"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Approved Researches</p>
                                    <div id="chartTwo">
                                    </div>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary text-info rounded-circle fs-4">
                                            <i class="ri-check-line text-light"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Rejected Researches</p>
                                    <div id="chartThree">
                                    </div>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary text-info rounded-circle fs-4">
                                            <i class="ri-close-fill text-light"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Pending Researches</p>
                                    <div id="chartFour">
                                    </div>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary text-info rounded-circle fs-4">
                                            <i class="ri-time-line text-light"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Copyright Document for Review</p>
                                    <div id="chartFive">
                                    </div>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary text-info rounded-circle fs-4">
                                            <i class="ri-copyright-line text-light"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Copyright Document Approved</p>
                                    <div id="chartSix">
                                    </div>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary text-info rounded-circle fs-4">
                                            <i class="ri-check-line text-light"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>

            </div>
            <!-- Donut Chart for ResearchCop -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card card-animate">
                            <div class="card-header alert alert-info border-0 rounded-top rounded-0 d-flex align-items-center" role="alert">
                                <i class="ri-line-chart-line text-info me-2 fs-20 fw-bold"></i>
                                <span class="fw-bold fs-15">Research Programs</span>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="donutChartOne" style="width: 500px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-animate">
                            <div class="card-header alert alert-info border-0 rounded-top rounded-0 d-flex align-items-center" role="alert">
                                <i class="ri-line-chart-line text-info me-2 fs-20 fw-bold"></i>
                                <span class="fw-bold fs-15">Research V.S Capstone</span>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="donutChartTwo" style="width: 500px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-animate">
                            <div class="card-header alert alert-info border-0 rounded-top rounded-0 d-flex align-items-center" role="alert">
                                <i class="ri-line-chart-line text-info me-2 fs-20 fw-bold"></i>
                                <span class="fw-bold fs-15">Research Statuses</span>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="donutChartThree" style="width: 500px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-animate">
                            <div class="card-header alert alert-info border-0 rounded-top rounded-0 d-flex align-items-center" role="alert">
                                <i class="ri-line-chart-line text-info me-2 fs-20 fw-bold"></i>
                                <span class="fw-bold fs-15">Copyright Statuses</span>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div id="donutChartFour" style="width: 500px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</section>