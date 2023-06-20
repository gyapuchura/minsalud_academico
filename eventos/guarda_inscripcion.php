<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');

$fecha 		  = date("Y-m-d");
$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$paterno    = $link->real_escape_string(htmlentities($_POST['paterno']));
$materno    = $link->real_escape_string(htmlentities($_POST['materno']));
$nombres    = $link->real_escape_string(htmlentities($_POST['nombres']));
$ci         = $link->real_escape_string(htmlentities($_POST['ci']));
$exp        = $link->real_escape_string(htmlentities($_POST['exp']));
$usuario_in = $link->real_escape_string(htmlentities($_POST['usuario']));
$pass       = $link->real_escape_string(htmlentities($_POST['password']));

$password   = sha1($pass);

$perfil     = $_POST['perfil'];

$idarea     = $_POST['idarea'];
$idcargo    = $_POST['idcargo'];
$idempresa  = $_POST['idempresa'];

$cargo_e    = $link->real_escape_string(htmlentities($_POST['cargo_e']));

//validamosd variables con valores nulos.

if ($paterno == '' || $materno == '' || $nombres == '' || $ci == '' || $exp  == '' || $usuario_in  == '' || $pass == '' )
{
header("Location:registro_inscripcion.php");
}
else {

    //verificamos existencia del numero de cedula de identidad.
$sql8 = " SELECT idnombre, paterno, materno, nombres, ci FROM nombres WHERE ci='$ci' ";
$result8 = mysqli_query($link,$sql8);

    if ($row8 = mysqli_fetch_array($result8)) {
    header("Location:usuario_existe.php");
    }

    else {
           //verificamos existencia del nombre de usuario (nick).    
    $sql9 = " SELECT idusuario, usuario FROM usuarios WHERE usuario='$usuario_in' ";
    $result9 = mysqli_query($link,$sql9);

    if ($row9 = mysqli_fetch_array($result9)) {
        header("Location:usuario_nombre_existe.php");
    } else {

/* Primero Insertamos los datos en la tabla de nombres */
$sql0 = " INSERT INTO nombres ( paterno, materno, nombres, ci, exp ) ";
$sql0.= " VALUES ('$paterno', '$materno', '$nombres', '$ci', '$exp') ";
$result0 = mysqli_query($link,$sql0);

$idnombre_in=mysqli_insert_id($link);

 /* De acuerdo al perfil de usuario se guarda de 2 maneras diferentes */

if ($perfil == "DAF-EMPRESA" || $perfil == "UAI-EMPRESA") {
    
    /* si el usuario es externo a la CGE */
    /* Primero Insertamos los datos en la tabla de usuarios */

    $sql7 = " INSERT INTO usuarios (idnombre, usuario, password, fecha, condicion, perfil, idarea, idcargo, idempresa, cargo_e ) ";
    $sql7.= " VALUES ('$idnombre_in','$usuario_in','$password','$fecha','ACTIVO','$perfil','34','61','$idempresa','$cargo_e')";
    $result7 = mysqli_query($link,$sql7);  

    /* Redireccionamos a la pagina de usuarios registrados */
    header("Location:usuarios.php");
    
} else {

     /* Si el usuario pertenece a la SCEP (imnterno) */
    $sql7 = " INSERT INTO usuarios (idnombre, usuario, password, fecha, condicion, perfil, idarea, idcargo, idempresa, cargo_e ) ";
    $sql7.= "  VALUES ('$idnombre_in','$usuario_in','$password','$fecha','ACTIVO','$perfil','$idarea','$idcargo','70','')";
    $result7 = mysqli_query($link,$sql7); 

    /* redireccionamos a la pagina de usuarios registrados */
    header("Location:usuarios.php");
}
}
}
}
?>