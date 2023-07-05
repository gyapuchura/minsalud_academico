<?php	
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=lista_moodle.xls");
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
  <h3 style="font-family: Arial; text-align: center;">USUARIOS PLATAFORMA VIRTUAL MOODLE</h3>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;">EVENTO : <?php echo $codigo_evento_ss;?></h2>
  <h2 style="font-family: Arial; text-align: center; font-size: 18px;"><?php echo $row0[0];?></h2>
  <table width="900" border="1" align="center">
	  <tbody>
      <tr>
            <td width="134" style="font-size: 10px; text-align: center;"><strong>username</strong></td>
            <td width="117" style="font-size: 10px; text-align: center;"><strong>password</strong></td>
            <td width="124" style="font-size: 11px; text-align: center;"><strong>firstname</strong></td>
            <td width="133" style="font-size: 11px" align="center"><strong>lastname</strong></td>
            <td width="194" style="font-size: 11px; text-align: center;"><strong>email</strong></td>
            <td width="62" style="font-size: 11px; text-align: center;"><strong>city</strong></td>
            <td width="62" style="font-size: 11px; text-align: center;"><strong>course 1</strong></td>
          </tr>
        <?php
$numero=1;
$sql =" SELECT inscripcion.codigo, nombre.ci, nombre.complemento, nombre.exp, nombre.paterno, nombre.materno, nombre.nombre, nombre_datos.correo,  ";
$sql.=" nombre_datos.celular, departamento.departamento, evento.codigo FROM inscripcion, nombre, nombre_datos, dato_laboral, departamento, evento WHERE inscripcion.idnombre=nombre.idnombre ";
$sql.=" AND inscripcion.idnombre_datos=nombre_datos.idnombre_datos AND  inscripcion.iddato_laboral=dato_laboral.iddato_laboral ";
$sql.=" AND dato_laboral.iddepartamento=departamento.iddepartamento AND inscripcion.idevento=evento.idevento AND inscripcion.idevento='$idevento_ss' AND inscripcion.idestado_inscripcion='2' ORDER BY inscripcion.codigo ";
$result = mysqli_query($link,$sql);
if ($row = mysqli_fetch_array($result)){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
    ?>
        <tr>
        <td style="font-size: 11px; text-align: center;"><?php echo $row[1];?></td>
        <td style="font-size: 10px; text-align: center;"><?php echo $row[1];?></td>
        <td style="font-size: 10px; text-align: center;"><?php 
        $firstname = strtoupper($row[6]);
        echo $firstname;?> </td>
        <td style="font-size: 10px; text-align: center;">
        <?php $firstname = strtoupper($row[4]);
        echo $firstname;?> <?php 
        $lastname = strtoupper($row[5]);
        echo $lastname;?></td>
        <td style="text-align: center; font-size: 10px;"><?php echo $row[7];?></td>
        <td style="text-align: center; font-size: 10px;"><?php echo $row[9];?></td>

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
