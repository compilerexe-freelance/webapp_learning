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

		<!-- Modal Login -->

		<div id="modal_login" class="modal fade modal-small" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <span class="modal-title" style="font-size: 20px;">ระบบล็อกอิน Course Online</span>
		      </div>
		      <div class="col-xs-12 col-sm-12 col-md-12 modal-body">

		      	<div class="col-md-2">
		      		<div class="form-group">
		      			<img src="<?php echo base_url(); ?>template/images/icon/login.png" class="img-responsive" />
		      		</div>
		      	</div>
		      	<div class="col-md-10">

		      		<div class="form-group text-right">
			      		<span style="font-size: 16px;"><a href="<?php echo base_url(); ?>c_admin/login">ผู้ดูแลระบบ >></a></span>
					</div>

		      		<div class="form-group">
			      		<span id="alertlogin_user"></span>
						<input type="text" id="login_user" name="txt_user" class="form-control input-lg" placeholder="ชื่อผู้ใช้งาน" maxlength="30" autofocus />
					</div>
					<div class="form-group">
						<span id="alertlogin_pass"></span>
						<input type="password" id="login_pass" name="txt_pass" class="form-control input-lg" placeholder="รหัสผ่าน" maxlength="30" />
					</div>
					<div class="form-group">
						<button id="submit_login" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">เข้าสู่ระบบ</button>
					</div>

		      	</div>

		      	
		      
		      </div>

		      <div class="modal-footer">
		        <button type="button" id="close_login" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
		      </div>

		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- End Modal Login -->

		<!-- Modal Regis -->

		<div id="modal_regis" class="modal fade modal-small" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <span class="modal-title" style="font-size: 20px;">ระบบสมัครสมาชิก</span>
		      </div>
		      <div class="modal-body">

		      	<div class="form-group">
		      		<span id="alert_firstname"></span>
					<input type="text" id="regis_firstname" name="regis_firstname" class="form-control input-lg" placeholder="ชื่อ ตัวอย่าง นายสมชาย" maxlength="30" autofocus />
				</div>
				<div class="form-group">
					<span id="alert_lastname"></span>
					<input type="text" id="regis_lastname" name="regis_lastname" class="form-control input-lg" placeholder="นามสกุล" maxlength="30" />
				</div>
				<div class="form-group">
					<span id="alert_address"></span>
					<textarea type="text" id="regis_address" name="regis_address" class="form-control input-lg" rows="5" placeholder="ที่อยู่" maxlength="255"></textarea>
				</div>

				<!-- <div class="form-group" style="//border: 1px solid #abc; //border-radius: 5px;">

					<span style="padding-left: 15px;">รูปประจำตัว</span>
					<input type="file" id="regis_image" name="regis_image" class="form-control" value=""> 
					<img id="example_image" src="" width="150" height="150" style="display:none; margin-top: 15px;" />
					<br>
					<span id="debug_url"></span>

				</div> -->

				<div class="form-group">
					<span id="alert_tel"></span>
					<input type="text" id="regis_tel" name="regis_tel" class="form-control input-lg" placeholder="เบอร์ติดต่อ" maxlength="10" />
				</div>
				<div class="form-group">
					<span id="alert_email"></span>
					<input type="text" id="regis_email" name="regis_email" class="form-control input-lg" placeholder="อีเมล" maxlength="30" />
				</div>
				
				<div class="form-group">
					<span id="alert_user"></span>
					<input type="text" id="regis_user" name="regis_user" class="form-control input-lg" placeholder="ชื่อผู้ใช้งาน" maxlength="30" />
				</div>
				<div class="form-group">
					<span id="alert_pass"></span>
					<input type="password" id="regis_pass" name="regis_pass" class="form-control input-lg" placeholder="รหัสผ่าน" maxlength="30" />
				</div>
				<div class="form-group">
					<span id="alert_cf_pass"></span>
					<input type="password" id="regis_cf_pass" name="regis_cf_pass" class="form-control input-lg" placeholder="ยืนยันรหัสผ่าน" maxlength="30" />
				</div>

				<div class="form-group">
					<button id="submit_regis" type="submit" class="btn btn-success btn-flat" style="width: 100%; height: 45px; font-size: 16px;">สมัครสมาชิก</button>
				</div>
		      
				<!-- </form> -->

		      </div>
		      <div class="modal-footer">
		        <button type="button" id="close_regis" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- End Modal Regis -->