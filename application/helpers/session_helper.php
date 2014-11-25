<?php
// Get a reference to our CodeIgniter super object
$CI =& get_instance();

function checkIfLoggedIn() {
  global $CI;

  if (!$CI->session->userdata('loggedIn')) {
    return false;
  } else {
    return true;
  }
}

function checkIfAdmin() {
  global $CI;

  $CI->load->helper('database');
  loadModel('login_model');

  return $CI->login_model->checkIfAdmin($CI->session->userdata('username'));
}

function checkIfMod() {
  global $CI;

  $CI->load->helper('database');
  loadModel('login_model');

  return $CI->login_model->checkIfMod($CI->session->userdata('username'));

  if ($result) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function adminNav() {
  if (checkIfAdmin()) {
    return "<li><a href='admin'>Admin</a></li>";
  } else {
    return '';
  }

}

function modNav() {
  if (checkIfMod()) {
    return "<li><a href='mod'>Mod</a></li>";
  } else {
    return '';
  }

}
?>
