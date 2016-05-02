<body>

	<?php $this->load->view('navbar_home'); ?>

	<div class="container" id="bg_content">
		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">

				<?php $this->model_user->fetch_learn(); ?>
				
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
	<script src="<?php echo base_url(); ?>template/js/html5ext.js"></script>

</body>