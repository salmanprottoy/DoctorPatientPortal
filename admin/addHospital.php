<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');





include('sidebar.php');



if(isset($_POST['donorreg'])){
    if(!empty($_POST['hname']) && !empty($_POST['location'])){
        if(file_exists('hospital.json')){
            $current_data = file_get_contents('hospital.json');
            $array_data = json_decode($current_data,true);
            $extra = array(
                'hname' => $_POST['hname'],
                'location' => $_POST['location']
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if(file_put_contents('hospital.json',$final_data)){
                echo '<script type=text/javaScript> alert("Hospital added") ; </script>';
            }else{
                echo '<script type=text/javaScript> alert("Not added") ; </script>';
            }
        }else{
            echo '<script type=text/javaScript> alert("JSON file not exists") ; </script>';
        }
    }
}
?>


<div class="patientprofile">
<h1 class="text-white bg-dark text-center">
                Donor registration

            </h1>
    <div class="d-flex justify-content-center align-items-center container ">
        <div class="col-md-8 donor">
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Hospital Name</label>
                    <input type="text" class="form-control" name="hname"  value="">

                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location"  value="">

                </div>
               
               
                <input type="submit" class="btn btn-primary" name="donorreg" value="Register">
                </from>
        </div>
    </div>

</div>
</div>
</body>

</html>