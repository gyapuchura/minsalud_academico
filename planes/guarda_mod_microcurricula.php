<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idplan_anual_ss     = $_SESSION['idplan_anual_ss'];
$idobjetivo_anual_ss = $_SESSION['idobjetivo_anual_ss'];
$idmacrocurricula_ss = $_SESSION['idmacrocurricula_ss'];
$idmicrocurricula_ss = $_SESSION['idmicrocurricula_ss'];

$idtematica          = $_POST['idtematica'];
$carga_horaria       = $link->real_escape_string($_POST['carga_horaria']);
$objetivo_curso      = $link->real_escape_string($_POST['objetivo_curso']);
$idtipo_costo        = $_POST['idtipo_costo'];
$costo               = $link->real_escape_string($_POST['costo']);
$pre_requisito       = $_POST['pre_requisito'];
$idtipo_evento       = $_POST['idtipo_evento'];
$idnivel_curricular  = $_POST['idnivel_curricular'];
$idtipo_evento       = $_POST['idtipo_evento'];

$sql8 =" UPDATE microcurricula SET idtematica='$idtematica', carga_horaria='$carga_horaria', ";
$sql8.=" objetivo_curso='$objetivo_curso', idtipo_costo='$idtipo_costo', costo='$costo', pre_requisito='$pre_requisito', ";
$sql8.=" idtipo_evento='$idtipo_evento', idnivel_curricular='$idnivel_curricular', idtipo_evento='$idtipo_evento' ";
$sql8.=" WHERE idmicrocurricula ='$idmicrocurricula_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_microcurricula.php");

?>