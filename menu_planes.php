
<div class="navbar-collapse collapse ">
     <ul class="nav navbar-nav">

<?php 	

/**
* MENU DE OPCIONES PARA EL MODULO DE PLANES Y OBJETIVOS 
* @idusuario_ss int //variable de sesion de usuario en formato numero entero
* @idnombre_ss int //variable de sesion de nombres y apellidos de usuario en formato numero entero
* @perfil_ss varchar //variable de sesion de perfil de usuario en formato numero entero
* @row array //variable de sesion de perfil de usuario en formato numero entero
*/
	/************************* MENU DE OIPCIONES PARA EL MODULO DE HOJAS DE RUTA SCEP *********/

		$idusuario_ss = $_SESSION['idusuario_ss'];
		$perfil_ss    = $_SESSION['perfil_ss'];
		
	    ?>
	<li class="dropdown">
		<a href="#" data-toggle="dropdown" class="dropdown-toggle">PLANIFICACIÓN ANUAL<b class="caret"></b></a>
		<ul class="dropdown-menu">

 	<?php
		////////	/****** BANDEJAS DE ENTRADA ******/			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR' || $row[0] =='USUARIO'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
	 <li><a href="../planes/planes_anuales.php">PLANES ANUALES</a></li>
	 <li><a href="#">OBJETIVOS ANUALES</a></li>
	 <li><a href="#">MACROCURRICULAS</a></li>
	 <li><a href="../planes/tematicas.php">TEMÁTICAS</a></li>

	<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>
			</ul>
			</li>

<?php		////////	/****** GESTION DE USUARIOS Y UNIDADES ORGANIZACIONALES ******/
			    
		$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($result);

		if ($row[0] == 'ADMINISTRADOR'){

		mysqli_field_seek($result,0);
		while ($field = mysqli_fetch_field($result)){
		} do {
	 ?>
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">ADMINISTRAR SISTEMA<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="../administrar_sistema/usuarios.php">USUARIOS</a></li>
				<li><a href="../administrar_sistema/unidades_areas.php">UNIDADES-AREAS-CARGOS</a></li>
				<li><a href="../administrar_sistema/redes_salud.php">REDES DE SALUD</a></li>
			</ul>
			</li>
<?php
		} while ($row = mysqli_fetch_array($result));
		} else {

		}
	?>

            <li class="active"><a href="../inicio.php">INICIO</a></li> 
            </ul>
</div>
<!-- Desarrollado por Ing. Luis Gonzalo Yapuchura -->