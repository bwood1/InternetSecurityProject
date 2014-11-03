<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterNewUser extends CI_Controller {

    function createUser($user, $pass) {
        // Check to see if the suer exists
        if ($this->doesUserExist($user)) {
            return "existing";
        }

        // Generate salt
        $salt = $this->createSalt();

        $data = array(
            'Username' => $user,
            'Password' => sha1($pass.$salt),
            'Salt' => $salt
        );

        //Save salt and hashed password in the database
        $this->load->helper('database');
        loadModel('register_user_model');

        return $this->register_user_model->createUser($data);
    }

    /**
     * This function will return true if the user is already in the database
     *
     * @param string	username
     * @return bool  	true if user exists, false if not
     */
    function doesUserExist($user) {
        $this->load->helper('database');
        loadModel('register_user_model');

        return $this->register_user_model->checkIfUserExists($user);
    }

    /**
     * Create Salt
     *
     * This function will create a salt hash to be used in
     * authentication
     *
     * @return  string      the salt
     */
    protected function createSalt() {

        // echo "entered create salt. ";
        $this->load->helper('string');
        // echo "loaded the string helper. ";
        return sha1(random_string('alnum', 32));
    }
}
?>
