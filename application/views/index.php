<body>

	<?php $this->load->view('navbar_index'); ?>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript"> // Global Variable & Function
		let title_items 	= [];
		let code_items		= [];
		let category_items	= [];
		let price_items		= [];
		let day_items 		= [];
		let confirm_items	= [];

		let array_delete 	= [];

		let count_select 	= 0;
		let price_checkout 	= 0; // total_price & delete price

		let i; // loop code_items
		let fetch_items = 0;

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

	</script>

	<div class="container" id="bg_content">

		<div class="row">
		
		<?php $this->load->view('guest_modal') ?>

		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">

			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  
			<?php $this->model_user->fetch_slide(); ?>

			</div>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 25px;">
			<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<span style="font-size: 30px; color: #00e6b8;">คอร์สเรียน</span>
							</div>
						</div>
					</div>
				</div>
			<!-- <?php $this->model_user->fetch_index_btn(); ?> -->
			<?php $this->model_user->fetch_index_course(); ?>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-5 text-left" style="margin-top: 25px; background-color: #e6e6ff;">
			<div class="form-inline">
				
				<div class="formgroup" style="margin-top: 15px;">
					<label>
						<img src="<?php echo base_url(); ?>template/images/icon/facebook.png"  style="width: 28px; height: 25px;" />
					</label>
					<span> 
						Facebook : <a href="https://www.facebook.com/rightbrainphysics/">rightbrainphysics</a>
					</span>
				</div>
				<div class="formgroup">
					<label>
						<img src="<?php echo base_url(); ?>template/images/icon/line.png"  style="width: 28px; height: 25px;" />
					</label>
					<span>ID Line : physicman</span>
				</div>
				<div class="form-group">
					<label>
						<img src="<?php echo base_url(); ?>template/images/icon/phone.png"  style="width: 28px; height: 25px;" />
					</label>
					<span>เบอร์ติดต่อ : 083-6260036</span>
				</div>
				<div class="form-group">
					<label>
						<img src="<?php echo base_url(); ?>template/images/icon/email.png"  style="width: 28px; height: 25px;" />
					</label>
					<span>Email : semiconductor@hotmail.com</span>
				</div>

			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-7" style="margin-top: 25px;">
			
			<iframe style="width: 100% !important;" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frightbrainphysics%2F&tabs&width=350&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 responsive-iframe-container" style="margin-top: 25px;">
			<hr size="1">
			<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=compilerexe%40gmail.com&amp;color=%2329527A&amp;ctz=Asia%2FBangkok" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
				
		</div>

		</div>
	</div>

	<br>
	<br>
	<br>

	<nav class="navbar navbar-default navbar-fixed-bottom">
	  <div class="container text-center" style="padding-top: 10px;">
	  	Course Online &copy; 2016
	  </div>
	</nav>


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

</body>