<?php 

require "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	# code...
	$response = array();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$cek = "SELECT * FROM user WHERE email = '$email' and username = '$username'";
	$result = mysqli_fetch_array(mysqli_query($con,$cek));

	if (isset($result)) {
		# code...
		$response['code'] = 2;
		$response['message'] = 'Email atau Username telah terdaftar';
		echo json_encode($response);
	}else{
		$insert = "INSERT INTO user VALUE(NULL, '$username', '$email', '$password')";
		if (mysqli_query($con,$insert)) {
			# code...
			$response['code'] = 1;
			$response['message'] = 'Berhasil Didaftarkan';
			echo json_encode($response);
		}else{
			$response['code'] = 0;
			$response['message'] = 'Gagal Didaftarkan';
		}
	}
}
 ?>