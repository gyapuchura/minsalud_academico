<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha_ram	  = date("Ymd");
$fecha 	      = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idtematica_ss    =  $_SESSION['idtematica_ss'];
$idevento_ss      =  $_SESSION['idevento_ss'];
$codigo_evento_ss =  $_SESSION['codigo_evento_ss'];

$ci = $_POST['ci'];

if ($ci == '') {
    header("Location:inicio_inscripcion_ci.php");
} else {
   
    $sql = " SELECT usuarios.idusuario, usuarios.idnombre, nombre.nombre, nombre.paterno, ";
    $sql.= " nombre.materno, nombre.ci FROM usuarios, nombre ";
	$sql.= " WHERE usuarios.idnombre=nombre.idnombre AND nombre.ci = '$ci' ";
	$sql.= " AND condicion = 'ACTIVO' ";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);

    $_SESSION['idusuario_inscrito_ss'] = $row[0];
    $_SESSION['idnombre_inscrito_ss'] = $row[1];
    $_SESSION['nombre_inscrito_ss'] = $row[2];
    $_SESSION['paterno_inscrito_ss'] = $row[3];
    $_SESSION['materno_inscrito_ss'] = $row[4];
    $_SESSION['ci_inscrito_ss'] = $row[5];

header("Location:registro_inscripcion_dp.php");
}




?>