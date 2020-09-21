<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');
include('sidebar.php');


$query = "SELECT * FROM `patient`;";
$res = mysqli_query($conn, $query);

?>
<div class="patients">
    <h2 align=center>Patient list</h2>
    <table border="1" cellspacing="5" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Patient Name</th>
                <th>Blood Group</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date of Birth</th>
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
                <td><label><?php echo $row['p_id']; ?></label></td>
                <td><label><?php echo $row['p_name']; ?></label></td>
                <td><label><?php echo $row['p_bgroup']; ?></label></td>
                <td><label><?php echo $row['p_email']; ?></label></td>
                <td><label><?php echo $row['p_phone']; ?></label></td>
                <td><label><?php echo $row['p_dob']; ?></label></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include('../includes/header.php');
?>