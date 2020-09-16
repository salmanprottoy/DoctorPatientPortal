<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('navbar.php');



if(!isset(	$_SESSION['user_name'])){
    header("../login.php");
}
$username=$password=$cPassword=$nPassword=$fname=$lname=$dob=$bGroup=$email=$pNumber=$pPic="";
$passwordErr=$cPasswordErr=$nPasswordErr="";
$file =  $files = $filename =$filetmp=$fileext=$filecheck=$fileextstored=$destinationfile=$fileError=$fileerror= "";
$hashPass="";
$error=0;
$user = $_SESSION['user_name'];
$res = mysqli_query($conn,"SELECT * FROM `doctor` WHERE `d_name` = '$user';" );
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$username=$userRow['d_name'];
$dbPassword=$userRow['d_pass'];
$fname=$userRow['d_fname'];
$lname=$userRow['d_lname'];
$dob=$userRow['d_dob'];
$bGroup=$userRow['d_bgroup'];
$email=$userRow['d_email'];
$pNumber=$userRow['d_phone'];
$dept = $userRow['d_department'];
$qualification = $userRow['d_qualification'];
$inst = $userRow['d_institution'];
// $visitstart = $userRow['d_visitstart'];
$visitstart = time("h:i A", strtotime($userRow['d_visitstart']));

$visitend = $userRow['d_visitend'];
$pPic = $userRow['d_image'];

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

