<?php
include_once (dirname(__FILE__) . "/main.php");

defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends Main {

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

	public function state_payment() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('state_payment');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function update_payment() {
		if ($this->session->session_admin != "") {
			$this->model_admin->update_payment();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function logout() {
		$this->session->unset_userdata('session_admin');
		$this->index();
	}

	public function add_category() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('add_category');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function edit_category() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('edit_category');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function delete_category() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('delete_category');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function db_add_category() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_add_category();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function db_edit_category() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_edit_category();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function db_delete_category() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_delete_category();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

}

?>