
<nav class="navbar navbar-default" style="font-size: 16px;">
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
		    <a class="navbar-brand" href="<?php echo base_url(); ?>">Course Online</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-left">

				<li <?php if ($this->session->navbar_active == "index") { echo "class='active'"; } ?> >
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

				<li <?php if ($this->session->navbar_active == "course") { echo "class='dropdown active'"; } ?> >
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ติดต่อเรา <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li <?php if ($this->session->navbar_active == "about") { echo "class='active'"; } ?> >
						<a href="<?php echo base_url(); ?>main/about">เกี่ยวกับเรา</a>
					</li>

					<li <?php if ($this->session->navbar_active == "contact") { echo "class='active'"; } ?> >
						<a href="<?php echo base_url(); ?>main/contact">ติดต่อเรา</a>
					</li>
		          </ul>
		        </li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li style="//background-color: #e6ccb3;"><a href="#link_regis" id="btn_regis">สมัครสมาชิก</a></li>
				<li><a href="#link_login" id="btn_login"><span class="glyphicon glyphicon-user"></span> เข้าสู่ระบบ</a></li>
			</ul>
		</div>

	</div>
</nav>