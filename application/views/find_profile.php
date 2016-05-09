<body>

	<?php $this->load->view('navbar_admin'); ?>

	<div class="container" id="bg_content">
		<div class="row" >

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

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">ดูประวัติผู้ใช้งาน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">

				<div class="form-group">
					<a href="<?php echo base_url(); ?>c_admin/all_users">ดูรายชื่อผู้ใช้งานทั้งหมด</a>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">แก้ไขข้อมูล ชื่อผู้ใช้งาน (username)</span>
				</div>

				<div class="form-group">
					<input id="search_username" class="form-control input-lg" autofocus />
				</div>

				<div class="form-group">
					<button id="btn_submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 18px;">ค้นหา</button>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รูปประจำตัว</span>
				</div>

				<div class="form-group">
					
					<img id="profile_image" src="<?php echo base_url(); ?>template/images/242x200.svg"
						class="img-responsive" 
						style="width: 242px; height: 200px; border-radius: 10px; margin-bottom: 15px;"
					>

				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ชื่อผู้ใช้งาน</span>
				</div>

				<div class="form-group">
					<input id="profile_username" name="profile_username" class="form-control input-lg" maxlength="30" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รหัสผ่าน</span>
				</div>

				<div class="form-group">
					<input id="profile_password" name="profile_username" class="form-control input-lg" maxlength="30" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ชื่อ</span>
				</div>

				<div class="form-group">
					<input id="profile_firstname" name="profile_firstname" class="form-control input-lg" maxlength="30" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">นามสกุล</span>
				</div>

				<div class="form-group">
					<input id="profile_lastname" name="profile_lastname" class="form-control input-lg" maxlength="30" />
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
					<input id="profile_tel" name="profile_tel" class="form-control input-lg" maxlength="10" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">อีเมล</span>
				</div>

				<div class="form-group">
					<input id="profile_email" name="profile_email" class="form-control input-lg" maxlength="30" />
				</div>

				<div class="form-group">
					<button type="submit" id="btn_save" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 18px;">บันทึกการแก้ไข</button>
				</div>

				<div class="form-group">
					<button id="btn_delete" class="btn btn-danger btn-flat" style="width: 100%; height: 45px; font-size: 18px;">ลบสมาชิก</button>
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
			$('#btn_delete').attr('disabled', true);

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
							$('#btn_delete').attr('disabled', false);
							
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

			$('#btn_delete').click(function() {
				var username = $('#profile_username').val();

				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>c_admin/edit_delete_user",
					data: {
						username: username
					},
					dataType: "text",
					cache: false,
					success: function (data) {
						
						// alert(data);
						if (data == "delete_success") {
							modal_show("<span style='color:green;'>ลบผู้ใช้งานสำเร็จ</span>");
							
							$('#search_username').val("");
							$('#profile_username').val("");
							$('#profile_password').val("");
							$('#profile_firstname').val("");
							$('#profile_lastname').val("");
							$('#profile_address').val("");
							$('#profile_tel').val("");
							$('#profile_email').val("");

							$('#profile_username').attr('disabled', true);
							$('#profile_password').attr('disabled', true);
							$('#profile_firstname').attr('disabled', true);
							$('#profile_lastname').attr('disabled', true);
							$('#profile_address').attr('disabled', true);
							$('#profile_tel').attr('disabled', true);
							$('#profile_email').attr('disabled', true);
							$('#btn_save').attr('disabled', true);
							$('#btn_delete').attr('disabled', true);
						}

						if (data == "delete_error") {
							modal_show("<span style='color:red;'>ลบผู้ใช้งานล้มเหลว</span>");
						}
						
					}
				});
			});

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>