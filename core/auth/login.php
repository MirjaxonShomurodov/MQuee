<?php
	include_once '../../config.php';
	$ret = [];
	session_start();
	$_SESSION['login-status'] = 0;
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$email = filter($_POST['email']);
		$password = filter($_POST['password']);


		$sql = mysqli_query($link,"SELECT * FROM users WHERE email='$email' AND password='$password'");

		if(mysqli_num_rows($sql) > 0) {
			$_SESSION['login-status'] = 1;
			$_SESSION['auth'] = [
				'user'	 => mysqli_fetch_assoc($sql),
				'server' => array($_SERVER)
			];

			$ret = [
				'status' 	=> 1,
				'message'	=> "Muofaqiyatli tizimga kirdingiz"
			];
		}
		else{
			$ret = [
				'status' 	=> 0,
				'message'	=> "Bunday foydalanuvchi tizimda mavjud emas"
			];
		}
	}
	else {
		$ret = [
			'status' 	=> 0,
			'message'	=> "Email yoki parolni kiritishdagi hatolik"
		];
	}
	echo json_encode($ret);
?>