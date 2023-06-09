<div class="navbar-collapse collapse ">
    <ul class="nav navbar-nav">

	<?php

/**
* MENU DE OPCIONES PARA EL MODULO DE PLANES 
* @idusuario_ss int //variable de sesion de usuario en formato numero entero
* @idnombre_ss int //variable de sesion de nombres y apellidos de usuario en formato numero entero
* @perfil_ss varchar //variable de sesion de perfil de usuario en formato numero entero
* @row array //arreglo de n elemento que contiene los valores de cada consulta a base de datos.
*/

////////	/****** MODULO DE AUDITORIAS UAI ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

/****** Seleccionamos el perfil del suaurio que accedera a las opciones de sistema ******/	

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO'){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
    ?>   

	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">AUDITORÍAS UAIs<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="../auditoria_uai/confiabilidad_uai.php">AUDITORÍA DE CONFIABILIDAD</a></li>
		<li><a href="../auditoria_uai/operacional_uai.php">AUDITORÍA OPERACIONAL</a></li>
		<li><a href="../auditoria_uai/especial_uai.php">AUDITORÍA ESPECIAL</a></li>
		<li><a href="../auditoria_uai/contrataciones_cd_uai.php">CONTRATACIONES DIRECTAS</a></li>
		<li><a href="../auditoria_uai/legajo_permanente_uai.php">LEGAJO PERMANENTE</a></li>
		</ul>
	</li>

	<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>

<?php
////////	/****** MODULO DE REGISTRO DE TIPOS DE INFORMES UAI ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

/****** Seleccionamos el perfil del suaurio que accedera a las opciones de sistema ******/	
if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO'){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>   

	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">INFORMES UAIS<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="../informes_uai/anual_uai.php">INFORME ANUAL</a></li>
		<li><a href="../informes_uai/semestral_uai.php">INFORME SEMESTRAL</a></li>
		<li><a href="../informes_uai/seguimiento_uai.php">INFORMES DE SEGUIMIENTO</a></li>
		<li><a href="../informes_uai/eval_djbr_uai.php">INFORME EVALUACIÓN DJBR</a></li>
		<li><a href="../informes_uai/eval_poa_uai.php">INFORME EVALUACIÓN POA</a></li>
		<li><a href="../informes_uai/eval_poa_reform_uai.php">INFORME POA REFORMULADO</a></li>
		</ul>
	</li>

<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>

<?php
////////	/****** MODULO DE REGISTRO DE EMPRESAS ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

/****** Seleccionamos el perfil del suaurio que accedera a las opciones de sistema ******/	
if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO'){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
	?>   

	<li class="dropdown">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">EMPRESAS PÚBLICAS<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="../informes_uai/empresas_scep.php">EMPRESAS SCEP</a></li>
		</ul>
	</li>

<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>

	<li class="active"><a href="../intranet.php">INICIO</a></li>
	</ul>
</div>