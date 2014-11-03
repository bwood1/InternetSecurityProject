<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('login/registerUserModal');
		$this->load->view('login/login');
		$this->load->view('login/loginScript');
	}

	public function submitLogin() {
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$this->load->helper('database');
		loadModel('login_model');

		if ($this->login_model->login($user, $pass)) {
			# code...
		}
		// echo $this->login_model->login($user, $pass);
	}

	public function createUser() {
		require 'registerNewUser.php';
		$rnu = new RegisterNewUser();

		$user = $this->input->post('registerUsername');
		$pass = $this->input->post('registerPassword');

		if (strlen($user) < 6) {
			echo "usernameLength";
		} else if ($this->testPassword($pass) < 3) {
			echo "passwordStrength";
		} else {
			echo $rnu->createUser($user, $pass);
		}
	}

	public function existing() {
		$this->load->view('alerts/existingUserAlert');
	}

	public function registerSuccess() {
		$this->load->view('alerts/registerUserSuccess');
	}

	public function registerEmpty() {
		$this->load->view('alerts/empty');
	}

	public function usernameLength() {
		$this->load->view('alerts/usernameLength');
	}

	public function passwordStrength() {
		$this->load->view('alerts/passwordStrength');
	}

	public function invalidLogin() {
		$this->load->view('alerts/invalidLogin');
	}

	/**
	*
	* @simple function to test password strength
	*
	* @param string $password
	*
	* @return int
	*
	*/
	function testPassword($password) {
		if ( strlen( $password ) == 0 )
		{
			return 1;
		}

		$strength = 0;

		/*** get the length of the password ***/
		$length = strlen($password);

		/*** check if password is not all lower case ***/
		if(strtolower($password) != $password)
		{
			$strength += 1;
		}

		/*** check if password is not all upper case ***/
		if(strtoupper($password) == $password)
		{
			$strength += 1;
		}

		/*** check string length is 8 -15 chars ***/
		if($length >= 8 && $length <= 15)
		{
			$strength += 1;
		}

		/*** check if lenth is 16 - 35 chars ***/
		if($length >= 16 && $length <=35)
		{
			$strength += 2;
		}

		/*** check if length greater than 35 chars ***/
		if($length > 35)
		{
			$strength += 3;
		}

		/*** get the numbers in the password ***/
		preg_match_all('/[0-9]/', $password, $numbers);
		$strength += count($numbers[0]);

		/*** check for special chars ***/
		preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^]/', $password, $specialchars);
		$strength += sizeof($specialchars[0]);

		/*** get the number of unique chars ***/
		$chars = str_split($password);
		$num_unique_chars = sizeof( array_unique($chars) );
		$strength += $num_unique_chars * 2;

		/*** strength is a number 1-10; ***/
		$strength = $strength > 99 ? 99 : $strength;
		$strength = floor($strength / 10 + 1);

		return $strength;
	}















}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
