<?php include("../cabf_o.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram = date("Ymd");
$fecha 		 = date("Y-m-d");

$idtematica_ss    =  $_SESSION['idtematica_ss'];
$idevento_ss      =  $_SESSION['idevento_ss'];
$codigo_evento_ss =  $_SESSION['codigo_evento_ss'];

$idnombre_inscrito_ss =  $_SESSION['idnombre_inscrito_ss'];
$nombre_inscrito_ss   =  $_SESSION['nombre_inscrito_ss'];
$paterno_inscrito_ss  =  $_SESSION['paterno_inscrito_ss'];
$materno_inscrito_ss  =  $_SESSION['materno_inscrito_ss'];
$ci_inscrito_ss       =  $_SESSION['ci_inscrito_ss'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MINISTERIO DE SALUD Y DEPORTES</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />

<!-- c+ss -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />

<link rel="stylesheet" href="../css/jquery-ui.min.css">
<link rel="stylesheet" href="../css/style.css">

</head>
<body>
<div id="wrapper">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <p class="pull-left hidden-xs">MINISTERIO DE SALUD Y DEPORTES</p>
         <a href="../index.php"><p class="pull-right hidden-xs">INGRESAR A SISTEMA</p></a>
      </div>
    </div>
  </div>
</div>
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="../intranet.php"><img src="../img/logo_saes.png" alt="logo"/></a>
                </div>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">USUARIO EXISTENTE</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    
  </div>
</br>
    </div>

<div class="container">

<!-- javascript --->

<div class="box-area">

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-9"><h4 class="text-info">EL USUARIO <?php echo $nombre_inscrito_ss;?> <?php echo $paterno_inscrito_ss;?> <?php echo $materno_inscrito_ss;?> con CI: <?php echo $ci_inscrito_ss;?></h4>
  <h4 class="text-info"> YA SE ENCUENTRA REGISTRADO EN SISTEMA</h4></div> 
</div>
<div class="row">
<div class="col-md-4"></div>
  <div class="col-md-8"><h4 class="text-success">OPCIONES DE PREINSCRIPCIÓN</h4></div> 
</div>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-2"><a href="oferta.php"><h4 class="text-danger">SALIR</h4></a></div>
  <div class="col-md-4"></div>
  <div class="col-md-4"><a href="registro_inscripcion_h_o.php"><h4 class="text-info">CONTINUAR PREINSCRIPCIÓN</h4></div> 
</div>

</div>
</br>
<!-- javascript --->
</div>
</br>
  </section>
	<footer>
	<?php include("../footer.php");?>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/jquery.fancybox-media.js"></script>
<script src="../js/jquery.flexslider.js"></script>
<script src="../js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="../js/modernizr.custom.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/custom.js"></script>
<script src="../contact/jqBootstrapValidation.js"></script>
<script src="../contact/contact_me.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/datepicker-es.js"></script>
<script>
    $("#fecha1").datepicker($.datepicker.regional[ "es" ]);
    $("#fecha2").datepicker($.datepicker.regional[ "es" ]);
    $("#fecha3").datepicker($.datepicker.regional[ "es" ]);
</script>
</body>
</html>