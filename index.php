<?php 
session_start();
$_SESSION = array();
session_destroy(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>MINISTERIO DE SALUD Y DEPORTES</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
<link href="css/login-register.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>
<div id="wrapper" class="home-page">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs"><span>MINISTERIO DE SALUD Y DEPORTES</span></p>
        <p class="pull-right">PROGRAMA SAFCI - MI SALUD</p>
      </div>
    </div>
  </div>
</div>
	<!-- start header -->
	<header>

	</header>
	<!-- end header -->
	<section id="banner">

	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/safci_1.png" alt="" />
                <div class="flex-caption">
                    <h3></h3>
					<p></p>
                </div>
              </li>
              <li>
                <img src="img/slides/safci_2.png" alt="" />
                <div class="flex-caption">
                    <h3></h3>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
	</section>

<div class="container">
		<div class="row">
            <div class="col-sm-4">
            <h1><a class="tg-btn" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">INGRESAR</a></h1>
            </div>
			      <div class="col-sm-2"></div>
            <div class="col-sm-6">
            <a href="inscripciones/oferta.php"><h1>OFERTA ACADÉMICA</h1></a>
            </div>
        </div>
</div>
		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Ingresar Como</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="validacion.php" accept-charset="UTF-8">
                                    <input id="usuario" class="form-control" type="text" placeholder="usuario" name="usuario">
                                    <input id="password" class="form-control" type="password" placeholder="password" name="password">
                                   <button type="submit" class="tg-btn" align="center">ACCEDER</button>
                                    </form>
                                </div>
                                </div>
                             </div>
                        </div>
    		        </div>
		      </div>
		  </div>

	<!-- FOOTER -->

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
<script src="js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script src="js/login-register.js" type="text/javascript"></script>
</body>
</html>
