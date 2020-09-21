<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');


if (!isset($_SESSION['user_name'])) {
    header("../login.php");
}

$user = $_SESSION['user_name'];
$res = mysqli_query($conn, "SELECT * FROM `patient` WHERE `p_name` = '$user';");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM `doctor` WHERE `d_id` = '$id'";
    $query_run = mysqli_query($conn, $query);
    $rows = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
}

// $doc_name = $doc_inst = $p_name = $p_bg = $p_phn = $p_problem = $app_date = $msg ="";
// $q = "SELECT TOP 1 * FROM `appointment` WHERE `app_date` = '$strdate' ORDER BY `app_serial` DESC;";

// $q_run = mysqli_query($conn, $query);
// $rows = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
// if ($query_run) {
//     $serial = (int)$rows['app_serial'] + 1;
//     $time = $rows['app_time'];
//     $next_time = strtotime("+20 minutes", strtotime($time));
// } else {
//     $serial = "1";
//     $next_time = $_POST['d_visitstart'];
// }


// if(isset($_POST['displaybtn'])){









// $doc_name = $_POST['doc_name'];
// $doc_inst = $_POST['doc_inst'];
// $p_name = $_POST['p_name'];
// $p_bg = $_POST['p_bg'];
// $p_phn = $_POST['p_phn'];
// $p_problem = $_POST['p_problem'];
// if(empty($_POST['app_date'])){
// $msg = "Select a date";
// }else{
//     $app_date = $_POST['app_date'];
// }

// if(!empty($_POST['app_date'])){
//     $query = "INSERT INTO `appointment`( `d_name`, `app_time`, `app_hospital`, `p_name`, `p_bg`, `p_phn`,`app_serial`,`app_date`) VALUES ('$doc_name','$doc_inst','$p_name','$','$bgroup','$organ');";

//     $query_run = mysqli_query($conn, $query);


//     if ($query_run) {
//         echo '<script type=text/javaScript> alert("Data Updated") ; </script>';


//         header('Location: ' . $_SERVER['PHP_SELF']);
//     } else {
//         echo '<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
//     }
// }



//}
include('sidebar.php');
?>

<div class="patientprofile">
    <h1 class="text-white bg-dark text-center">
        Appointment Booking
    </h1>
    <div id="div1">
        <h2>Let jQuery AJAX Change This Text</h2>
    </div>

    <button id="btn">Get External Content</button>
    <div class="d-flex justify-content-center align-items-center container ">
        <div class="col-md-6 donor">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


                <div class="form-group">
                    <label>Doctor Name</label>
                    <input type="text" class="form-control" name="doc_name" value="<?php echo $rows['d_fname']; ?> <?php echo $rows['d_lname']; ?>" readonly>
                    <input type="hidden" class="form-control" name="d_visitstart" value="<?php echo $rows['d_visitstart']; ?> <?php echo $rows['d_visitend']; ?>">


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
                <div class="form-group">
                    <label>Problem Explanation(optional)</label><br>
                    <textarea name="p_problem" id="" cols="80" rows="5"></textarea>
                </div>

                <input type="number" class="form-control" name="mobile" readonly value="<?php echo $serial; ?>">
                <input type="time" class="form-control" name="mobile" readonly value="<?php echo $next_time; ?>">
                <div class="form-group">
                    <label>Appointment Date</label>
                    <input type="date" class="form-control" name="app_date">
                    <span class="error"><?php echo $msg; ?></span>
                </div>

                <!-- <button id="btn">Get External Content</button>
                <div id="approx_div">
                    adgdghgfhkgjkj
                </div> -->


                <input type="submit" class="btn btn-primary" name="donorreg" value="Register">
                </from>
        </div>
    </div>
</div>
</div>

<script>
    // $(document).ready(function(){
    //     $('#displaybtn').click(function(e){
    //         e.preventDefault();
    //         $.ajax({
    //             method: "POST",
    //             url: "fetchtime.php",
    //             data: $('#approx_div').serialize(),
    //             dataType: "html",
    //             success: function(response){

    //             }
    //         });
    //     });
    // });

    // $(document).ready(function() {
    //     $("#btn").click(function() {
    //         $.ajax({
    //             url: "fetchtime.php",
    //             success: function(result) {
    //                 $("#approx_div").html(result);
    //             }
    //         });
    //     });
    // });
    $(document).ready(function() {
        $(".patientprofile  #btn").click(function() {
            $.ajax({
                url: "fetchtime.php",
                success: function(result) {
                    $(".patientprofile  #div1").html(result);
                }
            });
        });
    });
</script>
</body>

</html>