<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');
include('sidebar.php');


$query = "SELECT * FROM `doctor`;";
$res = mysqli_query($conn, $query);

?>
<div class="doctors">
    <h2 align=center>Doctor list</h2>
    <table border="1" cellspacing="5" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Doctor Name</th>
                <th>Department Name</th>
                <th>Appointment time</th>
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
                <td><label><?php echo $row['d_id']; ?></label></td>
                <td><label><?php echo $row['d_name']; ?></label></td>
                <td><label><?php echo $row['d_department']; ?></label></td>
                <td><label><?php echo $row['visiting_time']; ?></label></td>
                <td><label><?php echo $row['d_hospital']; ?></label></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include('../includes/header.php');
?>