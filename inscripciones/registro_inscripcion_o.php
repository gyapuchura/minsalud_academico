<?php include("../cabf_o.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	 = date("Ymd");
$fecha 		   = date("Y-m-d");

$idtematica_ss    = $_SESSION['idtematica_ss'];
$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$sql0 =" SELECT idtematica, tematica FROM tematica WHERE idtematica='$idtematica_ss' ";
$result0 = mysqli_query($link,$sql0);
$row0 = mysqli_fetch_array($result0);

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
				<h2 class="pageTitle">PREINSCRIPCIÓN</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
	  <div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
          <h4 align="center"><a href="inicio_inscripcion_o.php">VOLVER</a></h4>
          <h2 class="text-info" align="center"><?php echo $codigo_evento_ss;?></h2>
          <h2 class="text-info" align="center"><?php echo $row0[1];?></h2>
        </div>
      </div>

    <div class="row">
    <div class="col-md-4"><h3>1.- DATOS PERSONALES:</h3></div>
    <div class="col-md-8"></div>
    </div>
<!-- javascript --->
<form name="FORM9" action="guarda_inscripcion_o.php" method="post">

<div class="box-area">

    <div class="form-group row">
    <div class="col-sm-3 mb-3 mb-sm-0">
    <h4>NOMBRES:</h4>
    <input type="text" class="form-control" name="nombre" placeholder="Nombres" 
    required pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" 
    title="El nombre con Mayúscula al inicio y minúsculas despues."/>
    </div>
    <div class="col-sm-3">
    <h4>PRIMER APELLIDO:</h4>
    <input type="text" class="form-control" name="paterno" placeholder="Paterno" 
    required pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" 
    title="El apellido paterno con Mayúscula al inicio y minúsculas despues."/>
    </div>
    <div class="col-sm-3">
    <h4>SEGUNDO APELLIDO:</h4>
    <input type="text" class="form-control" name="materno" placeholder="Materno"
    required pattern="^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$" 
    title="El apellido materno con Mayúscula al inicio y minúsculas despues."/>
    </div>

    <div class="col-sm-3">
    <h4>FECHA DE NACIMIENTO:</h4>
    <input type="text" id="fecha1" class="form-control" name="fecha_nac" placeholder="DD/MM/AAAA" required>    
    </div>
    </div>

    <div class="form-group row">
    <div class="col-sm-2 mb-3 mb-sm-0">
    <h4>CÉDULA DE ID:</h4>
    <input type="text" class="form-control" name="ci" placeholder="N° de CI"
    required pattern="[A-Z0-9_-]{5,12}$" 
    title="El numero de CI solo puede contener DIGITOS numéricos." >
    </div>
    <div class="col-sm-2 mb-3 mb-sm-0">
    <h4>COMPLEMENTO:</h4>
    <input type="text" class="form-control" name="complemento" placeholder="COMPLEMENTO">
    </div>
    <div class="col-sm-2">
    <h4>EXPEDICIÓN:</h4>
    <select name="exp"  id="exp" class="form-control" required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT iddepartamento, departamento, sigla FROM departamento ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[2].">". $row1[2]."</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
    </div>
    <div class="col-sm-3">
    <h4>NACIONALIDAD:</h4>
    <select name="idnacionalidad"  id="idnacionalidad" class="form-control" required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT idnacionalidad, nacionalidad FROM nacionalidad ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[0].">". $row1[1]."</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
    </div>
    <div class="col-sm-3">
    <h4>GÉNERO:</h4>
    <select name="idgenero" id="idgenero" class="form-control" required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT idgenero, genero FROM genero ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[0].">". $row1[1]."</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
    </div>
</div>
</div>

    <div class="row">
    <div class="col-md-6"><h3>2.- DATOS COMPLEMENTARIOS:</h3></div>
    <div class="col-md-6"></div>
    </div>

    <div class="box-area">
    <div class="row">
    <div class="col-md-3"><h4>FORMACIÓN ACADÉMICA:</h4></div>
    <div class="col-md-3">
    <select name="idformacion_academica"  id="idformacion_academica" class="form-control" required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT idformacion_academica, formacion_academica FROM formacion_academica ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[0].">". $row1[1]."</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
    </div>
    <div class="col-md-3"><h4>PROFESIÓN/OCUPACIÓN:</h4></div>
    <div class="col-md-3">
    <select name="idprofesion"  id="idprofesion" class="form-control" required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT idprofesion, profesion FROM profesion ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[0].">". $row1[1]."</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
    </div>
    </div>

    <div id="especialidad_medica"></div>

    <div class="row">
    <div class="col-md-3"><h4>CORREO ELECTRÓNICO:</h4></div>
    <div class="col-md-3"><input type="mail" class="form-control" name="correo" required></div>
    <div class="col-md-3"><h4>TELÉFONO CELULAR/WHATSAPP:</h4></div>
    <div class="col-md-3"><input type="text" class="form-control" name="celular" required></div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-6"><h3>3.- DATOS LABORALES:</h3></div>
    <div class="col-md-6"></div>
    </div>

    <div class="box-area">

    <div class="row">
    <div class="col-md-3"><h4>DEPENDENCIA:</h4></div>
    <div class="col-md-3">
        <select name="iddependencia"  id="iddependencia" class="form-control" required>
            <option value="">-SELECCIONE-</option>
            <?php
            $sql1 = "SELECT iddependencia, dependencia FROM dependencia ";
            $result1 = mysqli_query($link,$sql1);
            if ($row1 = mysqli_fetch_array($result1)){
            mysqli_field_seek($result1,0);
            while ($field1 = mysqli_fetch_field($result1)){
            } do {
            echo "<option value=". $row1[0].">". $row1[1]."</option>";
            } while ($row1 = mysqli_fetch_array($result1));
            } else {
            echo "No se encontraron resultados!";
            }
            ?>
        </select>   
    </div>
    </div>

    <div id="dependencia_mds"></div>



    </div>
        
    </br>

    <div class="row">
        <div class="col-md-4"><h4></h4></div>
        <div class="col-md-8">    
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            REGISTRAR PREINSCRIPCIÓN
            </button>
        </div>
        </div>
    </div>

<!-- modal de confirmacion de envio de datos-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PREINSCRIPCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        Esta seguro de Registrar la Preinscripcion?
        posteriormenete no se podran realizar cambios.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR REGISTRO</button>    
      </div>
    </div>
  </div>
</div>
</div>

</div>
<!-- Modal -->

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
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idprofesion").change(function () {
           $("#idprofesion option:selected").each(function () {
            profesion=$(this).val();
            $.post("especialidad_medica_o.php", {profesion:profesion}, function(data){
            $("#especialidad_medica").html(data);
            });
        });
   })
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#iddependencia").change(function () {
           $("#iddependencia option:selected").each(function () {
            dependencia=$(this).val();
            $.post("dependencia_mds_o.php", {dependencia:dependencia}, function(data){
            $("#dependencia_mds").html(data);
            });
        });
   })
});
</script>

</body>
</html>