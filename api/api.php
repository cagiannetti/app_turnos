<?php
	session_start(); // para tener acceso a cuestiones de sessión_id
	$data = file_get_contents('php://input'); //leer petición post en bruto, ya no es un post clásico
	$jsonData = json_decode($data);
	$fecha=$jsonData->{'fecha'};

	$sesion_cookie_cliente = $_COOKIE['PHPSESSID']; //viene en la petición fetch desde el front-end
	$sesion_id_servidor = session_id(); //id de la sessión actual en el servidor
	
	if ($sesion_cookie_cliente == $sesion_id_servidor){ // evitamos peticiones de otro lado?
		$db = new SQLite3('../datos.s3db');
		$sql = "SELECT * FROM turnos WHERE turno LIKE '%" . $fecha ."%' AND ocupado = '0'";
		$result = $db->query($sql); //->fetchArray(SQLITE3_ASSOC);
		$turnos = array();
		$i = 0;

		while($res = $result->fetchArray(SQLITE3_ASSOC)){
			if(!isset($res['id'])) continue;
			$turnos[$i]['id'] = $res['id'];
			$turnos[$i]['turno'] = $res['turno'];
			$i++;
		}

		echo json_encode($turnos);
	}else{
		echo "tomatelás";
	}
	


?>















