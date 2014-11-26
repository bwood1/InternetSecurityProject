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
      $this->load->view('dashboard/mainScript');
    }
  }

  public function userSearch() {
    $userSearch = $this->input->post('username');

    $this->load->helper('database');
    loadModel('dashboard_model');

    $result = $this->dashboard_model->searchForUser($userSearch);

    $resultHtml = $this->buildUserSearchResult($result);
    echo $resultHtml;
  }

  function buildUserSearchResult($result) {
    $html = <<<EOS
      <table class="table">
        <tr>
          <th>Id</th>
          <th>Username</th>
          <th>Salt</th>
          <th>Password</th>
        </tr>
EOS;

    if ($result->num_rows() > 0) {
      foreach ($result->result_object() as $row) {
        $html .= <<<EOS
        <tr>
          <td>{$row->Id}</td>
          <td>{$row->Username}</td>
          <td>{$row->Salt}</td>
          <td>{$row->Password}</td>
        </tr>
EOS;
      }
    } else {
      $html .= <<<EOS
      <tr>
        <td>Your search did not return any results</td>
      </tr>
EOS;
    }

    $html .= "</table>";
    return $html;
  }
}
?>
