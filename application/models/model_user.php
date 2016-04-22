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

		$sql = "INSERT INTO tb_users (firstname, lastname, address, tel, email, username, password) 
				VALUES (" . $this->db->escape($name) . ",
						" . $this->db->escape($last) . ",
						" . $this->db->escape($address) . ",
						" . $this->db->escape($tel) . ",
						" . $this->db->escape($email) . ",
						
						" . $this->db->escape($user) . ",
						" . $this->db->escape($pass) . ")";

		$result = $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			return $name;
		} else {
			return false;
		}

		$this->db->close();

	}

	function login_check() {

		$user = $this->input->post('login_user');
		$pass = $this->input->post('login_pass');

		$sql = "SELECT username, password FROM tb_users";
		$query = $this->db->query($sql);

		// $query = $this->db->query('SELECT username, password FROM tb_users');

		foreach ($query->result() as $row) {
			if ($row->username == $user && $row->password == $pass) {
				return $user;
			}
		}

		$this->db->close();

	}

}

?>