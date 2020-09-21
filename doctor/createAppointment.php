<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');



include('sidebar.php');
?>
<div class="patientprofile">
    <div class="row">
        <div class="col-md-4 box">
            <div class="well">
                <img src="<?php echo $userRow['d_image']; ?> " class="doc-img">
                <div class="btn-group">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editimage"><i class="fa fa-picture-o"></i></button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editpass"><i class="fa fa-key"></i></button>
                </div>
                <h3><?php echo $userRow['d_name']; ?></h3>
                <p></p>
            </div>
        </div>
