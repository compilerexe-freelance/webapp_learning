<body>

	<?php $this->load->view('navbar_admin'); ?>

	<div class="container" id="bg_content">
		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">ตารางคอร์สปัจจุบัน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12" style="//border: 1px solid red;">

				<div class="form-group">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr class="success">
								<th>หมวดหมู่</th>
								<th>รหัสคอร์ส</th>
								<th>ชื่อคอร์ส</th>
								<th>จำนวนวัน</th>
							</tr>
							<?php $this->model_admin->fetch_all_course(); ?>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>