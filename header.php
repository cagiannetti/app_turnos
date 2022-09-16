<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>
			Turnos
		</title> 
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="estilos.css" />
	</head>
	<body>
		<header>
			<div class="grilla-2-col mw-700 grilla-v-center">
				<a href="./"><h1>Turnos</h1></a>
			
				<nav>
					<a href="index.php">Solicitar turno</a> |
					<?php 
						if(!isset($_SESSION['login'])){
							echo "<a href='administrar_turnos.php'>Asministrar</a>";
						}else{
							echo "<a href='logout.php'>Cerrar sesión</a>";
						}
							
					
					?>
				</nav>
			</div>
		</header>