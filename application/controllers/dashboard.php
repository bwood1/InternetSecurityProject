<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function index() {
    $this->load->helper('session');

    if (!checkIfLoggedIn()) {
      // load login page
      $site_url = site_url();

      $this->session->set_userdata('redirect', 'dashboard');
      redirect('welcome');
    } else {
      $data = array(
        "title" => "Dashboard",
        "adminNav" => adminNav(),
        "modNav" => modNav()
      );

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('dashboard/main');
      $this->load->view('templates/jqueryBootstrap');
    }
  }
}
?>
