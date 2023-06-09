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
 
if ($objetivo_anual == '' && $meta == '' && $presupuesto == '')

    {

    header("Location:mensaje_objetivo_vacio.php");

    } else {

        $sql0 =" SELECT idplan_anual, codigo, gestion FROM plan_anual WHERE idplan_anual='$idplan_anual_ss' ";
        $result0 = mysqli_query($link,$sql0);
        $row0 = mysqli_fetch_array($result0);

        $sqlm="SELECT MAX(correlativo) FROM objetivo_anual WHERE gestion='$row0[2]' ";
        $resultm = mysqli_query($link,$sqlm);
        $rowm = mysqli_fetch_array($resultm);
        $correlativo = $rowm[0]+1;

        $codigo = "OBJ-".$correlativo."/".$row0[2];

        $sql7 =" INSERT INTO objetivo_anual (idplan_anual, correlativo, codigo, objetivo_anual, meta,  presupuesto, idusuario, gestion ) ";
        $sql7.=" VALUES ('$idplan_anual_ss','$correlativo','$codigo','$objetivo_anual','$meta','$presupuesto','$idusuario_ss','$row0[2]') ";
        $result7 = mysqli_query($link,$sql7);

        header("Location:objetivos_anuales.php");

        }   

?>