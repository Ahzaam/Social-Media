<?php
	include '../con.php';
	session_start();
	if($_POST['type']==1){
		$name=ucfirst($_POST['name']);
		$email=$_POST['email'];
		$password=$_POST['password'];
		$image = $_SESSION['image'];

		$duplicate=mysqli_query($conn,"select * from clients where email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `clients`( `name`, `email`, `password`, `image`)
			VALUES ('$name','$email', '$password', '$image')";
			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>200));
			}
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($conn);
	}
	if($_POST['type']==2){
		$email=$_POST['email'];
		$password=$_POST['password'];
		// $check=mysqli_query($conn,"select * from clients where email='$email' and password='$password'");
		$sql = "SELECT * FROM clients where email='$email' and password='$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) //mysqli_num_rows($check)>0
		{
			$row = $result->fetch_assoc();
			$_SESSION['email']=$email;
      $_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['client_id'];
			$_SESSION['owner-id'] = $row['client_id'];
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>
