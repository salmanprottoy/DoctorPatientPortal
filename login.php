<?php

require "includes/db_connect.inc.php";

session_start();

$accountType="";
$username=$password="";
$usernameErr=$passwordErr="";
$uPassInDB="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{

	$accountType= mysqli_real_escape_string($conn, $_POST['accountType']);
	if(empty($_POST['username']))
	{
      $usernameErr = "Username cannot be empty!";
	}
	else
	{
      $username = mysqli_real_escape_string($conn, $_POST['username']);
    }

	if(empty($_POST['password']))
	{
      $passwordErr = "Password cannot be empty!";
	}
	else
	{
      $password = mysqli_real_escape_string($conn, $_POST['password']);
	}
	if(!empty($username) && !empty($password))
	{
		if($accountType=="admin")
		{
			$sqlUserCheck = "select a_pass from admin where a_name = '$username';";
			$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
			$userCount = mysqli_num_rows($resultUserCheck);
  
			if($userCount < 1)
			{
		 	 	$usernameErr = "User does not exist";
			}
			else
			{
		 	 	while($row = mysqli_fetch_assoc($resultUserCheck))
		 		{
					$uPassInDB = $row['a_pass'];
			
				  }
				$a=password_verify($password, $uPassInDB);
				echo"$a";
		 	 	if(password_verify($password, $uPassInDB))
		 	 	{
					$_SESSION["user_name"] = $username;
					header("Location: Admin.php");
		 		 }
		  		else
		  		{
					$passwordErr = "Wrong password!";
		 		 }
			}
		}
		else if($accountType=="doctor")
		{
			$sqlUserCheck = "select d_pass from doctor where d_name = '$username';";
			$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
			$userCount = mysqli_num_rows($resultUserCheck);
  
			if($userCount < 1)
			{
		 	 	$usernameErr = "User does not exist";
			}
			else
			{
		 	 	while($row = mysqli_fetch_assoc($resultUserCheck))
		 		{
					$uPassInDB = $row['d_pass'];
			
				  }
				$a=password_verify($password, $uPassInDB);
				echo"$a";
		 	 	if(password_verify($password, $uPassInDB))
		 	 	{
					$_SESSION["user_name"] = $username;
					header("Location: doctor.php");
		 		 }
		  		else
		  		{
					$passwordErr = "Wrong password!";
		 		 }
			}
		}
		else if($accountType=="patient")
		{
			$sqlUserCheck = "select p_pass from patient where p_name = '$username';";
			$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
			$userCount = mysqli_num_rows($resultUserCheck);
  
			if($userCount < 1)
			{
		 	 	$usernameErr = "User does not exist";
			}
			else
			{
		 	 	while($row = mysqli_fetch_assoc($resultUserCheck))
		 		{
					$uPassInDB = $row['p_pass'];
			
				  }
				$a=password_verify($password, $uPassInDB);
				echo"$a";
		 	 	if(password_verify($password, $uPassInDB))
		 	 	{
					$_SESSION["user_name"] = $username;
					header("Location: patient.php");
		 		 }
		  		else
		  		{
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
    <title>Login</title>
</head>
<body>
<div id="login_form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
				<tr>
					<td><label>Account Type: </label></td>
					<td>
					<select name="accountType">
						<option value="admin" <?php if($accountType == "admin") echo "selected"; ?>>Admin</option>
						<option value="doctor" <?php if($accountType == "doctor") echo "selected"; ?>>Doctor</option>
						<option value="patient" <?php if($accountType == "patient") echo "selected"; ?>>Patient</option>
					</select>
					</td>
				</tr>
				<tr>
					<td><label>Username</label></td>
					<td><input type="text" name="username" value="<?php echo $username; ?>" required>
					<span style="color:red;"><?php echo $usernameErr; ?></span></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="password" required>
					<span style="color:red;"><?php echo "$passwordErr"; ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="login" value="Login"></td>
				</tr>
			</table>
        </form>
    </div>
</body>
</html>