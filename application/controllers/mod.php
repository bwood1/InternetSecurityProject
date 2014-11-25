<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod extends CI_Controller {

  public function index() {
    $this->load->helper('session');

    if (!checkIfLoggedIn()) {
      // load login page
      $this->session->set_userdata('redirect', 'mod');
      redirect('welcome');
    } else {
      $data = array(
        "title" => "mod",
        "adminNav" => adminNav(),
        "modNav" => modNav()
      );

      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('mod/main');
      $this->load->view('templates/jqueryBootstrap');
    }
  }


}
?>
