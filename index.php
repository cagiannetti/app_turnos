<?php require_once "header.php" ?>
		
<main>
	<div id="app">
		<h2>Solicitar turno</h2>
		<section id="turnos" class="grilla-2-col">
			<div id="form_fecha">
				<form action="procesar_turno.php">
					<label for="fecha">Fecha</label>
					<?php 
						//obtener la ultima fecha donde se crearon turnos para limitar el input calendario|
						$db = new PDO("sqlite:datos.s3db");
						$sql="SELECT * FROM turnos ORDER BY turno DESC LIMIT 1;";
						$resultado = $db->query($sql);
						
						foreach($resultado as $fila){
							$id = $fila["id"];
							$turno = $fila["turno"];
							$separar = (explode(" ",$turno));
							$fecha = $separar[0];
							$hora = $separar[1];
							// echo $fecha;
						}
						
					?>
					<input type="date" id="fecha" name="fecha" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" max="<?php echo $fecha ?>" /><br />
				</form>
			</div>

			<div id="listado">
				<div class="text-center">
					<small>Turnos disponibles para la fecha seleccionada</small>
				</div>
				<div id="cargando" class="lds-dual-ring">
					<!-- spinner aquí -->
				</div>
				<div id="turnos_lista">
					<!-- llenado dinámico -->
				</div>
			</div>
		</section>

	</div>
	<div class="espaciador-10"></div>
</main>

<?php require_once "footer.php" ?>