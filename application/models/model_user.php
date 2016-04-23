<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function insert_user() {

		$name 		= $this->input->post('regis_firstname');
		$last 		= $this->input->post('regis_lastname');
		$address 	= $this->input->post('regis_address');
		$tel 		= $this->input->post('regis_tel');
		$email 		= $this->input->post('regis_email');
		// $picture 	= $this->input->post('regis_image');
		$user 		= $this->input->post('regis_user');
		$pass 		= $this->input->post('regis_pass');

		$state 		= 0;

		// find user in database

		$sql 		= "SELECT username FROM tb_users";
		$query 		= $this->db->query($sql);

		foreach ($query->result() as $row) {
			if ($row->username == $user) {
				$state = 1;
				return "c_username_used";
			}
		}

		// end find user

		if ($state == 0) {

			$sql = "INSERT INTO tb_users (firstname, lastname, address, tel, email, username, password) 
					VALUES (" . $this->db->escape($name) . ",
							" . $this->db->escape($last) . ",
							" . $this->db->escape($address) . ",
							" . $this->db->escape($tel) . ",
							" . $this->db->escape($email) . ",
							
							" . $this->db->escape($user) . ",
							" . $this->db->escape($pass) . ")";

			$query = $this->db->query($sql);

			if ($this->db->affected_rows() === 1) {

				// create session
			
				$sql 	= "INSERT INTO tb_session (username, state_session) VALUES ('$user','0')";
				$query 	= $this->db->query($sql);

				// end create session

				return "c_success";
			} else {
				return "c_error";
			}

		}

		$this->db->close();

	}

	function login_check() {

		$access = 0; // access to login after check session

		$user = $this->input->post('login_user');
		$pass = $this->input->post('login_pass');

		$sql = "SELECT username, password FROM tb_users";
		$query = $this->db->query($sql);

		// $query = $this->db->query('SELECT username, password FROM tb_users');

		foreach ($query->result() as $row) {
			if ($row->username == $user && $row->password == $pass) {

				$state_session = $this->session_check($user);

				if ($state_session) {

					$this->session->state_login = $user; // session $user login

					// session profile
					$this->session_profile($user);

					return "c_login_success";
				} else {
					return "c_session_active";
				}

				
			}
		}

		
		$this->db->close();

	}

	function session_check($data) {

		$sql = "SELECT username, state_session FROM tb_session";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {
			if ($row->username == $data) {
				if ($row->state_session == "0") {
					// update session to 1
					$sql 	= "UPDATE tb_session SET state_session='1' WHERE username='$data'";
					$query 	= $this->db->query($sql);
					// end update session
					return true;
				} else {
					return false;
				}
				
			}
		}

	}

	function session_logout() {
		$user 	= $this->session->state_login;
		$sql 	= "UPDATE tb_session SET state_session='0' WHERE username='$user'";
		$query 	= $this->db->query($sql);
		$this->db->close();
	}

	function session_profile($data) {

		$sql = "SELECT * FROM tb_users WHERE username='$data'";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {
			$this->session->get_firstname 	= $row->firstname;
			$this->session->get_lastname 	= $row->lastname;
			$this->session->get_address 	= $row->address;
			$this->session->get_image 		= $row->image;
			$this->session->get_tel 		= $row->tel;
			$this->session->get_email 		= $row->email;
		}

		$this->db->close();
		
	}

	public function profile_image($url) {
		$user = $this->session->state_login;
		$sql = "UPDATE tb_users SET image='$url' WHERE username='$user'";
		$query = $this->db->query($sql);
		$this->session->get_image = $url;	
	}


	public function profile_info() {
		$firstname 	= $this->input->post('profile_firstname');
		$lastname 	= $this->input->post('profile_lastname');
		$address 	= $this->input->post('profile_address');
		$tel 		= $this->input->post('profile_tel');
		$email 		= $this->input->post('profile_email');
		$pass 		= $this->input->post('profile_pass');

		$user 		= $this->session->state_login;

		$sql 			= "UPDATE tb_users SET 
		firstname 		= '$firstname',
		lastname 		= '$lastname',
		address 		= '$address',
		tel 			= '$tel',
		email 			= '$email',
		password 		= '$pass'
		WHERE username 	='$user'";
		
		$query = $this->db->query($sql);

		$this->session->get_firstname 	= $firstname;
		$this->session->get_lastname 	= $lastname;
		$this->session->get_address		= $address;
		$this->session->get_tel 		= $tel;
		$this->session->get_email 		= $email;

	}

}

?>