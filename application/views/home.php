<body>
	
	<?php $this->load->view('navbar_home'); ?>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		let title_items 	= [];
		let code_items		= [];
		let category_items	= [];
		let price_items		= [];
		let day_items 		= [];
		let count_select 	= 0;
	</script>

	<div class="container" id="bg_content">
		<div class="row">
			
			<!-- Modal Alert -->

			<div id="modal_alert" class="modal fade modal-small" tabindex="-1" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <span class="modal-title" style="font-size: 20px;">สรุปรายละเอียดคอร์ส</span>
			      </div>
			      <div class="modal-body">

			      	<div class="form-group">
						<span id="modal_msg"></span>
					</div>
			      
			      </div>
			      <div class="modal-footer">
			      	<div class="col-md-12">
			      		<div class="col-md-6">
			      			<div class="form-group">
				      			<button type="button" class="btn btn-success btn-flat" id="btn_confirm" style="width: 100%; height: 40px; font-size: 16px;">ยืนยัน</button>
				      		</div>
				      	</div>
				      	<div class="col-md-6">
				      		<div class="form-group">
				        		<button type="button" class="btn btn-warning btn-flat" style="width: 100%; height: 40px; font-size: 16px;" data-dismiss="modal">ปิดหน้าต่าง</button>
				        	</div>
				        </div>
			        </div>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!-- End Modal Alert -->

			<div class="col-xs-12 col-sm-12 col-md-12" style="//margin-top: 15px;">

				<div class="col-xs-12 col-sm-12 col-md-12 text-right">
					<div class="form-group">
						<button class="btn btn-info btn-flat" type="button" id="btn_checkout">
						  <span style="font-size: 18px;">ยืนยันคอร์สที่ลงเรียน <span class="badge" id="badge_count">0</span></span>
						</button>
					</div>
				</div>

				<?php $this->model_user->fetch_home(); ?>

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
	
	<script type="text/javascript">
		$(document).ready(function() {

			$('#btn_checkout').click(function() {

				let code_counting  = 0;
				let items_checkout = "";
				let price_checkout = 0;

				for (let i = 0; i < code_items.length; i++) {
					if (code_items[i] != null) {
						items_checkout += "<tr>";
						items_checkout += "<td>" + code_items[i] + "</td>";
						items_checkout += "<td>" + category_items[i] + "</td>";
						items_checkout += "<td>" + title_items[i] + "</td>";
						items_checkout += "<td>" + day_items[i] + "</td>";
						items_checkout += "<td>" + formatNumber(price_items[i]) + "</td>";
						items_checkout += "</tr>";
						price_checkout = price_checkout + parseInt(price_items[i]);
					}
				}

				// alert(price_checkout);

				function formatNumber (num) {
				    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				}

				$('#modal_msg').html(
					"<div class='table-responsive'>" +
					"<table class='table table-bordered'>" + 
						"<tr class='success'> <th>รหัสคอร์ส</th><th>หมวดหมู่</th><th>ชื่อคอร์ส</th><th>จำนวนวัน</th><th>ราคา</th> </tr>" +
						items_checkout +
						"<tr class='warning'> <td>รวมยอดเงิน (บาท)</td><td></td><td></td><td></td><td>" + formatNumber(price_checkout) + "</td></tr>" +
					"</table>" +
					"</div>"
				);

				$('#modal_alert').modal();

			});

			$('#btn_confirm').click(function() {
				$.ajax({
					type: "post",
					url: "<?php echo base_url(); ?>main/confirm_checkout",
					data: {
						login_user: $('#login_user').val(),
						login_pass: $('#login_pass').val()
					},
					dataType: "text",
					cache: false,
					success: function (data) {
						// alert(data);

						if (data == "i_success") {
							window.location.href = "<?php echo base_url(); ?>main/home";
						}

						if (data == "i_detect_active") {
							$('#close_login').click();
							$('#modal_msg').html("<span style='color:red;'>ชื่อผู้ใช้งานนี้ กำลังใช้งาน</span>");
							$('#modal_alert').modal();
						}

						if (data == "i_error") {
							$('#alertlogin_user').html("<span style='color:red;'>กรุณาตรวจสอบชื่อผู้ใช้งาน</span>");
							$('#alertlogin_pass').html("<span style='color:red;'>กรุณาตรวจสอบรหัสผ่าน</span>");
						}
					}
				});
			});

		});
	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>