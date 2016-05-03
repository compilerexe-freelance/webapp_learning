<body>

	<?php $this->load->view('navbar_index'); ?>

	<div class="container" id="bg_content">

		<div class="row">
		
		<?php $this->load->view('guest_modal') ?>

		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">

			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  
			<?php $this->model_user->fetch_slide(); ?>

			</div>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 25px;">
			
			<?php $this->model_user->fetch_index_btn(); ?>

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


	<?php $this->load->view('guest_modal_script') ?>

</body>