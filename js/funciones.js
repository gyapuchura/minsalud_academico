function agregardatos(nombre,apellido,email,telefono){

	cadena="nombre=" + nombre +
			"&apellido=" + apellido +
			"&email=" + email +
			"&telefono=" + telefono;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#iddirectriz').val(d[0]);
	$('#directrizn').val(d[1]);
	$('#codigo').val(d[2]);
	$('#ambito').val(d[3]);
	$('#tipo_directriz').val(d[4]);
	$('#resolucion').val(d[5]);
	$('#fecha_resolucion').val(d[6]);
	$('#fecha_vigente').val(d[7]);

}



function agregaformp(datos){

	d=datos.split('||');

	$('#idprograma').val(d[0]);
	$('#iddirectriz').val(d[1]);
	$('#codigo').val(d[2]);
	$('#programap').val(d[3]);
	$('#competencia').val(d[4]);
	$('#resolucion').val(d[5]);
	$('#fecha_resolucion').val(d[6]);
	$('#fecha_vigente').val(d[7]);

}


function actualizaDatos(){


	id=$('#idpersona').val();
	nombre=$('#nombreu').val();
	apellido=$('#apellidou').val();
	email=$('#emailu').val();
	telefono=$('#telefonou').val();

	cadena= "id=" + id +
			"&nombre=" + nombre +
			"&apellido=" + apellido +
			"&email=" + email +
			"&telefono=" + telefono;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){

			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}


function validateEmailAddress(email) {
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(email);
}

function validate() {
$("#result").text("");
var emailaddress = $("#email").val();
if (validateEmailAddress(emailaddress)) {
$("#result").text(emailaddress + " is valid :)");
$("#result").css("color", "green");
} else {
$("#result").text(emailaddress + " is not correct, please retry:(");
$("#result").css("color", "red");
}
return false;
}
$("#validate").bind("click", validate);