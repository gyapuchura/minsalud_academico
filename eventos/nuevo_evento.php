<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	 = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss  = $_SESSION['idusuario_ss'];
$idnombre_ss   = $_SESSION['idnombre_ss'];
$perfil_ss     = $_SESSION['perfil_ss'];

$gestion = date("Y");

$sql_p =" SELECT idplan_anual, codigo, denominacion, gestion FROM plan_anual WHERE gestion='$gestion' ";
$result_p = mysqli_query($link,$sql_p);
$row_p = mysqli_fetch_array($result_p);
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
				<h2 class="pageTitle">NUEVO EVENTO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    <h4 align="center"><a href="eventos.php">VOLVER A EVENTOS</a></h4>
  </div>
</br>
    </div>

<div class="container">

<!-- javascript --->
<form name="FORM9" action="guarda_evento.php" method="post">

<div class="box-area">

<div class="row">
  <div class="col-md-3"><h4>PLAN ANUAL:</h4></div>
  <div class="col-md-9"><h4 class="text-muted"><?php echo $row_p[1];?> .- <?php echo $row_p[2];?></div>
</div>

<div class="row">
 <div class="col-md-3"><h4>OBJETIVO ANUAL</h4></div>
  <div class="col-md-9">
    <select name="idobjetivo_anual"  id="idobjetivo_anual" class="form-control" autofocus required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT idobjetivo_anual, codigo, objetivo_anual FROM objetivo_anual WHERE gestion='$gestion' ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[0]. ">". $row1[1]. ".- ". $row1[2]. "</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>MACROCURRÍCULA</h4></div>
  <div class="col-md-9">
  <select name="idmacrocurricula" id="idmacrocurricula" class="form-control" required></select>
  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4>CURSO (Microcurrícula):</h4></div>
  <div class="col-md-9">
  <select name="idmicrocurricula" id="idmicrocurricula" class="form-control" required></select>
  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4>FECHA DE INICIO:</h4></div>
  <div class="col-md-3">
  <input type="text" id="fecha1" class="form-control" name="fecha_nac" required>
  </div>
  <div class="col-md-3"><h4>FECHA DE FINALIZACIÓN:</h4></div>
  <div class="col-md-3">
  <input type="text" id="fecha2" class="form-control" name="fecha_fin" required>
  </div>
</div>

<div class="row">
<div class="col-md-3"><h4>PUBLICACIÓN:</h4></div>
<div class="col-md-3">
    <select name="idpublicacion"  id="idpublicacion" class="form-control" required>
        <option value="">-SELECCIONE-</option>
        <?php
        $sql1 = "SELECT idpublicacion, publicacion FROM publicacion ";
        $result1 = mysqli_query($link,$sql1);
        if ($row1 = mysqli_fetch_array($result1)){
        mysqli_field_seek($result1,0);
        while ($field1 = mysqli_fetch_field($result1)){
        } do {
        echo "<option value=". $row1[0]. ">". $row1[1]. "</option>";
        } while ($row1 = mysqli_fetch_array($result1));
        } else {
        echo "No se encontraron resultados!";
        }
        ?>
    </select>
</div>

<div class="col-md-2"><h4>CUPO MÍNIMO:</h4></div>
<div class="col-md-1">
<input type="text" class="form-control" name="cupo_min" required>
</div>
<div class="col-md-2"><h4>CUPO MÁXIMO:</h4></div>
<div class="col-md-1">
<input type="text" class="form-control" name="cupo_max" required>
</div>

</div>

<div class="row">
  <div class="col-md-3"><h4>MODALIDAD:</h4></div>
  <div class="col-md-9">
   <select name="idmodalidad"  id="idmodalidad" class="form-control" required>
   <option value="">-SELECCIONE-</option>
<?php

$sql1 = "select idmodalidad, modalidad from modalidad";
$result1 = mysqli_query($link,$sql1);
if ($row1 = mysqli_fetch_array($result1)){
mysqli_field_seek($result1,0);
while ($field1 = mysqli_fetch_field($result1)){
} do {
echo "<option value=". $row1[0]. ">". $row1[1]. "</option>";
} while ($row1 = mysqli_fetch_array($result1));
} else {
echo "No se encontraron resultados!";
}
?>
</select>
</div>
</div>

<div id="lugar_curso"></div>  

<div class="row">
<div class="col-md-3"><h4>DOCENTE A CARGO:</h4></div>
<div class="col-md-3">    
<input type="text" class="form-control" placeholder="ESCRIBA EL NOMBRE DEL DOCENTE DESIGNADO" id="busqueda" required/></div>
<div class="col-md-6" id="resultado">  </div>
</div>

<div class="row">
<div class="col-md-3"><h4></h4></div>
<div class="col-md-9">    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
REGISTRAR EVENTO
</button>
</div>
</div>
</div>

<!-- modal de confirmacion de envio de datos-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO NUEVO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        Esta seguro de Registrar el Evento?
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
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idobjetivo_anual").change(function () {
           $("#idobjetivo_anual option:selected").each(function () {
            objetivo_anual=$(this).val();
            $.post("macrocurricula.php", { objetivo_anual: objetivo_anual }, function(data){
            $("#idmacrocurricula").html(data);
            });
        });
   })
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idmacrocurricula").change(function () {
           $("#idmacrocurricula option:selected").each(function () {
            macrocurricula=$(this).val();
            $.post("microcurricula.php", { macrocurricula: macrocurricula }, function(data){
            $("#idmicrocurricula").html(data);
            });
        });
   })
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idmodalidad").change(function () {
           $("#idmodalidad option:selected").each(function () {
            modalidad=$(this).val();
            $.post("lugar_curso.php", {modalidad:modalidad}, function(data){
            $("#lugar_curso").html(data);
            });
        });
   })
});
</script>

<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				  var consulta;
				  //hacemos focus al campo de b�squeda
				  //$("#busqueda").focus();
				  //comprobamos si se pulsa una tecla
				  $("#busqueda").keyup(function(e){
						//obtenemos el texto introducido en el campo de b�squeda
						consulta = $("#busqueda").val();
						 //hace la b�squeda
							 $.ajax({
								   type: "POST",
								   url: "buscar_docente.php",
								   data: "b="+consulta,
								   dataType: "html",
								   beforeSend: function(){
											  //imagen de carga
										   $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
								   },
								   error: function(){
										   alert("error petici�n ajax");
									 },
								  success: function(data){
										$("#resultado").empty();
										$("#resultado").append(data);
										//$("#busqueda").val(consulta);
									}
							});
				  });
			});
	</script>

</body>
</html>