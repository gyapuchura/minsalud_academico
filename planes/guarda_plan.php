<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$denominacion   = $link->real_escape_string($_POST['denominacion']);
$gestion        = $link->real_escape_string($_POST['gestion']);
$idtipo_documento = $_POST['idtipo_documento'];

$fecha_ap    = $_POST['fecha_aprob'];
$fecha_i     = explode('/',$fecha_ap);
$fecha_aprob = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$vigencia_d  = $_POST['vigencia_i'];
$desde       = explode('/',$vigencia_d);
$vigencia_i  = $desde[2].'-'.$desde[1].'-'.$desde[0];

$vigencia_h  = $_POST['vigencia_f'];
$hasta       = explode('/',$vigencia_h);
$vigencia_f  = $hasta[2].'-'.$hasta[1].'-'.$hasta[0];

$no_doc      = $link->real_escape_string($_POST['no_doc']);
$idpartida_presup  = $_POST['idpartida_presup'];
$presupuesto = $link->real_escape_string($_POST['presupuesto']);

 
if ($denominacion == '' && $gestion == '' && $no_doc == '' && $presupuesto == ''  )

    {

    header("Location:mensaje_plan_vacio.php");

    } else {

        $codigo = "P-".$gestion;

        $sql7=" INSERT INTO plan_anual ( denominacion, gestion, idtipo_documento, fecha_aprob, vigencia_i, vigencia_f, no_doc, idpartida_presup, presupuesto, codigo, idusuario ) ";
        $sql7.=" VALUES ('$denominacion','$gestion','$idtipo_documento','$fecha_aprob','$vigencia_i','$vigencia_f','$no_doc','$idpartida_presup','$presupuesto','$codigo','$idusuario_ss') ";
        $result7 = mysqli_query($link,$sql7);

        header("Location:planes_anuales.php");

        }   

?>