<option value="0">Elegir ESTABLECIMIENTO DE SALUD</option>
<?php
include("../inc.config.php");
$options="";

$idmunicipio = $_POST["municipio"];

$sql2 = " SELECT establecimiento_salud.idestablecimiento_salud, establecimiento_salud.codigo_establecimiento, establecimiento_salud.establecimiento_salud, ";
$sql2.= " municipios.municipio FROM establecimiento_salud, municipios WHERE establecimiento_salud.idmunicipio=municipios.idmunicipio AND ";
$sql2.= " establecimiento_salud.idmunicipio='$idmunicipio' ORDER BY municipios.municipio ";
$result2 = mysqli_query($link,$sql2);
if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
echo "<option value=". $row2[0]. ">". $row2[3]." : ". $row2[1].".-".$row2[2]." </option>";
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "No se encontraron resultados!";
}
?>
