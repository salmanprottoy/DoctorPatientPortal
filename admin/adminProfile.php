<?php 
    include("index.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="wrapper">
    
        <div class="main-container">
                    
            <div class="adminprofile">
                <div class="adminprofilepic">
                    <img src="../images/ronaldo.jpg" alt="">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    <h2>Username</h2>    
                    </div>
                    
                    <div class="adminprofileinfo">
                        <h1>Personal Information</h1>
                        <div class="table-box">
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Name:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, dolorem!</p>
                            </div>
                            </div>
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Gender:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo</p>
                            </div>
                            </div>
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Date of Birth:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo</p>
                            </div>
                            </div>
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Blood group:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo</p>
                            </div>
                            </div>
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Mobile No:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo</p>
                            </div>
                            </div>
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Email:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo</p>
                            </div>
                            </div>
                            <div class="table-row">
                            <div class="table-cell">
                                <p>Address:</p>
                            </div>
                            <div class="table-cell">
                                <p>Cristiano Ronaldo</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="adminprofileedit">
                        <a href="#modal" class="editadminprofile" data-tooltip="Edit Profile"><span class="material-icons">
create
</span></a>
                    </div>
                    
                </div>
                <div class="modal-container" id="modal">
                        
                        <div class="modal" >
                            <a href="#" class="close">x</a>
                            <span class="modal-heading"><b> Edit Profile</b></span>
                            <form action="#">
                                <div class="table-box">
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Username:</p>
                                    </div>
                                    <div class="table-cell">
                                        <p>userName</p>
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Change Image</p>
                                    </div>
                                    <div class="table-cell">
                                        <input type="file" name="image" class="image" value="">
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Name</p>
                                    </div>
                                    <div class="table-cell">
                                    <input type="text" placeholder="Name" class="first-name" value="">
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Gender</p>
                                    </div>
                                    <div class="tablecell">
                                    <input type="radio" class="radio" name="gender" value="Male" > Male
                                    <input type="radio" name="gender" class="radio" value="Female" > Female
                                    <input type="radio" class="radio" name="gender" value="Others" > Others
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Date of Birth </p>
                                    </div>
                                    <div class="table-cell">
                                    <input type="date" name="date" class="date" value="">
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Blood Group</p>
                                    </div>
                                    <div class="table-cell">
                                    <select name="bloodgroup" id="" class="blood-group">
                                    <option value="" disabled selected>Select your Blood group</option>
                                    <option value="a+" >A+</option>
                                    <option value="b+" >B+</option>
                                    <option value="ab+" >AB+</option>
                                    <option value="o+" >O+</option>
                                    <option value="o-" >O-</option>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Mobile No.</p>
                                    </div>
                                    <div class="table-cell">
                                    <input type="number" placeholder="Name" class="mobile" value="">
                                        
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>E-mail</p>
                                    </div>
                                    <div class="table-cell">
                                    <input type="email" placeholder="Name" class="email" value=""><br>
                                        
                                    </div>
                                    </div>
                                    <div class="table-row">
                                    <div class="table-cell">
                                        <p>Address</p>
                                    </div>
                                    <div class="table-cell">
                                    <textarea  name="address" rows="2" cols="20"> </textarea>
                                        
                                    </div>
                                    </div>
                                </div>
                                <a href="#"><input class="submit" type="button" name="submit" value="Submit" class="submit"> </a>
                            </form>
                        </div>  
                </div>
            </div>
            
            </div>
            
        </div>
        
    </div> 
     
</body>
</html>