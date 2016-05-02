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
					<span style="font-size: 20px;">ค้นหาจากชื่อผู้ใช้งาน (username)</span>
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

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

		$(document).ready(function() {

			$('#btn_submit').click(function() {
				let state = 0;
				let search_username = $('#search_username').val();

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
							
							let obj = jQuery.parseJSON(data);
							
							$('#profile_image').attr('src', "<?php echo base_url(); ?>" + obj.image);
							$('#profile_firstname').val(obj.firstname);
							$('#profile_firstname').val(obj.firstname);
							$('#profile_lastname').val(obj.lastname);
							$('#profile_address').val(obj.address);
							$('#profile_tel').val(obj.tel);
							$('#profile_email').val(obj.email);
							
						}
					});

					$('#new_pass').val('');
					$('#new_cfpass').val('');
					state = 0;

				} // end check state

			});

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>