<?php

// session_start();
// include('../includes/db_connect.inc.php');

// $serial = $time = $next_time = "";
// $date = $_POST['appdate'];
// $strdate = strtotime($date);
// $query = "SELECT TOP 1 * FROM `appointment` WHERE `app_date` = '$strdate' ORDER BY `app_serial` DESC;";

// $query_run = mysqli_query($conn, $query);
// $rows = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
// if ($query_run) {
//     $serial = (int)$rows['app_serial'] + 1;
//     $time = $rows['app_time'];
//     $next_time = strtotime("+20 minutes", strtotime($time));
// } else {
//     $serial = "1";
//     $next_time = $_POST['d_visitstart'];
// }

// echo "<h3>Your approx. serial is ".$serial." & approx. time is ".date($next_time)."</h3> ";


echo "<h3>Hellooooooooo</h3>";

?>