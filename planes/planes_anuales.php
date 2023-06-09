<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
/**
* Se mostrara el listado de todas las areas organizacionales correspondientes a una subcontraloria o despacho de la CGE.
*
* @idusuario_ss int //variable de sesion de usuario en formato numero entero
* @idnombre_ss int //variable de sesion de nombres y apellidos de usuario en formato numero entero
* @perfil_ss varchar //variable de sesion de perfil de usuario en formato numero entero
*
*/
date_default_timezone_set('America/La_Paz');
$fecha_ram			= date("Ymd");
$fecha 			    = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

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
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
</head>
<body>
<div id="wrapper">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <p class="pull-left hidden-xs">MINISTERIO DE SALUD Y DEPORTES</p>
         <p class="pull-right"><i class="fa fa-user"></i>
        <?php
$sqlus =" SELECT nombre, paterno, materno FROM nombre WHERE idnombre='$idnombre_ss'";
$resultus = mysqli_query($link,$sqlus);
$rowus = mysqli_fetch_array($resultus);?>
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?></p>
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
                <?php include("../menu_planes.php");?>
            </div>
        </div>

<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>

	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">PLANES ANUALES</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
        <h4 align="center"><a href="../inicio.php">VOLVER</a></h4>
		</div>
   	<div class="about-logo">
      <h3 align="center"> </h3>
    
       <p>EN ESTA SECCIÓN SE REALIZA LA GESTIÓN DE PLANES ANUALES.</p>
    </div>
    </div>
    <div class="row">
        <form name="FORMU" action="nuevo_plan.php" method="post">
        <button type="submit" class="btn btn-primary">NUEVO PLAN</button>
        </form>
    </div>

<div class="container">
<div class="row">
<div class="col-lg-12">

</div>
</div>
<!--- GESTION DE EMPRESAS ---->

<div class="table-responsive">
      <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nª</th>
                    <th>DENOMINACIÓN DEL PLAN ANUAL</th>
                    <th>CÓDIGO</th>
                    <th>DETALLE</th>
                    <th>VER OBJETIVOS DEL PLAN</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $numero=1;
            $sql =" SELECT idplan_anual, denominacion, codigo FROM plan_anual ";
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_array($result)){
            mysqli_field_seek($result,0);
            while ($field = mysqli_fetch_field($result)){
            } do {
            ?>
				<tr>
				<td><?php echo $numero;?></td>
                <td><?php echo $row[1];?></td>
				<td><?php echo $row[2];?></td>
                <td>                                                
                <form name="VALIDA" action="valida_plan_mod.php" method="post">
                <input name="idplan_anual" type="hidden" value="<?php echo $row[0];?>">
                <button type="submit" class="btn btn-primary">VER PLAN</button></form>
                </td>
                <td>                                                
                <form name="VALIDA" action="valida_plan.php" method="post">
                <input name="idplan_anual" type="hidden" value="<?php echo $row[0];?>">
                <button type="submit" class="btn btn-primary">VER OBJETIVOS</button></form>
                </td>
                </tr>  
            <?php
            $numero=$numero+1;  
            }
            while ($row = mysqli_fetch_array($result));
            } else {
            }
            ?>
                                    </tbody>
                                </table>
                            </div>

<!--- gestion de usuarios ---->

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
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
</body>
</html>