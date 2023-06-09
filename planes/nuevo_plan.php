<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
/*
*
* SE REALIZA EL REGISTRO DE UNA NUEVO PLAN ANUAL.
* Desde esta pagina se puede regustrar un nuevo plan anual dentro de una unidad organizacional.
*
* @idusuario_ss int //variable de sesion de usuario en formato numero entero
* @idnombre_ss int //variable de sesion de nombres y apellidos de usuario en formato numero entero
* @perfil_ss varchar //variable de sesion de perfil de usuario en formato numero entero
*
*/
date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

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
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">NUEVO PLAN ANUAL</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    <h4 align="center"><a href="planes_anuales.php">VOLVER A PLANES</a></h4>
  </div>
</br>

    </div>

<div class="container">

<!-- javascript --->
<form name="FORM9" action="guarda_plan.php" method="post">

<div class="box-area">

<div class="row">
  <div class="col-md-4"><h4>DENOMINACIÓN DEL PLAN:</h4></div>
  <div class="col-md-8"><textarea class="form-control" rows="3" name="denominacion" required></textarea></div> 
</div>

<div class="row">
  <div class="col-md-1"><h4>GESTIÓN:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="gestion" required></div> 
  <div class="col-md-2"><h4>TIPO DE DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-3">
  <select name="idtipo_documento"  id="idtipo_documento" class="form-control">
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT idtipo_documento, tipo_documento FROM tipo_documento ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div>  
  <div class="col-md-2"><h4>FECHA DE APROBACIÓN:</h4></div>
  <div class="col-md-2"><input type="text" id="fecha1" class="form-control" name="fecha_aprob" value=""></div> 
</div>

<div class="row">
  <div class="col-md-2"><h4>VIGENCIA DESDE:</h4></div>
  <div class="col-md-2"><input type="text" id="fecha2" class="form-control" name="vigencia_i" value=""></div> 
  <div class="col-md-2"><h4>VIGENCIA HASTA:</h4></div>
  <div class="col-md-2"><input type="text" id="fecha3" class="form-control" name="vigencia_f" value=""></div>  
  <div class="col-md-2"><h4>NÚMERO DE DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="no_doc" required></div> 
</div>

<div class="row">
  <div class="col-md-2"><h4>PARTIDA PRESUPUESTARIA:</h4></div>
  <div class="col-md-2">
  <select name="idpartida_presup"  id="idpartida_presup" class="form-control">
  <option value="">ELEGIR</option>
 <?php
$sql1 = " SELECT idpartida_presup, partida_presup FROM partida_presup ";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=".$row1[0].">".$row1[1]."</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
  </div> 
  <div class="col-md-2"><h4>PRESUPUESTO ASIGNADO:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="presupuesto" required></div>  
  <div class="col-md-2"><h4> </h4></div>
  <div class="col-md-2"><h4> </h4></div> 
</div>

<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  GUARDAR DATOS DEL ÁREA
  </button>
  </div>
  </div>
</div>
</div>
<!---- --->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO NUEVO PLAN ANUAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Registrar el Nuevo Plan?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>     
      </div>
    </div>
  </div>
</div>
</form>

</br>
<div class="row">
<div class="col-md-12">  
</div>
</div>

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