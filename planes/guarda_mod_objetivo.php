<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idplan_anual_ss = $_SESSION['idplan_anual_ss'];

$objetivo_anual = $link->real_escape_string($_POST['objetivo_anual']);
$meta           = $link->real_escape_string($_POST['meta']);
$presupuesto    = $link->real_escape_string($_POST['presupuesto']);
 
$sql8 = " UPDATE objetivo_anual SET objetivo_anual='$objetivo_anual', meta='$meta', ";
$sql8.= " presupuesto='$presupuesto' WHERE idobjetivo_anual ='$objetivo_anual_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_objetivo_anual.php");

?>