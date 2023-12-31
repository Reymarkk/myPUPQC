<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'auth/error_message';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| AUTHENTICATION ROUTES
| -------------------------------------------------------------------------
*/

$route['signin'] = 'auth/signin';
$route['forgot-password'] = 'auth/forgot_password';
$route['reset-password/(:any)'] = 'auth/reset_password/$1';
$route['sis'] = 'auth/sis';
$route['vass'] = 'auth/vass';
$route['osssac'] = 'auth/osssac';

/*
| -------------------------------------------------------------------------
| HOME ROUTES
| -------------------------------------------------------------------------
*/

// Log In
$route['terms'] = 'home/terms';
$route['privacy'] = 'home/privacy';

// About
$route['about'] = 'home/about';
$route['about/vm'] = 'home/vm';
$route['about/history'] = 'home/history';
$route['about/logo-and-symbols'] = 'home/logo_symbols';
$route['about/hymn'] = 'home/hymn';
$route['about/annual-reports'] = 'home/annual_reports';
$route['about/contact-us'] = 'home/contact_us';
$route['about/maps'] = 'home/maps';
$route['about/code'] = 'home/code';
$route['about/memorandum-orders'] = 'home/memorandum_orders';
$route['about/executive-orders'] = 'home/executive_orders';
$route['about/codi-manual'] = 'home/codi_manual';
$route['about/citizens-charter'] = 'home/citizens_charter';

// Academic
$route['academic/programs'] = 'home/programs';
$route['academic/ous'] = 'home/ous';
$route['academic/library'] = 'home/library';
$route['academic/ovpaa'] = 'home/ovpaa';

// Students
$route['student/services'] = 'home/student_services';
$route['student/organizations'] = 'home/organizations';
$route['student/publications'] = 'home/student_publications';
$route['student/council'] = 'home/student_council';
$route['student/handbook'] = 'home/student_handbook';
$route['student/downloads'] = 'home/downloads';

// Research
$route['research/researches'] = 'home/researches';
$route['research/extensions'] = 'home/extensions';
$route['research/objectives'] = 'home/objectives';
$route['research/services'] = 'home/services';
$route['research/intellectual-property'] = 'home/intellectual_property';
$route['research/research-ethics'] = 'home/research_ethics';

// CTA
$route['applicants'] = 'home/applicants';
$route['events'] = 'home/events';
$route['docu-request'] = 'home/documents';
$route['scholarships'] = 'home/scholarships';
$route['calendar'] = 'home/calendar';

// PUP QC
$route['facilities'] = 'home/facilities';
$route['offices'] = 'home/offices';
$route['personnel'] = 'home/personnel';
$route['faculty'] = 'home/faculty';

// Footer
$route['admission'] = 'home/admission';

// News and Dynamic Parameter
$route['news'] = 'home/news';
$route['news/rss'] = 'home/rss';
$route['news/(:any)'] = 'home/news/$1';

// Advisory and Dynamic Parameter
$route['advisory'] = 'home/advisory';
$route['advisory/(:any)'] = 'home/advisory/$1';

// myPUPQC
$route['terms-of-use'] = 'home/terms_of_use';
$route['privacy-statement'] = 'home/privacy_statement';
$route['about-mypupqc'] = 'home/about_mypupqc';

/*
| -------------------------------------------------------------------------
| STUDENT ROUTES
| -------------------------------------------------------------------------
*/

$route['student/dashboard'] = 'student';
$route['student/profile'] = 'student/profile';
$route['student/profile/settings'] = 'student/settings';

/*
| --------------
|     ODRS
| --------------
*/

$route['student/odrs/new-request'] = 'student/new_request';
$route['student/odrs/request'] = 'student/request';
$route['student/odrs/history'] = 'student/history';


/*
| --------------
|     OMSSS
| --------------
*/

// Health Information
$route['student/omsss/medical-services/patient-info'] = 'student/patient_info';
$route['student/omsss/medical-services/health-history'] = 'student/health_history';

// Appointment
$route['student/omsss/medical-services/medical-consultation'] = 'student/medical_consultation';
$route['student/omsss/dentist-services'] = 'student/dental_consultation';
$route['student/omsss/guidance-services'] = 'student/guidance_consultation';
$route['student/omsss/medical-prescription'] = 'student/medical_prescription';

// Logs and Contact OMSSS
$route['student/omsss/medical-logs'] = 'student/medical_logs';
$route['student/omsss/contact-omsss'] = 'student/contact_omsss';

/*
| --------------
|     ORGMS
| --------------
*/

$route['student/orgms/org-register'] = 'student/org_register';
$route['student/orgms/org-profile'] = 'student/org_profile'; // * This would also hold the information for the organization officers

/*
| --------------
|      EMS
| --------------
*/

// * This would also be available in ORGMS since these are organization events
$route['student/ems/new-event-reservation'] = 'student/new_event_reservation';
$route['student/ems/view-event-reservation'] = 'student/view_event_reservation';
$route['student/ems/org-events'] = 'student/org_events';
$route['student/ems/org-analytics'] = 'student/org_analytics';

