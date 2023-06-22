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

//-----DATOS ENVIADOS EN EL FORMULARIO DE PREINSCRIPCION ----- //
$nombre      = $link->real_escape_string(htmlentities($_POST['nombre']));
$paterno     = $link->real_escape_string(htmlentities($_POST['paterno']));
$materno     = $link->real_escape_string(htmlentities($_POST['materno']));
$ci          = $link->real_escape_string(htmlentities($_POST['ci']));
$complemento = $link->real_escape_string(htmlentities($_POST['complemento']));
$exp         = $link->real_escape_string(htmlentities($_POST['exp']));

$idnacionalidad        = $_POST['idnacionalidad'];
$idgenero              = $_POST['idgenero'];
$idformacion_academica = $_POST['idformacion_academica'];
$idprofesion           = $_POST['idprofesion'];

    if ($idprofesion == '1') {
    $idespecialidad_medica = $_POST['idespecialidad_medica'];    
    } else {
    $idespecialidad_medica = '0';
    }

$correo  = $link->real_escape_string(htmlentities($_POST['correo']));
$celular = $link->real_escape_string(htmlentities($_POST['celular']));

$iddependencia = $_POST['iddependencia'];

//para el caso de participante de otra entidad.
$entidad       = $link->real_escape_string(htmlentities($_POST['entidad']));
$cargo_entidad = $link->real_escape_string(htmlentities($_POST['cargo_entidad']));

//para el caso de participante del Ministerio de Salud y Deportes.
$idministerio = $_POST['idministerio'];
$iddireccion  = $_POST['iddireccion'];
$idarea       = $_POST['idarea'];
$cargo_mds    = $link->real_escape_string(htmlentities($_POST['cargo_mds']));

//para el caso de participante de una Red de salud.
$iddepartamento = $_POST['iddepartamento'];
$idred_salud    = $_POST['idred_salud'];
$idestablecimiento_salud = $_POST['idestablecimiento_salud'];
$cargo_red_salud = $link->real_escape_string(htmlentities($_POST['cargo_red_salud']));

//----- Guardamos datos de usuario nuevo ------//

