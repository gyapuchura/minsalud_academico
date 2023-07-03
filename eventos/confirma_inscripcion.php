<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss     = $_SESSION['idusuario_ss'];
$idnombre_ss      = $_SESSION['idnombre_ss'];
$perfil_ss        = $_SESSION['perfil_ss'];

$idtematica_ss    = $_SESSION['idtematica_ss'];
$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$idinscripcion    = $_POST['idinscripcion'];

$sql8 = " UPDATE inscripcion SET idestado_inscripcion ='2' ";
$sql8.= " WHERE idinscripcion = '$idinscripcion' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mensaje_confirmacion_ins.php");
?>