<option value="0">Elegir RED DE SALUD</option>
<?php
include("../inc.config.php");
$options="";

$iddepartamento = $_POST["departamento"];

$sql2 = " SELECT idred_salud, red_salud FROM red_salud WHERE iddepartamento='$iddepartamento' ORDER BY idred_salud";
$result2 = mysqli_query($link,$sql2);
if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
echo "<option value=". $row2[0]. ">". $row2[1]." </option>";
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "No se encontraron resultados!";
}
?>
