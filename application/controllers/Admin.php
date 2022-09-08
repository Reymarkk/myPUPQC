<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function index()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "Dashboard", "title" => "Dashboard"]);
    $this->load->view('admin/dashboard');
    $this->load->view('partials/footer');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/scripts/dashboard-scripts');
  }

  public function profile()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('admin/profile');
    $this->load->view('partials/footer');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/scripts/profile-scripts');
  }

  public function settings()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('admin/settings');
    $this->load->view('partials/footer');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/scripts/settings-scripts');
  }

  public function user_students()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "User Management", "title" => "Students"]);
    $this->load->view('admin/user-management/students');
    $this->load->view('partials/footer');
    $this->load->view('admin/user-management/components/students-modal');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/user-management/scripts/students-scripts');
  }

  public function user_pup_staffs()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "User Management", "title" => "PUP Staffs"]);
    $this->load->view('admin/user-management/pup-staffs');
    $this->load->view('partials/footer');
    $this->load->view('admin/user-management/components/pup-staffs-modal');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/user-management/scripts/pup-staffs-scripts');
  }

  public function all_appointment()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "Health and Well-Being", "title" => "All Appointments"]);
    $this->load->view('admin/omsss/all-appointment/all-appointment');
    $this->load->view('partials/footer');
    $this->load->view('admin/omsss/components/all-appointment-modal');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/omsss/all-appointment/scripts/all-appointment-scripts');
  }

  public function dentist_appointment()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "Health and Well-Being", "title" => "Dental Appointment"]);
    $this->load->view('admin/omsss/dentist-appointment/dentist-appointment');
    $this->load->view('partials/footer');
    $this->load->view('admin/omsss/components/dentist-appointment-modal');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/omsss/dentist-appointment/scripts/dentist-appointment-scripts');
  }

  public function guidance_appointment()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "Health and Well-Being", "title" => "Guidance Appointment"]);
    $this->load->view('admin/omsss/guidance-appointment/guidance-appointment');
    $this->load->view('partials/footer');
    $this->load->view('admin/omsss/components/guidance-appointment-modal');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/omsss/guidance-appointment/scripts/guidance-appointment-scripts');
  }

  public function all_prescription()
  {
    $this->load->view('partials/main');
    $this->load->view('partials/title-meta');
    $this->load->view('partials/head-css');
    $this->load->view('partials/admin/topbar');
    $this->load->view('partials/admin/sidebar');
    $this->load->view('partials/page-title', ["page_title" => "Health and Well-Being", "title" => "All Prescriptions"]);
    $this->load->view('admin/omsss/medical-prescription/all-prescription');
    $this->load->view('partials/footer');
    $this->load->view('admin/omsss/components/all-prescription-modal');
    $this->load->view('partials/foot-scripts');
    $this->load->view('admin/omsss/medical-prescription/scripts/all-prescription-scripts');
  }
}
