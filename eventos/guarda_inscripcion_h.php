<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");
$gestion      = date("Y");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idtematica_ss    =  $_SESSION['idtematica_ss'];
$idevento_ss      =  $_SESSION['idevento_ss'];
$codigo_evento_ss =  $_SESSION['codigo_evento_ss'];

$idnombre_inscrito_ss =  $_SESSION['idnombre_inscrito_ss'];
$nombre_inscrito_ss   =  $_SESSION['nombre_inscrito_ss'];
$paterno_inscrito_ss  =  $_SESSION['paterno_inscrito_ss'];
$materno_inscrito_ss  =  $_SESSION['materno_inscrito_ss'];
$ci_inscrito_ss       =  $_SESSION['ci_inscrito_ss'];

//-----DATOS ENVIADOS EN EL FORMULARIO DE PREINSCRIPCION ----- //

$idusuario_inscrito = $_POST['idusuario_inscrito'];
$idnombre_datos     = $_POST['idnombre_datos'];
$iddato_laboral     = $_POST['iddato_laboral'];

//----- Guardamos inscripcion  ------//

//----- Obtenemos el codigo y correlativo de inscripcion ------//

$sqlm="SELECT MAX(correlativo) FROM inscripcion WHERE gestion='$gestion' ";
$resultm=mysqli_query($link,$sqlm);
$rowm=mysqli_fetch_array($resultm);

$correlativo=$rowm[0]+1;

$codigo="INS/MDSYD-".$correlativo."/".$gestion;

//----- Realizamos la seleccion de tipo de dependencias ------//


//------ DEPENDE DE OTRA ENTIDAD -------------//

    $sql8 = " INSERT INTO inscripcion (idevento, idusuario, idnombre, idnombre_datos, iddato_laboral, ";
    $sql8.= " idestado_inscripcion, correlativo, codigo, fecha_preins, fecha_ins, gestion )";
    $sql8.= " VALUES ('$idevento_ss','$idusuario_inscrito','$idnombre_inscrito_ss','$idnombre_datos','$iddato_laboral',";
    $sql8.= " '1','$correlativo','$codigo','$fecha','$fecha','$gestion')";
    $result8 = mysqli_query($link,$sql8);  

    $idinscripcion = mysqli_insert_id($link);
    $_SESSION['idinscripcion_ss'] = $idinscripcion; 

    header("Location:mostrar_inscripcion.php");
          
?>