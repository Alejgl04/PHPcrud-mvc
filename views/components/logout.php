<?php 
session_start();
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() -42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]);	
}
//Borramos toda la sesion
session_unset();
session_destroy();
header("location:../auth/login.php");

?>