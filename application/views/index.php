<body>

	<?php $this->load->view('navbar_index'); ?>

	<div class="container" id="bg_content">

		<div class="row">
		
		<!-- Modal Alert -->

		<div id="modal_alert" class="modal fade modal-small" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <span class="modal-title" style="font-size: 20px;">ระบบแจ้งเตือน</span>
		      </div>
		      <div class="modal-body">


		      	<div class="form-group">
					<span id="modal_msg"></span>
				</div>
		      
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- End Modal Alert -->

		<!-- Modal Login -->

		<div id="modal_login" class="modal fade modal-small" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <span class="modal-title" style="font-size: 20px;">ระบบล็อกอิน Course Online</span>
		      </div>
		      <div class="col-xs-12 col-sm-12 col-md-12 modal-body">

		      	<div class="col-md-2">
		      		<div class="form-group">
		      			<img src="<?php echo base_url(); ?>template/images/icon/login.png" class="img-responsive" />
		      		</div>
		      	</div>
		      	<div class="col-md-10">

		      		<div class="form-group">
			      		<span id="alertlogin_user"></span>
						<input type="text" id="login_user" name="txt_user" class="form-control input-lg" placeholder="ชื่อผู้ใช้งาน" maxlength="30" autofocus />
					</div>
					<div class="form-group">
						<span id="alertlogin_pass"></span>
						<input type="password" id="login_pass" name="txt_pass" class="form-control input-lg" placeholder="รหัสผ่าน" maxlength="30" />
					</div>
					<div class="form-group">
						<button id="submit_login" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">เข้าสู่ระบบ</button>
					</div>

		      	</div>

		      	
		      
		      </div>

		      <div class="modal-footer">
		        <button type="button" id="close_login" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
		      </div>

		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- End Modal Login -->

		<!-- Modal Regis -->

		<div id="modal_regis" class="modal fade modal-small" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <span class="modal-title" style="font-size: 20px;">ระบบสมัครสมาชิก</span>
		      </div>
		      <div class="modal-body">

		      	<div class="form-group">
		      		<span id="alert_firstname"></span>
					<input type="text" id="regis_firstname" name="regis_firstname" class="form-control input-lg" placeholder="ชื่อ ตัวอย่าง นายสมชาย" maxlength="30" autofocus />
				</div>
				<div class="form-group">
					<span id="alert_lastname"></span>
					<input type="text" id="regis_lastname" name="regis_lastname" class="form-control input-lg" placeholder="นามสกุล" maxlength="30" />
				</div>
				<div class="form-group">
					<span id="alert_address"></span>
					<textarea type="text" id="regis_address" name="regis_address" class="form-control input-lg" rows="5" placeholder="ที่อยู่" maxlength="255"></textarea>
				</div>

				<!-- <div class="form-group" style="//border: 1px solid #abc; //border-radius: 5px;">

					<span style="padding-left: 15px;">รูปประจำตัว</span>
					<input type="file" id="regis_image" name="regis_image" class="form-control" value=""> 
					<img id="example_image" src="" width="150" height="150" style="display:none; margin-top: 15px;" />
					<br>
					<span id="debug_url"></span>

				</div> -->

				<div class="form-group">
					<span id="alert_tel"></span>
					<input type="text" id="regis_tel" name="regis_tel" class="form-control input-lg" placeholder="เบอร์ติดต่อ" maxlength="10" />
				</div>
				<div class="form-group">
					<span id="alert_email"></span>
					<input type="text" id="regis_email" name="regis_email" class="form-control input-lg" placeholder="อีเมล" maxlength="30" />
				</div>
				
				<div class="form-group">
					<span id="alert_user"></span>
					<input type="text" id="regis_user" name="regis_user" class="form-control input-lg" placeholder="ชื่อผู้ใช้งาน" maxlength="30" />
				</div>
				<div class="form-group">
					<span id="alert_pass"></span>
					<input type="password" id="regis_pass" name="regis_pass" class="form-control input-lg" placeholder="รหัสผ่าน" maxlength="30" />
				</div>
				<div class="form-group">
					<span id="alert_cf_pass"></span>
					<input type="password" id="regis_cf_pass" name="regis_cf_pass" class="form-control input-lg" placeholder="ยืนยันรหัสผ่าน" maxlength="30" />
				</div>

				<div class="form-group">
					<button id="submit_regis" type="submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">สมัครสมาชิก</button>
				</div>
		      
				<!-- </form> -->

		      </div>
		      <div class="modal-footer">
		        <button type="button" id="close_regis" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- End Modal Regis -->

		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">

			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img style="width: 100%" src="<?php echo base_url(); ?>template/images/slide_1.jpg" alt="...">
			      <div class="carousel-caption">
			        ...
			      </div>
			    </div>
			    <div class="item">
			      <img style="width: 100%" src="<?php echo base_url(); ?>template/images/slide_1.jpg" alt="...">
			      <div class="carousel-caption">
			        ...
			      </div>
			    </div>
			    ...
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 25px;">
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ มัธยมศึกษาตอนต้น</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ มัธยมศึกษาปีที่ 4</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ มัธยมศึกษาปีที่ 5</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ มัธยมศึกษาปีที่ 6</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ มหาวิทยาลัย</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ สามัญ 7 วิชา</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">ฟิสิกส์ เตรียมทหาร</button>
			</div>
			<div class="form-group col-md-3">
				<button class="btn btn-success btn-flat" style="width: 100%; height: 50px; font-size: 18px;">พื้นฐานวิศวะ</button>
			</div>

			
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
						url: "<?php echo base_url(); ?>index.php/main/register",
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