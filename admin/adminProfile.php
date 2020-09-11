<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('navbar.php');
include ('sidebar.php');


if(!isset(	$_SESSION['user_name'])){
    header("../login.php");
}
$username=$password=$cPassword=$nPassword=$fname=$lname=$dob=$bGroup=$email=$pNumber="";
$passwordErr=$cPasswordErr=$nPasswordErr="";
$hashPass="";
$error=0;
$user = $_SESSION['user_name'];
$res = mysqli_query($conn,"SELECT * FROM `admin` WHERE `a_name` = '$user';" );
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$username=$userRow['a_name'];
$dbPassword=$userRow['a_pass'];


    if(empty($_POST['password']))
	{
      $passwordErr = "Password cannot be empty!";
      $error=1;
	}
	else
	{
      $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if(empty($_POST['cPassword']))
	{
      $cPasswordErr = "Password cannot be empty!";
      $error=1;
    }
	else
	{
      $cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
    }
    if(empty($_POST['nPassword']))
	{
      $nPasswordErr = "Password cannot be empty!";
      $error=1;
    }
	else
	{
      $nPassword = mysqli_real_escape_string($conn, $_POST['nPassword']);
    }

    if($cPassword==$nPassword)
    {
        if(password_verify($password, $dbPassword))
        {
            $hashPass=password_hash($cPassword, PASSWORD_DEFAULT);
        }
        else
        {
            $error=1;
        }
    }
    else
    {
        $error=1;
    }



if(isset($_POST['imgUpdate']))
{

}
if(isset($_POST['passUpdate']))
{
    if($error==0)
    {
        $query="UPDATE `patient` SET `p_pass`='$hashPass' WHERE `p_name` = '$user';";
        $query_run=mysqli_query($conn, $query);
        if($query_run)
        {
            echo'<script type=text/javaScript> alert("Password Updated") </script>';
        }
        else
        {
            echo'<script type=text/javaScript> alert("Something wrong Password not updated!") </script>';
        }
    }

    else
    {
        echo'<script type=text/javaScript> alert("Something wrong Password not updated!") </script>';
    }
}
if(isset($_POST['infoUpdate']))
{

    $query = "UPDATE `patient` SET `p_fname`='$_POST[fname]',`p_lname`='$_POST[lname]',`p_dob`='$_POST[dob]',`p_bgroup`='$_POST[bGroup]',`p_email`='$_POST[email]',`p_phone`='$_POST[pNumber]' WHERE `p_name` = '$user';";
    $query_run=mysqli_query($conn, $query);
    if($query_run)
    {
        echo'<script type=text/javaScript> alert("Data Updated") </script>';
    }
    else
    {
        echo'<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
    }
}

?>

<div class="patientprofile">
                <div class="row">
                    <div class="col-md-4 box">
                        <div class="well">
                            <img src="../images/ronaldo.jpg" class="doc-img">
                            <div class="btn-group">
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editimage"><i class="fa fa-picture-o"></i></button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editpass"><i class="fa fa-key"></i></button>
                            </div>
                            <h3><?php echo $userRow['a_name']; ?></h3>
                            <p></p>
                        </div>
                    </div>
                
               
                    <div class="col-md-8 box">
                        <h1>Personal Information</h1>
                        <table class="table">
                            
                            <tbody>
                                <tr>
                                
                                    <td>Username</td>
                                    <td><?php echo $userRow['a_name']; ?></td>
                               
                                </tr>
                                <tr>
                                
                                    <td>Hashed Password</td>
                                    <td><?php echo $userRow['a_pass']; ?></td>
                               
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="editimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Picture</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>

                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="imgUpdate">Upload</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>

                <div class="modal fade" id="editpass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input type="password" class="form-control" name="password" >  
                        </div>
                        <div class="form-group">
                            <label for="nPassword">New Password</label>
                            <input type="password" class="form-control" name="nPassword" >
                        </div>
                        <div class="form-group">
                            <label for="cPassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cPassword">
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="passUpdate">Update</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>

 <?php include ('../includes/footer.php');  ?>