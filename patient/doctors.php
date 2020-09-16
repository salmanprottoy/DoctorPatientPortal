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
					
						<select class="form-control" name="accountType" id="drpdwnDept" onchange="deptSearch()">
                        <option value="" disabled selected>Select Department</option>
                                    <option value="a+" >a+</option>
                                    <option value="b+" >B+</option>
                                    <option value="ab+" >AB+</option>
                                    <option value="o+" >O+</option>
                                    <option value="o-" >O-</option>
					    </select>
				</div>
                </div>
                <div class="col-md-2">
                <div class="form-group">
			
						<select class="form-control" name="accountType" id="drpdwnHospital" onchange="hospitalSearch()">
                        <option value="" disabled selected>Select Hospital</option>
                                    <option value="a+" >A+</option>
                                    <option value="b+" >B+</option>
                                    <option value="ab+" >AB+</option>
                                    <option value="o+" >O+</option>
                                    <option value="o-" >O-</option>
					    </select>
				</div>
                </div>

                <!-- <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <i class="fa fa-caret-down"></i></button>
    <ul class="dropdown-menu">
      <input class="form-control" id="drpdwnInput" type="text" placeholder="Search..">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">jQuery</a></li>
      <li><a href="#">Bootstrap</a></li>
      <li><a href="#">Angular</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <i class="fa fa-caret-down"></i></span></button>
    <ul class="dropdown-menu">
      <input class="form-control" id="drpdwnInput" type="text" placeholder="Search..">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">jQuery</a></li>
      <li><a href="#">Bootstrap</a></li>
      <li><a href="#">Angular</a></li>
    </ul>
  </div> -->
        

        <!-- <div class="md-form active-cyan active-cyan-2 mb-3">
            <input class="form-control" id="myInput " type="text" placeholder="Search by Doctor Name" aria-label="Search" onkeyup="searchFun()">
        </div> -->
     
           <input  type="text" name="" id="myInput" placeholder="Search by Doctor Name"  onkeyup="searchFun()">
        
        <input type="submit" class="btn btn-primary" name="infoUpdate" value="Search"></button>

        

        </div><br>
    <div class="row ">
        
            

            <!-- <div class="col-md-3">
                <div class="card" id="myCard" style="width: 18rem;">
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
            </div> -->

            <!-- <table cellpadding="10">
                <tr>
                    <td></td>
                </tr>

            </table> -->

            <table class="table" id="myTable">
                <thead>
                    <tr>
               
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">BG</th>
                    <th scope="col">Image</th>
                    </tr>
                </thead>
                <?php

                if($query_run)
                {
                    foreach($query_run as $rows)
                    {

               
            ?>
                <tbody>
                    <tr>
                    
                    <td><?php echo $rows['p_fname']; ?> <?php echo $rows['p_lname']; ?></td>
                    <td><?php echo $rows['p_email']; ?></td>
                    <td><?php echo $rows['p_bgroup']; ?></td>
                    <td> <img class="card-img-top" src="<?php echo $rows['p_pic'];?>" alt="Card image cap" style="width: 18rem; height: 9rem; object-fit:cover;"></td>
                    </tr>
                    
                </tbody>
            
            <?php

                    }
                }
                else
                {
                    echo "No records found";
                }            
            
            ?>
            </table>
        </div>
        </div>
    </div>
<script>
    function searchFun(){
        var filter = document.getElementById('myInput').value.toUpperCase();
        var myTable = document.getElementById('myTable');
        var tr = myTable.getElementsByTagName('tr');

        for(var i=0 ; i<tr.length ; i++){
            var td = tr[i].getElementsByTagName('td')[0];
            if(td){
                var text_value = td.textContent || td.innerHTML;
                if(text_value.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }
                else{
                    tr[i].style.display = "none";
                }
            }
        }
    }
   
function deptSearch(){
    var filter = document.getElementById('drpdwnDept').value.toUpperCase();
    var myTable = document.getElementById('myTable');
        var tr = myTable.getElementsByTagName('tr');

        for(var i=1 ; i<tr.length ; i++){
            var td = tr[i].getElementsByTagName('td')[2];
            if(td){
                var text_value = td.textContent || td.innerHTML;
                if(text_value.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }
                else{
                    tr[i].style.display = "none";
                }
            }
        }
}
function hospitalSearch(){
    var filter = document.getElementById('drpdwnHospital').value.toUpperCase();
    var myTable = document.getElementById('myTable');
        var tr = myTable.getElementsByTagName('tr');

        for(var i=1 ; i<tr.length ; i++){
            var td = tr[i].getElementsByTagName('td')[2];
            if(td){
                var text_value = td.textContent || td.innerHTML;
                if(text_value.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }
                else{
                    tr[i].style.display = "none";
                }
            }
        }
}

    $(document).ready(function(){

      

  $("#drpdwnInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
   <!-- function searchFun(){

   } -->

   
</body>
</html>

    













