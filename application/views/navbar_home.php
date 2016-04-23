
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
			
			<ul class="nav navbar-nav navbar-left">
				<li class="<?php echo $this->session->index_active; ?>">
					<a href="<?php echo base_url(); ?>main/index">หน้าแรก</a>
				</li>
				<li><a href="index.php">วิธีการสั่งซื้อ/ชำระเงิน</a></li>

				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">คอร์สเรียนทั้งหมด <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ มัธยมศึกษาตอนต้น</a></li>
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ มัธยมศึกษาปีที่ 4</a></li>
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ มัธยมศึกษาปีที่ 5</a></li>
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ มัธยมศึกษาปีที่ 6</a></li>
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ มหาวิทยาลัย</a></li>
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ สามัญ 7 วิชา</a></li>
		            <li><a href="#" style="font-size: 16px;">ฟิสิกส์ เตรียมทหาร</a></li>
		            <li><a href="#" style="font-size: 16px;">พื้นฐานวิศวะ</a></li>
		          </ul>
		        </li>

				<li><a href="index.php">โปรโมชั่น</a></li>
				<li><a href="index.php">เกี่ยวกับเรา</a></li>
				<li><a href="index.php">ติดต่อเรา</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประวัติ <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#" style="font-size: 16px;">คอร์สที่ลงเรียน</a></li>
		            <li><a href="<?php echo base_url(); ?>main/profile" style="font-size: 16px;">ประวัติส่วนตัว</a></li>
		          </ul>
		        </li>

				<li style="//background-color: #ffcccc;"><a href="#link_logout" id="btn_logout">ออกจากระบบ</a></li>
			</ul>
		</div>

	</div>
</nav>