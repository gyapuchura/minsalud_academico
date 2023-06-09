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
$idplan_anual_ss  = $_SESSION['idplan_anual_ss'];

$idevento       = $_POST['idevento'];
$codigo_evento  = $_POST['codigo'];

$_SESSION['idevento_ss'] = $idevento;
$_SESSION['codigo_evento_ss'] = $codigo_evento;

header("Location:mostrar_evento_adm.php");

?>