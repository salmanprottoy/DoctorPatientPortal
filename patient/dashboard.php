<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('navbar.php');
include ('sidebar.php');

$tDoctor=$tPatient=$tDonor="";
$query = "SELECT * from doctor;";
$query_run=mysqli_query($conn, $query);
$rows_count_value = mysqli_num_rows($query_run);
$tDoctor=$rows_count_value;


$query = "SELECT * from patient;";
$query_run=mysqli_query($conn, $query);
$rows_count_value = mysqli_num_rows($query_run);
$tPatient=$rows_count_value;

$query = "SELECT * from donor;";
$query_run=mysqli_query($conn, $query);
$rows_count_value = mysqli_num_rows($query_run);
$tDonor=$rows_count_value;


?>

<div class="row text-center mx-5">
    <div class="col-sm-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width:18rem;">
            <div class="card-header">Total Doctor</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo "$tDoctor"; ?></h4>
            <a class="btn text-white" href="#">View</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mt-5">
        <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
            <div class="card-header">Total Patient</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo "$tPatient"; ?></h4>
            <a class="btn text-white" href="#">View</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mt-5">
        <div class="card text-white bg-info mb-3" style="max-width:18rem;">
            <div class="card-header">Total Donor</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo "$tDonor"; ?></h4>
            <a class="btn text-white" href="#">View</a>
            </div>
        </div>
    </div>
</div>

<?php
include ('../includes/footer.php');
?>