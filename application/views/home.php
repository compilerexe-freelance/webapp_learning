<body>
	
	<?php $this->load->view('navbar_home'); ?>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>

	<script type="text/javascript"> // Global Variable & Function
		let title_items 	= [];
		let code_items		= [];
		let category_items	= [];
		let price_items		= [];
		let day_items 		= [];
		let confirm_items	= [];

		let array_delete 	= [];

		let count_select 	= 0;
		let price_checkout 	= 0; // total_price & delete price

		let i; // loop code_items
		let fetch_items = 0;

		function formatNumber (num) {
		    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		}

		$(document).ready(function() {

			$('#btn_checkout').click(function() {

				let code_counting  	= 0;
				let items_checkout 	= "";
				// let price_checkout 	= 0;

				let code_delete 	= "";

				for (i = 0; i < code_items.length; i++) {
					if (code_items[i] != null) {

						if (array_delete[i] != 0) {

						items_checkout += "<tr id='item_" + i + "'>";
						items_checkout += "<td>" + category_items[i] + "</td>";
						items_checkout += "<td>" + code_items[i] + "</td>";
						items_checkout += "<td>" + title_items[i] + "</td>";
						items_checkout += "<td>" + day_items[i] + "</td>";
						items_checkout += "<td>" + formatNumber(price_items[i]) + "</td>";

						items_checkout += "<td><button class='btn btn-danger btn-flat' id='delete_" + i + "' style='width:100%;'><span class='glyphicon glyphicon-trash'></span> ลบ</button></td>";
						items_checkout += "</tr>";

						}

						console.log(i);

						code_delete += "<script type='text/javascript'>";
						code_delete += 	"$(document).ready(function() {";
						code_delete += 		"$('#delete_" + i + "').click(function() {"; 
						code_delete += 			"$('#item_" + i + "').hide();";
						code_delete += 			"array_delete[" + i + "]=0;";
						code_delete += 			"price_checkout = parseInt(price_checkout) - parseInt(" + price_items[i] + ");";
						code_delete	+= 			"$('#total_price').text(price_checkout);";
						code_delete += 			"$('#btn_" + i + "').attr('disabled',false);";
						code_delete += 			"count_select--;";
						code_delete += 			"$('#badge_count').text(count_select);";
						code_delete += 		"});";
						code_delete += 	"});";
						code_delete += "</" + "script>";

					}
				}

				$('#modal_msg').html(
					"<div class='table-responsive'>" +
					"<table class='table table-bordered'>" + 
						"<tr class='success'> <th>หมวดหมู่</th><th>รหัสคอร์ส</th><th>ชื่อคอร์ส</th><th>จำนวนวัน</th><th>ราคา</th><th></th> </tr>" +
						items_checkout +
						"<tr class='warning'> <td>รวมยอดเงิน (บาท)</td><td></td><td></td><td></td><td id='total_price'>" + formatNumber(price_checkout) + "</td><td></td></tr>" +
					"</table>" +
					"</div>" + code_delete
				);

				$('#modal_alert').modal();

			});

			$('#btn_confirm').click(function() {

				for (let i = 0; i < code_items.length; i++) {
					if (code_items[i] != null) {

						$.ajax({
							type: "post",
							url: "<?php echo base_url(); ?>main/confirm_checkout",
							data: {
								category: category_items[i],
								code: code_items[i],
								title: title_items[i],
								day: day_items[i],
								price: formatNumber(price_items[i])
							},
							dataType: "text",
							cache: false,
							success: function (data) {
								// alert(data);
								if (data == "success") {
									$('#btn_confirm').hide();
									$('#modal_msg').html("<span style='color:green;'>บันทึกข้อมูลเรียบร้อยแล้วจ้า</span>");
									$('#modal_alert').modal();
									setInterval(function() {
										window.location.href = "<?php echo base_url(); ?>main/home";
									}, 3000);
								}
								
							}
						});

					}
				}

			});

			console.log(fetch_items);

		});

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

	<?php $this->load->view('navbar_script'); ?>

</body>