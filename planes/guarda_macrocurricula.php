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

$idarea_conocimiento = $_POST['idarea_conocimiento'];
$macrocurricula      = $link->real_escape_string($_POST['macrocurricula']);
$idambito            = $_POST['idambito'];
$idmodelo_educativo  = $_POST['idmodelo_educativo'];
 
if ($idarea_conocimiento == '' && $macrocurricula == '' && $idambito == ''  && $idmodelo_educativo == '')

    {

    header("Location:mensaje_macro_vacio.php");

    } else {

        $sql0 =" SELECT idplan_anual, codigo, gestion FROM plan_anual WHERE idplan_anual='$idplan_anual_ss' ";
        $result0 = mysqli_query($link,$sql0);
        $row0 = mysqli_fetch_array($result0);

        $sql_o =" SELECT idobjetivo_anual, codigo FROM objetivo_anual WHERE idobjetivo_anual='$idobjetivo_anual_ss' ";
        $result_o = mysqli_query($link,$sql_o);
        $row_o = mysqli_fetch_array($result_o);


        $sqlm="SELECT MAX(correlativo) FROM macrocurricula WHERE idobjetivo_anual='$idobjetivo_anual_ss'";
        $resultm = mysqli_query($link,$sqlm);
        $rowm = mysqli_fetch_array($resultm);
        $correlativo = $rowm[0]+1;

        $codigo = "MACRO-".$correlativo."/".$row_o[1];

        $sql7 =" INSERT INTO macrocurricula (idobjetivo_anual, idarea_conocimiento, macrocurricula, idambito, idmodelo_educativo, codigo, correlativo, idusuario) ";
        $sql7.=" VALUES ('$idobjetivo_anual_ss','$idarea_conocimiento','$macrocurricula','$idambito ','$idmodelo_educativo','$codigo','$correlativo','$idusuario_ss') ";
        $result7 = mysqli_query($link,$sql7);

        header("Location:macrocurriculas.php");

        }   

?>