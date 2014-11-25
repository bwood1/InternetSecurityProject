<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function index() {
    $this->load->helper('session');

    if (!checkIfLoggedIn()) {
      // load login page
      $this->session->set_userdata('redirect', 'admin');
      redirect('welcome');
    } else if(!checkIfAdmin()) {
      $this->session->set_userdata('redirect', 'admin');
      redirect('dashboard');
    } else {
      $data = array(
        "title" => "Admin",
        "adminNav" => adminNav(),
        "modNav" => modNav()
      );

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('admin/main');
      $this->load->view('templates/jqueryBootstrap');
    }
  }


}
?>
