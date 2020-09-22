<?php

session_start();
include('../includes/db_connect.inc.php');

$user = $_SESSION['user_name'];
$res = mysqli_query($conn, "SELECT * FROM `patient` WHERE `p_name` = '$user';");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$d_id = $_POST['d_id'];

$q =  "SELECT * FROM `doctor` WHERE d_id= '$d_id' ;";
$res = mysqli_query($conn , $q);

while($rows = mysqli_fetch_array($res)){
    ?>

<div class="form-group">
                            <label>Doctor Name</label>
                            <input type="text" class="form-control" name="doc_name" value="<?php echo $rows['d_fname']; ?> <?php echo $rows['d_lname']; ?>" readonly>
                            <input type="hidden" class="form-control" name="doc_name" id="d_id" value="<?php echo $rows['d_id']; ?>" readonly>



                        </div>
                        <div class="form-group">
                            <label>Doctor Institute</label>
                            <input type="text" class="form-control" name="doc_inst" readonly value="<?php echo $rows['d_institution']; ?>">

                        </div>
                        <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" class="form-control" name="p_name" readonly value="<?php echo $userRow['p_fname']; ?> <?php echo $userRow['p_lname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Patient Blood Group</label>
                            <input type="text" class="form-control" name="p_bg" readonly value="<?php echo $userRow['p_bgroup']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Patient Contact No</label>
                            <input type="number" class="form-control" name="p_phn" readonly value="<?php echo $userRow['p_phone']; ?>">
                        </div>
                       
<?php
}








?>