if(isset($_POST['passUpdate']))
{
    if($error==0)
    {
        $query="UPDATE `doctor` SET `d_pass`='$hashPass' WHERE `d_name` = '$user';";
        $query_run=mysqli_query($conn, $query);
        if($query_run)
        {
            echo'<script type=text/javaScript> alert("Password Updated") </script>';
            header('Location: '.$_SERVER['PHP_SELF']); 
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


// -------------------------imgUodate----------------------------------//
if(isset($_POST['imgUpdate']))
{
    if(!empty($_FILES['file']['name']))
    {
          
        $file = $_FILES['file'];
        $filename = $file['name'];
        
        $fileerror = $file['error'];
        $filetmp = $file['tmp_name'];

        $fileext = explode('.' , $filename);
        $filecheck = strtolower(end($fileext));

        $fileextstored = array('png' , 'jpg' , 'jpeg');
        if(in_array($filecheck , $fileextstored))
            {
                // echo "file inserted";
                $new_name = rand() . "." . $filecheck;
                $destinationfile = '../images/'.$new_name;
                move_uploaded_file($filetmp , $destinationfile);
                $query = "UPDATE `doctor` SET `d_image`='$destinationfile' WHERE `d_name` = '$user';";
                                    $query_run=mysqli_query($conn, $query);
                                    if($query_run)
                                    {
                                        echo'<script type=text/javaScript> alert("Data Updated") </script>';
                                        header('Location: '.$_SERVER['PHP_SELF']); 
                                    }
                                    else
                                    {
                                        echo'<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
                                    }

            }
            else
            {
                // echo "select an IMAGE";
                echo'<script type=text/javaScript> alert("select an IMAGE") </script>';
            }   
       
    }

    else
    {
        // $fileError = "Nothing is selected in imgae";
        echo'<script type=text/javaScript> alert("Nothing is selected in imgae") </script>';
    }
}

// ----------------------------------------infoUpdate----------------------------------------//
if(isset($_POST['infoUpdate']))
{
    

    $query = "UPDATE `doctor` SET `d_fname`='$_POST[fname]',`d_lname`='$_POST[lname]',`d_dob`='$_POST[dob]',`d_bgroup`='$_POST[bGroup]',`d_email`='$_POST[email]',`d_phone`='$_POST[pNumber]' ,`d_department`='$_POST[dept]',`d_qualification`='$_POST[qualification]',`d_institution`='$_POST[inst]',`d_visitstart`='$_POST[visitstart]',`d_visitend`='$_POST[visitend]' WHERE `d_name` = '$user';";
    
    $query_run=mysqli_query($conn, $query);
    if($query_run)
    {
        echo'<script type=text/javaScript> alert("Data Updated") </script>';
        header('Location: '.$_SERVER['PHP_SELF']); 
    }
    else
    {
        echo'<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
    }
}
include ('sidebar.php');
?>

<div class="patientprofile">
                <div class="row">
                    <div class="col-md-4 box">
                        <div class="well">
                            <img src="<?php echo $userRow['d_image']; ?> " class="doc-img">
                            <div class="btn-group">
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editimage"><i class="fa fa-picture-o"></i></button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editpass"><i class="fa fa-key"></i></button>
                            </div>
                            <h3><?php echo $userRow['d_name']; ?></h3>
                            <p></p>
                        </div>
                    </div>
                
               
                    <div class="col-md-8 box">
                    <h1 class="text-white bg-dark text-center">
            Personal Information

        </h1>
                        <table class="table">
                            
                            <tbody>
                                <tr>
                                
                                    <td class="tdattribute">First Name</td>
                                    <td>:</td>
                                    <td><?php echo $userRow['d_fname']; ?></td>
                               
                                </tr>
                                <tr>
                                
                                    <td class="tdattribute">Last Name</td>
                                    <td>:</td>
                                    <td><?php echo $userRow['d_lname']; ?></td>
                               
                                </tr>
                                
                                <tr>
                                
                                    <td class="tdattribute">Date of Birth</td>
                                    <td>:</td>
                                    <td><?php echo $userRow['d_dob']; ?></td>
                               
                                </tr>
                                <tr>
                                
                                    <td class="tdattribute">Blood Group</td>
                                    <td>:</td>
                                    <td><?php echo strtoupper($userRow['d_bgroup']); ?></td>
                               
                                </tr>
                                <tr>
                                
                                    <td class="tdattribute">Email</td>
                                    <td>:</td>
                                    <td><?php echo $userRow['d_email']; ?></td>
                               
                                </tr>
                                
                                <tr>
                                
                                    <td class="tdattribute">Phone Number</td>
                                    <td>:</td>
                                    <td><?php echo $userRow['d_phone']; ?></td>
                               
                                </tr>
                                <tr>
                                
                                <td class="tdattribute">Department</td>
                                <td>:</td>
                                <td><?php echo $userRow['d_department']; ?></td>
                           
                            </tr>
                            <tr>
                                
                                <td class="tdattribute">Qualification</td>
                                <td>:</td>
                                <td><?php echo $userRow['d_qualification']; ?></td>
                           
                            </tr>
                            <tr>
                                
                                <td class="tdattribute">Institution</td>
                                <td>:</td>
                                <td><?php echo $userRow['d_institution']; ?></td>
                           
                            </tr>
                            <tr>
                                
                                <td class="tdattribute">Visiting Hour Start</td>
                                <td>:</td>
                                <td><?php echo $userRow['d_visitstart']; ?></td>
                           
                            </tr>
                            <tr>
                                
                                <td class="tdattribute">Visiting Hour End</td>
                                <td>:</td>
                                <td><?php echo $userRow['d_visitend']; ?></td>
                           
                            </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"><i class="fa fa-pencil-square-o"></i></button>
                    </div>
                </div>
<!-- ---------------------------------------editimage------------------------------------------------- -->
                <div class="modal fadeInDown" id="editimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype = "multipart/form-data"> 
                                <div class="form-group ">
                                    <!-- <img src="../images/placeholder.png" onclick="triggerClick()" id="profileDisplay"><br> -->
                                    <label for="file" >Image</label>
                                    <input type="file" name="file" id="file"  value="<?php echo $file;?>" class="form-control">
                                    <!-- <div class="alert alert-warning alert-dismissable fade show" >
                                        <strong><i class="fa fa-warning"></i><?php echo $fileError; ?></strong>
                                        <button class="close" type="button" data-dismiss="alert"> &times; </button>
                                    </div> -->
                                </div>

                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                    <input type="submit" class="btn btn-primary" name="imgUpdate" value="Update"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!-- -----------------------------editpass--------------------------------------------------- -->
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
<!-- Editmodal-------------------------------------------------------------------------------- -->
                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>">
                            </div>
                            <div class="form-group">
                                <label>Blood Group</label>
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
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="pNumber" value="<?php echo $pNumber; ?>">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" class="form-control" name="dept" value="<?php echo $dept; ?>">
                            </div>
                            <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" class="form-control" name="qualification" value="<?php echo $qualification; ?>">
                            </div>
                            <div class="form-group">
                                <label>Institution</label>
                                <input type="text" class="form-control" name="inst" value="<?php echo $inst; ?>">
                            </div> 
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Visiting Hour Start</label>
                                        <input type="time" class="form-control" name="visitstart" value="<?php echo $visitstart; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Visiting Hour End</label>
                                        <input type="time" class="form-control" name="visitend" value="<?php echo $visitend; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clockpicker">
                                <input type="text" class="form-control" value="">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="infoUpdate" value="Update">
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            </div>
    </div>
    <script type="text/javascript">
        $('.clockpicker').clockpicker({
            placement: 'top',
            align: 'left',
            donetext: 'Done'
        });
    </script>

     
</body>
</html>