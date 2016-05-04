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
				 <td><input id='exp_".$row->username."_".$row->date_payment."_".$row->hour."_".$row->minute."' class='form-control' placeholder='ตัวอย่าง 2016-01-30' /></td>
				 <td><button id='".$row->username."_".$row->date_payment."_".$row->hour."_".$row->minute."' class='btn btn-success btn-flat' style='width:100%; font-size:16px;'>ยืนยัน</button></td>
				</tr>

				<script type='text/javascript'>

					$(document).ready(function() {

						function modal_show(data) {
							$('#modal_msg').html(data);
							$('#modal_alert').modal();
						}

						$('#".$row->username."_".$row->date_payment."_".$row->hour."_".$row->minute."').click(function() {

							let exp = $('#exp_".$row->username."_".$row->date_payment."_".$row->hour."_".$row->minute."').val();

							if (exp == '') {
								modal_show('<span style=\"color:red;\">กรุณากรอกวันหมดอายุ</span>');
							} else {

								$.ajax({
									type: 'POST',
									url: '".base_url()."c_admin/update_payment',
									data: {
										username: '".$row->username."',
										date_payment: '".$row->date_payment."',
										hour: '".$row->hour."',
										minute: '".$row->minute."',
										exp: exp
									},
									dataType: 'text',
									cache: false,
									success: function (data) {
										// alert(data);
										if (data == 'update_success') {
											modal_show('<span style=\"color:green;\">ยืนยันแจ้งชำระเงินให้ผู้ใช้งาน ".$row->username." สำเร็จ</span>');
											setInterval(function() {
												window.location.href = '".base_url()."c_admin/state_payment';
											}, 2000);
										}

										if (data == 'update_error') {
											modal_show('<span style=\"color:red;\">ระบบไม่สามารถยืนยันชำระเงินได้</span>');
										}
										
										
									}
								});

							}

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
		$exp 			= $this->input->post('exp');

		$sql 			= "UPDATE tb_payment SET state=1, exp='$exp' WHERE username='$username' AND date_payment='$date_payment' AND
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

	public function db_add_category() {
		$name_category 	= $this->input->post('name_category');
		$sql			= "INSERT INTO tb_category (category) VALUES('$name_category')";
		$query 			= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			echo "add_success";
		} else {
			echo "add_error";
		}
	}

	public function db_edit_category() {
		$id			= $this->input->post('id');
		$edit_name 	= $this->input->post('edit_name');
		$sql 		= "UPDATE tb_category SET category='$edit_name' WHERE id='$id'";
		$query 		= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			echo "edit_success";
		} else {
			echo "edit_error";
		}
	}

	public function db_delete_category() {
		$id 		= $this->input->post('id');
		$sql 		= "DELETE FROM tb_category WHERE id='$id'";
		$query 		= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			echo "delete_success";
		} else {
			echo "delete_error";
		}
	}

	public function add_category_fetch() {
		$sql 			= "SELECT * FROM tb_category";
		$query			= $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo "
				<tr>
					<td>".$row->category."</td>
				</tr>";
		}
	}

	public function edit_category_fetch() {
		$sql 			= "SELECT * FROM tb_category";
		$query			= $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo "
				<tr>
					<td>".$row->category."</td>
					<td><input id='txt_".$row->id."'class='form-control' style='font-size: 18px;' /></td>
					<td><button id='btn_".$row->id."' class='btn btn-success btn-flat' style='width: 100%; font-size: 16px;'>ยืนยัน</button></td>
				</tr>
				<script type='text/javascript'>
					$(document).ready(function() {
						$('#btn_".$row->id."').click(function() {

							let id = ".$row->id.";
							let edit_name = $('#txt_".$row->id."').val();

							if (edit_name == '') {
								modal_show("."\""."<span style='color:red;'>กรุณากรอกชื่อที่ต้องการแก้ไข</span>"."\"".");
							} else {
								$.ajax({
									type: 'POST',
									url: '".base_url()."c_admin/db_edit_category',
									data: {
										id: id,
										edit_name: edit_name
									},
									dataType: 'text',
									cache: false,
									success: function (data) {
										// alert(data);
										
										if (data == 'edit_success') {
											window.location.href = '".base_url()."c_admin/edit_category';
										}

										if (data == 'edit_error') {
											modal_show("."\""."<span style='color:red;'>ไม่สามารถแก้ไขได้</span>"."\"".");
										}
										
									}
								});
							}
						});
					});
				</script>";
		}
	}

	public function delete_category_fetch() {
		$sql 			= "SELECT * FROM tb_category";
		$query			= $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo "
				<tr>
					<td>".$row->category."</td>
					<td><button id='btn_".$row->id."' class='btn btn-default btn-flat' style='width: 100%; font-size: 16px; background-color:#ffe6ff;'><span class='glyphicon glyphicon-trash'></span> ลบ</button></td>
				</tr>
				<script type='text/javascript'>
					$(document).ready(function() {
						$('#btn_".$row->id."').click(function() {

							let id = ".$row->id.";
							
							$.ajax({
								type: 'POST',
								url: '".base_url()."c_admin/db_delete_category',
								data: {
									id: id
								},
								dataType: 'text',
								cache: false,
								success: function (data) {
									// alert(data);
									
									if (data == 'delete_success') {
										window.location.href = '".base_url()."c_admin/delete_category';
									}

									if (data == 'delete_error') {
										modal_show("."\""."<span style='color:red;'>ไม่สามารถลบได้</span>"."\"".");
									}
									
								}
							});
							
						});
					});
				</script>";
		}
	}

	public function search_username() {
		$search_username 	= $this->input->post('search_username');
		$sql 				= "SELECT * FROM tb_users WHERE username='$search_username'";
		$query 				= $this->db->query($sql);

		foreach ($query->result() as $row) {

			print json_encode(array(
				"image" 	=> $row->image,
				"firstname"	=> $row->firstname,
				"lastname"	=> $row->lastname,
				"address"	=> $row->address,
				"tel"		=> $row->tel,
				"email" 	=> $row->email
			));

		}

	}

	public function search_history() {
		$search_username 	= $this->input->post('search_username');
		$sql 				= "SELECT code FROM tb_payment WHERE username='$search_username' AND state=1";
		$query 				= $this->db->query($sql);

		foreach ($query->result() as $row) {

			echo $row->code . " , ";

		}

	}

	public function fetch_category() {
		$sql 				= "SELECT category FROM tb_category";
		$query				= $this->db->query($sql);
		
		foreach ($query->result() as $row) {
			echo "<option>".$row->category."</option>";
		}
	}

	public function db_add_course($url) {
		$category 	= $this->input->post('category');
		$code 		= $this->input->post('code');
		$title 		= $this->input->post('title');
		$detail		= $this->input->post('detail');
		$price 		= $this->input->post('price');
		$day 		= $this->input->post('day');

		$sql 		= "INSERT INTO tb_course (category,code,image,title,detail,price,day) VALUES
					('$category','$code','$url','$title','$detail','$price','$day')";
		$query 		= $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			header("location: ".base_url()."c_admin/add_course");
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}

	}

	public function fetch_all_course() {
		$sql 		= "SELECT category, code, title, day FROM tb_course";
		$query 		= $this->db->query($sql);

		foreach ($query->result() as $row) {
			echo "
			<tr>
				<td>".$row->category."</td>
				<td>".$row->code."</td>
				<td>".$row->title."</td>
				<td>".$row->day."</td>
			</tr>
			";
		}

	}

	public function db_delete_course() {
		$delete_course 	= $this->input->post('delete_course');
		$sql			= "DELETE FROM tb_course WHERE code='$delete_course'";
		$query 			= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			echo "delete_success";
		} else {
			echo "delete_error";
		}
	}

	public function clip_fetch_code() {
		$sql 			= "SELECT code FROM tb_course";
		$query 			= $this->db->query($sql);

		foreach ($query->result() as $row) {
			echo "<option>".$row->code."</option>";
		}
	}

	public function clip_fetch_title() {
		$sql 			= "SELECT title FROM tb_course";
		$query 			= $this->db->query($sql);

		foreach ($query->result() as $row) {
			echo "<option>".$row->title."</option>";
		}
	}

	public function db_clip_course($url) {
		$title 			= $this->input->post('title');
		$code 			= $this->input->post('code');
		$day 			= $this->input->post('day');

		$sql 			= "INSERT INTO tb_clip (title, code, url) VALUES('$title','$code','uploads/course/$url')";
		$query			= $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			// header("location: ".base_url()."c_admin/clip_course");
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('upload_success');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}

	}

	// ========== Banner ==========

	public function db_add_slide1($url) {
		$check 	= $this->input->post('checkbox_1');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=1";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide2($url) {
		$check 	= $this->input->post('checkbox_2');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=2";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide3($url) {
		$check 	= $this->input->post('checkbox_3');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=3";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide4($url) {
		$check 	= $this->input->post('checkbox_4');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=4";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide5($url) {
		$check 	= $this->input->post('checkbox_5');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=5";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide6($url) {
		$check 	= $this->input->post('checkbox_6');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=6";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide7($url) {
		$check 	= $this->input->post('checkbox_7');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=7";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide8($url) {
		$check 	= $this->input->post('checkbox_8');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=8";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide9($url) {
		$check 	= $this->input->post('checkbox_9');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=9";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	public function db_add_slide10($url) {
		$check 	= $this->input->post('checkbox_10');
		$sql 	= "UPDATE tb_slide SET url='uploads/slide/$url', state=$check WHERE list=10";
		$query	= $this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			$this->load->view('open_html');
			$this->load->view('header');
			$this->load->view('banner');
			$this->load->view('close_html');
		} else {
			echo "<script type='text/javascript'> alert('error'); </script>";
		}
	}

	// ========== End banner ======

	public function fetch_state_banner() {
		$sql 	= "SELECT state FROM tb_slide";
		$query 	= $this->db->query($sql);

		$i = 1;

		foreach ($query->result() as $row) {
			if ($i == 6) {
				echo "<br />";
				echo "
				$i : ".$row->state." / "."
				";
			} else {
				echo "
				$i : ".$row->state." / "."
				";
			}
			$i++;
		}
	}

	public function save_howto() {
		$data 	= $this->input->post('txt_howto');
		$data_n = $this->db->escape($data);
		$sql 	= "UPDATE tb_howto SET text_howto=$data_n WHERE id=1";
		$query 	= $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			header("location: ".base_url()."c_admin/edit_howto");
		} else {
			echo "error save";
		}
	}

	public function save_promotion() {
		$data 	= $this->input->post('txt_promotion');
		$data_n = $this->db->escape($data);
		$sql 	= "UPDATE tb_promotion SET text_promotion=$data_n WHERE id=1";
		$query 	= $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			header("location: ".base_url()."c_admin/edit_promotion");
		} else {
			echo "error save";
		}
	}

	public function save_about() {
		$data 	= $this->input->post('txt_about');
		$data_n = $this->db->escape($data);
		$sql 	= "UPDATE tb_about SET text_about=$data_n WHERE id=1";
		$query 	= $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			header("location: ".base_url()."c_admin/edit_about");
		} else {
			echo "error save";
		}
	}

	public function save_contact() {
		$data 	= $this->input->post('txt_contact');
		$data_n = $this->db->escape($data);
		$sql 	= "UPDATE tb_contact SET text_contact=$data_n WHERE id=1";
		$query 	= $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {
			header("location: ".base_url()."c_admin/edit_contact");
		} else {
			echo "error save";
		}
	}

}

?>