<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	 = date("Ymd");
$fecha 	     = date("Y-m-d");
$gestion     = date("Y");

$idusuario_ss =  $_SESSION['idusuario_ss'];
$idnombre_ss  =  $_SESSION['idnombre_ss'];
$perfil_ss    =  $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$inicializacion = $_POST['inicio'];
$fecha_i        = explode('/',$inicializacion);
$inicio         = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$finalizacion   = $_POST['fin'];
$fecha_f        = explode('/',$finalizacion);
$fin            = $fecha_f[2].'-'.$fecha_f[1].'-'.$fecha_f[0];

$idaula         = $_POST['idaula'];
$hora_i         = $_POST['hora_i'];
$hora_f         = $_POST['hora_f'];

if ($inicio == '' || $fin == '' || $idaula == '' || $hora_i == '' || $hora_f == '') {
header("Location:evento_horario.php");
}
else {
$sql0 = " INSERT INTO horario (idevento, idaula, inicio, fin, hora_i, hora_f ) ";
$sql0.= "  VALUES ('$idevento_ss','$idaula','$inicio','$fin','$hora_i','$hora_f') ";
$result0 = mysqli_query($link,$sql0);
header("Location:evento_horario.php");
}
?>


