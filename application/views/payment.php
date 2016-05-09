<body>
	
	<?php $this->load->view('navbar_home'); ?>

	<div class="container" id="bg_content">
		<div class="row">
			
			<!-- Modal Alert -->

			<div id="modal_alert" class="modal fade modal-small" tabindex="-1" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <span class="modal-title" style="font-size: 20px;">ระบบแจ้งเตือน</span>
			      </div>
			      <div class="modal-body">

			      	<div class="form-group">
						<span id="modal_msg"></span>
					</div>
			      
			      </div>
			      <div class="modal-footer">
				  	<button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!-- End Modal Alert -->

			<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 15px;">
				<div class="form-group">
					<span style="font-size: 30px;">แจ้งชำระเงิน</span>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4" style="//border: 1px solid red;">
				<div class="form-group">
					<span style="font-size: 20px;">เลือก	บัญชีที่โอนเงิน</span>
				</div>
				<div class="form-group">
					<select class="form-control" id="bank">
						<option>ธ.กสิกรไทย - 0000000001</option>
						<option>ธ.ไทยพาณิชย์ - 0000000002</option>
						<option>ธ.กรุงศรีอยุธยา - 0000000003</option>
						<option>ธ.กรุงไทย - 0000000004</option>
						<option>ธ.กรุงเทพ - 0000000005</option>
						<option>ธ.ทหารไทย - 0000000006</option>
					</select>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">วันที่ชำระเงิน</span>
				</div>
				<div class="form-group">
					<input class="form-control" id="datepicker" />
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">เวลาโดยประมาณ</span>
				</div>
				<div class="form-group">
					<div class="form-inline">
						<div class="form-group">
							<select class="form-control" id="hour">
								<?php 
									for ($i = 0; $i <= 23; $i++) {
										echo "<option>".$i."</option>";
									} 
								?>
							</select>
						</div>
						<div class="form-group">
							<span>ชม.</span>
						</div>
						<div class="form-group">
							<select class="form-control" id="minute">
								<?php 
									for ($i = 0; $i <= 59; $i++) {
										echo "<option>".$i."</option>";
									} 
								?>
							</select>
						</div>
						<div class="form-group">
							<span>นาที</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">จำนวนเงิน</span>
				</div>
				<div class="form-group">
					<div class="form-inline">
						<div class="form-group">
							<input class="form-control" id="total_price" />
						</div>
						<div class="form-group">
							<span>บาท</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<span style="font-size: 20px;">เลือกคอร์สที่ต้องการชำระเงิน</span>
				</div>
				<div class="form-group">

					<select class="form-control" id="code">
						<?php $this->model_user->fetch_order_code(); ?>
					</select>	

					<!-- <div class="form-inline">
						<div class="form-group">
							<input class="form-control" id="code" />
						</div>
						<div class="form-group">
							<span>ตัวอย่าง 1001,1002</span>
						</div>
					</div> -->
				</div>
				<div class="form-group">
					<button id="btn_payment" class="btn btn-success btn-flat" style="width: 100%; height: 40px; font-size: 18px;">แจ้งชำระเงิน</button>
				</div>

			</div>

		</div>
	</div>

	<script src="<?php echo base_url(); ?>template/js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>template/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	<script src="<?php echo base_url(); ?>template/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>
	

	<script type="text/javascript">

		var msg = "";

		function formatNumber (num) {
		    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		}

		$(document).ready(function() {

			function modal_show(msg) {
				$('#modal_msg').html(msg);
				$('#modal_alert').modal();
			}

			$('#datepicker').datepicker();

			$('#btn_payment').click(function() {

				var state_modal = 0;

				var bank 	= $('#bank').val();
				var datepay = $('#datepicker').val();
				var hour 	= $('#hour').val();
				var minute 	= $('#minute').val();
				var price 	= $('#total_price').val();
				var code 	= $('#code').val();

				// var date = Date.parse(datepay);
				// console.log(date.toString('dd-mm-yyyy'));

				// console.log(datepay);

				if (datepay == "") {
					msg += "<span style='color:red;'>กรุณากรอกวันที่ชำระเงิน</span><br>";
					state_modal = 1;
				}

				if (hour == "0" && minute == "0") {
					msg += "<span style='color:red;'>กรุณากรอกเวลาโดยประมาณ</span><br>";
					state_modal = 1;
				} 

				if (price == "") {
					msg += "<span style='color:red;'>กรุณากรอกจำนวนเงินที่ชำระ</span><br>";
					state_modal = 1;
				} 

				if (code == "") {
					msg += "<span style='color:red;'>กรุณากรอกรหัสคอร์สที่ต้องการชำระเงิน</span><br>";
					state_modal = 1;
				}

				if (state_modal == 1) {
					modal_show(msg);
					state_modal = 0;
					msg = "";
				} else {

					$.ajax({
						type: "post",
						url: "<?php echo base_url(); ?>main/confirm_payment",
						data: {
							bank: bank,
							datepay: datepay,
							hour: hour,
							minute: minute,
							price: formatNumber(price),
							code: code
						},
						dataType: "text",
						cache: false,
						success: function (data) {
							// alert(data);
							if (data == "success_confirm_payment") {
								$('#datepicker').val('');
								$('#hour').val('');
								$('#minute').val('');
								$('#total_price').val('');
								$('#code').val('');

								msg = "<span style='color:green;'>แจ้งชำระเงินเรียบร้อยแล้ว กรุณารอการตรวจสอบภายใน 24 ชม.</span>";
								modal_show(msg);
							}
							
						}
					});

				}

				// console.log(bank+date+hour+minute+price+code);

			});

		});

	</script>

	<?php $this->load->view('navbar_script'); ?>

</body>