<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function login() {
		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('admin');
		$this->load->view('close_html');
	}

	public function getLogin() {
		$this->model_admin->getLogin();
	}

	public function panel() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('panel');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function profile() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('profile_admin');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function passChange() {
		if ($this->session->session_admin != "") {
			$this->model_admin->passChange();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

}

?>