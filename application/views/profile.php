<body>

	<?php $this->load->view('navbar_home'); ?>

	<div class="container" id="bg_content">
		<div class="row" >

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">ประวัติส่วนตัว</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">

				<?php echo form_open_multipart('main/profile_save/'); ?>

				<div class="form-group">
					<span style="font-size: 20px;">รูปประจำตัว</span>
				</div>

				<div class="form-group">
					
					<img src="
						<?php $profile_img = $this->session->get_image;
							if ($profile_img == '') {
								echo base_url().'template/images/242x200.svg';
							} else {
								echo base_url().$this->session->get_image;
							}
						?>"
						class="img-responsive" 
						style="width: 242px; height: 200px; border-radius: 10px; margin-bottom: 15px;"
					>

					<input 
						type="file" 
						class="filestyle"
						
						data-buttonName="btn-success"
						data-buttonText="เลือกไฟล์"
						name="pic" 
					/>

				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ชื่อ</span>
				</div>

				<div class="form-group">
					<input id="profile_firstname" name="profile_firstname" class="form-control input-lg" value="<?php echo $this->session->get_firstname; ?>" maxlength="30" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">นามสกุล</span>
				</div>

				<div class="form-group">
					<input id="profile_lastname" name="profile_lastname" class="form-control input-lg" value="<?php echo $this->session->get_lastname; ?>" maxlength="30" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ที่อยู่</span>
				</div>

				<div class="form-group">
					<textarea id="profile_address" name="profile_address" class="form-control input-lg" style="resize: none;" rows="5" maxlength="255"><?php echo $this->session->get_address; ?></textarea>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">เบอร์ติดต่อ</span>
				</div>

				<div class="form-group">
					<input id="profile_tel" name="profile_tel" class="form-control input-lg" value="<?php echo $this->session->get_tel; ?>" maxlength="10" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">อีเมล</span>
				</div>

				<div class="form-group">
					<input id="profile_email" name="profile_email" class="form-control input-lg" value="<?php echo $this->session->get_email; ?>" maxlength="30" />
				</div>

				<div class="form-group">
					<span id="alert_pass" style="font-size: 20px;">ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)</span>
				</div>

				<div class="form-group">
					<input type="password" id="profile_pass" name="profile_pass" class="form-control input-lg" maxlength="30" />
				</div>

				<div class="form-group">
					<span id="alert_cfpass" style="font-size: 20px;">ยืนยันรหัสผ่าน</span>
				</div>

				<div class="form-group">
					<input type="password" id="profile_cfpass" name="profile_cfpass" class="form-control input-lg" maxlength="30" />
				</div>
				
				<div class="form-group">
					<button type="submit" id="btn_save" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 20px;">บันทึกข้อมูล</button>
				</div>

			</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap-filestyle.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			$('#profile_pass').keyup(function() {

				$pass 	= $('#profile_pass').val();
				$cfpass = $('#profile_cfpass').val();

				if ($pass.length < 6 && $cfpass.length < 6) {

					$('#btn_save').prop('disabled', true);
					$('#alert_pass').html("<span style='color:red;'>ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)</span>");
					if ($pass == "" && $cfpass == "") {
						$('#alert_pass').html("ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)");
						$('#btn_save').prop('disabled', false);
					}

				} else {

					if ($pass == "" && $cfpass == "") {
						$('#alert_pass').html("ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)");
						$('#btn_save').prop('disabled', false);
					} else {

						$('#btn_save').prop('disabled', true);

						if ($pass != $cfpass) {
							$('#alert_pass').html("<span style='color:red;'>รหัสผ่านไม่ตรงกับยืนยัน</span>");
						} else {
							$('#alert_pass').html("<span style='color:green;'>รหัสผ่านสามารถใช้ได้</span>");
							$('#btn_save').prop('disabled', false);
						}

					}

				}
				
			});

			$('#profile_cfpass').keyup(function() {

				$pass 	= $('#profile_pass').val();
				$cfpass = $('#profile_cfpass').val();

				if ($pass.length < 6 && $cfpass.length < 6) {

					$('#btn_save').prop('disabled', true);
					$('#alert_pass').html("<span style='color:red;'>ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)</span>");
					if ($pass == "" && $cfpass == "") {
						$('#alert_pass').html("ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)");
						$('#btn_save').prop('disabled', false);
					}

				} else {

					if ($pass == "" && $cfpass == "") {
						$('#alert_pass').html("ตั้งรหัสผ่านใหม่ (6 ตัวอักษรขึ้นไป)");
						$('#btn_save').prop('disabled', false);
					} else {

						$('#btn_save').prop('disabled', true);

						if ($pass != $cfpass) {
							$('#alert_pass').html("<span style='color:red;'>รหัสผ่านไม่ตรงกับยืนยัน</span>");
						} else {
							$('#alert_pass').html("<span style='color:green;'>รหัสผ่านสามารถใช้ได้</span>");
							$('#btn_save').prop('disabled', false);
						}

					}

				}

			});

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>