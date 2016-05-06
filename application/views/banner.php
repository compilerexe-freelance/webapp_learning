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
					<span style="font-size: 30px;">เปลี่ยนแบนเนอร์</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php $this->model_admin->fetch_state_banner(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 1</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide1'); ?>
					<?php echo form_upload("file1"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="radio">
					    <label>
					    	<input type="radio" name="checkbox_1" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="radio" name="checkbox_1" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_1" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 2</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide2'); ?>
					<?php echo form_upload("file2"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_2" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_2" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_2" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 3</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide3'); ?>
					<?php echo form_upload("file3"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_3" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_3" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_3" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 4</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide4'); ?>
					<?php echo form_upload("file4"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_4" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_4" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_4" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 5</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide5'); ?>
					<?php echo form_upload("file5"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_5" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_5" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_5" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 6</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide6'); ?>
					<?php echo form_upload("file6"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_6" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_6" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_6" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 7</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide7'); ?>
					<?php echo form_upload("file7"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_7" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_7" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_7" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 8</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide8'); ?>
					<?php echo form_upload("file8"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_8" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_8" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_8" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 9</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide9'); ?>
					<?php echo form_upload("file9"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_9" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_9" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_9" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 20px;">แบนเนอร์ 10</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<?php echo form_open_multipart('c_admin/db_add_slide10'); ?>
					<?php echo form_upload("file10"); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<div class="checkbox">
					    <label>
					    	<input type="checkbox" name="checkbox_10" value="1"> แสดง
					    </label>
					    <label>
					    	<input type="checkbox" name="checkbox_10" value="0"> ซ่อน
					    </label>
				  	</div>
		  		</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button name="upload_10" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">บันทึกการตั้งค่า</button>
					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<hr size="1">
			</div>

			<!-- ===================================================================== -->

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