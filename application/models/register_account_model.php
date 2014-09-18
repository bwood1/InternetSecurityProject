<?php
    class Register_account_model extends CI_Model {
        public function __construct() {

        }

        public function register($user, $pass) {
            //do login stuff here
            if ($this->checkIfUserExists($user)) {
                return "userExists";
            } else {
                $salt = $this->generateSalt();
                $this->hashSaltedPassword($salt, $pass);
            }


        }

        function checkIfUserExists($user) {
            $sql = "SELECT * FROM Users WHERE Username like 'bwood1'; drop all tables;";

            $this->db->select('*');
            $this->db->from('Users');
            $this->db->where('Username', $user);

            $this->db->get();

            //execute query

            //count query results

            if ($resultCount > 0) {
                return true;
            } else {
                return false;
            }
        }

        function generateSalt() {
            // make an actual random string generator and check to make sure that the salt does not already exist for another user
            return "asd7fy8hasjdfbn";
        }

        function hashSaltedPassword($salt, $pass) {
            $saltedPass = $salt.$pass;

            //use secure hasing algorithm to hash the salted password

        }
    }
?>


user
password
