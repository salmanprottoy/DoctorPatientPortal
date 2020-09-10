<?php

include ('../includes/header.php');
include ('../includes/navbar.php');
include ('../includes/patientsidebar.php');

?>

<div class="patientprofile">
                <div class="row">
                    <div class="col-md-4 box">
                        <div class="well">
                            <img src="../images/ronaldo.jpg" class="doc-img">
                            <div class="btn-group">
                                <button class="btn btn-default">Change picture</button>
                                <button class="btn btn-default">Change password</button>
                            </div>
                            <h3>UserName</h3>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Launch demo modal</button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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