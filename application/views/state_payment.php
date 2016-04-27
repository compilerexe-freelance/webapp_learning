<body>
	
	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

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

			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">สถานะแจ้งชำระเงิน </span>
				</div>
				<div class="form-group text-center">
					<span style="font-size: 20px; color: red;">(โปรดตรวจเช็คให้ดีก่อนยืนยัน)</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<tr class="success">
								<th>ชื่อผู้ใช้งาน</th>
								<th>ธนาคาร</th>
								<th>วันที่ชำระ</th>
								<th>ชั่วโมง</th>
								<th>นาที</th>
								<th>จำนวนเงิน</th>
								<th>รหัสคอร์ส</th>
								<th></th>
							</tr>
							<?php $this->model_admin->state_payment(); ?>
						</table>
					</div>
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

				let state = 0;
				let pass = $('#new_pass').val();
				let cfpass = $('#new_cfpass').val();

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