<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 		= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$ideventoi_ss = $_SESSION['ideventoi_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$idhorario   = $_POST['idhorario'];

/* BORRAMOS EL REGISTRO*/

$sql = " DELETE FROM horario WHERE idhorario='$idhorario'";
$result = mysqli_query($link,$sql);

header("Location:modifica_horarios.php");
?>