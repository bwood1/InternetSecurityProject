<?php
    class Register_user_model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        public function createUser($userData) {
            return $this->db->insert('Users', $userData);
        }

        public function checkIfUserExists($user) {
            $this->db->select('*');
            $this->db->from('Users');
            $this->db->where('Username', $user);

            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>
