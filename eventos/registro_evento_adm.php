<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];
 
$sql8 = " UPDATE evento SET idestado_registro='1' WHERE idevento ='$idevento_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:evento_desconsolidado.php");

?>
