<?php include("../cabf_o.php");?>
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

$idtematica       = $_POST['idtematica'];

$_SESSION['idtematica_ss'] = $idtematica;

header("Location:eventos_tema_o.php");
?>