<?php
class Dashboard_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function searchForUser($userSearch) {
    $this->db->select('*');
    $this->db->from('Users');
    $this->db->where('username', $userSearch);
    return $this->db->get();
  }
}
?>
