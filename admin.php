<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Admin Portal</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
			<div class="header">
				<div class="header-menu">
					<div class="logo"><img src="images/logo1.png" alt=""></div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
					<ul>
						
						<li><a href="#"><i class="fas fa-bell"></i></a></li>
						<li><a href="#"><i class="fas fa-power-off"></i></a></li>
					</ul>
				</div>
			</div>
			<!--header menu end-->
			<!--sidebar start-->
			<div class="sidebar">
				<div class="sidebar-menu">
					<center class="profile">
						<img src="admin.png" alt="">
						<p>Admin</p>
					</center>
					<li class="item">

						<a href="adminDashboard.php" class="menu-btn">

						

							<i class="fas fa-desktop"></i><span>Dashboard</span>
						</a>
					</li>
					<li class="item" id="profile">
						<a href="#profile" class="menu-btn">
							<i class="fas fa-user-circle"></i><span>Profile<i class="fas fa-chevron-down drop-down"></i></span>
						</a>
						<div class="sub-menu">

							<a href="adminProfile.php"><i class="fas fa-address-card"></i><span>Info</span></a>

							

							<a href="#"><i class="fas fa-key"></i><span>Password</span></a>
						</div>
					</li>
					<li class="item" id="appointment">
						<a href="#appointment" class="menu-btn">
							<i class="fas fa-calendar"></i><span>Appointment</span>
						</a>
					</li>
					<li class="item" id="doctor">
						<a href="#doctor" class="menu-btn">
							<i class="fas fa-user-md"></i><span>Doctor</span>
						</a>
					</li>
					<li class="item" id="patient">
						<a href="#patient" class="menu-btn">
						<i class="fa fa-user-plus" aria-hidden="true""></i><span>Patient</span>
						</a>
					</li>
					
					<li class="item">
						<a href="#" class="menu-btn">
							<i class="fas fa-user"></i><span>Helpline Assistant</span>
						</a>
					</li>
					<li class="item">
						<a href="#" class="menu-btn">
							<i class="fas fa-tint"></i><span>Organ Donation</span>
						</a>
					</li>
					<li class="item">
						<a href="#" class="menu-btn">
							<i class="fas fa-info-circle"></i><span>About</span>
						</a>
					</li>
				</div>
			</div>
		</div>
		<!--wrapper end-->

		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>

	</body>
</html>
