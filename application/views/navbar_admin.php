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
		    <a class="navbar-brand" href="<?php echo base_url(); ?>c_admin/panel">Course Online</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-left navbar_admin">

				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการหมวดหมู่ <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo base_url(); ?>c_admin/add_category" style="font-size: 16px;">เพิ่ม</a></li>
		            <li><a href="<?php echo base_url(); ?>c_admin/edit_category" style="font-size: 16px;">แก้ไข</a></li>
		            <li><a href="<?php echo base_url(); ?>c_admin/delete_category" style="font-size: 16px;">ลบ</a></li>
		          </ul>
		        </li>

		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการคอร์สเรียน <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<!-- <li><a href="<?php echo base_url(); ?>c_admin/clip_course" style="font-size: 16px;">คลิปคอร์ส</a></li> -->
		            <li><a href="<?php echo base_url(); ?>c_admin/add_course" style="font-size: 16px;">เพิ่ม</a></li>
		            <li><a href="<?php echo base_url(); ?>c_admin/delete_course" style="font-size: 16px;">ลบ</a></li>
		          </ul>
		        </li>

				<li><a href="<?php echo base_url(); ?>c_admin/state_payment">แจ้งชำระเงิน</a></li>

				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประวัติผู้ใช้งาน <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo base_url(); ?>c_admin/find_profile" style="font-size: 16px;">โปรไฟล์</a></li>
		            <li><a href="<?php echo base_url(); ?>c_admin/history_course" style="font-size: 16px;">คอร์สเรียน</a></li>
		            <li><a href="<?php echo base_url(); ?>c_admin/device_login" style="font-size: 16px;">สถานะล็อกอิน</a></li>
		          </ul>
		        </li>

				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">แก้ไขข้อมูล <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="<?php echo base_url(); ?>c_admin/edit_howto" style="font-size: 16px;">วิธีการเรียน/ชำระเงิน</a></li>
		          	<li><a href="<?php echo base_url(); ?>c_admin/edit_promotion" style="font-size: 16px;">โปรโมชั่น</a></li>
		          	<li><a href="<?php echo base_url(); ?>c_admin/edit_about" style="font-size: 16px;">เกี่ยวกับเรา</a></li>
		          	<li><a href="<?php echo base_url(); ?>c_admin/edit_contact" style="font-size: 16px;">ติดต่อเรา</a></li>
		            <li><a href="<?php echo base_url(); ?>c_admin/banner" style="font-size: 16px;">เปลี่ยนแบนเนอร์</a></li>
		          </ul>
		        </li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ตั้งค่า <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="<?php echo base_url(); ?>c_admin/profile" style="font-size: 16px;">เปลี่ยนรหัสผ่าน</a></li>
		          </ul>
		        </li>

				<li style="//background-color: #ffcccc;"><a href="<?php echo base_url(); ?>c_admin/logout" id="btn_logout">ออกจากระบบ</a></li>
			</ul>
		</div>

	</div>
</nav>