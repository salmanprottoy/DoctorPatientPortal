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

        </h1><br>
        <div class="row">
        <div class="col-md-2">
        <div class="form-group">
					
						<select class="form-control" name="accountType">
                        <option value="" disabled selected>Select Department</option>
                                    <option value="a+" >A+</option>
                                    <option value="b+" >B+</option>
                                    <option value="ab+" >AB+</option>
                                    <option value="o+" >O+</option>
                                    <option value="o-" >O-</option>
					    </select>
				</div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
			
						<select class="form-control" name="accountType">
                        <option value="" disabled selected>Select Hospital</option>
                                    <option value="a+" >A+</option>
                                    <option value="b+" >B+</option>
                                    <option value="ab+" >AB+</option>
                                    <option value="o+" >O+</option>
                                    <option value="o-" >O-</option>
					    </select>
				</div>
                </div>
        <div class="col-md-3">

        <div class="md-form active-cyan active-cyan-2 mb-3">
            <input class="form-control" id="search" type="text" placeholder="Search by Doctor Name" aria-label="Search">
        </div>
     

        </div>
        <div class="col-md-1">
        <input type="submit" class="btn btn-primary" name="infoUpdate" value="Search"></button>

        </div>

        </div><br>
    <div class="row ">
        
            <?php

                if($query_run)
                {
                    foreach($query_run as $rows)
                    {

               
            ?>
            <div class="col-md-3">
                <div class="card" id="table_data" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo $rows['p_pic'];?>" alt="Card image cap" style="width: 18rem; height: 9rem; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rows['p_fname']; ?> <?php echo $rows['p_lname']; ?></h5>
                        <p class="card-text"><?php echo $rows['p_email']; ?><br><?php echo $rows['p_email']; ?><br><?php echo $rows['p_email']; ?></p>
                    </div>
                    
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Details</a>
                        <a href="#" class="btn btn-primary">Make Appointment</a>
                    </div>
                </div><br>
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
        </div>
    </div>

   
</body>
</html>

    













