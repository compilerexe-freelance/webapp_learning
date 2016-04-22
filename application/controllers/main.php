<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_user');
	}

	public function index() {

		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('close_html');

	}

	public function pic_upload() {

		
	}

	public function register() {
		
		$result = $this->model_user->insert_user();

		if ($result) {
			echo "Success";
		} else {
			echo "Error";
		}

	}

	public function process_login() {

		$get_user = $this->input->post('login_user');
		$result = $this->model_user->login_check();

		if ($result == $get_user) {
			echo "Success";
		} else {
			echo "Error";
		}
		
	}

}
