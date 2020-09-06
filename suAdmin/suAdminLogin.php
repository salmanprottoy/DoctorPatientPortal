<?php

require "includes/db_connect.inc.php";

session_start();

$username=$password="";
$usernameErr=$passwordErr="";
$uPassInDB="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{

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
		$sqlUserCheck = "select sa_pass from su_admin where sa_name = '$username';";
		$resultUserCheck = mysqli_query($conn, $sqlUserCheck);
		$userCount = mysqli_num_rows($resultUserCheck);
  
		if($userCount < 1){
		  $usernameErr = "User does not exist";
		}
		else
		{
		  while($row = mysqli_fetch_assoc($resultUserCheck))
		  {
			$uPassInDB = $row['sa_pass'];
			
		  }
  
		  if($password==$uPassInDB)
		  {
			$_SESSION["user_name"] = $username;
			header("Location: suAdmin.php");
		  }
		  else
		  {
			$passwordErr = "Wrong password!";
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