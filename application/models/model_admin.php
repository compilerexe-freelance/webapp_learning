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

	public function state_payment() {
		$sql = "SELECT * FROM tb_payment WHERE state=0";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {
			echo "
				<tr>
				 <td>".$row->username."</td>
				 <td>".$row->bank."</td>
				 <td>".$row->date_payment."</td>
				 <td>".$row->hour."</td>
				 <td>".$row->minute."</td>
				 <td>".$row->price."</td>
				 <td>".$row->code."</td>
				 <td><button id='".$row->username."_".$row->date_payment."_".$row->hour."_".$row->minute."' class='btn btn-success btn-flat' style='width:100%; font-size:16px;'>ยืนยัน</button></td>
				</tr>

				<script type='text/javascript'>

					$(document).ready(function() {

						function modal_show(data) {
							$('#modal_msg').html(data);
							$('#modal_alert').modal();
						}

						$('#".$row->username."_".$row->date_payment."_".$row->hour."_".$row->minute."').click(function() {
							$.ajax({
								type: 'POST',
								url: '".base_url()."c_admin/update_payment',
								data: {
									username: '".$row->username."',
									date_payment: '".$row->date_payment."',
									hour: '".$row->hour."',
									minute: '".$row->minute."'
								},
								dataType: 'text',
								cache: false,
								success: function (data) {
									// alert(data);
									if (data == 'update_success') {
										modal_show('<span>ยืนยันแจ้งชำระเงินให้ผู้ใช้งาน ".$row->username." สำเร็จ</span>');
										setInterval(function() {
											window.location.href = '".base_url()."c_admin/state_payment';
										}, 2000);
									}

									if (data == 'update_error') {
										modal_show('<span>ระบบไม่สามารถยืนยันชำระเงินได้</span>');
									}
									
									
								}
							});
						});
					});
				</script>
			";
		}
	}

	public function update_payment() {
		$username 		= $this->input->post('username');
		$date_payment 	= $this->input->post('date_payment');
		$hour 			= $this->input->post('hour');
		$minute 		= $this->input->post('minute');

		$sql 			= "UPDATE tb_payment SET state=1 WHERE username='$username' AND date_payment='$date_payment' AND
							hour='$hour' AND minute='$minute'";
		$query 			= $this->db->query($sql);

		if ($this->db->affected_rows() === 1 ) {

			$sql 		= "SELECT code FROM tb_payment WHERE state=1";
			$query 		= $this->db->query($sql);

			foreach ($query->result() as $row) {
				$find_code = "UPDATE tb_order SET state=1 WHERE code='$row->code'";
				$this->db->query($find_code);
			}

			echo "update_success";
		} else {
			echo "update_error";
		}
	}

}

?>