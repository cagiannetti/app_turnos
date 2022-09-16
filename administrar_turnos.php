<?php require_once "header.php" ?>

<?php

if(!$_SESSION['login']){
	header('Location:login.php');
}

?>

<main>
	<div id="app">
		<h2>Administrar turnos</h2>
		<form action="crear_turnos.php" method="GET">
			<div class="grilla-2-col">
				<div>			
					<label for="fecha">Fecha</label>
					<input type="date" id="fecha" name="fecha" value="<?php
						if (isset($_GET['fecha'])){
							echo $_GET['fecha'];
						}else{
							echo date("Y-m-d");
						}
					?>" /><br />
					
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
			</div>
			<div class="espaciador-10"></div>
			<hr />
			<div class="espaciador-10"></div>
			<div class="grilla-3-col">
				<div>
					<label>hora de inicio</label>
					<input type="time" id="hora_inicio" name="hora_inicio" value="10:00" />
				</div>
				<div>
					<label>hora de fin</label>
					<input type="time" id="hora_fin" name="hora_fin" value="16:00"/>
				</div>
				<div>
					<label>Turno cada</label>
					<select id="intervalo" name="intervalo">
						<option value="10">10 min</option>
						<option value="20">20 min</option>
						<option value="30">30 min</option>
						<option value="40">40 min</option>
						<option value="50">50 min</option>
						<option value="60" selected>1 hora</option>
					</select>
				</div>
			</div>
			<div class="espaciador-20"></div>
			<input type="submit" name="btn_enviar" id="btn_enviar" value="Generar Turnos"/>
		</form>
	</div>
</main>

<?php require_once "footer.php" ?>