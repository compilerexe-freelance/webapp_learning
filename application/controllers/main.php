<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {

		// navbar active
		$this->session->unset_userdata('profile_active');
		$this->session->index_active = "active";

		if ($this->session->state_login == "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		} else {
			$this->home();
		}

	}

	public function register() {
		
		$result = $this->model_user->insert_user();

		if ($result == "c_success") {

			echo "i_success";

		} else if ($result == "c_username_used") { 
			
			echo "i_username_used";

		} else {

			echo "i_error";

		}

	}

	public function process_login() {

		$get_user = $this->input->post('login_user');
		$result = $this->model_user->login_check();

		if ($result == "c_login_success") {

			echo "i_success";
		
		} else if ($result == "c_session_active") {

			echo "i_session_active";

		} else {

			echo "i_error";

		}
		
	}

	public function logout() {

		$this->model_user->session_logout();
		$this->session->unset_userdata('state_login'); // remove session
		$this->index();
		
	}

	public function home() {

		$state_login = $this->session->state_login;

		if ($state_login == "") {
			$this->index();
		} else {

			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('close_html');

		}

	}

	public function profile() {

		// navbar active
		$this->session->unset_userdata('index_active');
		$this->session->profile_active = "active";

		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('profile');
		$this->load->view('close_html');
	}

}
