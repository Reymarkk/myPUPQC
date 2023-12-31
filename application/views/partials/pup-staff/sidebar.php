    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Light Logo-->
            <a href="<?= base_url() ?>pupstaff" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?= base_url() ?>public/images/logo-sm.png" alt="" height="75" />
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url() ?>public/images/logo-light.png" alt="" height="40" />
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff">
                            <i class="ri-dashboard-2-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Organizer') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>EVRSERS</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/evrsers/organizer-management">
                                <i class="ri-team-line"></i>
                                <span>Organizer Management</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/evrsers/organizer-list">
                                <i class="ri-team-line"></i>
                                <span>Organizer List</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/evrsers/manage-reservations">
                                <i class="ri-reserved-line"></i>
                                <span>Reservations</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/evrsers/reservation-history">
                                <i class="bx bx-history"></i>
                                <span>Reservation History</span>
                            </a>
                        </li>
                    <?php } ?>

                    <li class="menu-title">
                        <i class="ri-more-fill"></i>
                        <span>EVRSERS</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/evrsers/reservation-approval">
                            <i class="mdi mdi-file-sign"></i>
                            <span>Event Approvals</span>
                        </a>
                    </li>

                    <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/evrsers/org-list">
                                <i class="ri-team-line"></i>
                                <span>Organizer List</span>
                            </a>
                    </li>

                    <?php if (strpos($this->session->userdata('user_roles'), 'News Reporter') !== false || strpos($this->session->userdata('user_roles'), 'Public Relations') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>Announcement System</span>
                        </li>
                    <?php } ?>
                    <?php if (strpos($this->session->userdata('user_roles'), 'Public Relations') !== false) { ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/announcement/advisory">
                                <i class=" ri-article-line"></i>
                                <span>Advisory</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/announcement/announcement">
                                <i class=" ri-notification-badge-line"></i>
                                <span>Announcement</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (strpos($this->session->userdata('user_roles'), 'News Reporter') !== false) { ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/announcement/news">
                                <i class=" ri-newspaper-line"></i>
                                <span>News</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Signatory') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>ODRTS</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/odrs/approvals">
                                <i class="mdi mdi-file-sign"></i>
                                <span>Approvals</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Student Records') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>ODRTS</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/odrs/documents">
                                <i class="ri-file-copy-2-line"></i>
                                <span>Documents</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/odrs/requests">
                                <i class="ri-archive-line"></i>
                                <span>Requests</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/odrs/history">
                                <i class="mdi mdi-history"></i>
                                <span>History</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/odrs/evaluation">
                                <i class="ri-line-chart-line"></i>
                                <span>Evaluations</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!--OMSS -->
                    <?php if (strpos($this->session->userdata('user_roles'), 'Doctor') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>OMSSS - DOCTOR </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/doctor/medical-requests">
                                <i class="las la-clipboard-list"></i>
                                <span>Medical Requests</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/doctor/analytics-and-history">
                                <i class="las la-history"></i>
                                <span>Medical Request History</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Dentist') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>OMSSS - DENTIST </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/dentist/dental-requests">
                                <i class="las la-tooth"></i>
                                <span>Dental Requests</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/dentist/analytics-and-history">
                                <i class="las la-history"></i>
                                <span>Dental Request History</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Guidance Counsellor') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>OMSSS - GUIDANCE COUNSELOR </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/counsellor/counsel-requests">
                                <i class="mdi mdi-brain me-1"></i>
                                <span>Counseling Requests</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/counsellor/analytics-and-history">
                                <i class="las la-history"></i>
                                <span>Counseling History</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Guidance Counsellor') !== false || strpos($this->session->userdata('user_roles'), 'Doctor') !== false || strpos($this->session->userdata('user_roles'), 'Dentist') !== false) { ?>
                        <li class="menu-title">
                            <i class="ri-more-fill"></i>
                            <span>OMSSS - Evaluation</span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/omsss/evaluation">
                                <i class="ri-line-chart-line"></i>
                                <span>Evaluation Analytics</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (strpos($this->session->userdata('user_roles'), 'Research Manager') !== false) { ?>
                    <li class="menu-title">
                        <i class="ri-more-fill"></i>
                         <span>ResearchCop</span>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/researchcop/dashboard">         
                        <i class="ri-line-chart-line"></i>
                        <span>Analytics</span>
                    </a>
                    </li>                   

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/researchcop/copyright">
                            <i class="ri-copyright-line"></i>
                            <span>Copyright Management</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/researchcop/research-archives">
                            <i class="ri-archive-line"></i>
                            <span>Research Archives</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/researchcop/research-records">
                            <i class="ri-article-line"></i>
                            <span>Research Records</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>pupstaff/researchcop/research-submissions">
                            <i class="ri-time-line"></i>
                            <span>Research Submissions</span>
                        </a>
                    </li>
                    <?php } ?>


                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <!-- imnport sidebar ajax -->
    <!-- <script src="<?= base_url() ?>public\js\ajax\pup-staff\sidebar.ajax.js"></script> -->