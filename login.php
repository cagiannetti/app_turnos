<?php require_once "header.php" ?>

<?php 
	if(isset($_GET['username']) AND isset($_GET['password']) ){
		$username = $_GET['username'];
		$password = $_GET['password'];
		
		if($username == "cagiannetti" AND $password == "claudinio"){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			setCookie("Turnero", "token123456");
			header('Location:administrar_turnos.php');
		}else{
			echo "tomatelas";
		}

	}
	
	
?>

<main>
	<div id="app">
		<h2>Iniciar sesión</h2>
		<form method="GET">
			<label for="username">Usuario</label>
			<input type="text" id="username" name="username" autofocus />
			<div class="espaciador-10"></div>
			<label for="password">Contraseña</label>
			<input type="password" id="password" name="password" />
			<div class="espaciador-20"></div>
			<input type="submit" name="btn_enviar" id="btn_enviar" value="Iniciar sesión"/>
		</form>
	</div>
</main>

<?php require_once "footer.php" ?>