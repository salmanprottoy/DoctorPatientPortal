<?php

require "includes/db_connect.inc.php";

session_start();

$accountType="";
$username=$password=$cPassword=$fname=$lname=$dob=$bGroup=$email=$pNumber="";
$usernameErr=$passwordErr=$cPasswordErr=$fnameErr=$lnameErr=$dobErr=$bGroupErr=$emailErr=$pNumberErr="";
$uPassInDB="";
$errExits=0;
$regSuccessful="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $accountType= mysqli_real_escape_string($conn, $_POST['accountType']);
    
	if(empty($_POST['username']))
	{
	  $usernameErr = "Username cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $username = mysqli_real_escape_string($conn, $_POST['username']);
    }

	if(empty($_POST['password']))
	{
	  $passwordErr = "Password cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if(empty($_POST['cPassword']))
	{
	  $cPasswordErr = "Password cannot be empty!";
	  $errExits=1;
    }
	else
	{
      $cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
    }
    
    if(empty($_POST['fname']))
	{
	  $fnameErr = "First Name cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    }

    if(empty($_POST['lname']))
	{
	  $lnameErr = "Last Name cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    }

    if(empty($_POST['dob']))
	{
	  $dobErr = "Date of Birth cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    }

    if(empty($_POST['bGroup']))
	{
	  $bGroupErr = "Blood group cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $bGroup = mysqli_real_escape_string($conn, $_POST['bGroup']);
    }

    if(empty($_POST['email']))
	{
	  $emailErr = "Email cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if(empty($_POST['pNumber']))
	{
	  $pNumberErr = "Email cannot be empty!";
	  $errExits=1;
	}
	else
	{
      $pNumber = mysqli_real_escape_string($conn, $_POST['pNumber']);
    }

    if($password!=$cPassword)
      {
		$cPasswordErr = "Password do not matched!";
		$errExits=1;
	  }
	  
	  $uPassInDB=password_hash($password, PASSWORD_DEFAULT);

	if($errExits!=1)
	{
		if($accountType=="doctor")
		{
			$sqlUsers = "select d_id from docreq where d_name = '$userName'";
      		$results = mysqli_query($conn, $sqlUsers);

			  $rowCount = mysqli_num_rows($results);
			  if($rowCount > 0)
			  {
				$usernameErr = "User already exists!";
			  }
			  else
			  {
				  $sqlInsert = "insert into docreq (d_name, d_pass, d_fname, d_lname, d_dob, d_bgroup, d_email, d_phone)
				  values('$username', '$uPassInDB','$fname','$lname', '$dob', '$bGroup', '$email', '$pNumber');";

				  mysqli_query($conn, $sqlInsert);
				  $regSuccessful = "Registration  successful";
				  header("Location: ./login.php");
			  }
		}
		else if($accountType=="patient")
		{
			$sqlUsers = "select p_id from patient where p_name = '$userName'";
      		$results = mysqli_query($conn, $sqlUsers);

			  $rowCount = mysqli_num_rows($results);
			  if($rowCount > 0)
			  {
				$usernameErr = "User already exists!";
			  }
			  else
			  {
				  $sqlInsert = "insert into patient (p_name, p_pass, p_fname, p_lname, p_dob, p_bgroup, p_email, p_phone)
				  values('$username', '$uPassInDB','$fname','$lname', '$dob', '$bGroup', '$email', '$pNumber');";

				  mysqli_query($conn, $sqlInsert);
				  $regSuccessful = "Registration was successful";
				  header("Location: ./login.php");
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
	   	<h3 style="color:green;"><?php echo $regSuccessful; ?></h3>
        <h1 class="text-black text-center">Signup</h1>
		<form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype = "multipart/form-data">
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
		<script>
		var signupForm = document.forms.myForm;
		signupForm.onsubmit = function(){
			var userName = signupForm.username.value;
			var password = signupForm.password.value;
			var cPassword = signupForm.cPassword.value;
			var fname = signupForm.fname.value;
			var lname = signupForm.lname.value;
			var dob = signupForm.dob.value;
			var bGroup = signupForm.bGroup.value;
			var email = signupForm.email.value;
			var pNumber = signupForm.pNumber.value;
			if(userName=="")
			{
				alert("Username must be filled out!");
				return false;
			}
			if(password=="")
			{
				alert("Password must be filled out!");
				return false;
			}
			if(cPassword=="")
			{
				alert("Password must be filled out!");
				return false;
			}
			if(fname=="")
			{
				alert("First Name must be filled out!");
				return false;
			}
			if(lname=="")
			{
				alert("Last Name must be filled out!");
				return false;
			}
			if(dob=="")
			{
				alert("Date of birth must be filled out!");
				return false;
			}
			if(bGroup=="")
			{
				alert("Blood group must be filled out!");
				return false;
			}
			if(email=="")
			{
				alert("Email must be filled out!");
				return false;
			}
			if(pNumber=="")
			{
				alert("Phone number must be filled out!");
				return false;
			}
		}
		</script>
    </div>
</body>
</html>