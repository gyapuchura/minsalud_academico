<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>

<?php
date_default_timezone_set('America/La_Paz');
$fecha 			= date("Y-m-d");

$idusuario_ss   = $_SESSION['idusuario_ss'];
$perfil_ss      = $_SESSION['perfil_ss'];

$idobjetivo_anual = $_POST['idobjetivo_anual'];
$idmacrocurricula = $_POST['idmacrocurricula'];
$idmicrocurricula = $_POST['idmicrocurricula'];

$inicializacion = $_POST['fecha_inicio'];
$fecha_i        = explode('/',$inicializacion);
$fecha_inicio   = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];

$finalizacion  	= $_POST['fecha_fin'];
$fecha_f        = explode('/',$finalizacion);
$fecha_fin      = $fecha_f[2].'-'.$fecha_f[1].'-'.$fecha_f[0];

$idpublicacion 	= $_POST['idpublicacion'];
$cupo_min       = $link->real_escape_string($_POST['cupo_min']);
$cupo_max       = $link->real_escape_string($_POST['cupo_max']);
$idmodalidad    = $_POST['idmodalidad'];
$iddepartamento = $_POST['iddepartamento'];
$idprovincia    = $_POST['idprovincia'];
$idmunicipio    = $_POST['idmunicipio'];
$iddocente      = $_POST['iddocente'];

$sql_o    = " SELECT idobjetivo_anual, codigo, gestion FROM objetivo_anual WHERE idobjetivo_anual='$idobjetivo_anual' ";
$result_o = mysqli_query($link,$sql_o);
$row_o    = mysqli_fetch_array($result_o);

$sql_d    = " SELECT iddepartamento, departamento, sigla FROM departamento WHERE iddepartamento='$iddepartamento' ";
$result_d = mysqli_query($link,$sql_d);
$row_d    = mysqli_fetch_array($result_d);
$sigla_depto = $row_d[2];

$sqle    = " SELECT MAX(correlativo) FROM evento WHERE gestion='$row_o[2]' ";
$resulte = mysqli_query($link,$sqle);
$rowe    = mysqli_fetch_array($resulte);

$correlativo = $rowe[0]+1;
$gestion     = $row_o[2];
$codigo      = "MDSYD/".$sigla_depto."-".$correlativo."/".$row_o[2];

$sql7 = " INSERT INTO evento (idobjetivo_anual, idmacrocurricula, idmicrocurricula, codigo, correlativo, gestion, fecha_inicio,";
$sql7.= " fecha_fin, idpublicacion, cupo_min, cupo_max, idmodalidad, iddepartamento, idprovincia, idmunicipio, iddocente, idusuario, idestado_registro)";
$sql7.= " VALUES ('$idobjetivo_anual','$idmacrocurricula','$idmicrocurricula','$codigo','$correlativo','$gestion','$fecha_inicio','$fecha_fin', ";
$sql7.= " '$idpublicacion','$cupo_min','$cupo_max','$idmodalidad','$iddepartamento','$idprovincia','$idmunicipio','$iddocente','$idusuario_ss','1') ";

$result7 = mysqli_query($link,$sql7);

$idevento = mysqli_insert_id($link);
$_SESSION['idevento_ss']	  = $idevento;
$_SESSION['codigo_evento_ss'] = $codigo;

header("Location:evento_horario.php");

?>