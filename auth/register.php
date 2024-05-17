<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ro'yxatdan o'tish</title>
    <link rel="stylesheet" href="../assets/css/quee.css">
	<style type="text/css">
		.qizil{
			border: 1px solid red;
		}
	</style>
</head>  
<body>
	<form action="../core/auth/register.php" method="POST" id="registerform">
		<p><input type="text" name="first_name" placeholder="Ismingizni kiriting"></p>
		<p><input type="text" name="last_name" placeholder="Familyangizni kiriting"></p>
		<p><input type="email" name="email" placeholder="E-mail"></p>
		<p id="helpblock" style="color:red; font-size: 11px; display: none;"></p>
		<p><input type="password" name="password" placeholder="Parolni kiriting"></p>		
		<p><input type="password" name="confirm-password" placeholder="Parolni qayta kiriting"></p>
		<p id="mesg"></p>
		<button>Ro'yxatdan o'tish</button>
		<a href="login.php">Sizda akkaunt bormi?</a>
	</form>

	<script src="../assets/js/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/sweetalert.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script type="text/javascript">
		$('#registerform').submit(function(e) {
			e.preventDefault();
			$.ajax({ 	
				url:"../core/auth/register.php",
				method:"POST",
				data:$('#registerform').serialize(),
				success:function(data){
					let obj = jQuery.parseJSON(data);
					const title = (obj) => {
						if (obj.status) {
							return "Ajoyib !"
						} else {
							return "Xatolik !"
						}
					}
					Swal.fire({
						title: title(obj),
						text: obj.message,
						icon: obj.icon
					}).then(function () {
						setInterval($('#registerform')[0].reset(),1000);
					});
				}
			});
		})
	</script>
</body>
</html>