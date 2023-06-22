<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>PROVINCIAS</title>
</head>
<body>
<option value="0">Elegir MUNICIPIO</option>
<?php
include("../inc.config.php");
$options="";
$idprovincia = $_POST["provincia"];
/*
Realizamos una consulta ala tabla autor
para mostrar los datos en un combo
*/
$numero=1;
$sql3 = "SELECT idmunicipio, municipio FROM municipios WHERE idprovincia='$idprovincia' ORDER BY idmunicipio";
$result3 = mysqli_query($link,$sql3);
if ($row3 = mysqli_fetch_array($result3)){
mysqli_field_seek($result3,0);
while ($field3 = mysqli_fetch_field($result3)){
} do {
echo "<option value=".$row3[0].">".$numero.".- ".$row3[1]." </option>";
$numero=$numero+1;
} while ($row3 = mysqli_fetch_array($result3));
} else {
echo "No se encontraron resultados!";
}
?>

</body>

</html>