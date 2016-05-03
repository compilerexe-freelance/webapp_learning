<body>
	
	<?php $this->load->view('navbar_admin'); ?>

	<div class="container" id="bg_content" style="margin-top: 25px;">
		<div class="row">
				
			<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 15px;">
				<div class="form-group">
					<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=compilerexe%40gmail.com&amp;color=%2329527A&amp;ctz=Asia%2FBangkok" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
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

	<script type="text/javascript">

		function modal_show(data) {
			$('#modal_msg').html(data);
			$('#modal_alert').modal();
		}

		$(document).ready(function() {


			// $('#btn_submit').click(function() {

			// 	let user = $('#txt_user').val();
			// 	let pass = $('#txt_pass').val();

			// 	if (user == "" || pass == "") {
			// 		modal_show("<span style='color:red;'>กรุณาตรวจสอบชื่อผู้ใช้งานหรือรหัสผ่าน</span>");
			// 	} else {
			// 		$.ajax({
			// 			type: "POST",
			// 			url: "<?php echo base_url(); ?>admin/getLogin",
			// 			data: {
			// 				user: user,
			// 				pass: pass
			// 			},
			// 			dataType: "text",
			// 			cache: false,
			// 			success: function (data) {
			// 				// alert(data);
			// 				if (data == "success_login") {
			// 					window.location.href = "<?php echo base_url(); ?>admin/panel";
			// 				} else if (data == "error_login") {
			// 					modal_show("<span style='color:red;'>กรุณาตรวจสอบชื่อผู้ใช้งานหรือรหัสผ่าน</span>");
			// 				}
							
			// 			}
			// 		});
			// 	}

			// });

		});

	</script>

</body>