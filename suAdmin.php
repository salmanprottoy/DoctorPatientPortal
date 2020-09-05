<?php

require "includes/db_connect.inc.php";

session_start();

$username=$password=$confirmPass="";
$usernameErr=$passwordErr="";
$errExists=0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{

	if(empty($_POST['username']))
	{
      $usernameErr = "Username cannot be empty!";
      $errExists=1;
	}
	else
	{
      $username = mysqli_real_escape_string($conn, $_POST['username']);
    }
    if(empty($_POST['password']))
	{
      $passwordErr = "Password cannot be empty!";
      $errExists=1;
	}
	else
	{
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }
    if(empty($_POST['confirmPassword']))
	{
      $passwordErr = "Password cannot be empty!";
      $errExists=1;
	}
	else
	{
        $confirmPass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
    }
    
    if($password!=$confirmPass)
    {
        $passwordErr="Password doesn't match!";
        $errExists=1;
    }
    $passwordToDb=password_hash($password, PASSWORD_DEFAULT);
    if($errExists!=1)
    {
        $sqlUser="select a_id from admin where a_name='$username'";
        $results=mysqli_query($conn, $sqlUser);
        $rowCount=mysqli_num_rows($results);
        if($rowCount>0)
        {
            $usernameErr="User already exists!";
        }
        else
        {
            $sqlInsert="insert into admin(a_name,a_pass) 
            values('$username','$passwordToDb');";
            mysqli_query($conn, $sqlInsert);
            header("Location: index.php");
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>
</head>
<body>
<div id="admin-create">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
				<tr>
					<td><label>Username</label></td>
                    <td><input type="text" name="username" value="<?php echo "$username"; ?>">
                    <span style="color:red;"><?php echo $usernameErr; ?></span></td></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="password"></td>
                </tr>
                <tr>
					<td><label>Confirm Password</label></td>
					<td><input type="password" name="confirmPassword">
					<span style="color:red;"><?php echo "$passwordErr"; ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="register" value="Register"></td>
				</tr>
			</table>
        </form>
    </div>
</body>
</html>