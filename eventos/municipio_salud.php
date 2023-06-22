<option value="0">Elegir MUNICIPIO</option>
<?php
include("../inc.config.php");
$options="";

$idred_salud = $_POST["red_salud"];

$sql4 = " SELECT establecimiento_salud.idmunicipio, municipios.municipio FROM establecimiento_salud, municipios ";
$sql4.= " WHERE establecimiento_salud.idmunicipio=municipios.idmunicipio AND establecimiento_salud.idred_salud='$idred_salud' GROUP BY establecimiento_salud.idmunicipio ";
$result4 = mysqli_query($link,$sql4);
if ($row4 = mysqli_fetch_array($result4)){
mysqli_field_seek($result4,0);
while ($field4 = mysqli_fetch_field($result4)){
} do {
echo "<option value=".$row4[0].">". $row4[1]." </option>";
} while ($row4 = mysqli_fetch_array($result4));
} else {
echo "No se encontraron resultados!";
}
?>
