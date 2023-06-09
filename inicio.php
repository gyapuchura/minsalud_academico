
<?php include("cabf.php");?>
<?php include("inc.config.php");?>
<?php
/**
* PAGINA DE INICIO DEL SISTEMA.- desde aqui se puede acceder a los 3 sistemas.
* @idusuario_ss int //variable de sesion de usuario en formato numero entero
* @idnombre_ss int //variable de sesion de nombres y apellidos de usuario en formato numero entero
* @perfil_ss varchar //variable de sesion de perfil de usuario en formato numero entero
* @row array //arreglo de n elemento que contiene los valores de cada consulta a base de datos.
*/

if($_SESSION['idusuario_ss'] == "" || $_SESSION['idnombre_ss'] == "" || $_SESSION['perfil_ss'] == ""){
	header("Location:index.php");
}
date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

$sqlus =" SELECT nombre, paterno, materno FROM nombre WHERE idnombre='$idnombre_ss'";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MINISTERIO DE SALUD Y DEPORTES</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="css/flexslider.css" rel="stylesheet" />
<!-- Vendor Styles -->
<link href="css/magnific-popup.css" rel="stylesheet"> 
<!-- Block Styles -->
<link href="css/style.css" rel="stylesheet" />
<link href="css/gallery-1.css" rel="stylesheet">
 
</head>
<body>
<div id="wrapper">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs">MINISTERIO DE SALUD Y DEPORTES</p>
       
        <p class="pull-right"><i class="fa fa-user"></i>
        
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?> - <?php echo $perfil_ss;?></p>
        
      </div>
    </div>
  </div>
</div>
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">                
				<a class="navbar-brand" href="intranet.php"><img src="img/logo_saes.png" alt="logo"/></a>            
            </div>
        </div>
	</header>
    
    <!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">SISTEMA ACADÉMICO EN SALUD</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
						
	</div>
	</section>	
			  <!-- INGRESO DE SISTEMAS -->
    <section id="gallery-1" class="content-block section-wrapper gallery-1">

    	 	<div class="container">
            <!-- /.galeria de sistemas -->  

            <div class="row">
                <div id="isotope-gallery-container">    
    
<?php
////////	/****** SISTEMA DE HOJAS DE RUTA ******/		

$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO'){

mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
    ?>   
                    <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                        <div class="gallery-item">
                            <div class="gallery-thumb">
                                <img src="img/works/objetivos.jpg" class="img-responsive" alt="5th gallery Thumb">
                                <div class="image-overlay"></div>
                             
                                <a href="planes/planes_anuales.php" class="gallery-link"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="gallery-details">
                            	<div class="editContent">
                                	<h5>GESTIÓN DE OBJETIVOS</h5>
                            	</div>
                            	<div class="editContent">
                                	<p>Este Modulo permite realizar la gestión de OBJETIVOS EN CAPACITACION PERMANENTE</p>
                            	</div>
                            </div>
                        </div>
                    </div> 
<?php
} while ($row = mysqli_fetch_array($result));
} else {
}
?>
  
<?php
////////	SISTEMA DE CONTROL INTERNO SCEP******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='USUARIO' ){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){ 
} do {
?>
                <!--- Control Interno ACCESO SCEP --->       
                     
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                <div class="gallery-item">
                    <div class="gallery-thumb">
                        <img src="img/works/academica.jpg" class="img-responsive" alt="5th gallery Thumb">
                        <div class="image-overlay"></div>    
                        <a href="eventos/eventos.php" class="gallery-link"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>GESTION ACADÉMICA</h5>
                        </div>
                        <div class="editContent">
                            <p>Permite realizar la gestión académica del Ministerio de Salud y Deportes.</p>
                        </div>
                    </div>
                </div>
            </div>  
<?php
} while ($row = mysqli_fetch_array($result));
} else { 
}
?>         

<?php
////////	SISTEMA DE CONTROL INTERNO ACCESO UAI******/	

$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);
if ($row[0] =='UAI-EMPRESA' ||  $row[0] =='ADMINISTRADOR'){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){ 
} do {
?>
        <!--- Control Interno ACCESO SCEP --->                            
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                <div class="gallery-item">
                    <div class="gallery-thumb">
                        <img src="img/works/administrativa.jpg" class="img-responsive" alt="5th gallery Thumb">
                        <div class="image-overlay"></div>    
                        <a href="contrataciones_uai.php" class="gallery-link"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>GESTIÓN ADMINISTRATIVA</h5>
                        </div>
                        <div class="editContent">
                            <p>Permite realizar la gestión de la Informacion administrativa del sistema académico.</p>
                        </div>
                    </div>
                </div>
            </div>  
<?php
} while ($row = mysqli_fetch_array($result));
} else { 
}
?>         

<?php
////////	/****** eleccion de acceso para el perfil DAF- UAI - SCEP ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] == 'ADMINISTRADOR' || $row[0] =='GERENTE' || $row[0] =='USUARIO' ){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>  
        <!--- CONTROL EXTERNO POSTERIOR -->
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                <div class="gallery-item">
                    <div class="gallery-thumb">
                        <img src="img/works/usuarios.jpg" class="img-responsive" alt="5th gallery Thumb">
                        <div class="image-overlay"></div>                             
                        <a href="contrataciones/declaraciones_juradas_scep.php" class="gallery-link"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>ASISTENCIA VIRTUAL Y SOPORTE TÉCNICO</h5>
                        </div>
                        <div class="editContent">
                            <p>Permite realizar la gestión de la Informacion relacionada al SOPORTE TÉCNIUCO Y ATENCION AL USUARIO</p>
                        </div>
                    </div>
                </div>
            </div>  
<?php
    } while ($row = mysqli_fetch_array($result));
    } else { 
    }
?>     

<?php
////////	/****** eleccion de acceso para el perfil DAF- UAI - SCEP ******/		
$sql = "SELECT perfil  from usuarios  where idusuario = '$idusuario_ss' and perfil = '$perfil_ss' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

if ($row[0] =='DAF-EMPRESA'){
mysqli_field_seek($result,0);
while ($field = mysqli_fetch_field($result)){
} do {
?>  
        <!--- CONTROL EXTERNO POSTERIOR -->
            <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                <div class="gallery-item">
                    <div class="gallery-thumb">
                        <img src="img/works/contrataciones_ep.jpg" class="img-responsive" alt="5th gallery Thumb">
                        <div class="image-overlay"></div>                             
                        <a href="contrataciones/declaraciones_juradas_ep.php" class="gallery-link"><i class="fa fa-link"></i></a>
                    </div>
                    <div class="gallery-details">
                        <div class="editContent">
                            <h5>DESARROLLO CURRICULAR</h5>
                        </div>
                        <div class="editContent">
                            <p>Permite realizar la gestión de la Informacion relacionada al Control Externo Posterior</p>
                        </div>
                    </div>
                </div>
            </div>  
<?php
    } while ($row = mysqli_fetch_array($result));
    } else { 
    }
?>        
            </div>

			<div class="row">		
			<div class="col-md-4"><a href="salir.php"><h4 class="text-warning">CERRAR SESIÓN</h4></a></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>	
			</div>

            <!-- /.row --> 

        <!-- /.container -->
		</div>
    </section>
    <!--// End Gallery 1-2 -->  
	</div>
	<footer>
	<?php include("footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>  
<script src="js/jquery.flexslider.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
 
</body>
</html>