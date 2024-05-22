	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../assets/css/quee.css">
		<title>Login</title>
	</head>
	<body>

		<form action="../core/auth/login.php" method="POST" id="loginform">
			<p><input type="email" placeholder="Emailni kiriting" name="email" required></p>
			<p><input type="password" name="password" placeholder="Parolni kiriting" required></p>
			<button>Kirish</button>
			<a href="register.php">Yangimisiz?</a>
		</form>

		<script src="../assets/js/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
		<script type="text/javascript">
			$('#loginform').submit(function (e) {
				e.preventDefault();
				let malumot = $('#loginform').serialize();
				$.ajax({
					url:"../core/auth/login.php",
					method:"POST",
					data: malumot,
					success:function(data){
						let obj = jQuery.parseJSON(data);
						if (obj.status) {
							Swal.fire({
								title: "Ajoyib!",
								text: obj.message,
								icon: "success"
							});
						}
						else{ 
							Swal.fire({
								title: "ERROR!",
								text: obj.message,
								icon: "error"
							}).then(function () {
								setInterval($('#loginform')[0].reset(),1000);
							});
							
						}
					},
					error:function(xhr){
						///WWW ERROR
					}
				});
			})
		</script>
	</body>
	</html>

