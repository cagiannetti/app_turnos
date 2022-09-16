<?php require_once "header.php"	?>
<main>
	<div id="app">
		<h2>Turno reservado</h2>
		<section id="turnos" class="borde-suave p-20">
			<?php
			
				$turno = array(
					'id' => $_GET['id'],
					'turno' => $_GET['turno'],
					'nombre' => $_GET['nombre'],
					'tel' => $_GET['tel'],
					'mail' => $_GET['mail']
				);
				
				$turno1 = new DateTime($turno['turno']);
				
				echo "<div class='turno'>" . $turno1->format('d/m/Y') . " a las " . $turno1->format('H:i') . "hs</div>";
				echo "<p>Nombre: " . $turno['nombre'] . "</p>";
				echo "<p>Tel: " . $turno['tel'] . "</p>";
				echo "<p>Mail: " . $turno['mail'] . "</p>";
				
				asignar_turno_bd($turno);
			?>
		</section>
	</div>
</main>

<?php require_once "footer.php" ?>


<?php
	function asignar_turno_bd($turno){
		
		$id = $turno['id'];
		$nombre = $turno['nombre'];
		$tel = $turno['tel'];
		$mail = $turno['mail'];
		
		$db = new PDO("sqlite:datos.s3db");	
		$db->exec("UPDATE turnos SET nombre = '$nombre', tel = '$tel', mail = '$mail', ocupado='1' WHERE id = $id;");
	}
?>

