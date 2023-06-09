<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idplan_anual_ss      = $_SESSION['idplan_anual_ss'];
$idobjetivo_anual_ss  = $_SESSION['idobjetivo_anual_ss'];
$idmacrocurricula_ss  = $_SESSION['idmacrocurricula_ss'];

$idarea_conocimiento = $_POST['idarea_conocimiento'];
$macrocurricula      = $link->real_escape_string(htmlentities($_POST['macrocurricula']));
$idambito            = $_POST['idambito'];
$idmodelo_educativo  = $_POST['idmodelo_educativo'];
    
$sql8 =" UPDATE macrocurricula SET idarea_conocimiento='$idarea_conocimiento', macrocurricula='$macrocurricula', ";
$sql8.=" idambito='$idambito', idmodelo_educativo='$idmodelo_educativo' ";
$sql8.=" WHERE idmacrocurricula ='$idmacrocurricula_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_macrocurricula.php");

?>