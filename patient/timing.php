<?php


include('../includes/db_connect.inc.php');

$d_id = $_POST['d_id'];
$app_date = $_POST['datapost'];

$q =  "SELECT * FROM `appointment` WHERE d_id= '$d_id' AND app_date= '$app_date' AND isTaken='0';";
$res = mysqli_query($conn , $q);

while($rows = mysqli_fetch_array($res)){
    ?>

<option value="<?php echo $rows['app_time']; ?>"><?php echo $rows['app_time']; ?></option>

<?php
}









?>