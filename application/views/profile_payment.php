<body>
	
	<?php $this->load->view('navbar_home'); ?>

	<div class="container" id="bg_content">
		<div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 15px;">
				<div class="form-group">
					<span style="font-size: 30px;">ประวัติชำระเงิน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr class="success">
							<th>หมวดหมู่</th>
							<th>รหัสคอร์ส</th>
							<th>ชื่อคอร์ส</th>
							<th>จำนวนวัน</th>
							<th>ราคา (บาท)</th>
							<th>สถานะชำระเงิน</th>
						</tr>
						<?php $this->model_user->profile_payment(); ?>
					</table>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-10 col-md-2">
				<div class="form-group">
					<button class="btn btn-success btn-flat" id="btn_payment" style="width: 100%; height: 40px; font-size: 18px;">แจ้งชำระเงิน</button>
				</div>
			</div>

		</div>
	</div>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		
		$(document).ready(function() {

			$('#btn_payment').click(function() {
				window.location.href = "<?php echo base_url(); ?>main/payment";
			});

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>