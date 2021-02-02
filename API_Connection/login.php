<?php 

require "connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	# code...
	$response = array();
	$email = $_POST['email'];
	$password = $_POST['password'];

	$cek = "SELECT * FROM user WHERE email='$email' and password='$password'";
	$result = mysqli_fetch_array(mysqli_query($con,$cek));

	if (isset($result)) {
		# code...
		$response['code'] = 1;
		$response['message'] = 'Login Berhasil';
		echo json_encode($response); 
	}else{
		$response['code'] = 0;
		$response['message'] = 'Login Tidak Berhasil';
		echo json_encode($response);
	}

}

 ?>