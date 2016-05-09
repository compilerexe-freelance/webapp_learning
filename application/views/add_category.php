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
					<span style="font-size: 30px;">เพิ่มหมวดหมู่สาระการเรียนรู้</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<tr class="success">
								<th>รายชื่อหมวดหมู่ปัจจุบัน</th>
							</tr>
							<?php $this->model_admin->add_category_fetch(); ?>
						</table>
					</div>

				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<input id="name_category" class="form-control input-lg" placeholder="ชื่อหมวดหมู่" autofocus />
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<button id="btn_submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">เพิ่ม</button>
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

				var state = 0;
				
				var name_category = $('#name_category').val();

				if (name_category == "") {
					modal_show("<span style='color:red;'>กรุณากรอกชื่อหมวดหมู่</span>");
				} else { state = 1; }

				if (state == 1) {

					$.ajax({
						type: "POST",
						url: "<?php echo base_url(); ?>c_admin/db_add_category",
						data: {
							name_category: name_category
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);
							
							if (data == "add_success") {
								window.location.href = "<?php echo base_url(); ?>c_admin/add_category";
							}

							if (data == "add_error") {
								modal_show("<span style='color:red;'>ไม่สามารถเพิ่มหมวดหมู่ได้</span>");
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