/*
| --------------
|      FRS
| --------------
*/
$route['student/frs/new-facility-reservation'] = 'student/new_facility_reservation';
$route['student/frs/view-facility-reservation'] = 'student/view_facility_reservation';
$route['student/frs/facility-reservation-history'] = 'student/facility_reservation_history';

// Reservations
$route['student/evrsers/new-reservation'] = 'student/new_reservation';
$route['student/evrsers/add-reservation'] = 'student/add_reservation';
$route['student/evrsers/view-reservation'] = 'student/view_reservation';
$route['student/evrsers/reservation-history'] = 'student/reservation_history';
$route['student/evrsers/reservationpolicy'] = 'student/reservationpolicy';
$route['student/evrsers/org-regis'] = 'student/org_regis';
$route['student/evrsers/org-pending'] = 'student/org_pending';
$route['student/evrsers/org-dashboard'] = 'student/org_dashboard';
/*
| -------------------------------------------------------------------------
| SUPER ADMIN ROUTES
| -------------------------------------------------------------------------
*/

// Facility Reservation
$route['student/evrsers/facility/add-reservation'] = 'student/facility_add_reservation';
$route['student/evrsers/facility/view-reservation'] = 'student/facility_view_reservation';
$route['student/evrsers/facility/view-history'] = 'student/facility_view_history';

/*
| -------------------------------------------------------------------------
| PUP STAFF ROUTES
| -------------------------------------------------------------------------
*/

$route['pupstaff/dashboard'] = 'pupstaff';
$route['pupstaff/profile'] = 'pupstaff/profile';
$route['pupstaff/profile/settings'] = 'pupstaff/settings';
$route['pupstaff/omsss/doctor/medical-requests'] = 'pupstaff/medical_requests';
$route['pupstaff/omsss/doctor/analytics-and-history'] = 'pupstaff/medical_analytics';
$route['pupstaff/omsss/dentist/dental-requests'] = 'pupstaff/dental_requests';
$route['pupstaff/omsss/dentist/analytics-and-history'] = 'pupstaff/dental_analytics';
$route['pupstaff/omsss/counsellor/counsel-requests'] = 'pupstaff/counsellor_requests';
$route['pupstaff/omsss/counsellor/analytics-and-history'] = 'pupstaff/counsellor_analytics';
$route['pupstaff/omsss/evaluation'] = 'pupstaff/omsss_evaluation';
$route['pupstaff/evrsers/org-list'] = 'pupstaff/org_list';

/*
| --------------
|  ANNOUNCEMENT
| --------------
*/

$route['pupstaff/announcement/advisory'] = 'pupstaff/advisory';
$route['pupstaff/announcement/announcements'] = 'pupstaff/announcements';
$route['pupstaff/announcement/news'] = 'pupstaff/news';

/*
| --------------
|     ODRS
| --------------
*/

$route['pupstaff/odrs/documents'] = 'pupstaff/documents';
$route['pupstaff/odrs/requests'] = 'pupstaff/requests';
$route['pupstaff/odrs/approvals'] = 'pupstaff/approvals';
$route['pupstaff/odrs/history'] = 'pupstaff/history';
$route['pupstaff/odrs/evaluation'] = 'pupstaff/odrs_evaluation';

/*
| --------------
|     EVRSERS
| --------------
*/

// Organizer Management
$route['pupstaff/evrsers/organizer-management'] = 'pupstaff/organizer_management';


// Reservations
$route['pupstaff/evrsers/manage-reservations'] = 'pupstaff/manage_reservations';
$route['pupstaff/evrsers/reservation-history'] = 'pupstaff/reservation_history';

// Event Approvals
$route['pupstaff/evrsers/reservation-approval'] = 'pupstaff/event_approvals';

/*
| ----------------------
|    RESEARCHCOP ROUTES FOR STUDENTS
| ----------------------
*/

$route['student/researchcop/dashboard'] = 'student/researchcop_dashboard';
$route['student/researchcop/copyright'] = 'student/researchcop_copyright';
$route['student/researchcop/author'] = 'student/researchcop_author';
$route['student/researchcop/my-submissions'] = 'student/my_submissions';
$route['student/researchcop/add-research'] = 'student/add_research';
$route['student/researchcop/help-and-support'] = 'student/help_and_support';


/*
| ----------------------
|    RESEARCHCOP ROUTES FOR PUPSTAFF
| ----------------------
*/

$route['pupstaff/researchcop/dashboard'] = 'pupstaff/researchcop_dashboard';
$route['pupstaff/researchcop/copyright'] = 'pupstaff/research_copyright';
$route['pupstaff/researchcop/research-archives'] = 'pupstaff/research_archives';
$route['pupstaff/researchcop/research-records'] = 'pupstaff/research_records';
$route['pupstaff/researchcop/research-submissions'] = 'pupstaff/research_submissions';
