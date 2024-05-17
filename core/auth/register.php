<?php

	include_once '../../config.php';	
	session_start();
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$confirm_password = md5($_POST['confirm-password']);
	$ret = [];

	if (isset($_POST)) {
		if (isset($firstname) && isset($lastname) && isset($email) && isset($password)) {
			if ($confirm_password == $password) {
				try {

					$query = mysqli_query($link,"SELECT * FROM users WHERE email='$email'");
					if(mysqli_num_rows($query) > 0) {
						$ret = [
							'status' => 0,
							'icon'	 => 'info',
							'message' => "Bu foydalanuvchi aval ro'yhatdan o'tgan"
						];
					}
					else{
						$sql = mysqli_query($link,"INSERT INTO `users`(`id`, `first_name`, `last_name`, `email`, `password`) VALUES (NULL,'$firstname','$lastname','$email','$password')");
					
						if ($sql) {
							$_SESSION['login-status'] = 1;
							$_SESSION['auth'] = [
								'user' => [
									'first_name' => $firstname,
									'last_name'  => $lastname,
									"email"		 => $email,
								] 
							];
							$ret = [
								'status' => 1,
								'icon'	 => 'success',
								'message' => "Muofaqiyatli ro'yhatdan o'tdingiz"
							];
						}
						else {
							$ret = [
								'status' => 0,
								'icon'	 => 'error',
								'message' => "Ro'yhatdan o'tishdagi hatolik"
							];
						}
					}
					
				} catch (\Throwable $th) {
					$ret = [
						'status' => 0,
						'icon'	 => 'error',
						'message' => json_encode($th)
					];
				}
			}
			else {
				$ret = [
					'status' => 0,
					'icon'	 => 'error',
					'message'	=> "Tastiqlash paroli mos kelmadi"
				];
			}
			
		} else {
			$ret = [ 
				'status'  => 0,
				'message' => "Parametlar yetarli emas, Barcha malumotlarni to'ldiring"
			];
		}
		
	} else {
		$ret = [
			'status' => 0,
			'message' => "Bu url faqat POST request qabul qiladi."
		];
	}

	echo json_encode($ret);