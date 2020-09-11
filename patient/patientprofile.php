<?php
session_start();
include ('../includes/header.php');
include ('../includes/navbar.php');
include ('../includes/patientsidebar.php');
include ('../includes/db_connect.inc.php');


if(!isset(	$_SESSION['user_name'])){
    header("Location: ../login.php");
}
$user = $_SESSION['user_name'];
 $res = mysqli_query($conn,"SELECT * FROM `patient` WHERE `p_name` = '$user';" );
 $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);


?>

<div class="patientprofile">
                <div class="row">
                    <div class="col-md-4 box">
                        <div class="well">
                            <img src="../images/ronaldo.jpg" class="doc-img">
                            <div class="btn-group">
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editimage"><i class="fa fa-picture-o"></i></button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editpass"><i class="fa fa-key"></i></button>
                            </div>
                            <h3><?php echo $userRow['p_fname']." ";echo $userRow['p_lname']; ?></h3>
                            <p>abcd at xyz </p>
                        </div>
                    </div>
                
               
                    <div class="col-md-8 box">
                        <h1>Personal Information</h1>
                        <table class="table">
                            
                            <tbody>
                                <tr>
                                
                                <td>Name</td>
                                <td>Otto</td>
                               
                                </tr>
                                <tr>
                                
                                <td>Type</td>
                                <td>Otto</td>
                               
                                </tr>
                                <tr>
                                
                                <td>Qualification</td>
                                <td>Otto</td>
                               
                                </tr>
                                <tr>
                                
                                <td>Visiting Hour</td>
                                <td>Otto</td>
                               
                                </tr>
                                <tr>
                                
                                <td>Institution</td>
                                <td>Otto</td>
                               
                                </tr>
                                <tr>
                                
                                <td>Email</td>
                                <td>Otto</td>
                               
                                </tr>
                                <tr>
                                
                                <td>Contact</td>
                                <td>Otto</td>
                               
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"><i class="fa fa-pencil-square-o"></i></button>
                    </div>
                </div>

                <div class="modal fade" id="editimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        
                       
                        
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>

                <div class="modal fade" id="editpass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                       
                        
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>




                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Qualification</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Visiting Hour</label>
                            <div class="form-row">
                                <div class="col">
                                <input type="time" class="form-control" placeholder="First name">
                                </div>
                                <div class="col">
                                <input type="time" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Institution</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contatc</label>
                            <input type="number" class="form-control" id="exampleInputPassword1">
                        </div>
                       
                        
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>


            <?php include ('../includes/footer.php');  ?>