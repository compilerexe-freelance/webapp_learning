<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function getLogin() {
		$user 	= $this->input->post('user');
		$pass 	= $this->input->post('pass');

		$sql 	= "SELECT password FROM tb_admin WHERE username='$user'";
		$query 	= $this->db->query($sql);

		foreach ($query->result() as $row) {
			if ($row->password == $pass) {
				$this->session->session_admin = $user;
				echo "success_login";
			} else {
				echo "error_login";
			}
		}

	}

	public function passChange() {
		$user 	= $this->session->session_admin;
		$pass 	= $this->input->post('pass');
		$cfpass = $this->input->post('cfpass');

		$sql 	= "UPDATE tb_admin SET password='$pass' WHERE username='$user'";
		$query  = $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			echo "update_success";
		} else {
			echo "update_error";
		}

	}

}

?>