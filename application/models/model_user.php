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

				// if ($state_session) {

					// $sql = "UPDATE tb_session SET lastupdate=NOW() WHERE username='$user'";
					// $query = $this->db->query($sql);

					$this->session->state_login = $user; // session $user login
					$this->session_profile($user); // session profile

					return "c_login_success";

				// } else {

				// 	return "c_detect_active";
					
				// }

				
			}
		}

	}

	function session_check($data) {

		$sql = "SELECT username, state_session FROM tb_session";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {
			if ($row->username == $data) {
				if ($row->state_session == "0") {
					// update session to 1
					$sql 	= "UPDATE tb_session SET state_session=1 WHERE username='$data'";
					$query 	= $this->db->query($sql);
					// end update session
					return true;
				} else if ($row->state_session == "1") {

					$sql = "UPDATE tb_session SET state_session=2 WHERE username='$data'";
					$this->db->query($sql);
					return true;

				} else {

					// if lastupdate over 20 minute access to login
					$user = $this->input->post('login_user');
					$lastupdate = $this->time_login($user);

					if ($lastupdate) {
						
						$sql = "UPDATE tb_session SET lastupdate=NOW() WHERE username='$user'";
						$query = $this->db->query($sql);

						$this->session->state_login = $user; // session $user login

						// session profile
						$this->session_profile($user);

						return true;

					} else {
						return false; // found user active lastupdate not over 20 minute.
					}
					// --------------------------------------------
				}
				
			}
		}

	}

	public function time_login($user) {

		$sql = "SELECT lastupdate FROM tb_session WHERE username='$user'";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {

			$time_current = date('Y-m-d H:i:s');
			$exp_session = $row->lastupdate;
			$result = (strtotime($exp_session) - strtotime($time_current)) / ( 60 * 20 ); // 1 day = 60*60*24 // 1 Hour = 60 * 60

			if ($result < 14) {
				return true; // over 20 minute
			} else {
				return false; // Not over 20 minute
			}

			// echo $this->DateDiff($time_current, $exp_session);
			// 2016-04-24 09:29:22
		}

	}

	public function time_update() {

		$user = $this->session->state_login;

		if ($user != "") {

			$sql = "UPDATE tb_session SET lastupdate=NOW() WHERE username='$user'";
			$query = $this->db->query($sql);

		}
	}

	public function session_logout() {

		$user = $this->session->state_login;
		$sql 	= "UPDATE tb_session SET state_session=0 WHERE username='$user'";
		$query 	= $this->db->query($sql);

		$session_items = array(
			'state_login'	=>	'',
			'get_firstname'	=>	'',
			'get_lastname'	=>	'',
			'get_address'	=>	'',
			'get_image' 	=>	'',
			'get_tel' 		=>	'',
			'get_email' 	=>	''
		);

		$this->session->unset_userdata($session_items);

	}

	private function session_profile($data) {

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
		$cfpass 	= $this->input->post('profile_cfpass');

		$user 		= $this->session->state_login;

		if (($pass == $cfpass) && (strlen($pass) >= 6)) {
			$sql 			= "UPDATE tb_users SET 
			firstname 		= '$firstname',
			lastname 		= '$lastname',
			address 		= '$address',
			tel 			= '$tel',
			email 			= '$email',
			password 		= '$pass'
			WHERE username 	= '$user'";
		} else {
			$sql 			= "UPDATE tb_users SET 
			firstname 		= '$firstname',
			lastname 		= '$lastname',
			address 		= '$address',
			tel 			= '$tel',
			email 			= '$email'
			WHERE username 	= '$user'";
		}
		
		$query = $this->db->query($sql);

		$this->session->get_firstname 	= $firstname;
		$this->session->get_lastname 	= $lastname;
		$this->session->get_address		= $address;
		$this->session->get_tel 		= $tel;
		$this->session->get_email 		= $email;

	}

	public function profile_payment() {
		$user = $this->session->state_login;
		$sql = "SELECT * FROM tb_order WHERE username='$user'";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {

			$msg_state;

			if ($row->state == 0) {
				$msg_state = "ยังไม่ได้ชำระ";
			}

			if ($row->state == 1) {
				$msg_state = "ชำระแล้ว";
			}

			if ($row->state == 2) {
				$msg_state = "คอร์สหมดอายุ";
			}

			echo '
				<tr>
				 	<td>'.$row->category.'</td>
				 	<td>'.$row->code.'</td>
				 	<td>'.$row->title.'</td>
				 	<td>'.$row->day.'</td>
				 	<td>'.$row->price.'</td>
				 	<td>'. $msg_state .'</td>
				</tr>
			';
		}	
	}

	public function confirm_payment() {

		$user = $this->session->state_login;

		$bank 		= $this->input->post('bank');
		// $datepay 	= $this->input->post('datepay');
		$datepay 	= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('datepay'))));
		$hour 		= $this->input->post('hour');
		$minute 	= $this->input->post('minute');
		$price 		= $this->input->post('price');
		$code 		= $this->input->post('code');

		$sql = "INSERT INTO tb_payment (username,bank,date_payment,hour,minute,price,code) VALUES
				('$user','$bank','$datepay','$hour','$minute','$price','$code')";
		$query = $this->db->query($sql);

		if ($this->db->affected_rows() === 1) {

			echo "success_confirm_payment"; // send to ajax 

		} else {

			echo "error_confirm_payment";

		}

	}

	public function fetch_index_course() {
		$sql = "SELECT category FROM tb_category";
		$query = $this->db->query($sql);

		$count_category = 0;
		$array_category;

		$i = 0; // counting select items

		foreach ($query->result() as $row) {
			$array_category[$count_category] = $row->category;
			$count_category++;
		}

		// Read array category
		foreach ($array_category as $buff) { 
			echo '

				<div class="col-xs-12 col-sm-12 col-md-12">
					<hr size="1" />
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<span style="font-size: 30px;">'.$buff.'</span>
							</div>
						</div>
					</div>
				</div>
			';

			// Read title from category
			$sql = "SELECT image, code, category, title, detail, price, day FROM tb_course WHERE category='$buff'";
			$query = $this->db->query($sql);

			foreach ($query->result() as $row) {

				$url = ''.base_url().$row->image;

				echo '
					<div class="col-xs-12 col-sm-3 col-md-3" style="//border: 1px solid #abc;">
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group"><img src="'.$url.'" class="img-responsive"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group"><span style="color:#ff8080; text-decoration: underline;">'. $row->title .'</span></div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group"><span style="//color:#ff9999;">'. $row->detail .'</span></div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group"><span style="color: blue;">ราคา '. number_format($row->price) .' บาท</span></div>
							</div>
							<div class="col-xs-10 col-sm-12 col-md-12">
								<div class="form-group"><button class="btn btn-success btn-flat" id="btn_'. $i .'" style="font-size: 16px; width: 100%; height: 40px;">ลงเรียน</button></div>
							</div>
						</div>
					</div>

					<script type="text/javascript">

						$(document).ready(function() {

							$("#btn_'. $i .'").click(function() {
								modal_show("<span style=\"color:green;\">กรุณาเข้าสู่ระบบก่อนสมัครคอร์สเรียน</span>");
							});

						});

					</script>
				';

				$i++;

			}

		}
	}

	public function fetch_home() {

		$user = $this->session->state_login;
	
		$i = 0; // counting select items

		$code_order = [];
		$array_order = 0;

		$array_read = 0;

		$sql = "SELECT code FROM tb_order WHERE username='$user' AND state=1 ORDER BY code ASC";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {
			$code_order[$array_order] = $row->code;
			$array_order++;
		}

		$sql = "SELECT category FROM tb_category";
		$query = $this->db->query($sql);

		foreach ($query->result() as $row) {

			echo '
				<div class="col-xs-12 col-sm-12 col-md-12">
					<hr size="1" />
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<span style="font-size: 30px;">'.$row->category.'</span>
							</div>
						</div>
					</div>
				</div>
			';

			// echo count($code_order);

			$sql = "SELECT image, code, category, title, detail, price, day FROM tb_course WHERE category='$row->category'";
			$query3 = $this->db->query($sql);

			foreach ($query3->result() as $row) {
				$url = ''.base_url().$row->image;
				if ($code_order[$array_read] == $row->code) {
					// echo $code_order[$array_read] . "\n";
					echo '
						<div class="col-xs-12 col-sm-3 col-md-3" style="//border: 1px solid #abc;">
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><img src="'.$url.'" class="img-responsive"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><span style="color:#ff8080; text-decoration: underline;">'. $row->title .'</span></div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><span style="//color:#ff9999;">'. $row->detail .'</span></div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><span style="color: blue;">ราคา '. number_format($row->price) .' บาท</span></div>
								</div>
								<div class="col-xs-10 col-sm-12 col-md-12">
									<div class="form-group"><button class="btn btn-danger btn-flat" style="font-size: 16px; width: 100%; height: 40px;" disabled>ลงเรียนแล้ว</button></div>
								</div>
							</div>
						</div>
					';
					$array_read++;
				} else { // not regis 
					echo '
						<div class="col-xs-12 col-sm-3 col-md-3" style="//border: 1px solid #abc;">
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><img src="'.$url.'" class="img-responsive"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><span style="color:#ff8080; text-decoration: underline;">'. $row->title .'</span></div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><span style="//color:#ff9999;">'. $row->detail .'</span></div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group"><span style="color: blue;">ราคา '. number_format($row->price) .' บาท</span></div>
								</div>
								<div class="col-xs-10 col-sm-12 col-md-12">
									<div class="form-group"><button class="btn btn-success btn-flat" id="btn_'. $i .'" style="font-size: 16px; width: 100%; height: 40px;">ลงเรียน</button></div>
								</div>
							</div>
						</div>

						<script type="text/javascript">

							fetch_items++;

							$(document).ready(function() {

								$("#btn_'. $i .'").click(function() {
									title_items['. $i .'] 		= "'. $row->title .'";
									code_items['. $i .'] 		= "'. $row->code .'";
									category_items['. $i .'] 	= "'. $row->category .'";
									price_items['. $i .'] 		= "'. $row->price .'";
									day_items['. $i .'] 		= "'. $row->day .'";
									count_select++;
									$("#badge_count").text(count_select);
									$("#btn_'. $i .'").attr("disabled", true);
									$("#btn_'. $i .'").attr("class", "btn btn-warning");
									$("#btn_'. $i .'").text("รอการยืนยัน");
									array_delete['. $i .'] = 1;
									price_checkout = price_checkout + parseInt(' . $row->price . ');
								});

							});

						</script>
					';
					$i++;
				}
			}

		}
	}


	public function fetch_learn() {

		$user 				= $this->session->state_login;
		$sql 				= "SELECT id, date_payment, code, exp FROM tb_payment WHERE username='$user' AND state=1";
		$query 				= $this->db->query($sql);

		$day 				= [];
		$array_day 			= 0;
		$buff_day			= 0;
		$state 				= 0;

		foreach ($query->result() as $row) {

			//check exp
			$date_now 		= date("Y-m-d");
    		$start 			= $row->date_payment;
    		$expired 		= $row->exp;

    		$exp 			= $this->DateDiff($start, $expired);
    		$date_now 		= $this->DateDiff($start, $date_now);

    		if ($date_now < $exp) {
    			$day[$array_day] 	= $exp - 1;
    			$state 				= 1;
    			$array_day++;
    		} else {
    			$sql = "UPDATE tb_payment SET state=2 WHERE id='$row->id'";
    			$this->db->query($sql);
    			$sql = "UPDATE tb_order SET state=2 WHERE username='$user' AND title='$row->code'";
    			$this->db->query($sql);
    		}
    		//end check


		}
		
		// echo count($day);
		
		$remaining 			= [];
		$buff_remaining 	= 0;
		$state_remaining 	= 0;

		if ($state == 1) {
			$sql = "SELECT title, code FROM tb_order WHERE username='$user' AND state=1";
			$query = $this->db->query($sql);

			foreach ($query->result() as $row) {
				
				if ($buff_day <= count($day)) {

					if ($day[$buff_day] <= 3) {
						$remaining[$buff_remaining] = $row->title;
						$buff_remaining++;
						$state_remaining = 1;
					}

					echo '
						<hr size="1">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group text-center">
								<span style="font-size: 26px; color:green;">'.$row->title.' (เหลือเวลา '.$day[$buff_day].' วัน)</span>
							</div>

							<div class="form-group">
								<div class="easyhtml5video" style="position:relative;max-width:656px;">

									<video controls="controls"  poster="" style="width:100%" title="Test">
									<source src="'.base_url()."uploads/course/".$row->code.'.m4v" type="video/mp4" />

								</video>
							</div>
						</div>
					';

					$buff_day++;
				}
			}

			if ($state_remaining == 1) {
				echo "<script type='text/javascript'> var msg_remaining = ''; </script>";
				for ($i = 0; $i < count($remaining); $i++) {
					echo "<script type='text/javascript'> msg_remaining += ' (".$remaining[$i].") '; </script>";
				}

				echo "<script type='text/javascript'>
						
						modal_show('<span style=\'color:blue;\'>เวลาคอร์สเรียน ' + msg_remaining + ' ใกล้หมดแล้วจ้า</span>');
					
					</script>";
			}

				
		}

	}

	public function DateDiff($strDate1,$strDate2) {
		return (strtotime($strDate2) - strtotime($strDate1)) /  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	}

	public function fetch_slide() {

		$sql 	= "SELECT list FROM tb_slide WHERE state=1";
		$query 	= $this->db->query($sql);

		$list_active = 0;
		echo "<ol class='carousel-indicators'>";

		foreach ($query->result() as $row) {

			if ($list_active == 0) {
				echo "<li data-target='#carousel-example-generic' data-slide-to='".$row->list."' class='active'></li>";
				$list_active++;
			} else {
				echo "<li data-target='#carousel-example-generic' data-slide-to='".$row->list."'></li>";
			}			
			
		}

		echo "</ol>"; 
		$list_active = 0;

		$sql 	= "SELECT url FROM tb_slide WHERE state=1";
		$query  = $this->db->query($sql);

		echo "<div class='carousel-inner' role='listbox'>";

		foreach ($query->result() as $row) {
			if ($list_active == 0) {
				echo "
					<div class='item active'>
				      <img style='width: 100%' src='".base_url().$row->url."'>
				    </div>
				";
				$list_active++;
			} else {
				echo "
					<div class='item'>
				      <img style='width: 100%' src='".base_url().$row->url."'>
				    </div>
				";
			}
		}

		echo "</div>";


		echo '
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		';
	}

	public function fetch_howto() {
		$sql = "SELECT text_howto FROM tb_howto";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo $row->text_howto;
		}
	}

	public function fetch_promotion() {
		$sql = "SELECT text_promotion FROM tb_promotion";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo $row->text_promotion;
		}
	}

	public function fetch_about() {
		$sql = "SELECT text_about FROM tb_about";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo $row->text_about;
		}
	}

	public function fetch_contact() {
		$sql = "SELECT text_contact FROM tb_contact";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo $row->text_contact;
		}
	}

	public function fetch_navbar_category() {
		$user 	= $this->session->state_login;
		$sql 	= "SELECT category, title FROM tb_course";
		$query 	= $this->db->query($sql);
		foreach ($query->result() as $row) {
			if ($user == "") {
				echo "<li><a href='".base_url()."main/course' style='font-size: 16px;'>".$row->category." ".$row->title."</a></li>";
			} else {
				echo "<li><a href='".base_url()."main/home' style='font-size: 16px;'>".$row->category." ".$row->title."</a></li>";
			}
		}
	}

	public function fetch_index_btn() {
		$sql = "SELECT category, title FROM tb_course";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			echo "
				<div class='form-group col-md-3'>
					<button class='btn btn-success btn-flat' style='width: 100%; height: 50px; font-size: 18px;'><a href='".base_url()."main/course' style='color: #FFF; text-decoration: none;'>".$row->category." ".$row->title."</a></button>
				</div>
			";
		}
	}

	public function fetch_order_code() {
		$sql = "SELECT title FROM tb_order WHERE state=0";
		$query = $this->db->query($sql);

		echo "<option>ชำระเงินคอร์สทั้งหมด</option>";

		foreach ($query->result() as $row) {
			echo "<option>".$row->title."</option>";
		}
	}

}

?>