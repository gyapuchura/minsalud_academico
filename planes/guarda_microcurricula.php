<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idplan_anual_ss     =  $_SESSION['idplan_anual_ss'];
$idobjetivo_anual_ss =  $_SESSION['idobjetivo_anual_ss'];
$idmacrocurricula_ss =  $_SESSION['idmacrocurricula_ss'];

$idtematica          = $_POST['idtematica'];
$carga_horaria       = $link->real_escape_string($_POST['carga_horaria']);
$objetivo_curso      = $link->real_escape_string($_POST['objetivo_curso']);
$idtipo_costo        = $_POST['idtipo_costo'];
$costo               = $link->real_escape_string($_POST['costo']);
$pre_requisito       = $_POST['pre_requisito'];
$idtipo_evento       = $_POST['idtipo_evento'];
$idnivel_curricular  = $_POST['idnivel_curricular'];
$idtipo_evento       = $_POST['idtipo_evento'];

 
if ($carga_horaria == '' && $objetivo_curso == '' && $costo == '' )

    {

    header("Location:nueva_microcurricula.php");

    } else {

        $sql0 =" SELECT idplan_anual, codigo, gestion FROM plan_anual WHERE idplan_anual='$idplan_anual_ss' ";
        $result0 = mysqli_query($link,$sql0);
        $row0 = mysqli_fetch_array($result0);
        $anual = $row0[2];

        $sqlm="SELECT MAX(correlativo) FROM macrocurricula WHERE idobjetivo_anual='$idobjetivo_anual_ss' AND idmacrocurricula='$idmacrocurricula_ss'";
        $resultm = mysqli_query($link,$sqlm);
        $rowm = mysqli_fetch_array($resultm);
        $correlativo_macro = $rowm[0];

        $sqlmi="SELECT MAX(correlativo) FROM microcurricula WHERE idmacrocurricula='$idmacrocurricula_ss'";
        $resultmi = mysqli_query($link,$sqlmi);
        $rowmi = mysqli_fetch_array($resultmi);
        $correlativo_micro = $rowmi[0]+1;

        $codigo = "MICRO-".$correlativo_micro."/".$correlativo_macro."/".$anual;

        $sql7 =" INSERT INTO microcurricula (idmacrocurricula, correlativo,  codigo, idtematica, carga_horaria, objetivo_curso, idtipo_costo, costo, pre_requisito, idtipo_evento, idnivel_curricular, idusuario) ";
        $sql7.=" VALUES ('$idmacrocurricula_ss','$correlativo_micro','$codigo','$idtematica','$carga_horaria','$objetivo_curso','$idtipo_costo','$costo','$pre_requisito','$idtipo_evento','$idnivel_curricular','$idusuario_ss') ";
        $result7 = mysqli_query($link,$sql7);

        header("Location:microcurriculas.php");

        }   

?>