<?php
    include('../includes/db_connect.inc.php');
    $d = $_POST["did"];

    $q =  "SELECT * FROM `docreq` WHERE d_id= '$d'";
    $res = mysqli_query($conn, $q);

while ($rows = mysqli_fetch_array($res)) {

?>
    <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label>Doctor username</label>
            <input type="text" class="form-control" name="d_name" readonly value="<?php echo $rows['d_name']; ?>">
            <input type="text" class="form-control" name="d_pass" readonly value="<?php echo $rows['d_pass']; ?>">

        </div>
        <div class="form-group">
            <label>Doctor Firstname</label>
            <input type="text" class="form-control" name="d_fname" readonly value="<?php echo $rows['d_fname']; ?>">

        </div>
        <div class="form-group">
            <label>Doctor Lastname</label>
            <input type="text" class="form-control" name="d_lname" readonly value="<?php echo $rows['d_lname']; ?>">

        </div>
        <div class="form-group">
            <label>Doctor DOB</label>
            <input type="text" class="form-control" name="d_dob" readonly value="<?php echo $rows['d_dob']; ?>">

        </div>
        <div class="form-group">
            <label>Doctor BG</label>
            <input type="text" class="form-control" name="d_bgroup" readonly value="<?php echo $rows['d_bgroup']; ?>">

        </div>
        <div class="form-group">
            <label>Doctor Email</label>
            <input type="text" class="form-control" name="d_email" readonly value="<?php echo $rows['d_email']; ?>">

        </div>
        <div class="form-group">
            <label>Doctor Phone</label>
            <input type="text" class="form-control" name="d_phone" readonly value="<?php echo $rows['d_phone']; ?>">

        </div>
   
    
    <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float:left;">Close</button>
            <button type="submit" class="btn btn-primary" name="acceptbtn">Accept</button>
            <button type="submit" class="btn btn-primary" name="rejectbtn">Reject</button>
     </div>
    </form>




<?php
}


if (isset($_POST['acceptbtn'])) {

    $d_name = $_POST['d_name'];
    $d_pass = $_POST['d_pass'];
    $d_fname = $_POST['d_fname'];
    $d_lname = $_POST['d_lname'];
    $d_dob = $_POST['d_dob'];
    $d_bg = $_POST['d_bgroup'];
    $d_email = $_POST['d_email'];
    $d_phone = $_POST['d_phone'];

    // $query = "INSERT INTO `doctor`( `d_name`, `d_pass`, `d_fname`, `d_lname`, `d_dob`, `d_bgroup`, `d_email`, `d_phone`) VALUES ();";
    $query = "INSERT INTO doctor VALUES (null,'$d_name','$d_pass','$d_fname','$d_lname','$d_dob','$d_bg','$d_email','$d_phone',null,null,null,null,null,null);";
    $query_run1 = mysqli_query($conn, $query);
    echo "$query_run1";
    if ($query_run1) {
        echo '<script type=text/javaScript> alert("Data Updated") </script>';
        header('Location:  doctorRequest.php');
    } else {
        echo '<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
        // header('Location:  doctorRequest.php');
    }
}


?>