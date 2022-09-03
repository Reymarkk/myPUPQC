<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
    <!-- Light Logo-->
    <a href="index.html" class="logo logo-light">
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
          <a class="nav-link menu-link">
            <i class="ri-dashboard-2-line"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- end Dashboard Menu -->
        <li class="nav-item">
          <a class="nav-link menu-link">
            <i class="ri-calendar-todo-fill"></i>
            <span>Calendar</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link">
            <i class="ri-customer-service-2-fill"></i>
            <span>Announcements</span>
          </a>
        </li>
        <!-- end Dashboard Menu -->

        <li class="menu-title">
          <i class="ri-more-fill"></i>
          <span>Online Services</span>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link">
            <i class="bx bxs-graduation"></i>
            <span>PUP SIS</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
            <i class="mdi mdi-book-search-outline"></i>
            <span>Appointments</span>
          </a>
          <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
            <div class="row">
              <div class="col-lg-4">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>student/appointments/medical-appointment" class="nav-link" class="nav-link">Medical Consultation</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>student/appointments/dental-appointment" class="nav-link">Dental Consultation</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>student/appointments/guidance-appointment" class="nav-link">Guidance Counseling Consultation</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link">
            <i class="ri-hand-coin-line"></i>
            <span>Scholarships</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
            <i class="ri-book-read-fill"></i>
            <span>Library</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarForms">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="forms-elements.html" class="nav-link">Browse E-Resources</a>
              </li>
              <li class="nav-item">
                <a href="forms-select.html" class="nav-link">
                  Transactions
                </a>
              </li>
              <li class="nav-item">
                <a href="forms-pickers.html" class="nav-link">
                  Chat with Librarian
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="widgets.html">
            <i class="mdi mdi-account-group-outline"></i>
            <span>Organizations</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
            <i class="ri-briefcase-5-line"></i>
            <span>Legal Counsel</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarMaps">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="maps-google.html" class="nav-link"> File a Complaint </a>
              </li>
              <li class="nav-item">
                <a href="maps-vector.html" class="nav-link"> Request of Legal Advice / Opinion </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link">
            <i class="ri-question-answer-line"></i>
            <span>HelpDesk</span>
          </a>
        </li>

        <li class="menu-title">
          <i class="ri-more-fill"></i>
          <span>Venue Management System</span>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="widgets.html">
            <i class="bx bxs-school"></i>
            <span>Reserve Venue</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="widgets.html">
            <i class="ri-reserved-line"></i>
            <span>View Reservations</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="widgets.html">
            <i class="bx bx-history"></i>
            <span>Reservation History</span>
          </a>
        </li>

        <li class="menu-title">
          <i class="ri-more-fill"></i>
          <span>Document Request</span>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="<?= base_url() ?>student/odrs/new-request">
            <i class="ri-file-add-line"></i>
            <span>New Request</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="<?= base_url() ?>student/odrs/requests">
            <i class="ri-file-copy-2-line"></i>
            <span>Requests</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="<?= base_url() ?>student/odrs/transactions">
            <i class="mdi mdi-archive-clock-outline"></i>
            <span>Transactions</span>
          </a>
        </li>

        <li class="menu-title">
          <i class="ri-more-fill"></i>
          <span>Health and Well-Being</span>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarHealthInfo" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarHealthInfo">
            <i class="ri-survey-line"></i>
            <span>Health Information</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarHealthInfo">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/medical-services/personal-info" class="nav-link"> Personal Information </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/medical-services/health-history" class="nav-link"> Health History </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/medical-services/immunization" class="nav-link"> Immunization </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarAppointment" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAppointment">
            <i class="ri-calendar-event-line"></i>
            <span>Appointment</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarAppointment">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/medical-services/medical-consultation" class="nav-link"> Medical Consultation </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/dentist-services" class="nav-link"> Dental Consultation</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/guidance-services" class="nav-link"> Guidance Consultation </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/medical-prescription" class="nav-link"> Medical Prescription </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-link" href="<?= base_url() ?>student/omsss/medical-logs">
            <i class="ri-refresh-line"></i>
            <span>Medical Logs</span>
          </a>
        </li>
        <li class="nav-item">
          <i class="ri-customer-service-2-fill"></i>
        <!-- Default Modals -->
<button type="button" class="btn btn-primary text-muted " data-bs-toggle="modal" data-bs-target="#myModal">Standard Modal</button>
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <h5 class="fs-15">
                    Overflowing text to show scroll behavior
                </h5>
                <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought.</p>
                <p class="text-muted">It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ">Save Changes</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarLog" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLog">
            <i class=" ri-refresh-line"></i>
            <span> Log and Contact OMSSS </span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarLog">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/medical-logs" class="nav-link">Medical Logs </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>student/omsss/contact-omsss" class="nav-link"> Contact OMSS</a>
              </li>
            </ul>
          </div>
        </li> -->
      </ul>
    </div>
    <!-- Sidebar -->
  </div>

  <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>