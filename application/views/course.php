<body>
	
	<?php $this->load->view('navbar_index'); ?>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript"> // Global Variable & Function
		var title_items 	= [];
		var code_items		= [];
		var category_items	= [];
		var price_items		= [];
		var day_items 		= [];
		var confirm_items	= [];

		var array_delete 	= [];

		var count_select 	= 0;
		var price_checkout 	= 0; // total_price & delete price

		var i; // loop code_items
		var fetch_items = 0;

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

	</script>

	<div class="container" id="bg_content">
		<div class="row">
			
			<?php $this->load->view('guest_modal') ?>

			<div class="col-xs-12 col-sm-12 col-md-12" style="//margin-top: 15px;">

				<?php $this->model_user->fetch_index_course(); ?>

			</div>

		</div> <!-- end row -->
	</div> <!-- end container -->
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