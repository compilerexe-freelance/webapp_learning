<body>
	
	<?php $this->load->view('navbar_admin'); ?>

	<div class="container" id="bg_content" style="margin-top: 25px;">
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

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">เปลี่ยนรหัสผ่าน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">รหัสผ่านใหม่</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<input type="password" class="form-control input-lg" id="new_pass" placeholder="Password ..." autofocus />
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">ยืนยันรหัสผ่าน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<input type="password" class="form-control input-lg" id="new_cfpass" placeholder="Confirm Password ..." />
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button id="btn_submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">เปลี่ยนรหัสผ่าน</button>
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

			// ------- Enter form ---------------
		    $('#new_cfpass').keypress(function(e) {
		    	if (($('#new_pass').val() != "") && (e.keyCode == 13)) {
		    		$('#btn_submit').click();
		    	}
		    	// console.log(e);
		    });
		    // ----------------------------------

			$('#btn_submit').click(function() {

				var state = 0;
				var pass = $('#new_pass').val();
				var cfpass = $('#new_cfpass').val();

				if (pass == "" || cfpass == "") {
					modal_show("<span style='color:red;'>กรุณากรอกรหัสผ่าน</span>");
				} else { state = 1; }

				if (pass.length < 6 || cfpass.length < 6) {
					modal_show("<span style='color:red;'>กรุณาตั้งรหัสผ่าน 6 ตัวอักษรขึ้นไป</span>");
				} else { state = 1; }

				if (pass != cfpass) {
					modal_show("<span style='color:red;'>รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน</span>");
				} else { state = 1; }

				if (state == 1) {

					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>c_admin/passChange",
						data: {
							pass: pass,
							cfpass: cfpass
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);
							
							if (data == "update_success") {
								modal_show("<span style='color:green;'>เปลี่ยนรหัสผ่านสำเร็จ</span>");
							}

							if (data == "update_error") {
								modal_show("<span style='color:red;'>ระบบไม่สามารถเปลี่ยนรหัสผ่านได้</span>");
							}
							
						}
					});

					$('#new_pass').val('');
					$('#new_cfpass').val('');
					state = 0;

				} // end check state

			});

		});

	</script>

</body>