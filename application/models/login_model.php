<?php
class Login_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function login($user, $pass) {
    //do login stuff here
    if (!$this->checkIfUserExists($user)) {
      return 'invalidLogin';
    } else if (!$this->checkPassword($user, $pass)) {
      return 'invalidLogin';
    } else {
      return 'validLogin';
    }
  }

  function checkIfAdmin($user) {
    $this->db->select('*');
    $this->db->from('Admins');
    $this->db->where("UserId = (SELECT Id FROM Users WHERE Username = ".$this->db->escape($user).")");
    $result = $this->db->get()->num_rows();

    if ($result > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function checkIfMod($user) {
    $this->db->select('*');
    $this->db->from('Moderators');
    $this->db->where("UserId = (SELECT Id FROM Users WHERE Username = ".$this->db->escape($user).")");
    $result = $this->db->get()->num_rows();

    if ($result > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function checkIfUserExists($user) {
    $this->db->select('*');
    $this->db->from('Users');
    $this->db->where('Username', $user);
    $result = $this->db->get();

    if ($result->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function checkPassword($user, $pass) {
    $salt = $this->getSalt($user);

    $saltedPassword = $pass.$salt;
    //hash the password
    $hashedPass = sha1($saltedPassword);

    $selectedPass = $this->getPass($user);

    if ($hashedPass == $selectedPass) {
      return true;
    } else {
      return false;
    }
  }

  function getSalt($user) {
    $this->db->select('Salt');
    $this->db->from('Users');
    $this->db->where('Username', $user);

    $results = $this->db->get();

    foreach ($results->result_object() as $row) {
      $salt = $row->Salt;
    }

    return $salt;
  }

  function getPass($user) {
    $this->db->select('Password');
    $this->db->from('Users');
    $this->db->where('Username', $user);

    $result = $this->db->get();

    $pass = "";
    foreach ($result->result_object() as $row) {
      $pass = $row->Password;
    }

    return $pass;
  }
}
?>
