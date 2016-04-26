<body>
	
	<?php $this->load->view('navbar_home'); ?>

	<div class="container" id="bg_content">
		<div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 15px;">
				<div class="form-group">
					<span style="font-size: 30px;">แจ้งชำระเงิน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">
				<div class="form-group">
					<span style="font-size: 20px;">เลือก	บัญชีที่โอนเงิน</span>
				</div>
				<div class="form-group">
					<select class="form-control">
						<option>ธ.กสิกรไทย - 0000000001</option>
						<option>ธ.ไทยพาณิชย์ - 0000000002</option>
						<option>ธ.กรุงศรีอยุธยา - 0000000003</option>
						<option>ธ.กรุงไทย - 0000000004</option>
						<option>ธ.กรุงเทพ - 0000000005</option>
						<option>ธ.ทหารไทย - 0000000006</option>
					</select>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">วันที่ชำระเงิน</span>
				</div>
				<div class="form-group">
					<input class="form-control" id="datepicker" />
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">เวลาโดยประมาณ</span>
				</div>
				<div class="form-group">
					<div class="form-inline">
						<div class="form-group">
							<select class="form-control">
								<?php 
									for ($i = 0; $i <= 23; $i++) {
										echo "<option>".$i."</option>";
									} 
								?>
							</select>
						</div>
						<div class="form-group">
							<span>ชม.</span>
						</div>
						<div class="form-group">
							<select class="form-control">
								<?php 
									for ($i = 0; $i <= 59; $i++) {
										echo "<option>".$i."</option>";
									} 
								?>
							</select>
						</div>
						<div class="form-group">
							<span>นาที</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">จำนวนเงิน</span>
				</div>
				<div class="form-group">
					<div class="form-inline">
						<div class="form-group">
							<input class="form-control" />
						</div>
						<div class="form-group">
							<span>บาท</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">รหัสคอร์สที่ต้องการชำระเงิน</span>
				</div>
				<div class="form-group">
					<div class="form-inline">
						<div class="form-group">
							<input class="form-control" />
						</div>
						<div class="form-group">
							<span>ตัวอย่าง 1001,1002</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-flat" style="width: 100%; height: 40px; font-size: 18px;">แจ้งชำระเงิน</button>
				</div>

			</div>

		</div>
	</div>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>
	

	<script type="text/javascript">
		
		$(document).ready(function() {

			$("#datepicker").datepicker();

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>