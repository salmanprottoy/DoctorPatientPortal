<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');


if (!isset($_SESSION['user_name'])) {
    header("../login.php");
}

$msg = $organ = "";
$user = $_SESSION['user_name'];
$res = mysqli_query($conn, "SELECT * FROM `patient` WHERE `p_name` = '$user';");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);




if (isset($_POST['donorreg'])) {
    $uname = $_POST['uname'];
    $name = $_POST['fname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $bgroup = $_POST['bGroup'];
    
    if (empty($_POST["organ"])) {
        $msg = "select an Organ";
    } else {
        $organ = $_POST['organ'];
    }

    if (!empty($_POST['organ'])) {
        // $query = "UPDATE `patient` SET `p_fname`='$_POST[fname]',`p_lname`='$_POST[lname]',`p_dob`='$_POST[dob]',`p_bgroup`='$_POST[bGroup]',`p_email`='$_POST[email]',`p_phone`='$_POST[pNumber]' WHERE `p_name` = '$user';";
        $query = "INSERT INTO `organ`( `p_name`, `o_name`, `o_phone`, `o_email`, `o_bgroup`, `o_organ`) VALUES ('$uname','$name','$mobile','$email','$bgroup','$organ');";

        $query_run = mysqli_query($conn, $query);


        if ($query_run) {
            echo '<script type=text/javaScript> alert("Data Updated") ; </script>';


            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            echo '<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
        }
    }
}

include('sidebar.php');
?>


<div class="patientprofile">
    <div class="d-flex justify-content-center align-items-center container ">
        <div class="col-md-8 donor">
            <h1 class="text-white bg-dark text-center">
                Donor registration

            </h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Donor User Name</label>
                    <input type="text" class="form-control" name="uname" readonly value="<?php echo $userRow['p_name']; ?>">

                </div>
                <div class="form-group">
                    <label>Donor Name</label>
                    <input type="text" class="form-control" name="fname" readonly value="<?php echo $userRow['p_fname']; ?> &nbsp; <?php echo $userRow['p_lname']; ?>">

                </div>
                <!-- <div class="form-group">
                    <label>Donor Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $userRow['Address']; ?>">
                </div> -->
                <div class="form-group">
                    <label>Donor Contact No</label>
                    <input type="number" class="form-control" name="mobile" readonly value="<?php echo $userRow['p_phone']; ?>">
                </div>
                <div class="form-group">
                    <label>Donor Email</label>
                    <input type="email" class="form-control" name="email" readonly value="<?php echo $userRow['p_email']; ?>">
                </div>
                <div class="form-group">
                    <label>Donor Blood group</label>
                    <select class="form-control" name="bGroup" readonly>
                        <option value="a+" <?php if ($userRow['p_bgroup'] == "a+") echo "selected"; ?>>A+</option>
                        <option value="a-" <?php if ($userRow['p_bgroup'] == "a-") echo "selected"; ?>>A-</option>
                        <option value="b+" <?php if ($userRow['p_bgroup'] == "b+") echo "selected"; ?>>B+</option>
                        <option value="b-" <?php if ($userRow['p_bgroup'] == "b-") echo "selected"; ?>>B-</option>
                        <option value="ab+" <?php if ($userRow['p_bgroup'] == "ab+") echo "selected"; ?>>AB+</option>
                        <option value="ab-" <?php if ($userRow['p_bgroup'] == "ab-") echo "selected"; ?>>AB-</option>
                        <option value="o+" <?php if ($userRow['p_bgroup'] == "o+") echo "selected"; ?>>O+</option>
                        <option value="o-" <?php if ($userRow['p_bgroup'] == "o-") echo "selected"; ?>>O-</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Donatable organ</label>
                    <select class="form-control" name="organ">
                        <option value="" disabled selected>Select Organ</option>
                        <option value="Eye" <?php if ($organ == "Eye") echo "selected"; ?>>Eye</option>
                        <option value="Knidney" <?php if ($organ == "Knidney") echo "selected"; ?>>Knidney</option>
                        <option value="Liver" <?php if ($organ == "Liver") echo "selected"; ?>>Liver</option>
                        <option value="Blood" <?php if ($organ == "Blood") echo "selected"; ?>>Blood</option>
                        <option value="Hand" <?php if ($organ == "Hand") echo "selected"; ?>>Hand</option>
                        <option value="Leg" <?php if ($organ == "Leg") echo "selected"; ?>>Leg</option>

                    </select>
                    <span class="error"><?php echo $msg; ?></span>
                </div>
                <input type="submit" class="btn btn-primary" name="donorreg" value="Register">
                </from>
        </div>
    </div>
</div>
</div>
</body>

</html>