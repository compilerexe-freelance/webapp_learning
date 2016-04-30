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

	public function find_profile() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('find_profile');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function search_username() {
		if ($this->session->session_admin != "") {
			$this->model_admin->search_username();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function history_course() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('history_course');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function search_history() {
		if ($this->session->session_admin != "") {
			$this->model_admin->search_history();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function add_course() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('add_course');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function delete_course() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('delete_course');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function db_add_course() {
		if ($this->session->session_admin != "") {

			if ($_FILES["pic"]["name"] != "") {
				$url = $this->do_upload();
				// $this->model_admin->course_image($url);
				$this->model_admin->db_add_course($url);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	private function do_upload() {
		$type = explode('.', $_FILES["pic"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "uploads/image_course/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
				if(move_uploaded_file($_FILES["pic"]["tmp_name"],$url))
					return $url;
		return "";
	}

	public function all_course() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('all_course');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

	public function db_delete_course() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_delete_course();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('admin');
			$this->load->view('close_html');
		}
	}

}

?>