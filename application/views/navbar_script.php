<script type="text/javascript">
	$(document).ready(function(){

		$('#btn_profile').click(function() {
			window.location.href = "<?php echo base_url(); ?>main/profile";
		});

		$('#btn_logout').click(function() {
			window.location.href = "<?php echo base_url(); ?>main/logout";
		});

	});
</script>