<?php 
	session_start();
	
	//borrar variables de sesión
	$_SESSION = array();
	
	//borrar cookies creadas por mí durante la sesión
	setcookie("Turnero", "", time() - 3600);

	//destruir la sesión
	session_destroy();
	
	header('Location:index.php');
	
?>