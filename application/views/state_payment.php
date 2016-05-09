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
				<div class="form-group text-right">
					<a href="<?php echo base_url(); ?>c_admin/all_course">ตารางคอร์สปัจจุบัน</a>
					<span>/</span>
					<a href="<?php echo base_url(); ?>c_admin/check_not_paid">ดูคอร์สที่นักเรียนค้างชำระ</a>
					<span>/</span>
					<a href="<?php echo base_url(); ?>c_admin/edit_exp">แก้ไขวันหมดอายุ คอร์สเรียน</a>
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
								<th>ชื่อคอร์ส</th>
								<th>วันหมดอายุ</th>
								<th></th>
							</tr>
							<?php $this->model_admin->state_payment(); ?>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript">

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

	</script>

</body>