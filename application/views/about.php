<body>
	
	<?php
		$state_login = $this->session->state_login;
		if ($state_login == "") {
			$this->load->view('navbar_index'); 
		} else {
			$this->load->view('navbar_home');
		}
	?>

	<div class="container" id="bg_content">
		<div class="row">
			
			<?php $this->load->view('guest_modal') ?>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 15px;">
				<div class="form-group text-center">
					<span style="font-size: 30px;">เกี่ยวกับเรา</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">
				<div class="form-group">
					<?php $this->model_user->fetch_about(); ?>
				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('guest_modal_script'); ?>

</body>