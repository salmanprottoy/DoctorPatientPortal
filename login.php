<?php

require "includes/db_connect.inc.php";

if(isset($_SESSION['user_name'])){
	if($_SESSION['utype'] == "admin"){
		header("Location: ./admin");
	}
}

session_start();

$accountType = "";
$username = $password = "";
$usernameErr = $passwordErr = "";
$uPassInDB = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$accountType = mysqli_real_escape_string($conn, $_POST['accountType']);
	if (empty($_POST['username'])) {
		$usernameErr = "Username cannot be empty!";
	} else {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
	}

	if (empty($_POST['password'])) {
		$passwordErr = "Password cannot be empty!";
	} else {
		$password = mysqli_real_escape_string($conn, $_POST['password']);
	}
	if (!empty($username) && !empty($password)) {
		if ($accountType == "admin") {
			$sqlUserCheck = "select a_pass from admin where a_name = '$username';";
			$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
			$userCount = mysqli_num_rows($resultUserCheck);

			if ($userCount < 1) {
				$usernameErr = "User does not exist";
			} else {
				while ($row = mysqli_fetch_assoc($resultUserCheck)) {
					$uPassInDB = $row['a_pass'];
				}
				$a = password_verify($password, $uPassInDB);
				echo "$a";
				if (password_verify($password, $uPassInDB)) {
					$_SESSION["user_name"] = $username;
					$_SESSION["utype"] = $accountType;
					header("Location: ./admin");
				} else {
					$passwordErr = "Wrong password!";
				}
			}
		} else if ($accountType == "doctor") {
			$sqlUserCheck = "select d_pass from doctor where d_name = '$username';";
			$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
			$userCount = mysqli_num_rows($resultUserCheck);

			if ($userCount < 1) {
				$usernameErr = "User does not exist";
			} else {
				while ($row = mysqli_fetch_assoc($resultUserCheck)) {
					$uPassInDB = $row['d_pass'];
				}
				$a = password_verify($password, $uPassInDB);
				echo "$a";
				if (password_verify($password, $uPassInDB)) {
					$_SESSION["user_name"] = $username;
					$_SESSION["utype"] = $accountType;
					header("Location: ./doctor");
				} else {
					$passwordErr = "Wrong password!";
				}
			}
		} else if ($accountType == "patient") {
			$sqlUserCheck = "select p_pass from patient where p_name = '$username';";
			$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
			$userCount = mysqli_num_rows($resultUserCheck);

			if ($userCount < 1) {
				$usernameErr = "User does not exist";
			} else {
				while ($row = mysqli_fetch_assoc($resultUserCheck)) {
					$uPassInDB = $row['p_pass'];
				}
				$a = password_verify($password, $uPassInDB);
				echo "$a";
				if (password_verify($password, $uPassInDB)) {
					$_SESSION["user_name"] = $username;
					$_SESSION["utype"] = $accountType;
					header("Location: patient/dashboard.php");
				} else {
					$passwordErr = "Wrong password!";
				}
			}
		}
	}
}
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login</title>
</head>

<body>
	<section id="nav-bar">
		<nav class="navbar navbar-expand-lg navbar-light ">
			<a class="navbar-brand" href="#"><img src="images/logo1.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto" align="right">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home </a>
				</ul>
			</div>
		</nav>
	</section>
	<div class="container">
		<br>
		<h1 class="text-black text-center">Login</h1>
		<form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<div class="col-lg-8 m-auto d-block">
				<div class="form-group">
					<label>Type</label>
					<select class="form-control" name="accountType">
						<option value="admin" <?php if ($accountType == "admin") echo "selected"; ?>>Admin</option>
						<option value="doctor" <?php if ($accountType == "doctor") echo "selected"; ?>>Doctor</option>
						<option value="patient" <?php if ($accountType == "patient") echo "selected"; ?>>Patient</option>
					</select>
				</div>
				<div class="form-group">
					<label for="user">Username:</label>
					<input type="text" name="username" value="<?php echo $username; ?>" id="user" class="form-control">
					<span style="color:red;"><?php echo $usernameErr; ?></span></td>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" value="">
					<span style="color:red;"><?php echo "$passwordErr"; ?></span></td>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1" name = "rmbrme">
					<label class="form-check-label" for="exampleCheck1">Remember Me</label>
				</div>
				<input type="submit" name="submit" value="Login" class="btn btn-success">
				<br>
				<div class="form-group">
					Don't have any account?
					<a href="signup.php">Click here</a>
				</div>
			</div>
		</form>
		<script>
			var loginForm = document.forms.myForm;
			loginForm.onsubmit = function() {
				var userName = loginForm.username.value;
				var pass = loginForm.password.value;
				if (userName == "") {
					alert("Username must be filled out!");
					return false;
				}
				if (pass == "") {
					alert("Password must be filled out!");
					return false;
				}
			}
		</script>
	</div>
</body>

</html>