<?php	
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=LISTA DE INSCRITOS.xls");
header("Pragma: no-cache");
header("Expires: 0");?>
<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 	    = date("Y-m-d");
$gestion    = date("Y");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$sql0 =" SELECT tematica.tematica FROM evento, microcurricula, tematica WHERE evento.idmicrocurricula=microcurricula.idmicrocurricula  ";
$sql0.=" AND microcurricula.idtematica=tematica.idtematica AND evento.idevento='$idevento_ss' ";
$result0 = mysqli_query($link,$sql0);
$row0 = mysqli_fetch_array($result0);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>LISTA DE INSCRITOS MDSYD</title>
</head>
	<body>
  <h3 style="font-family: Arial; text-align: center;">LISTA DE INSCRITOS</h3>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;">EVENTO : <?php echo $codigo_evento_ss;?></h2>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;"><?php echo $row0[0];?></h2>
  <table width="900" border="1" align="center">
	  <tbody>
          <tr>
            <td width="26" style="font-size: 10px; text-align: center;"><strong>N°</strong></td>
            <td width="93" style="font-size: 10px; text-align: center;"><strong>CÓDIGO DE INSCRIPCIÓN</strong></td>
            <td width="86" style="font-size: 11px; text-align: center;"><strong>CÉDULA DE IDENTIDAD</strong></td>
            <td width="84" style="font-size: 11px" align="center"><strong>EXPEDIDO EN:</strong></td>
            <td width="99" style="font-size: 11px; text-align: center;"><strong>AP. PATERNO</strong></td>
            <td width="85" style="font-size: 11px; text-align: center;"><strong>AP. MATERNO</strong></td>
            <td width="77" style="font-size: 11px; text-align: center;"><strong>NOMBRES</strong></td>
            <td width="97" style="font-size: 11px" align="center"><strong>CORREO</strong></td>
            <td width="69" style="font-size: 11px; text-align: center;"><strong>NÚMERO DE CELULAR</strong></td>
            <td width="120" style="font-size: 11px" align="center"><strong>DEPARTAMENTO EN EL QUE SE INSCRIBIÓ</strong></td>
          </tr>
    <?php
$numero=1;
$sql =" SELECT inscripcion.codigo, nombre.ci, nombre.complemento, nombre.exp, nombre.paterno, nombre.materno, nombre.nombre, nombre_datos.correo,  ";
$sql.=" nombre_datos.celular, departamento.departamento FROM inscripcion, nombre, nombre_datos, dato_laboral, departamento WHERE inscripcion.idnombre=nombre.idnombre ";
$sql.=" AND inscripcion.idnombre_datos=nombre_datos.idnombre_datos AND  inscripcion.iddato_laboral=dato_laboral.iddato_laboral ";
$sql.=" AND dato_laboral.iddepartamento=departamento.iddepartamento AND inscripcion.idevento='$idevento_ss' AND inscripcion.idestado_inscripcion='2' ORDER BY inscripcion.codigo ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
    ?>
        <tr>
        <td style="font-size: 11px; text-align: center;"><?php echo $numero;?></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[0];?></td>
        <td style="font-size: 10px"><?php echo $row[1];?> <?php echo $row[2];?><span style="text-align: center"></span></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[3];?></td>
        <td style="text-align: center; font-size: 10px;"><?php echo $row[4];?></td>
        <td style="text-align: center; font-size: 10px;"><?php echo $row[5];?></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[6];?></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[7];?></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[8];?></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[9];?></td>
        </tr>
		<?php
$numero = $numero+1; 
}
  while ($row = mysqli_fetch_array($result));
} else {
  echo " ";
}
?>
      </tbody>
    </table>

</body>
</html>
