<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){

			let enter_form; // form login
			let tmppath;

			$('#regis_image').change( function(event) {
			    tmppath = URL.createObjectURL(event.target.files[0]);
			    $("#example_image").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
			    // alert(tmppath);
			    $("#debug_url").html(tmppath);
			});

			$('#btn_regis').click(function(){
				$('#modal_regis').modal();
			});

			$('#btn_login').click(function(){
				$('#modal_login').modal();
			});
			
			// ------- Modal setting show -------
			$('#modal_login').on('shown.bs.modal', function () {
		        $('#login_user').focus();
		    });

		    $('#modal_regis').on('shown.bs.modal', function () {
		        $('#regis_firstname').focus();
		    });
		    // ----------------------------------

		    // ------- Enter form ---------------
		    $('#login_pass').keypress(function(e) {
		    	if (($('#login_pass').val() != "") && (e.keyCode == 13)) {
		    		$('#submit_login').click();
		    	}
		    	// console.log(e);
		    });
		    // ----------------------------------


			$('#submit_regis').click(function() {

				let get_firstname = $('#regis_firstname').val();
				let get_lastname = $('#regis_lastname').val();
				let get_address = $('#regis_address').val();
				let get_image = $('#regis_image').val();
				let get_tel = $('#regis_tel').val();
				let get_email = $('#regis_email').val();
				let get_user = $('#regis_user').val();
				let get_pass = $('#regis_pass').val();
				let get_cf_pass = $('#regis_cf_pass').val();

				let state = 0;

				if (get_firstname == "") {
					$('#alert_firstname').html("<span style='color:red;'>กรุณาใส่ชื่อ</span>");
				} else { $('#alert_firstname').html(""); state++; }

				if (get_lastname == "") {
					$('#alert_lastname').html("<span style='color:red;'>กรุณาใส่นามสกุล</span>");
				} else { $('#alert_lastname').html(""); state++; }

				if (get_address == "") {
					$('#alert_address').html("<span style='color:red;'>กรุณาใส่ที่อยู่</span>");
				} else { $('#alert_address').html(""); state++; }

				if (get_tel == "") {
					$('#alert_tel').html("<span style='color:red;'>กรุณาใส่เบอร์ติดต่อ</span>");
				} else { $('#alert_tel').html(""); state++; }

				if (get_email == "") {
					$('#alert_email').html("<span style='color:red;'>กรุณาใส่อีเมล</span>");
				} else { $('#alert_email').html(""); state++; }

				if (get_user == "") {
					$('#alert_user').html("<span style='color:red;'>กรุณาใส่ชื่อผุ้ใช้งาน</span>");
				} else { $('#alert_user').html(""); state++; }

				if (get_pass == "") {
					$('#alert_pass').html("<span style='color:red;'>กรุณาใส่รหัสผ่าน</span>");
				} else { $('#alert_pass').html(""); state++; }

				if (get_cf_pass == "") {
					$('#alert_cf_pass').html("<span style='color:red;'>กรุณายืนยันรหัสผ่าน</span>");
				} else { $('#alert_cf_pass').html(""); state++; }

				// Check confirm password
				if (get_pass != get_cf_pass) {
					state = 0;
					$('#alert_pass').html("<span style='color:red;'>กรุณาใส่รหัสผ่านให้ตรงกัน</span>");
					$('#alert_cf_pass').html("<span style='color:red;'>กรุณาใส่รหัสผ่านให้ตรงกัน</span>");
				}

				// Check length password

				if (get_pass.length < 6) {
					state = 0;
					$('#alert_pass').html("<span style='color:red;'>กรุณาใส่รหัสผ่านความยาว 6 ตัวอักษรขึ้นไป</span>");
					$('#alert_cf_pass').html("<span style='color:red;'>กรุณาใส่รหัสผ่านความยาว 6 ตัวอักษรขึ้นไป</span>");
				}

				if (state == 8) {

					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>main/register",
						data: {
							regis_firstname: get_firstname,
							regis_lastname: get_lastname,
							regis_address: get_address,
							regis_tel: get_tel,
							regis_email: get_email,
							regis_image: get_image,
							regis_user: get_user,
							regis_pass: get_pass
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);

							if (data == "i_username_used") {
								$('#alert_user').html("<span style='color:red;'>ชื่อใช้งานนี้มีในระบบแล้ว</span>");
							}
							
							if (data == "i_success") {
								$('#regis_firstname').text("");
								$('#regis_lastname').text("");
								$('#regis_address').text("");
								$('#regis_image').text("");
								$('#regis_tel').text("");
								$('#regis_email').text("");
								$('#regis_user').text("");
								$('#regis_pass').text("");
								$('#regis_cf_pass').text("");

								$('#close_regis').click();

								$('#modal_msg').html("<span style='color:green;'>สมัครสมาชิกเรียบร้อยแล้วจ้า เข้าสู่ระบบได้เลย</span>");
								$('#modal_alert').modal();
							}
							
						}
					});

				}

			});

			$('#submit_login').click(function() {

				let getlogin_user = $('#login_user').val();
				let getlogin_pass = $('#login_pass').val();

				let state = 0;

				if (getlogin_user == "") {
					$('#alertlogin_user').html("<span style='color:red;'>กรุณาใส่ชื่อผู้ใช้งาน</span>");
				} else { $('#alertlogin_user').html(""); state++; }

				if (getlogin_pass == "") {
					$('#alertlogin_pass').html("<span style='color:red;'>กรุณาใส่รหัสผ่าน</span>");
				} else { $('#alertlogin_pass').html(""); state++; }

				if (state == 2) {
					$.ajax({
						type: "post",
						url: "<?php echo base_url(); ?>main/process_login",
						data: {
							login_user: $('#login_user').val(),
							login_pass: $('#login_pass').val()
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);

							if (data == "i_success") {
								window.location.href = "<?php echo base_url(); ?>main/home";
							}

							if (data == "i_detect_active") {
								$('#close_login').click();
								$('#modal_msg').html("<span style='color:red;'>ชื่อผู้ใช้งานนี้ กำลังใช้งาน</span>");
								$('#modal_alert').modal();
							}

							if (data == "i_error") {
								$('#alertlogin_user').html("<span style='color:red;'>กรุณาตรวจสอบชื่อผู้ใช้งาน</span>");
								$('#alertlogin_pass').html("<span style='color:red;'>กรุณาตรวจสอบรหัสผ่าน</span>");
							}
						}
					});
				}

			});
			

		});

	</script>