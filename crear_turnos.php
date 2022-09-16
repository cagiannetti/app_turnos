<?php require_once "header.php"	?>
<main>
	<div id="app">
		<h2>Administrar turnos</h2>
			<?php
			
				date_default_timezone_set("America/Argentina/Buenos_Aires");

				echo "<h3>Datos recibidos</h3>";
				echo "<p>Fecha: " . $_GET['fecha'] . "</p>";
				echo "<p>Inicio: " . $_GET['hora_inicio'] . " - Fin: " . $_GET['hora_fin'] . " - Intervalo: " . $_GET['intervalo'] . "min</p>";
			
				$primer_turno_dia_hora = $_GET['fecha'] . " " . $_GET['hora_inicio'];
				$primer_turno = new DateTime($primer_turno_dia_hora); //ej: ('1982-08-15 15:23:48');
				
				$ultimo_turno_dia_hora = $_GET['fecha'] . " " . $_GET['hora_fin'];
				$ultimo_turno = new DateTime($ultimo_turno_dia_hora);

				$intervalo = "+ " . $_GET['intervalo'] . " minutes";
				
				echo "<hr />";
									
				echo "<h3>Se generarán los siguientes turnos:</h3>";
				while ($primer_turno < $ultimo_turno) {
					echo "<p>".$primer_turno->format('Y-m-d H:i:s')."</p>";
					insertar_turno_bd($primer_turno->format('Y-m-d H:i:s'));
					$primer_turno->modify($intervalo);
				}
				
				// listar_turnos_bd();
				$fecha = $_GET['fecha'];
				header("Location: administrar_turnos.php?fecha=$fecha");

			?>
	</div>
</main>

<?php require_once "footer.php" ?>


<?php
	function insertar_turno_bd($turno){
		$db = new PDO("sqlite:datos.s3db");
		$db->exec("INSERT INTO turnos(id, turno) VALUES(NULL, '$turno');");
	}
	
	function listar_turnos_bd(){
		//select id, time(turno) from turnos;
		//select id, date(turno) from turnos;
		//select id, datetime(turno) as turno from turnos;
		
		$db = new PDO("sqlite:datos.s3db");
		$resultado = $db->query('select id, datetime(turno) as turno from turnos;');
		
		foreach($resultado as $fila){
			$id = $fila["id"];
			$turno = $fila["turno"];
			echo $fila["id"];
			echo " -> ";
			echo $fila["turno"];
			echo "<br>";
		}
	}
?>

