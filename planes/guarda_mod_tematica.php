<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idtematica_ss =  $_SESSION['idtematica_ss'];

$tematica      = $link->real_escape_string($_POST['tematica']);

$sql8 = " UPDATE tematica SET tematica='$tematica', idusuario='$idusuario_ss' ";
$sql8.= " WHERE idtematica ='$idtematica_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_tematica.php");

?>