<?php

	$this->model_user->time_update();

?>
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

				<li <?php if ($this->session->navbar_active == "home") { echo "class='active'"; } ?> >
					<a href="<?php echo base_url(); ?>main/index">หน้าแรก</a>
				</li>

				<li <?php if ($this->session->navbar_active == "howto") { echo "class='active'"; } ?> >
					<a href="<?php echo base_url(); ?>main/howto">วิธีการเรียน/ชำระเงิน</a>
				</li>

				<li <?php if ($this->session->navbar_active == "course") { echo "class='dropdown active'"; } ?> >
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">คอร์สเรียนทั้งหมด <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <?php $this->model_user->fetch_navbar_category(); ?>
		          </ul>
		        </li>

				<li <?php if ($this->session->navbar_active == "promotion") { echo "class='active'"; } ?> >
					<a href="<?php echo base_url(); ?>main/promotion">โปรโมชั่น</a>
				</li>

				<li <?php if ($this->session->navbar_active == "about") { echo "class='active'"; } ?> >
					<a href="<?php echo base_url(); ?>main/about">เกี่ยวกับเรา</a>
				</li>

				<li <?php if ($this->session->navbar_active == "contact") { echo "class='active'"; } ?> >
					<a href="<?php echo base_url(); ?>main/contact">ติดต่อเรา</a>
				</li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li <?php if ($this->session->navbar_active == "myprofile") { echo "class='dropdown active'"; } ?> >
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประวัติ <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="<?php echo base_url(); ?>main/profile" style="font-size: 16px;">ประวัติส่วนตัว</a></li>
		          	<li><a href="<?php echo base_url(); ?>main/profile_payment" style="font-size: 16px;">ประวัติชำระเงิน</a></li>
		            <li><a href="<?php echo base_url(); ?>main/learn" style="font-size: 16px;">คอร์สที่ลงเรียน</a></li>
		          </ul>
		        </li>

				<li style="//background-color: #ffcccc;"><a href="<?php echo base_url(); ?>main/logout" id="btn_logout">ออกจากระบบ</a></li>
			</ul>
		</div>

	</div>
</nav>