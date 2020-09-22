<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');

$app_date = $visitstart = $totalpatient = $d_id = $d_name = $d_inst = "";

$user = $_SESSION['user_name'];
$res = mysqli_query($conn, "SELECT * FROM `doctor` WHERE `d_name` = '$user';");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$d_id = $userRow['d_id'];
$d_inst = $userRow['d_institution'];

if (isset($_POST['createappointment'])) {
    $d_name = $_POST['d_name'];
    $app_date = $_POST['app_date'];
    $visitstart = $_POST['d_visitstart'];
    $totalpatient = $_POST['totalpatient'];
    if (!empty($app_date) && !empty($visitstart) && !empty($totalpatient)) {
        for ($i = 0; $i < $totalpatient; $i++) {
            $visitstart = date('h:i', strtotime("+20 minutes", strtotime($visitstart)));
            $query = "INSERT INTO `appointment`( `d_id`, `d_name`, `app_time`, `app_hospital`,  `app_date`, `isTaken`) VALUES ('$d_id','$d_name','$visitstart','$d_inst','$app_date','0')";
            $query_run = mysqli_query($conn, $query);


            
        }
        if ($query_run) {
            echo '<script type=text/javaScript> alert("Appointment created") ; </script>';
        } else {
            echo '<script type=text/javaScript> alert("Something wrong appointment not updated!") </script>';
        }
    }
}







include('sidebar.php');
?>

<div class="patientprofile">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createapp" style="float:right;"><i class="fa fa-picture-o"></i></button>
    <div class="row">
        <div class="col-md-4 box">

        </div>
    </div>


    <div class="modal fade" id="createapp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label>Doctor Name</label>
                            <input type="text" class="form-control" readonly name="d_name" value="<?php echo $userRow['d_fname']; ?> <?php echo $userRow['d_lname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="app_date">
                        </div>
                        <div class="form-group">
                            <label>Visiting Hour start:</label>
                            <input type="time" class="form-control" name="d_visitstart">
                        </div>
                        <div class="form-group">
                            <label>Total Number of patient you want to see</label>
                            <input type="number" class="form-control" name="totalpatient">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="createappointment">Create Appointment</button>
                </div>
                </form>
            </div>
        </div>
    </div>