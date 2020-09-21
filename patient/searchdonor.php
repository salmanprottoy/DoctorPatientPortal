<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');
include('sidebar.php');


$query = "SELECT * FROM `organ`;";
$query_run = mysqli_query($conn, $query);




?>

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
        Donor List

    </h1><br>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">

                <select class="form-control" name="accountType" id="drpdwnbg" onchange="bgSearch()">
                    <option value="" disabled selected>Select blood Group</option>
                    <option value="a+">a+</option>
                    <option value="b+">B+</option>
                    <option value="ab+">AB+</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">

                <select class="form-control" name="accountType" id="drpdwnorgan" onchange="organSearch()">
                <option value="" disabled selected>Select Organ</option>
                        <option value="Eye" >Eye</option>
                        <option value="Knidney" >Knidney</option>
                        <option value="Liver" >Liver</option>
                        <option value="Blood" >Blood</option>
                        <option value="Hand" >Hand</option>
                        <option value="Leg" >Leg</option>
                </select>
            </div>
        </div>

     

        <input type="text" name="" id="myInput" placeholder="Search by Doctor Name" onkeyup="searchFun()">



    </div><br>
    <div class="row ">


        <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">BG</th>
                    <th scope="col">Organ</th>
                    </tr>
                </thead>
               
                <tbody>
                <div class="col-md-8">
                    <?php

                    if ($query_run) {
                        foreach ($query_run as $rows) {


                    ?>
                    <tr>
                        
                    
                    <td><?php echo $rows['p_name']; ?> </td>
                    <td><?php echo $rows['o_name']; ?></td>
                    <td><?php echo $rows['o_phone']; ?></td>
                    <td><?php echo $rows['o_email']; ?></td>
                    <td><?php echo strtoupper($rows['o_bgroup']); ?></td>
                    <td><?php echo $rows['o_organ']; ?></td>
                   
                    </tr>
                    <?php

                        }
                    } else {
                        echo "No records found";
                    }

                    ?>
                    
                </tbody>
            
          
            </table>

    </div>
</div>
<script>
    
function searchFun(){
        var filter = document.getElementById('myInput').value.toUpperCase();
        var myTable = document.getElementById('myTable');
        var tr = myTable.getElementsByTagName('tr');

        for(var i=0 ; i<tr.length ; i++){
            var td = tr[i].getElementsByTagName('td')[1];
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

   

    function bgSearch() {
        var filter = document.getElementById('drpdwnbg').value.toUpperCase();
        var myTable = document.getElementById('myTable');
        var tr = myTable.getElementsByTagName('tr');

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName('td')[4];
            if (td) {
                var text_value = td.textContent || td.innerHTML;
                if (text_value.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function organSearch() {
        var filter = document.getElementById('drpdwnorgan').value.toUpperCase();
        var myTable = document.getElementById('myTable');
        var tr = myTable.getElementsByTagName('tr');

        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName('td')[5];
            if (td) {
                var text_value = td.textContent || td.innerHTML;
                if (text_value.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

   
</script>



</body>

</html>