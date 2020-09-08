<?php
    require_once('../includes/db_connect.inc.php');

    function getAllDoctorsRequests(){
		$con = dbConnection();
		$sql = "select * from doctorrequest_table";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

    $doctorrequests = getAllDoctorsRequests();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCTOR REQUESTS</title>
</head>
<body>
    <h1>Here are the requests of new registered Doctor.</h1>
    <p>You can either Accept or Reject their Requests</p>
	<form method="POST">
		<table border=1> 
			<tr> 
				<td>NAME</td>
				<td>ADDRESS</td> 
				<td>EMAIL</td>
				<td>GENDER</td>
				<td>MOBILE_NO</td>
				<td>DEPARTMENT</td>
				<td>LOCATION</td>
				<td>ADDITIONAL FILE</td>
			</tr>
			<?php for($i=0; $i != count($doctorrequests); $i++ ){ ?>
				
				<tr>
					<td><?= $doctorrequests[$i]['Name'] ?></td>
					<td><?= $doctorrequests[$i]['Address'] ?></td>
					<td><?= $doctorrequests[$i]['Email'] ?></td>
					<td><?= $doctorrequests[$i]['Gender'] ?> </td>
					<td><?= $doctorrequests[$i]['MobileNo'] ?> </td>
					<td><?= $doctorrequests[$i]['Department'] ?> </td>
					<td><?= $doctorrequests[$i]['Location'] ?> </td>
					<td> <?php echo "<img src='../../Doctor/".$doctorrequests[$i]['FileName']."' height='100'> "; 
					?>
					</td>
					
					<td>
						<input type="submit" value="Accepted" name="doc_acc">
							|
						<input type="submit" value="Rejected" name="doc_rej">
					</td>


					<script>
						// const doctorAcceptHandler = () => {
						// 	alert('Doctor Accepted');
						// 	$connection = mysqli_connect('127.0.0.1', 'root', '', 'docpatportal');
						// 	doc_name =  $doctorrequests[$i]['Name'];
						// 	doc_address = $doctorrequests[$i]['Address'];
						// 	doc_email = $doctorrequests[$i]['Email'];
						// 	doc_gender = $doctorrequests[$i]['Gender'];
						// 	doc_mobile = $doctorrequests[$i]['MobileNo'];
						// 	doc_department = $doctorrequests[$i]['Department'];
						// 	doc_location = $doctorrequests[$i]['Location'];

						// 	$sql = "INSERT INTO doctorrequest_table(Name, Address, Gender, MobileNo, Email, Department, Location ) VALUES ('doc_name','doc_address','doc_gender','doc_mobile','doc_email','doc_department','doc_location')";
						// 	
						// 		if($connection->query($sql)) {
						// 			echo "Registration Completed!";
						// 		} else {
						// 			echo "Please Try Again";
						// 		} 
						// 	
						// }

						// const doctorRejectHandler = () => {
						// 	alert('Doctor Rejected');
						// }

						// const acceptBtn = document.getElementById('acceptbtn');
						// acceptBtn.addEventListener('click',doctorAcceptHandler);
						// const rejectBtn = document.getElementById('rejectbtn');
						// rejectBtn.addEventListener('click',doctorRejectHandler);
					</script>
				</tr>
			</form>
		<?php 
		
		if(isset($_POST['doc_acc'])){
			$connection = dbConnection();
			$doc_name =  $doctorrequests[$i]['Name'];
			$doc_address = $doctorrequests[$i]['Address'];
			$doc_email = $doctorrequests[$i]['Email'];
			$doc_gender = $doctorrequests[$i]['Gender'];
			$doc_mobile = $doctorrequests[$i]['MobileNo'];
			$doc_department = $doctorrequests[$i]['Department'];
			$doc_location = $doctorrequests[$i]['Location'];
			$doc_password = $doctorrequests[$i]['Password'];
			$sql = "INSERT INTO maindoctable(Name, Address, Gender, MobileNo, Email, Department, Location,Password ) VALUES ('$doc_name','$doc_address','$doc_gender','$doc_mobile','$doc_email','$doc_department','$doc_location','$doc_password')";
			if($connection->query($sql)) {
				echo "Doctor Accepted!";
			$sql2 = "Delete From doctorrequest_table where Email='$doc_email'";
			$connection->query($sql2);
			$connection->close();
			} else {
				echo "Please Try Again";
			} 

		} else if(isset($_POST['doc_rej'])){
			$connection = dbConnection();
			$doc_email = $doctorrequests[$i]['Email'];
			$sql2 = "Delete From doctorrequest_table where Email='$doc_email'";
			$connection->query($sql2);
			$connection->close();
		}
	}
		?>
	</table>
	
</body>
</html>