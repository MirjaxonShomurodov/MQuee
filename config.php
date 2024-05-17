<?php
	// error_reporting(0);
	$host = "localhost"; //127.0.0.1, 213.230.125.243 port 3306
	$user = "root"; // MB foydalanuvchisi
	$parol = ""; // MB parolid
	$db_name = "myquee";

	$link = mysqli_connect($host,$user,$parol,$db_name);

	if(!$link){
		echo "MB ulanmadi";
		exit('Stop!');
	}
	function filter($s) {
		return htmlspecialchars($s);
	}
?>