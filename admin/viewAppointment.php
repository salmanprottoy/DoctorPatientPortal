<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('navbar.php');
include ('sidebar.php');

if (!isset($_SESSION['user_name'])) {
    header("../login.php");
}
/* $user = $_SESSION['user_name'];
$result=mysqli_query($conn, "SELECT * FROM `patient` WHERE `p_name` = '$user';");
$userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);
$pname=$userRow['p_fname']; */

$res = mysqli_query($conn, "SELECT * FROM `appointment` WHERE `isTaken`=1  ORDER BY app_id ASC;");
//$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<div class="appHistory">
    <table border="1" cellspacing="5" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Appointment Time</th>
                <th>Appointment Date</th>
                <th>Hospital</th>
            </tr>
        </thead>
        <tbody>
        <?php
            /* require_once('connection.php');
            $result = $conn->prepare("SELECT * FROM user_registration ORDER BY user_id ASC"); */
            /* $res->execute(); */
            while($row = mysqli_fetch_assoc($res)){
        ?>
            <tr>
                <td><label><?php echo $row['app_id']; ?></label></td>
                <td><label><?php echo $row['p_name']; ?></label></td>
                <td><label><?php echo $row['d_name']; ?></label></td>
                <td><label><?php echo $row['app_time']; ?></label></td>
                <td><label><?php echo $row['app_date']; ?></label></td>
                <td><label><?php echo $row['app_hospital']; ?></label></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>