<?php 
/**
* REALIZA LA VALIDACION DE USUARIO AL INGRESAR A SISTEMA 
*
* @idusuario_ss int // número de usuario que se va poner en sesion 
* @usuario_ss varchar // nombre del usuario (nick) que se va poner en sesion
* @password_ss varchar // contraseña del usuario que se va poner en sesion (codificada en SHA1)
* @fecha_ss date // fecha de ingreso a sistema  que se va poner en sesion
* @condicion_ss varchar // condicion de actividad del usuario que se va poner en sesion
* @perfil_ss varchar // perfil del usuario que se va poner en sesion
* @plog_login  // tabla de registro de ingresos a sistema exitosos
* @log_login_failure // tabla de registros de intento de ingresos no exitosos
*/

include("inc.config.php");?>
<?php
//	SE INICIA LA SESION Y SE CREAN VARIABLES DE SESION PARA EL USUARIO QUE INGRESA AL SISTEMA
session_start();

$ip		 	= $_SERVER['REMOTE_ADDR'];
$fecha 		= date("Y-m-d H:i:s");

$usuario_f 	= $_POST['usuario'];
$pass_f   	= $_POST['password'];

$usuario    = $link->real_escape_string($usuario_f);
$password   = $link->real_escape_string($pass_f);


if($usuario == "" or $password == ""){

header("Location:index.php");

}else{
	
  	$sql = "  SELECT idusuario, idnombre, usuario, password, fecha, condicion, perfil, idarea, idcargo ";
	$sql.= "  FROM usuarios WHERE usuario = '$usuario' ";
	$sql.= "  AND password = '$password' AND condicion = 'ACTIVO' ";
	$result = mysqli_query($link,$sql);
	if ($row = mysqli_fetch_array($result)){
	mysqli_field_seek($result,0);
	while ($field = mysqli_fetch_field($result)){
	} do {

		$_SESSION['idusuario_ss']		= $row[0];
		$_SESSION['idnombre_ss'] 		= $row[1];
		$_SESSION['usuario_ss'] 		= $row[2];
		$_SESSION['password_ss'] 		= $row[3];
		$_SESSION['fecha_ss'] 	    	= $row[4];
		$_SESSION['condicion_ss'] 	    = $row[5];
		$_SESSION['perfil_ss'] 	        = $row[6];
		$_SESSION['idarea_ss'] 	        = $row[7];
		$_SESSION['idcargo_ss'] 	    = $row[8];

		$idusuario	= $row[0];
		$user       = $row[2];
		$perfil     = $row[6];

		//	SI EL USUARIO ES CORRECTO, SE REGISTRA EN UN HISTORIAL DE INGRESOS AL SISTEMA

		$sql_i = "INSERT INTO log_login (usuario, fecha, fecha_hora, ip, condicion)";
		$sql_i.= " VALUES ('$user', '$fecha', '$fecha', '$ip', 'OPEN')";
		$result_i = mysqli_query($link,$sql_i);

		//	SE REDIRECCIONA A LA PAGINA DE INICIO DEL SISTEMA

		 header("Location:inicio.php");


	} while ($row = mysqli_fetch_array($result));
	} else {

		//	SI EL USUARIO ES INCORRECTO, SE REGISTRA EN UN HISTORIAL DE INGRESOS FALLIDOS AL SISTEMA

		$sql_i = "INSERT INTO log_login_failure (usuario, password, fecha, fecha_hora, ip)";
		$sql_i.= " VALUES ('$usuario', '$password',  '$fecha', '$fecha', '$ip')";
		$result_i = mysqli_query($link,$sql_i);

		//	SE REDIRECCION AL LOGIN DEL SISTEMA

		header("Location:index.php");
		
	}

}
?>