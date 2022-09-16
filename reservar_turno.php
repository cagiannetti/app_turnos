<?php require_once "header.php" ?>
		
<main>
	<div id="app">
	
		<section id="turnos" class="grilla-2-col text-center grilla-v-center borde-suave">
			<div>
				<h2>Reservar turno</h2>
			</div>
			<div>
				<h3 class="turno m-auto">
					<?php
						$turno = $_GET['turno'];
						$id_turno = $_GET['id'];
						$turno1 = new DateTime($turno);
						echo $turno1->format('d/m/Y') . " a las " . $turno1->format('H:i') . "hs";
					?>
				</h3>
			</div>
		</section>
		<div class="espaciador-10"></div>
		<hr />
		<div id="form_cliente">
			<form action="procesar_turno.php">
				<h3>Datos personales</h3>
				<input type="hidden" id ="id" name="id" value="<?php echo $id_turno ?>"><br>
				<input type="hidden" id ="turno" name="turno" value="<?php echo $turno ?>"><br>				
				<label for="nombre">Apellido y Nombre</label>
				<input type="text" id ="nombre" name="nombre"><br>
				<label for="tel">Tel</label>
				<input type="text" name="tel"><br>
				<label for="mail">Mail</label>
				<input type="mail" name="mail"><br>
				<input type="submit" name="btn_enviar" id="btn_enviar" value="Reservar turno"/>
			</form>
		</div>
	</div>
</main>

<?php require_once "footer.php" ?>