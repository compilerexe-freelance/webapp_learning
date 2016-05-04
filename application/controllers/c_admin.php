<?php
include_once (dirname(__FILE__) . "/Main.php");

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
			$this->load->view('index');
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function passChange() {
		if ($this->session->session_admin != "") {
			$this->model_admin->passChange();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function update_payment() {
		if ($this->session->session_admin != "") {
			$this->model_admin->update_payment();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
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
			$this->load->view('index');
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
			$this->load->view('index');
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function db_add_category() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_add_category();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function db_edit_category() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_edit_category();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function db_delete_category() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_delete_category();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function search_username() {
		if ($this->session->session_admin != "") {
			$this->model_admin->search_username();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function search_history() {
		if ($this->session->session_admin != "") {
			$this->model_admin->search_history();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
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
			$this->load->view('index');
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function db_add_course() {
		if ($this->session->session_admin != "") {

			if ($_FILES["pic"]["name"] != "") {
				$url = $this->upload_add_course();
				// $this->model_admin->course_image($url);
				$this->model_admin->db_add_course($url);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	private function upload_add_course() {
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
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function db_delete_course() {
		if ($this->session->session_admin != "") {
			$this->model_admin->db_delete_course();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function clip_course() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('clip_course');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function db_clip_course() {
		if ($this->session->session_admin != "") {
			
			if (!$this->input->post('upload_1') === false)
				return;

			$config['upload_path'] = "./uploads/course/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				// $data['success'] = $this->upload->data();
				// print_r($this->upload->data());

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_clip_course($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {

				$data['error'] = $this->upload->display_errors();

				print_r($data);
				
			}

		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function banner() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== Banner ==========

	// ========== 1 ===============

	public function db_add_slide1() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_1') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file1')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide1($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 2 ===============

	public function db_add_slide2() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_2') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file2')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide2($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 3 ===============

	public function db_add_slide3() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_3') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file3')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide3($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 4 ===============

	public function db_add_slide4() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_4') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file4')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide4($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 5 ===============

	public function db_add_slide5() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_5') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file5')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide5($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 6 ===============

	public function db_add_slide6() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_6') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file6')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide6($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 7 ===============

	public function db_add_slide7() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_7') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file7')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide7($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 8 ===============

	public function db_add_slide8() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_8') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file8')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide8($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 9 ===============

	public function db_add_slide9() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_9') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file9')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide9($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== 10 ===============

	public function db_add_slide10() {
		if ($this->session->session_admin != "") {

			if (!$this->input->post('upload_10') === false)
				return;

			$config['upload_path'] = "./uploads/slide/";
			$config['allowed_types'] = "*";
			
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file10')) {

				$data = $this->upload->data();

				foreach ($data as $key => $value)
				{
					if ($key == "file_name") {
						$this->model_admin->db_add_slide10($value);
						// echo $key . " " . $value . "<br>";
					}
				}

			} else {
				$data['error'] = $this->upload->display_errors();
				print_r($data);
			}

			
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	// ========== End banner ======

	public function edit_howto() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('edit_howto');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function edit_promotion() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('edit_promotion');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function edit_about() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('edit_about');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function edit_contact() {
		if ($this->session->session_admin != "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('edit_contact');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function save_howto() {
		if ($this->session->session_admin != "") {
			$this->model_admin->save_howto();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function save_promotion() {
		if ($this->session->session_admin != "") {
			$this->model_admin->save_promotion();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function save_about() {
		if ($this->session->session_admin != "") {
			$this->model_admin->save_about();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

	public function save_contact() {
		if ($this->session->session_admin != "") {
			$this->model_admin->save_contact();
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		}
	}

}

?>