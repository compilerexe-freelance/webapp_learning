<body>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<?php $this->load->view('navbar_admin'); ?>

	<div class="container" id="bg_content" style="margin-top: 15px;">
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
					<span style="font-size: 30px;">แก้ไขวันหมดอายุ คอร์สเรียน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">

				<div class="form-group">
					<span style="font-size: 20px;">ชื่อผู้ใช้งาน (username)</span>
				</div>

				<div class="form-group">
					<input id="username" class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รหัสคอร์ส</span>
				</div>

				<div class="form-group">
					<input id="code" class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">วันหมดอายุ</span>
				</div>

				<div class="form-group">
					<input id="exp" class="form-control input-lg" placeholder="ตัวอย่าง 2016-01-30" />
				</div>

				<div class="form-group">
					<button id="btn_submit" class="btn btn-success btn-flat" style="width: 100%; height: 40px; font-size: 18px;">บันทึกการแก้ไข</button>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

		$(document).ready(function() {
			$('#btn_submit').click(function() {

				var username = $('#username').val();
				var code = $('#code').val();
				var exp = $('#exp').val();
				var state = 0;

				if (username == "" || code == "") {
					modal_show("<span style='color:red;'>กรุณากรอกข้อมูลให้ครบ</span>");
				} else {
					if (exp == "") {
						modal_show("<span style='color:red;'>กรุณากรอกข้อมูลให้ครบ</span>");
					} else {
						state = 1;
					}
				}

				if (state == 1) {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>c_admin/db_edit_exp",
						data: {
							username: username,
							code: code,
							exp: exp
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);
							if (data == "edit_exp_success") {
								$('#username').val("");
								$('#code').val("");
								$('#exp').val("");
								modal_show("<span style='color:green;'>บันทึกการแก้ไขสำเร็จ</span>");
							}

							if (data == "edit_exp_error") {
								modal_show("<span style='color:red;'>บันทึกการแก้ไขผิดพลาด</span>");
							}
							
						}
					});
				}

			});
		});

	</script>

</body>