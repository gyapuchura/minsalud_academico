<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha 		   = date("Y-m-d");
$gestion       = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];


$tematica = $link->real_escape_string($_POST['tematica']);
 
if ($tematica == '')

    {

    header("Location:mensaje_objetivo_vacio.php");

    } else {

        $sql7 =" INSERT INTO tematica (tematica, idusuario) ";
        $sql7.=" VALUES ('$tematica','$idusuario_ss') ";
        $result7 = mysqli_query($link,$sql7);

        header("Location:tematicas.php");

        }   

?>