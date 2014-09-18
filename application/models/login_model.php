<?php
    class Login_model extends CI_Model {
        public function __construct() {
            parent::__construct();
        }

        public function login($user, $pass) {
            //do login stuff here
            if (!$this->checkIfUserExists($pass)) {
                return 'invalidLogin';
            }

            if (!$this->checkPassword($user, $pass)) {
                return 'invalidLogin';
            }

            return 'validLogin';
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

            $saltedPassword = $salt.$pass;
            //hash the password

            //TODO: change this hasing algorithm
            $hashedPass = md5($saltedPassword);
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
            $this->db->select('Pass');
            $this->db->from('Users');
            $this->db->where('Username', $user);

            $result = $this->db->get();

            foreach ($result->result_object() as $row) {
                $pass = $row->Pass;
            }

            return $pass;
        }
    }
?>
