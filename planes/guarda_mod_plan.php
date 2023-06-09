<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');

$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idplan_anual_ss =  $_SESSION['idplan_anual_ss'];

$denominacion     = $link->real_escape_string(htmlentities($_POST['denominacion']));
$gestion          = $link->real_escape_string(htmlentities($_POST['gestion']));
$idtipo_documento = $_POST['idtipo_documento'];

$fecha_apr        = $_POST['fecha_aprob'];
$fecha_i          = explode('/',$fecha_apr);
$fecha_aprob      = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$vigencia_d       = $_POST['vigencia_i'];
$fecha_j          = explode('/',$vigencia_d);
$vigencia_i       = $fecha_j[2].'-'.$fecha_j[1].'-'.$fecha_j[0];

$vigencia_h       = $_POST['vigencia_f'];
$fecha_k          = explode('/',$vigencia_h);
$vigencia_f       = $fecha_k[2].'-'.$fecha_k[1].'-'.$fecha_k[0];

$no_doc           = $link->real_escape_string(htmlentities($_POST['no_doc']));
$idpartida_presup = $_POST['idpartida_presup'];
$presupuesto      = $link->real_escape_string(htmlentities($_POST['presupuesto']));
    
$sql8 =" UPDATE plan_anual SET denominacion='$denominacion', gestion='$gestion', ";
$sql8.=" idtipo_documento='$idtipo_documento', fecha_aprob='$fecha_aprob', fecha_aprob='$fecha_aprob', ";
$sql8.=" vigencia_i='$vigencia_i', vigencia_f='$vigencia_f', no_doc='$no_doc', idpartida_presup='$idpartida_presup', ";
$sql8.=" presupuesto='$presupuesto' WHERE idplan_anual ='$idplan_anual_ss' ";
$result8 = mysqli_query($link,$sql8);

header("Location:mostrar_plan.php");

?>