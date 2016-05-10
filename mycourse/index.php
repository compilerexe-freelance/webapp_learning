<?php
	require_once('config.php');
	session_start();
	$localhost = "http://localhost/";
	$url = "http://localhost/index.php/";
	$user = $_GET['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Course Online</title>

	<link rel="stylesheet" href="../template/css/bootstrap.min.css">
	<link rel="stylesheet" href="../template/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../template/css/style.css">
	<link rel="stylesheet" href="../template/jquery-ui-1.11.4.custom/jquery-ui.min.css">
	<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>
<body>

	<script src="../template/js/jquery-1.12.3.min.js"></script>
	<script src="../template/js/bootstrap.min.js"></script>
	<script src="../template/js/html5ext.js"></script>

	<script type="text/javascript">
		function modal_show(msg) {
			$('#modal_msg').html(msg);
			$('#modal_alert').modal();
		}
	</script>

	<nav class="navbar navbar-default" style="font-size: 16px;">
		<div class="container">

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

					<li>
						<a href="<?php echo $url.'main/index'; ?>">หน้าแรก</a>
					</li>

					<li>
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">วิธีการเรียน/ชำระเงิน <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li>
							<a href="<?php echo $url.'main/howto'; ?>">วิธีการเรียน/ชำระเงิน</a>
						</li>
						<li>
							<a href="<?php echo $url.'main/payment'; ?>">แจ้งชำระเงิน</a>
						</li>
			          </ul>
			        </li>

					<li>
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">คอร์สเรียนทั้งหมด <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <?php

			            // Create connection
						$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} 

						$conn->query("set names 'utf8'");

						$sql = "SELECT title FROM tb_course";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        echo "<li><a href='" . $url . "main/index'>" . $row["title"]. "</a></li>";
						    }
						}
						$conn->close();

			            ?>
			          </ul>
			        </li>

			        

					<li class="active">
						<a href="<?php echo $localhost.'mycourse/index.php?user='.$user; ?>">คอร์สที่ลงเรียน</a>
					</li>

					<li>
						<a href="<?php echo $url.'main/promotion'; ?>">โปรโมชั่น</a>
					</li>

					<li>
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ติดต่อเรา <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li>
							<a href="<?php echo $url.'main/about'; ?>">เกี่ยวกับเรา</a>
						</li>

						<li>
							<a href="<?php echo $url.'main/contact'; ?>">ติดต่อเรา</a>
						</li>
			          </ul>
			        </li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					
					<li>
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ประวัติ <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			          	<li><a href="<?php echo $url.'main/profile'; ?>" style="font-size: 16px;">ประวัติส่วนตัว</a></li>
			          	<li><a href="<?php echo $url.'main/profile_payment'; ?>" style="font-size: 16px;">ประวัติชำระเงิน</a></li>
			          </ul>
			        </li>

					<li style="//background-color: #ffcccc;"><a href="<?php echo $url.'main/logout'; ?>" id="btn_logout">ออกจากระบบ</a></li>
				</ul>
			</div>

		</div>
	</nav>

	<div class="container" id="bg_content">
		<div class="row" >

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

			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 15px;">

				<?php

				function DateDiff($strDate1,$strDate2) {
					return (strtotime($strDate2) - strtotime($strDate1)) /  ( 60 * 60 * 24 );  // 1 day = 60*60*24
				}

				$day 				= [];
				$array_day 			= 0;
				$buff_day			= 0;
				$state 				= 0;
				
				$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
				if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
				$conn->query("set names 'utf8'");

				$sql 				= "SELECT id, date_payment, code, exp FROM tb_payment WHERE username='$user' AND state=1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					    //check exp
						$date_now 		= date("Y-m-d");
			    		$start 			= $row['date_payment'];
			    		$expired 		= $row['exp'];

			    		$exp 			= DateDiff($start, $expired);
			    		$date_now 		= DateDiff($start, $date_now);

			    		if ($date_now < $exp) {
			    			$day[$array_day] 	= $exp - 1;
			    			$state 				= 1;
			    			$array_day++;
			    		} else {
			    			$sql = "UPDATE tb_payment SET state=2 WHERE id='$row->id'";
			    			$conn->query($sql);

			    			$code = $row['code'];
			    			$sql = "UPDATE tb_order SET state=2 WHERE username='$user' AND title='$code'";
			    			$conn->query($sql);
			    		}
			    		//end check
		    		}
				}

				echo count($day);

				$remaining 			= [];
				$buff_remaining 	= 0;
				$state_remaining 	= 0;

				if ($state == 1) {
					$sql = "SELECT title, code FROM tb_order WHERE username='$user' AND state=1";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						include ('includetop.php');
						while($row = $result->fetch_assoc()) {
						
							if ($buff_day <= count($day)) {

								if ($day[$buff_day] <= 3) {
									$remaining[$buff_remaining] = $row->title;
									$buff_remaining++;
									$state_remaining = 1;
								}

								echo '
									<hr size="1">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group text-center">
											<span style="font-size: 26px; color:green;">'.$row['title'].' (เหลือเวลา '.$day[$buff_day].' วัน)</span>
										</div>

										<div class="form-group">
											<div class="easyhtml5video" style="position:relative;max-width:656px;">

												<video controls="controls"  poster="" style="width:100%" title="Test">
												<source src="'.$localhost."uploads/course/".$row['code'].'.m4v" type="video/mp4" />

											</video>
										</div>
									</div>
								';

								$buff_day++;
							}
						}
						include ('includebottom.php');
					}

					if ($state_remaining == 1) {
						echo "<script type='text/javascript'> var msg_remaining = ''; </script>";
						for ($i = 0; $i < count($remaining); $i++) {
							echo "<script type='text/javascript'> msg_remaining += ' (".$remaining[$i].") '; </script>";
						}

						echo "<script type='text/javascript'>
								
								modal_show('<span style=\'color:blue;\'>เวลาคอร์สเรียน ' + msg_remaining + ' ใกล้หมดแล้วจ้า</span>');
							
							</script>";
					}

						
				}

				$conn->close();

				?>
				
			</div>
		</div>
	</div>

</body>
</html>