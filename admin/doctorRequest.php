<?php
session_start();
include ('../includes/db_connect.inc.php');
include ('../includes/header.php');
include ('navbar.php');
include ('sidebar.php');

function getAllDoctorsRequests(){
	include ('../includes/db_connect.inc.php');
    $sql = "select * from docreq";
    $result = mysqli_query($conn, $sql);
    $users =[];
    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    };
    return $users;
}

$doctorrequests = getAllDoctorsRequests();
?>

<div class="docReq">
<h1>Here are the requests of new registered Doctor</h1>
	<br>
	<form method="POST">
		<table border="1" cellspacing="5" cellpadding="5" width="100% id="request"> 
			<tr> 
				<td>Username</td>
				<td>First Name</td> 
				<td>Last Name</td>
				<td>Date of Birth</td>
				<td>Blood Group</td>
				<td>Email</td>
				<td>Phone</td>
				<td>REQUESTS HANDLER</td>
			</tr>
			<?php for($i=0; $i != count($doctorrequests); $i++ ){ ?>
				
				<tr>
					<td><?= $doctorrequests[$i]['d_name'] ?></td>
					<td><?= $doctorrequests[$i]['d_fname'] ?></td>
					<td><?= $doctorrequests[$i]['d_lname'] ?></td>
					<td><?= $doctorrequests[$i]['d_dob'] ?> </td>
					<td><?= $doctorrequests[$i]['d_bgroup'] ?> </td>
					<td><?= $doctorrequests[$i]['d_email'] ?> </td>
					<td><?= $doctorrequests[$i]['d_phone'] ?> </td>
					
					<td>
						<input type="submit" class="btn btn-success" value="Accepted" name="doc_acc">
							|
						<input type="submit" class="btn btn-danger" value="Rejected" name="doc_rej">
					</td>
				</tr>
			</form>
		<?php 
		
		if(isset($_POST['doc_acc'])){
			// eta holo request table theke nisi // 
			$d_name =  $doctorrequests[$i]['d_name'];
			$d_fname = $doctorrequests[$i]['d_fname'];
			$d_lname = $doctorrequests[$i]['d_lname'];
			$d_dob = $doctorrequests[$i]['d_dob'];
			$d_bgroup = $doctorrequests[$i]['d_bgroup'];
			$d_email = $doctorrequests[$i]['d_email'];
			$d_phone = $doctorrequests[$i]['d_phone'];
			$d_pass = $doctorrequests[$i]['d_pass'];
			$sql = "INSERT INTO doctor(d_name, d_fname, d_lname, d_dob, d_bgroup, d_email, d_phone,d_pass ) VALUES ('$d_name','$d_fname','$d_lname','$d_dob','$d_bgroup','$d_email','$d_phone','$d_pass')";
			if(mysqli_query($conn, $sql)) 
			{
				echo "Doctor Accepted!";
				$sql2 = "Delete From docreq where d_name='$d_name'";
				/* $connection->query($sql2);
				$connection->close(); */
				$result = mysqli_query($conn, $sql2);
			} else {
				echo "Please Try Again";
			} 

		} else if(isset($_POST['doc_rej'])){
			//$connection = dbConnection();
			$d_name = $doctorrequests[$i]['d_name'];
			$sql2 = "Delete From docreq where d_name='$d_name'";
			/* $connection->query($sql2);
			$connection->close(); */
			$result = mysqli_query($conn, $sql2);
		}
	}
		?>
	</table>
</div>