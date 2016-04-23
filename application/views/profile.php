<body>

	<?php $this->load->view('navbar_home'); ?>

	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
				<div class="form-group">
					<span style="font-size: 30px;">ประวัติส่วนตัว</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">

				<div class="form-group">
					<span style="font-size: 20px;">รูปประจำตัว</span>
				</div>

				<div class="form-group">
					<img src="<?php echo base_url(); ?>template/images/242x200.svg" class="img-responsive">
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ชื่อ</span>
				</div>

				<div class="form-group">
					<input class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">นามสกุล</span>
				</div>

				<div class="form-group">
					<input class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ที่อยู่</span>
				</div>

				<div class="form-group">
					<textarea class="form-control input-lg" style="resize: none;" rows="5"></textarea>
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">เบอร์ติดต่อ</span>
				</div>

				<div class="form-group">
					<input class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">อีเมล</span>
				</div>

				<div class="form-group">
					<input class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">รหัสผ่าน</span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control input-lg" />
				</div>

				<div class="form-group">
					<span style="font-size: 20px;">ยืนยันรหัสผ่าน</span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control input-lg" />
				</div>
				
				<div class="form-group">
					<button class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 20px;">บันทึกข้อมูล</button>
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
	
	<?php $this->load->view('navbar_script'); ?>

</body>