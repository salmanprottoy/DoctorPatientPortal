<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('navbar.php');
include ('sidebar.php');


$query = "SELECT * FROM `patient`;";
$query_run = mysqli_query($conn , $query);

?>

<div class="doctorlist">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" id="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Patient</a></li>
    <li class="breadcrumb-item active" aria-current="page">Doctor List</li>
  </ol>
</nav>
<h1 class="text-white bg-dark text-center">
            Doctor List

        </h1>
    <div class="row ">
        
            <?php

                if($query_run)
                {
                    foreach($query_run as $rows)
                    {

               
            ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo $rows['p_pic'];?>" alt="Card image cap" style="width: 18rem; height: 9rem; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rows['p_fname']; ?> <?php echo $rows['p_lname']; ?></h5>
                        <p class="card-text"><?php echo $rows['p_email']; ?><br><?php echo $rows['p_email']; ?><br><?php echo $rows['p_email']; ?></p>
                    </div>
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul> -->
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Details</a>
                        <a href="#" class="btn btn-primary">Make Appointment</a>
                    </div>
                </div>
            </div>
            <?php

                    }
                }
                else
                {
                    echo "No records found";
                }            
            
            ?>
        </div>

    













<?php include ('../includes/footer.php'); ?>