//verificamos existencia del número de cedula de identidad.
    $sql8 = " SELECT idnombre, paterno, materno, nombre, ci FROM nombre WHERE ci='$ci' ";
    $result8 = mysqli_query($link,$sql8);
      if ($row8 = mysqli_fetch_array($result8)) {
      header("Location:usuario_existe.php");
      }  
      else {

  /* Primero Insertamos los datos en la tabla de nombres */
  $sql0 = " INSERT INTO nombre ( paterno, materno, nombre, ci, exp ) ";
  $sql0.= " VALUES ('$paterno', '$materno', '$nombre', '$ci', '$exp') ";
  $result0 = mysqli_query($link,$sql0);
  
  $idnombre = mysqli_insert_id($link);

 /* Primero Insertamos los datos en la tabla de usuarios */
  $sql7 = " INSERT INTO usuarios (idnombre, usuario, password, fecha, condicion, perfil) ";
  $sql7.= " VALUES ('$idnombre','$ci','$ci','$fecha','ACTIVO','PARTICIPANTE')";
  $result7 = mysqli_query($link,$sql7);  

  $idusuario_in = mysqli_insert_id($link);
//----- Obtenemos el codigo y correlativo de inscripcion ------//

$sqlm="SELECT MAX(correlativo) FROM inscripcion WHERE gestion='$gestion' ";
$resultm=mysqli_query($link,$sqlm);
$rowm=mysqli_fetch_array($resultm);

$correlativo=$rowm[0]+1;

$codigo="INS/MDSYD-".$correlativo."/".$gestion;

//----- Realizamos la seleccion de tipo de dependencias ------//

if ($iddependencia == '1') {
    echo "DEPENDE DE OTRA ENTIDAD";
    echo "</br>";
    echo $entidad;
    echo "</br>";
    echo $cargo_entidad;

    $sql8 = " INSERT INTO inscripcion (idevento, idusuario, idnacionalidad , idgenero, idformacion_academica, idprofesion,";
    $sql8.= " idespecialidad_medica, correo, celular, iddependencia, entidad, cargo_entidad, ";
    $sql8.= " idministerio, iddireccion, idarea, cargo_mds, iddepartamento, idred_salud, idestablecimiento_salud, ";
    $sql8.= " cargo_red_salud, idestado_inscripcion, correlativo, codigo, fecha_preins, fecha_ins, gestion )";
    $sql8.= " VALUES ('$idevento_ss','$idusuario_in','$idnacionalidad','$idgenero','$idformacion_academica','$idprofesion', ";
    $sql8.= " '$idespecialidad_medica','$correo','$celular','$iddependencia','$entidad','$cargo_entidad', ";
    $sql8.= " '0','0','0','','0','0','0', ";
    $sql8.= " '','1','$correlativo','$codigo','$fecha','$fecha','$gestion')";
    $result8 = mysqli_query($link,$sql8);  

} else {
    if ($iddependencia == '2') {
        echo "DEPENDE DEL MINISTERIO DE SALUD Y DEPORTES";
        echo "</br>";
        echo $idministerio;
        echo "</br>";
        echo $iddireccion;
        echo "</br>";
        echo $idarea;
        echo "</br>";
        echo $cargo_mds;

        $sql8 = " INSERT INTO inscripcion (idevento, idusuario, idnacionalidad , idgenero, idformacion_academica, idprofesion,";
        $sql8.= " idespecialidad_medica, correo, celular, iddependencia, entidad, cargo_entidad, ";
        $sql8.= " idministerio, iddireccion, idarea, cargo_mds, iddepartamento, idred_salud, idestablecimiento_salud, ";
        $sql8.= " cargo_red_salud, idestado_inscripcion, correlativo, codigo, fecha_preins, fecha_ins, gestion)";
        $sql8.= " VALUES ('$idevento_ss','$idusuario_in','$idnacionalidad','$idgenero','$idformacion_academica','$idprofesion', ";
        $sql8.= " '$idespecialidad_medica','$correo','$celular','$iddependencia','','', ";
        $sql8.= " '$idministerio','$iddireccion','$idarea','$cargo_mds','0','0','0', ";
        $sql8.= " '','1','$correlativo','$codigo','$fecha','$fecha','$gestion')";
        $result8 = mysqli_query($link,$sql8); 

    } else {
        if ($iddependencia == '3') {
            echo "DEPENDE DE UNA RED DE SALUD";
            echo "</br>";
            echo $iddepartamento;
            echo "</br>";
            echo $idred_salud;
            echo "</br>";
            echo $idestablecimiento_salud;
            echo "</br>";
            echo $cargo_red_salud;

            $sql8 = " INSERT INTO inscripcion (idevento, idusuario, idnacionalidad , idgenero, idformacion_academica, idprofesion,";
            $sql8.= " idespecialidad_medica, correo, celular, iddependencia, entidad, cargo_entidad, ";
            $sql8.= " idministerio, iddireccion, idarea, cargo_mds, iddepartamento, idred_salud, idestablecimiento_salud, ";
            $sql8.= " cargo_red_salud, idestado_inscripcion, correlativo, codigo, fecha_preins, fecha_ins, gestion)";
            $sql8.= " VALUES ('$idevento_ss','$idusuario_in','$idnacionalidad','$idgenero','$idformacion_academica','$idprofesion', ";
            $sql8.= " '$idespecialidad_medica','$correo','$celular','$iddependencia','','', ";
            $sql8.= " '0','0','0','','$iddepartamento','$idred_salud','$idestablecimiento_salud', ";
            $sql8.= " '$cargo_red_salud','1','$correlativo','$codigo','$fecha','$fecha','$gestion')";
            $result8 = mysqli_query($link,$sql8);  

        } else {
//------ en caso de existir otro tipo de dependencia laboral del interesado ------//           
            }
        }
    }
}

?>