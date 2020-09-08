<?php

require "includes/db_connect.inc.php";

session_start();

$accountType="";
$username=$password=$cPassword=$fname=$lname=$dob=$bGroup=$email=$pNumber="";
$usernameErr=$passwordErr=$cPasswordErr=$fnameErr=$lnameErr=$dobErr=$bGroupErr=$emailErr=$pNumberErr="";
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

    if(empty($_POST['cPassword']))
	{
      $cPasswordErr = "Password cannot be empty!";
    }
	else
	{
      $cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
    }
    
    if(empty($_POST['fname']))
	{
      $fnameErr = "First Name cannot be empty!";
	}
	else
	{
      $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    }

    if(empty($_POST['lname']))
	{
      $lnameErr = "Last Name cannot be empty!";
	}
	else
	{
      $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    }

    if(empty($_POST['dob']))
	{
      $dobErr = "Date of Birth cannot be empty!";
	}
	else
	{
      $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    }

    if(empty($_POST['bGroup']))
	{
      $bGroupErr = "Blood group cannot be empty!";
	}
	else
	{
      $bGroup = mysqli_real_escape_string($conn, $_POST['bGroup']);
    }

    if(empty($_POST['email']))
	{
      $emailErr = "Email cannot be empty!";
	}
	else
	{
      $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if(empty($_POST['pNumber']))
	{
      $pNumberErr = "Email cannot be empty!";
	}
	else
	{
      $pNumber = mysqli_real_escape_string($conn, $_POST['pNumber']);
    }

    if($password!=$cPassword)
      {
        $cPasswordErr = "Password do not matched!";
      }

	if(!empty($username) && !empty($password) && !empty($cPassword))
	{
		if($accountType=="doctor")
		{
			
		}
		else if($accountType=="patient")
		{
			
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
    <title>Sign up</title>
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
        <h1 class="text-black text-center">Signup</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype = "multipart/form-data">
        	<div class="col-lg-8 m-auto d-block">
				<div class="form-group">
					<label >Type</label>
						<select class="form-control" name="accountType">
							<option value="doctor" <?php if($accountType == "doctor") echo "selected"; ?>>Doctor</option>
							<option value="patient" <?php if($accountType == "patient") echo "selected"; ?>>Patient</option>
					    </select>
				</div>
            	<div class="form-group">
                	<label for="user" >Username</label>
               		<input type="text" name="username"  value="<?php echo $username; ?>" id="user" class="form-control">
                	<span style="color:red;"><?php echo $usernameErr; ?></span></td>
            	</div>
            	<div class="form-group">
               		<label for="password" >Password</label>
					<input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
					<span style="color:red;"><?php echo "$passwordErr"; ?></span></td>
                </div>
                <div class="form-group">
               		<label for="password" >Confirm Password</label>
					<input type="password" name="cPassword" class="form-control" value="">
					<span style="color:red;"><?php echo "$cPasswordErr"; ?></span></td>
                </div>
                <div class="form-group">
                	<label for="user" >First Name</label>
               		<input type="text" name="fname"  value="<?php echo $fname; ?>" class="form-control">
                	<span style="color:red;"><?php echo $fnameErr; ?></span></td>
                </div>
                <div class="form-group">
                	<label for="user" >Last Name</label>
               		<input type="text" name="lname"  value="<?php echo $lname; ?>" class="form-control">
                	<span style="color:red;"><?php echo $lnameErr; ?></span></td>
                </div>
                <div class="form-group">
                	<label for="user" >Date of birth</label>
               		<input type="date" name="dob"  value="<?php echo $dob; ?>" class="form-control">
                </div>
                <div>
                    <label >Blood Group</label>
                    <select class="form-control" name="bGroup">
						<option value="a+" <?php if($bGroup == "a+") echo "selected"; ?>>A+</option>
                        <option value="a-" <?php if($bGroup == "a-") echo "selected"; ?>>A-</option>
                        <option value="b+" <?php if($bGroup == "b+") echo "selected"; ?>>B+</option>
                        <option value="b-" <?php if($bGroup == "b-") echo "selected"; ?>>B-</option>
                        <option value="ab+" <?php if($bGroup == "ab+") echo "selected"; ?>>AB+</option>
                        <option value="ab-" <?php if($bGroup == "ab-") echo "selected"; ?>>AB-</option>
                        <option value="o+" <?php if($bGroup == "o+") echo "selected"; ?>>O+</option>
						<option value="o-" <?php if($bGroup == "o-") echo "selected"; ?>>O-</option>
                    </select>
                    <br>
                </div>
                <div class="form-group">
                	<label for="user" >Email</label>
               		<input type="email" name="email"  value="<?php echo $email; ?>" class="form-control">
                </div>
                <div class="form-group">
                	<label for="user" >Phone Number</label>
               		<input type="tel" name="pNumber"  value="<?php echo $pNumber; ?>" class="form-control">
                </div>
                <input type="submit" name="submit" value="Signup" class="btn btn-success">
                <br>
				<div class="form-group">
				Already have an account?
				<a href="login.php">Click here</a>  
             	</div>
			</div>
        </form>
    </div>
</body>
</html>