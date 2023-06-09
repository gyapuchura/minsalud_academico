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

$idobjetivo_anual = $_POST['idobjetivo_anual'];

$_SESSION['idobjetivo_anual_ss'] = $idobjetivo_anual;

header("Location:macrocurriculas.php");

?>