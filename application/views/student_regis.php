<body>

	<div class="container" id="bg_content" style="margin-top: 15px;">
		<div class="row" >


			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">คอร์สเรียน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12" style="//border: 1px solid red;">

				<div class="table-responsive">
					<table class="table table-bordered">
						<tr class="success">
							<th>หมวดหมู่</th>
							<th>ชื่อคอร์ส</th>
							<th>จำนวนนักเรียน</th>
						</tr>
						<?php $this->model_admin->fetch_student_regis(); ?>
					</table>
				</div>

			</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		var buff_id; 

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

		$(document).ready(function() {

			$('#profile_username').attr('disabled', true);
			$('#profile_password').attr('disabled', true);
			$('#profile_firstname').attr('disabled', true);
			$('#profile_lastname').attr('disabled', true);
			$('#profile_address').attr('disabled', true);
			$('#profile_tel').attr('disabled', true);
			$('#profile_email').attr('disabled', true);
			$('#btn_save').attr('disabled', true);

			$('#btn_submit').click(function() {
				var state = 0;
				var search_username = $('#search_username').val();

				if (search_username == "") {
					modal_show("<span style='color:red;'>กรุณากรอกชื่อผู้ใช้งาน</span>");
				} else { state = 1; }
				
				if (state == 1) {

					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>c_admin/search_username",
						data: {
							search_username: search_username
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							
							var obj = jQuery.parseJSON(data);
							
							$('#profile_image').attr('src', "<?php echo base_url(); ?>" + obj.image);

							buff_id = obj.id;

							$('#profile_username').val(obj.username);
							$('#profile_password').val(obj.password);
							$('#profile_firstname').val(obj.firstname);
							$('#profile_lastname').val(obj.lastname);
							$('#profile_address').val(obj.address);
							$('#profile_tel').val(obj.tel);
							$('#profile_email').val(obj.email);

							$('#profile_username').attr('disabled', false);
							$('#profile_password').attr('disabled', false);
							$('#btn_save').attr('disabled', false);
							
						}
					});

					$('#new_pass').val('');
					$('#new_cfpass').val('');
					state = 0;

				} // end check state

			});

			$('#btn_save').click(function() {
				var username = $('#profile_username').val();
				var password = $('#profile_password').val();

				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>c_admin/edit_user_pass",
					data: {
						id: buff_id,
						username: username,
						password: password
					},
					dataType: "text",
					cache: false,
					success: function (data) {
						
						// alert(data);
						if (data == "edit_success") {
							modal_show("<span style='color:green;'>แก้ไขข้อมูลสำเร็จ</span>");
						}

						if (data == "edit_error") {
							modal_show("<span style='color:red;'>แก้ไขข้อมูลล้มเหลว</span>");
						}
						
					}
				});

			});

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>