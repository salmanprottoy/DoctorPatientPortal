<?php
session_start();
include('../includes/db_connect.inc.php');
include('../includes/header.php');
include('navbar.php');






$query = "SELECT * FROM `doctor`;";
$query_run = mysqli_query($conn, $query);



$user = $_SESSION['user_name'];
$res = mysqli_query($conn, "SELECT * FROM `patient` WHERE `p_name` = '$user';");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$doc_name = $d_visitstart = $d_visitend = $doc_inst = $p_name = $p_bg = $p_phn = $p_problem = $app_date = $app_time = $serial = "";



if(isset($_POST['bookappointment'])){




    if (!empty($_POST['app_date']) && !empty($_POST['app_time'])) {
        $query = "UPDATE `appointment` SET `p_name`='$_POST[p_name]',`p_bg`='$_POST[p_bg]',`p_phone`='$_POST[p_phn]',`p_problem`='$_POST[p_problem]', `isTaken`='1' WHERE `app_time` = '$_POST[app_time]';";

      
            $query_run1 = mysqli_query($conn, $query);
            if ($query_run1) {
                echo '<script type=text/javaScript> alert("Data Updated") </script>';
               
            } else {
                echo '<script type=text/javaScript> alert("Something wrong data not updated!") </script>';
            }
        
    }else{
        echo '<script type=text/javaScript> alert(" not updated!") </script>'; 
    }
}



include('sidebar.php');
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

                <select class="form-control" name="accountType" id="drpdwnHospital" onchange="hospitalSearch()">
                    <option value="" disabled selected>Select Hospital</option>
                    <option value="a+">A+</option>
                    <option value="b+">B+</option>
                    <option value="ab+">AB+</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                </select>
            </div>
        </div>



        <input type="text" name="" id="myInput" placeholder="Search by Doctor Name" onkeyup="searchDoc()">

        <input type="submit" class="btn btn-primary" name="infoUpdate" value="Search"></button>



    </div><br>
    <div class="row ">






        <table cellpadding="10" class="table table-hover table-center" id="myTable">

            <div class="col-md-8">
                <?php

                if ($query_run) {
                    foreach ($query_run as $rows) {


                ?>

                        <tr>
                            <td style="display:none;"><?php echo $rows['d_id']; ?></td>
                            <td><img class="card-img" src="<?php echo $rows['d_image']; ?>" alt="Card image cap" style="width: 18rem; height: 9rem;display: block;margin-left: auto; margin-right: 10px;object-fit:cover;"></td>
                            <td><strong><?php echo $rows['d_fname']; ?> <?php echo $rows['d_lname']; ?></strong><br>
                                <?php echo $rows['d_bgroup']; ?><br>
                                <?php echo $rows['d_email']; ?></td>
                            <td>
                                <a href="#" class="btn btn-primary"><i class="fa fa-info-circle"></i></a><br><br>
                                <form action="bookAppointment.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $rows['d_id']; ?>">
                                    <!-- <a href="bookAppointment.php" name="edit_btn" class="btn btn-primary">Make Appointment</a> -->
                                    <!-- <button name="edit_btn" class="btn btn-primary">Make Appointment</button> -->
                                    <button type="button" class="btn btn-primary bookappo" id="<?php echo $rows['d_id']; ?>" data-toggle="modal" data-target="#bookapp"><i class="fa fa-calendar-plus-o"></i></button>
                                </form>
                            </td>


                        </tr>

                <?php

                    }
                } else {
                    echo "No records found";
                }

                ?>
            </div>

        </table>





    </div>
    <div class="modal fade" id="bookapp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div id="modal_body">

                    </div>
                    <div class="form-group">
                            <label>Problem Explanation(optional)</label><br>
                            <textarea name="p_problem" class="form-control" id="" cols="45" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Appointment Date</label>
                            <input type="date" class="form-control" name="app_date" id="app_date" >

                        </div>
                        <div class="form-group">
                            <label>visiting Time</label>
                            <select class="form-control" name="app_time" id="dataget">
                                <option value="">Choose any one</option>
                            </select>
                        </div>
                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="bookappointment" >Book Appointment</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
                 $(document).ready(function() {
                     $("#app_date").click(function() {
                         var datavalue = $('#app_date').val();
                         var d_id = $('#d_id').val();
                        $.ajax({
                            url: "timing.php",
                            type: "POST",
                            data: {
                                datapost: datavalue,
                                d_id : d_id 
                            },

                            success: function(result) {
                                $('#dataget').html(result);
                            }
                        });
                    });

                    $(".bookappo").click(function(){
                        var d_id = $(this).attr('id');
                        $.ajax({
                            url : "popup_data.php",
                            type : "POST",
                            data : { d_id : d_id},
                            success:function(data){
                                $('#modal_body').html(data);
                            }
                        });
                    });
                });

                function searchDoc() {
                    var filter = document.getElementById('myInput').value.toUpperCase();
                    var myTable = document.getElementById('myTable');
                    var tr = myTable.getElementsByTagName('tr');

                    for (var i = 0; i < tr.length; i++) {
                        var td = tr[i].getElementsByTagName('strong');

                        if (td) {
                            var text_value = td[0].innerHTML;
                            if (text_value.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function deptSearch() {
                    var filter = document.getElementById('drpdwnDept').value.toUpperCase();
                    var myTable = document.getElementById('myTable');
                    var tr = myTable.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var td = tr[i].getElementsByTagName('td')[2];
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

                function hospitalSearch() {
                    var filter = document.getElementById('drpdwnHospital').value.toUpperCase();
                    var myTable = document.getElementById('myTable');
                    var tr = myTable.getElementsByTagName('tr');

                    for (var i = 1; i < tr.length; i++) {
                        var td = tr[i].getElementsByTagName('td')[2];
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

                $(document).ready(function() {



                    $("#drpdwnInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $(".dropdown-menu li").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
</script>


</body>

</html>