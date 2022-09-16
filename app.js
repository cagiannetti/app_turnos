/* Inicialización - Declaraciones */

let $fecha = document.getElementById('fecha');
$fecha.addEventListener('change', actualizarTurnos);
let $turnos_lista = document.getElementById('turnos_lista');
let $cargando = document.getElementById('cargando');
$cargando.style.display = 'none';
// getCookies();
//setFechaActual();
actualizarTurnos();


/* Funciones */

function actualizarTurnos(){
let cadena = "";
$turnos_lista.innerHTML = "";
$cargando.style.display="block";

let url = "api/api.php"
let data = {fecha:$fecha.value}
let options = {
	method: 'POST',
	body: JSON.stringify(data),
	mode: 'cors',
	headers:{
		'Content-Type': 'application/json'
	}
}

fetch(url, options)
    .then((response) => response.json())
    .then(async (turnos) => {
            // Fuerzo artificialmente a que dure más para que se pueda observar el Spinner
        await generaDemora();
		if(turnos.length==0){
			cadena = "No se encotnraron turnos";
		}else{
			turnos.forEach(turno => {
			cadena += `<a class="turno" href="reservar_turno.php?id=${turno.id}&turno=${turno.turno}"><div >${turno.turno.slice(11,16)}</div></a>`;
			});
		}
		
		$cargando.style.display="none";
        $turnos_lista.innerHTML= cadena;
    })
    .catch(error => console.error('Error:', error));
}

const generaDemora = async () => {
    return new Promise((resolve, reject) => {
	setTimeout(() => {
        resolve();
    }, 500);
  });   
}














/* Funciones descartadads */

function getCookies(){
	misCookies = document.cookie;
	console.log(misCookies);
	listaCookies = misCookies.split(";");
	console.log(listaCookies);
	console.log(listaCookies[0]);
	tokenCookie = listaCookies[0].split("=");
	console.log(tokenCookie[1]);
}

function setFechaActual(){ //asigna fecha actual al campo fecha lo resolví con php 
	let f = new Date();
	let ano = f.getFullYear();
	let dia = (f.getDate()<10) ? ("0" + f.getDate()) : f.getDate();
	let mes = (f.getMonth() + 1);
	let mes1 = (mes<10) ? ("0" + mes) : mes;
	let fechaFormateada = ano + "-" + mes1 + "-" + dia;
	$fecha.value = fechaFormateada;  //usar formato "yyyy-mm-dd"
}