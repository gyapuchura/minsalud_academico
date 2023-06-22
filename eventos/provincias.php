<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>PROVINCIAS</title>
</head>

<body>
<option value="0">Elegir PROVINCIA</option>
<?php
include("../inc.config.php");
$options="";

$iddepartamento = $_POST["departamentos"];

$numero = 1;
$sql2 = "SELECT idprovincia, provincia FROM provincias WHERE iddepartamento='$iddepartamento' ORDER BY idprovincia";
$result2 = mysqli_query($link,$sql2);
if ($row2 = mysqli_fetch_array($result2)){
mysqli_field_seek($result2,0);
while ($field2 = mysqli_fetch_field($result2)){
} do {
echo "<option value=".$row2[0].">".$numero.".- ".$row2[1]." </option>";
$numero = $numero + 1;
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "No se encontraron resultados!";
}
?>

</body>

</html>