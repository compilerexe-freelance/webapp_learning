<body>
	
	<?php $this->load->view('navbar_home'); ?>

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

		function formatNumber (num) {
		    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		}

		$(document).ready(function() {

			$('#btn_checkout').click(function() {

				var code_counting  	= 0;
				var items_checkout 	= "";
				// var price_checkout 	= 0;

				var code_delete 	= "";

				for (i = 0; i < code_items.length; i++) {
					if (code_items[i] != null) {

						if (array_delete[i] != 0) {

						items_checkout += "<tr id='item_" + i + "'>";
						items_checkout += "<td>" + category_items[i] + "</td>";
						items_checkout += "<td>" + code_items[i] + "</td>";
						items_checkout += "<td>" + title_items[i] + "</td>";
						items_checkout += "<td>" + day_items[i] + "</td>";
						items_checkout += "<td>" + formatNumber(price_items[i]) + "</td>";

						items_checkout += "<td><button class='btn btn-default btn-flat' id='delete_" + i + "' style='width:100%; background-color:#ffe6ff;'><span class='glyphicon glyphicon-trash'></span> ลบ</button></td>";
						items_checkout += "</tr>";

						}

						// console.log(i);

						code_delete += "<script type='text/javascript'>";
						code_delete += 	"$(document).ready(function() {";
						code_delete += 		"$('#delete_" + i + "').click(function() {"; 
						code_delete += 			"$('#item_" + i + "').hide();";
						code_delete += 			"array_delete[" + i + "]=0;";
						code_delete += 			"price_checkout = parseInt(price_checkout) - parseInt(" + price_items[i] + ");";
						code_delete	+= 			"$('#total_price').text(price_checkout);";
						code_delete += 			"$('#btn_" + i + "').attr('disabled',false);";
						code_delete += 			"$('#btn_" + i + "').attr('class','btn btn-success');";
						code_delete += 			"$('#btn_" + i + "').text('ลงเรียน');";
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

				// console.log(code_items.length);

			});

			$('#btn_confirm').click(function() {

				// console.log(count_select);

				for (var i = 0; i < code_items.length; i++) {
					if (code_items[i] != null) {

						if (array_delete[i] != 0) {

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

			      	<div class="col-md-6">
		      			<div class="form-group text-center">
			      			<a href="#" id="continue_select">เลือกคอร์สเพิ่มเติม</a>
			      		</div>
			      	</div>

			      	<div class="col-md-12">

			      		<div class="col-md-6">
			      			<div class="form-group">
				      			<button type="button" class="btn btn-success btn-flat" id="btn_confirm" style="width: 100%; height: 40px; font-size: 16px;">ยืนยัน</button>
				      		</div>
				      	</div>
				      	<div class="col-md-6">
				      		<div class="form-group">
				        		<button type="button" class="btn btn-warning btn-flat" id="close_modal" style="width: 100%; height: 40px; font-size: 16px;" data-dismiss="modal">ปิดหน้าต่าง</button>
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

			<div class="col-xs-12 col-sm-12 col-md-5 text-left" style="margin-top: 25px; background-color: #e6e6ff;">
				<div class="form-inline">
					
					<div class="formgroup" style="margin-top: 15px;">
						<label>
							<img src="<?php echo base_url(); ?>template/images/icon/facebook.png"  style="width: 28px; height: 25px;" />
						</label>
						<span> 
							Facebook : <a href="https://www.facebook.com/rightbrainphysics/">rightbrainphysics</a>
						</span>
					</div>
					<div class="formgroup">
						<label>
							<img src="<?php echo base_url(); ?>template/images/icon/line.png"  style="width: 28px; height: 25px;" />
						</label>
						<span>ID Line : physicman</span>
					</div>
					<div class="form-group">
						<label>
							<img src="<?php echo base_url(); ?>template/images/icon/phone.png"  style="width: 28px; height: 25px;" />
						</label>
						<span>เบอร์ติดต่อ : 083-6260036</span>
					</div>
					<div class="form-group">
						<label>
							<img src="<?php echo base_url(); ?>template/images/icon/email.png"  style="width: 28px; height: 25px;" />
						</label>
						<span>Email : semiconductor@hotmail.com</span>
					</div>

				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-7" style="margin-top: 25px;">
				
				<iframe style="width: 100% !important;" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frightbrainphysics%2F&tabs&width=350&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 responsive-iframe-container" style="margin-top: 25px;">
				<hr size="1">
				<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=compilerexe%40gmail.com&amp;color=%2329527A&amp;ctz=Asia%2FBangkok" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
					
			</div>

			</div>

		</div> <!-- end row -->
	</div> <!-- end container -->

	<?php $this->load->view('navbar_script'); ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#continue_select').click(function() {
				$('#close_modal').click();
			});
		});
	</script>

</body>