<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idtematica_ss    = $_SESSION['idtematica_ss'];
$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];
$idinscripcion_ss = $_SESSION['idinscripcion_ss'];

$sql_i = " SELECT idinscripcion, idevento, idusuario, idnombre, idnombre_datos, iddato_laboral, idestado_inscripcion, ";
$sql_i.= " correlativo, codigo, fecha_preins, fecha_ins, gestion FROM inscripcion WHERE idinscripcion='$idinscripcion_ss' ";
$result_i = mysqli_query($link,$sql_i);
$row_i = mysqli_fetch_array($result_i);

$sql_n =" SELECT nombre.nombre, nombre.paterno, nombre.materno, nombre.ci, nombre.complemento, nombre.exp, nombre.fecha_nac, nombre.idnacionalidad, ";
$sql_n.=" nombre.idgenero, nombre_datos.idformacion_academica, nombre_datos.idprofesion, nombre_datos.idespecialidad_medica, nombre_datos.correo, ";
$sql_n.=" nombre_datos.celular FROM nombre, nombre_datos, usuarios WHERE nombre_datos.idnombre=nombre.idnombre AND  ";
$sql_n.=" usuarios.idnombre=nombre.idnombre AND usuarios.idusuario='$row_i[2]' ";
$result_n = mysqli_query($link,$sql_n);
$row_n = mysqli_fetch_array($result_n);

$sql_l = " SELECT iddato_laboral, idusuario, idnombre, iddependencia, entidad, cargo_entidad, ";
$sql_l.= " idministerio, iddireccion, idarea, cargo_mds, iddepartamento, idred_salud, idestablecimiento_salud, cargo_red_salud ";
$sql_l.= " FROM dato_laboral WHERE iddato_laboral='$row_i[5]' ";
$result_l = mysqli_query($link,$sql_l);
$row_l = mysqli_fetch_array($result_l);

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
$rowus = mysqli_fetch_array($resultus);
?>
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
                <?php include("../menu_academico.php");?>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">INSCRIPCIÓN CONFIRMADA</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8"><h2><?php echo $row_i[8];?> </h2></div>
        </div>

        <div class="row">
    <div class="col-md-12"><h3 class="text-success">El solicitante con los siguientes datos personales:</h3></div>
   </div>

<!-- MUESTRA LA PREINSCRIPCION REALIZADA --->
<div class="box-area">

<div class="form-group row">
    <div class="col-sm-4">
    <h4>PRIMER APELLIDO:</h4>
    <h4 class="text-muted"><?php echo $row_n[1];?></h4>
    </div>
    <div class="col-sm-4">
    <h4>SEGUNDO APELLIDO:</h4>
    <h4 class="text-muted"><?php echo $row_n[2];?></h4>
    </div>
    <div class="col-sm-4">
    <h4>NOMBRES:</h4>
    <h4 class="text-muted"><?php echo $row_n[0];?></h4>
    </div>
</div>

    <div class="form-group row">
    <div class="col-sm-4">
    <h4>CEDULA DE IDENTIDAD:</h4>
    <h4 class="text-muted"><?php echo $row_n[3];?></h4>
    </div>
    <div class="col-sm-4">
    <h4>COMPLEMENTO:</h4>
    <h4 class="text-muted"><?php echo $row_n[4];?></h4>
    </div>
    <div class="col-sm-4">
    <h4>EXPEDICIÓN:</h4>
    <h4 class="text-muted"><?php echo $row_n[5];?></h4>
    </div>
</div>

   <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10"><h2 class="text-success">A SIDO CONFIRMADO COMO PARTICIPANTE!</h2></div>
   </div>

   <form name="FORM9" action="inscritos_evento.php" method="post">
    <div class="row">
      <div class="col-md-6"></div>
       <div class="col-md-6"> 
        <button type="submit" class="btn btn-primary" >
        CONTINUAR
        </button>
       </div>
      </div>
    </div>
    </form>

</br>

<!-- PIE DE PAGINA --->
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