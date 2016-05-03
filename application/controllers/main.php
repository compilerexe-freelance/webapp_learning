<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {

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
		
		} else if ($result == "c_detect_active") {

			echo "i_detect_active";

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

		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('profile');
		$this->load->view('close_html');
	}

	public function profile_save() {	

		if ($_FILES["pic"]["name"] != "") {
			$url = $this->do_upload();
			$this->model_user->profile_image($url);
		}

		$this->model_user->profile_info();
		$this->profile();
		
	}

	private function do_upload() {
		$type = explode('.', $_FILES["pic"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "uploads/image_users/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
				if(move_uploaded_file($_FILES["pic"]["tmp_name"],$url))
					return $url;
		return "";
	}

	public function confirm_checkout() {

		$user = $this->session->state_login;
		
		$category 	= $this->input->post('category');
		$code 		= $this->input->post('code');
		$title 		= $this->input->post('title');
		$day 		= $this->input->post('day');
		$price 		= $this->input->post('price');

		$sql = "INSERT INTO tb_order (date_order, username,category,code,title,day,price,state) VALUES
				(NOW(),'$user','$category','$code','$title','$day','$price',0)";
		$query = $this->db->query($sql);

		echo "success";
		
	}

	public function profile_payment() {

		$state_login = $this->session->state_login;

		if ($state_login == "") {
			$this->index();
		} else {

			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('profile_payment');
			$this->load->view('close_html');

		}

	}

	public function payment() { // Page payment
		$state_login = $this->session->state_login;

		if ($state_login == "") {
			$this->index();
		} else {

			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('payment');
			$this->load->view('close_html');

		}
	}

	public function confirm_payment() {
		$state_login = $this->session->state_login;

		if ($state_login == "") {
			$this->index();
		} else {
			$this->model_user->confirm_payment();
		}

	}

	public function learn() {
		$state_login = $this->session->state_login;
		if ($state_login == "") {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('close_html');
		} else {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('howto');
			$this->load->view('close_html');
		}
	}

	public function howto() {
		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('howto');
		$this->load->view('close_html');
	}

	public function promotion() {
		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('promotion');
		$this->load->view('close_html');
	}

	public function about() {
		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('close_html');
	}

	public function contact() {
		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('close_html');
	}

	public function course() {
		$this->load->view('open_html');
		$this->load->view('header');
		$this->load->view('course');
		$this->load->view('close_html');
	}

}
