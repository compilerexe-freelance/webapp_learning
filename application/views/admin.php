<body>
	
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

			<div class="col-md-offset-4 col-md-4">
				<div class="form-group" style="margin-top: 15px;">
					<span style="font-size: 30px;">ผู้ดูแลระบบ</span>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">ชื่อผู้ใช้งาน</span>
				</div>
				<div class="form-group">
					<input id="txt_user" class="form-control input-lg" placeholder="Username" autofocus />
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">รหัสผู้ใช้งาน</span>
				</div>
				<div class="form-group">
					<input id="txt_pass" type="password" class="form-control input-lg" placeholder="Password" />
				</div>
				<div class="form-group">
					<button id="btn_submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">เข้าสู่ระบบ</button>
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
		    $('#txt_pass').keypress(function(e) {
		    	if (($('#txt_user').val() != "") && (e.keyCode == 13)) {
		    		$('#btn_submit').click();
		    	}
		    	// console.log(e);
		    });
		    // ----------------------------------

			$('#btn_submit').click(function() {

				let user = $('#txt_user').val();
				let pass = $('#txt_pass').val();

				if (user == "" || pass == "") {
					modal_show("<span style='color:red;'>กรุณาตรวจสอบชื่อผู้ใช้งานหรือรหัสผ่าน</span>");
				} else {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>c_admin/getLogin",
						data: {
							user: user,
							pass: pass
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);
							if (data == "success_login") {
								window.location.href = "<?php echo base_url(); ?>c_admin/panel";
							} else if (data == "error_login") {
								modal_show("<span style='color:red;'>กรุณาตรวจสอบชื่อผู้ใช้งานหรือรหัสผ่าน</span>");
							}
							
						}
					});
				}

			});

		});

	</script>

</body>