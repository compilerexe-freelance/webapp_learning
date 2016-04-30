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
					<span style="font-size: 30px;">เพิ่มคอร์สเรียน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">

				<?php echo form_open_multipart('c_admin/db_add_course/'); ?>

				<div class="form-group">
					<a href="<?php echo base_url(); ?>c_admin/all_course">ตารางคอร์สปัจจุบัน</a>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">หมวดหมู่</span>
				</div>

				<div class="form-group">
					<select name="category" class="form-control input-lg">
						<?php $this->model_admin->fetch_category(); ?>
					</select>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รหัสคอร์ส (ห้ามซ้ำกับคอร์สที่มีอยู่แล้ว)</span>
				</div>

				<div class="form-group">
					<input name="code" class="form-control input-lg" placeholder="ตัวอย่าง 1001" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รูปภาพคอร์ส (242x200)</span>
				</div>

				<div class="form-group">
					<input 
						type="file" 
						class="filestyle"
						
						data-buttonName="btn-success"
						data-buttonText="เลือกไฟล์"
						name="pic" 
					/>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ชื่อคอร์ส</span>
				</div>

				<div class="form-group">
					<input name="title" class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รายละเอียดคอร์ส</span>
				</div>

				<div class="form-group">
					<input name="detail" class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ราคา (ไม่ต้องใส่เครื่องหมายหลัก)</span>
				</div>

				<div class="form-group">
					<input name="price" class="form-control input-lg" placeholder="ตัวอย่าง 1000" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">จำนวนวัน</span>
				</div>

				<div class="form-group">
					<input name="day" class="form-control input-lg" />
				</div>

				<div class="form-group">
					<button type="submit" id="btn_submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 18px;">บันทึกข้อมูล</button>
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
	<script src="<?php echo base_url(); ?>template/js/bootstrap-filestyle.min.js"></script>

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
						url: "<?php echo base_url(); ?>c_admin/search_history",
						data: {
							search_username: search_username
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);


							// let obj = jQuery.parseJSON(data);
							// alert(obj.test_ + "0");

							// $('#result_code').text(obj.code);
							

							$('#result_code').text(data);
							// $('#profile_lastname').val(obj.lastname);
							// $('#profile_address').val(obj.address);
							// $('#profile_tel').val(obj.tel);
							// $('#profile_email').val(obj.email);
							
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