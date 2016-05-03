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
					<span style="font-size: 30px;">โปรโมชั่น</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">
				<div class="form-group">
					<?php $this->model_user->fetch_promotion(); ?>
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


	<?php $this->load->view('guest_modal_script'); ?>

</body>