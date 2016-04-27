<nav class="navbar navbar-default">
	<div class="container">

		<!-- div class="text-right" style="margin-top: 20px;">
			<a href="#link_regis" id="btn_regis"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a>
			<a href="#link_login" id="btn_login"><span class="glyphicon glyphicon-user"></span> เข้าสู่ระบบ</a>
		</div> -->

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">Course Online</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-left navbar_admin">
				<li class="<?php echo $this->session->index_active; ?>">
					<a href="<?php echo base_url(); ?>main/index">เพิ่มหมวดสาระ</a>
				</li>
				<li><a href="index.php">สถานะแจ้งชำระเงิน</a></li>

				<li><a href="index.php">สืบค้นประวัติผู้ใช้งาน</a></li>
				<li><a href="index.php">ตั้งค่าระบบ</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประวัติ <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="<?php echo base_url(); ?>c_admin/profile" style="font-size: 16px;">เปลี่ยนรหัสผ่าน</a></li>
		          </ul>
		        </li>

				<li style="//background-color: #ffcccc;"><a href="#link_logout" id="btn_logout">ออกจากระบบ</a></li>
			</ul>
		</div>

	</div>
</nav>