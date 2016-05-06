<body>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var count = 0;
	</script>

	<div class="container" id="bg_content" style="margin-top: 15px;">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">สมาชิกทั้งหมด <span id="count"></span></span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr class="success">
							<th>ชื่อผู้ใช้งาน</th>
							<th>ชื่อ</th>
							<th>นามสกุล</th>
							<th>ที่อยู่</th>
							<th>เบอร์โทร</th>
							<th>อีเมล</th>
						</tr>
						<?php $this->model_admin->fetch_all_users(); ?>
					</table>
				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#count').text(count);
		});
	</script>

</body>