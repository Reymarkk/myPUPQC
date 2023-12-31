<div class="row">
    <div class="col-xs-12 mb-1">
        <div id="checkDataPrivacy"></div>
    </div>
    <div class="col-xs-12 col-xxl-6">
        <div class="card card-animate">
            <div class="card-body p-0">
                <div class="alert alert-primary border-0 rounded-top rounded-0 m-0 d-flex align-items-center" role="alert">
                    <i class="mdi mdi-clock-time-four-outline text-primary me-2 fs-20"></i>
                    <span class="fw-medium">Digital Clock</span>
                </div>
                <div class="row py-3 clock">
                    <div class="col-xs-12 col-sm-6 analog-clock">
                        <div class="circle">
                            <div class="face">
                                <div id="hour" class="hour"></div>
                                <div id="minute" class="minute"></div>
                                <div id="second" class="second"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 digital-clock">
                        <div class="d-flex align-items-center  flex-wrap">
                            <h1 id="clockTime" class="display-6 fw-medium"></h1>
                            <span id="clockSession" class="ms-2 fs-3"></span>
                        </div>
                        <p id="clockDate" class="fs-4"></p>
                        <span class="badge bg-primary fs-13">PHILIPPINE STANDARD TIME</span>
                    </div>
                    <div class="col-lg-3 align-self-end illustration">
                        <div class="pe-3">
                            <img src="<?= base_url() ?>public/images/user-illustarator-2.png" class="img-fluid" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-body-->
        </div>
    </div>
    <div class="col-xs-12 col-xxl-6">
        <blockquote class="blockquote custom-blockquote blockquote-outline blockquote-primary rounded py-3">
            <div class="row g-0">
                <div class="col-lg-4 quote-image">
                    <img id="background" class="rounded-start img-fluid h-100 object-cover" loading="lazy" src="https://images.pexels.com/photos/450441/pexels-photo-450441.jpeg" alt="QoD Image" />
                </div>
                <div class="col-xs-12 col-lg-8 qotd">
                    <div class="card-header">
                        <h3 class="fw-medium text-primary"> <i class="mdi mdi-clover text-primary me-2"></i> Quote of the Day!</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <i class="bx bxs-quote-alt-left text-primary align-middle me-1"></i>
                            <span id="quote">The human mind and body are truly extraordinary. They are the quintessence of excellence in motion. We talk, touch, see, hear, taste, smell, and feel. We dream, aspire, and become. All that we are is mind and body and spirit-that is our universe. </span>
                            <i class="bx bxs-quote-alt-right text-primary align-middle ms-1"></i>
                        </p>
                        <footer id="author" class="text-end blockquote-footer mt-4 mb-0">Lorii Myers</footer>
                    </div>
                </div>
            </div>
        </blockquote>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-lg-4">
        <div class="rounded" style="background: url('<?= base_url() ?>public/images/menu/img-1.webp');background-size:cover;">
            <div class="card rounded bg-primary bg-opacity-50">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="pt-5 pb-3 text-white fw-medium align-center text-center text-uppercase">Enroll Now or View Grades</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" onclick="logout('sis')" class="mb-5 fw-medium btn btn-secondary waves-effect waves-light"> <i class=" ri-account-box-line me-2"></i> Check PUPSIS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-4">
        <div class="rounded" style="background: url('<?= base_url() ?>public/images/menu/img-10.webp');background-size:cover;">
            <div class="card rounded bg-primary bg-opacity-50">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="pt-5 pb-3 text-white align-center text-center text-uppercase">Schedule a Visit on PUPQC</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" onclick="logout('vass')" class="mb-5 btn fw-medium btn-secondary waves-effect waves-light"> <i class=" ri-building-4-line me-2"></i> Go to VASS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-4">
        <div class=" rounded" style="background: url('<?= base_url() ?>public/images/menu/img-7.webp');background-size:cover;">
            <div class="card rounded bg-primary bg-opacity-50">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="pt-5 pb-3 text-white align-center text-center text-uppercase">Frequently Asked Questions</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" onclick="logout('osssac')" class="mb-5 btn fw-medium btn-secondary waves-effect waves-light"> <i class=" ri-discuss-line me-2"></i> Visit Help Desk</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-lg-6">
        <div class="card card-animate">
            <div class="card-header">
                <h4 class="card-title mb-0">Exclusive Announcements for Students</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="mx-n3">
                    <div id="announcements" data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="warning" style="max-height: 382px">
                    </div>
                </div>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <div class="col-xs-12 col-lg-6">
        <div class="card card-animate">
            <div class="card-header">
                <h4 class="card-title mb-0">EVRSERS TRACKER - <span class="fs-15">Upcoming Events</span>
                </h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="me-n3">
                    <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="warning" style="max-height: 382px">
                        <ul class="list-group list-group-flush border-dashed" id="upcoming-events">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="rounded mb-4" style="background: url('<?= base_url() ?>public/images/menu/img-3.webp');background-size:cover;">
            <div class="rounded bg-primary bg-opacity-50 d-flex justify-content-center align-items-center flex-column" style="height: 300px;">
                <h1 class="pb-4 text-white fw-medium align-center text-center text-uppercase">Online Document Request System</h1>
                <div class="d-flex justify-content-center">
                    <button onclick="window.location.href='<?= base_url() ?>student/odrs/request'" class="mb-5 btn btn-secondary waves-effect waves-light"> <i class="ri-article-line me-2"></i> Request a document</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-xl-4 medical">
        <div class="card card-animate">
            <div class="card-body">
                <div class="text-center">
                    <h4 class="mt-4 fw-semibold">Are You Feeling Unwell?</h4>
                    <p class=" mt-3">
                        Expect the quality health care services as you conveniently book your appointments, and get e-prescriptions from our university doctor.
                    </p>
                    <div class="my-3">
                        <button onclick="window.location.href='<?= base_url() ?>student/omsss/medical-services/medical-consultation'" class="btn fw-medium btn-secondary waves-effect waves-light"> <i class="las la-first-aid me-2"></i> Book a Medical Consultation Appointment</button>
                    </div>
                    <img src="<?= base_url() ?>public/images/doctor.png" class="img-fluid" style="height: 200px;" />
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-xs-12 col-xl-4 dental">
        <div class="card card-animate">
            <div class="card-body">
                <div class="text-center">
                    <h4 class="mt-4 fw-semibold">Do You Have a Tooth Decay?</h4>
                    <p class=" mt-3">
                        With regular dental check-ups, our dentists can help and give you a perfect treatment plan towards a perfect beautiful smile.
                    </p>
                    <div class="my-3">
                        <button onclick="window.location.href='<?= base_url() ?>student/omsss/dentist-services'" class="btn fw-medium btn-secondary waves-effect waves-light"> <i class="las la-tooth me-2"></i> Book a Dental Consultation Appointment</button>
                    </div>
                    <img src="<?= base_url() ?>public/images/dentist.jpg" class="img-fluid" style="height: 200px;" />
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-xs-12 col-xl-4 guidance">
        <div class="card card-animate">
            <div class="card-body">
                <div class="text-center">
                    <h4 class="mt-4 fw-semibold">Want to let Your Thoughts Out?</h4>
                    <p class=" mt-3">
                        Our experienced psychologist offer free counselling support. Talk to us now if you're having emotional or psychological issues.
                    </p>
                    <div class="my-3">
                        <button onclick="window.location.href='<?= base_url() ?>student/omsss/guidance-services'" class="btn fw-medium btn-secondary waves-effect waves-light"> <i class="mdi mdi-brain me-2"></i> Book a Guidance Consultation Appointment</button>
                    </div>
                    <img src="<?= base_url() ?>public/images/guidance.jpg" class="img-fluid" style="height: 200px;" />
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="rounded" style="background: url('<?= base_url() ?>public/images/menu/img-8.webp');background-size:cover;">
            <div class="card rounded bg-primary bg-opacity-50">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="pt-5 pb-3 text-white align-center text-center text-uppercase">Check Property Accountabilities</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="mb-5 btn fw-medium btn-secondary waves-effect waves-light"> <i class=" ri-file-paper-2-line me-2"></i> Visit eClearance</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="rounded" style="background: url('<?= base_url() ?>public/images/menu/img-4.webp');background-size:cover;">
            <div class="card rounded bg-primary bg-opacity-50">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="pt-5 pb-3 text-white align-center text-center text-uppercase">Report Academic Issues & Concerns</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="mb-5 btn fw-medium btn-secondary waves-effect waves-light"> <i class="ri-eye-fill me-2"></i> Go to EyeUlat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Announcement -->
<div id="myAnnouncementModalId" class="modal fade" tabindex="-1" aria-labelledby="myAnnouncementTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-4 border-0 overflow-hidden">
            <div class="modal-header">
                <h5 class="modal-title" id="myAnnouncementTitle">Modal Heading</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <h5 class="fs-15" id="myAnnouncementAuthor">
                    Overflowing text to show scroll behavior
                </h5>

                <h5 class="fs-15" id="myAnnouncementDate"></h5>
                <!-- <div class="flex-shrink-0 ms-2">
                    <div class="fs-11 text-muted">
                        <i class="mdi mdi-clock-outline"> </i><span id="myAnnouncementDate"></span>
                    </div>
                </div>
                <br/><br/> -->
                <div id="myAnnouncementContent" class="mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light fw-medium w-100 waves-effect waves-light" data-bs-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Modal for Announcement -->