<body>
	
	<?php $this->load->view('navbar_admin'); ?>

	<div class="container" id="bg_content">
		<div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">แก้ไข วิธีการเรียน/ชำระเงิน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 15px;">
				<div class="form-group">
					<?php echo form_open('c_admin/save_howto'); ?>
					<textarea name="txt_howto" class="form-control" rows="50" style="font-size: 18px; resize: none;">
						<?php $this->model_user->fetch_howto(); ?>
					</textarea>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-md-offset-1" style="margin-top: 15px;">
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 18px;">บันทึกการแก้ไข</button>
					<?php echo form_close(); ?>
				</div>
			</div>

		</div>
	</div>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

</body>