<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 		     = date("Y-m-d");
$gestion         = date("Y");

$idusuario_ss    =  $_SESSION['idusuario_ss'];
$idnombre_ss     =  $_SESSION['idnombre_ss'];
$perfil_ss       =  $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$idobjetivo_anual = $_POST['idobjetivo_anual'];
$idmacrocurricula = $_POST['idmacrocurricula'];
$idmicrocurricula = $_POST['idmicrocurricula'];

$fecha_ini        = $_POST['fecha_inicio'];
$fecha_i          = explode('/',$fecha_ini);
$fecha_inicio     = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$fecha_f          = $_POST['fecha_fin'];
$fecha_j          = explode('/',$fecha_f);
$fecha_fin        = $fecha_j[2].'-'.$fecha_j[1].'-'.$fecha_j[0];

$idpublicacion    = $_POST['idpublicacion'];
$cupo_min         = $link->real_escape_string(htmlentities($_POST['cupo_min']));
$cupo_max         = $link->real_escape_string(htmlentities($_POST['cupo_max']));
$idmodalidad      = $_POST['idmodalidad'];
$iddepartamento   = $_POST['iddepartamento'];
$idprovincia      = $_POST['idprovincia'];
$idmunicipio      = $_POST['idmunicipio'];
$iddocente        = $_POST['iddocente'];

$sql8 =" UPDATE evento SET idobjetivo_anual='$idobjetivo_anual', idmacrocurricula='$idmacrocurricula', ";
$sql8.=" idmicrocurricula='$idmicrocurricula', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', ";
$sql8.=" idpublicacion='$idpublicacion', cupo_min='$cupo_min', cupo_max='$cupo_max', idmodalidad='$idmodalidad', ";
$sql8.=" iddepartamento='$iddepartamento', idprovincia='$idprovincia', idmunicipio='$idmunicipio', iddocente='$iddocente'  WHERE idevento ='$idevento_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_evento_mod.php");

?>