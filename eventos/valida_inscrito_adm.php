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

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$idinscripcion    = $_POST['idinscripcion'];
$idtematica       = $_POST['idtematica'];

$_SESSION['idinscripcion_ss'] = $idinscripcion;
$_SESSION['idtematica_ss']    = $idtematica;

header("Location:gestionar_inscrito.php");

?>