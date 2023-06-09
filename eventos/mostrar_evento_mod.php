<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php

date_default_timezone_set('America/La_Paz');
$fecha_ram	 = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$gestion = date("Y");

$sql_e =" SELECT idevento, idobjetivo_anual, idmacrocurricula, idmicrocurricula, codigo, correlativo,";
$sql_e.=" gestion, fecha_inicio, fecha_fin, iddepartamento, idprovincia, idmunicipio, idpublicacion, idmodalidad,";
$sql_e.=" cupo_min, cupo_max, iddocente, idusuario, idestado_registro FROM evento WHERE idevento='$idevento_ss'";
$result_e = mysqli_query($link,$sql_e);
$row_e = mysqli_fetch_array($result_e);

$sql_ev =" SELECT evento.idevento, tematica.tematica FROM evento, microcurricula, tematica WHERE evento.idmicrocurricula=microcurricula.idmicrocurricula ";
$sql_ev.=" AND microcurricula.idtematica=tematica.idtematica AND evento.idevento='$idevento_ss'  ";
$result_ev = mysqli_query($link,$sql_ev);
$row_ev = mysqli_fetch_array($result_ev);

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
				<h2 class="pageTitle">MODIFICAR EVENTO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
		<div class="tg-main-section tg-banner tg-haslayout parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/slider/img-03.jpg">
    <h4 align="center"><a href="eventos.php">VOLVER</a></h4>
        </br>
    <h2 align="center"><?php echo $codigo_evento_ss;?> .- <?php echo $row_ev[1];?></h2>
  </div>
</br>
    </div>

<div class="container">

<!-- javascript --->

<div class="box-area">

<form name="FORM9" action="guarda_mod_evento.php" method="post">

<div class="row">
 <div class="col-md-3"><h4>OBJETIVO ANUAL</h4></div>
  <div class="col-md-9">
    <select name="idobjetivo_anual"  id="idobjetivo_anual" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT idobjetivo_anual, codigo, objetivo_anual FROM objetivo_anual ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[1]) echo "selected";?> ><?php echo $rowv[1];?> .- <?php echo $rowv[2];?></option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>

</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>MACROCURRÍCULA</h4></div>
  <div class="col-md-9">
    <select name="idmacrocurricula"  id="idmacrocurricula" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT idmacrocurricula, codigo, macrocurricula FROM macrocurricula ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[2]) echo "selected";?> ><?php echo $rowv[1];?> .- <?php echo $rowv[2];?></option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>
  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4>CURSO (Microcurrícula):</h4></div>
  <div class="col-md-9">

  <select name="idmicrocurricula"  id="idmicrocurricula" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = " SELECT microcurricula.idmicrocurricula, microcurricula.codigo, tematica.tematica FROM microcurricula, tematica ";
      $sqlv.= " WHERE microcurricula.idtematica=tematica.idtematica ORDER BY microcurricula.idmacrocurricula ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[3]) echo "selected";?> ><?php echo $rowv[1];?> .- <?php echo $rowv[2];?></option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>

  </div>
</div>

<div class="row">
  <div class="col-md-3"><h4>FECHA DE INICIO:</h4></div>
  <div class="col-md-3">
  <input type="text" id="fecha1" class="form-control" name="fecha_inicio" value="<?php 
    $fecha_i        = explode('-',$row_e[7]);
    $f_inicio   = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
    echo $f_inicio;?>">  
  </div>
  <div class="col-md-3"><h4>FECHA DE FINALIZACIÓN:</h4></div>
  <div class="col-md-3">
  <input type="text" id="fecha2" class="form-control" name="fecha_fin" value="<?php 
    $fecha_j  = explode('-',$row_e[8]);
    $f_fin  = $fecha_j[2].'/'.$fecha_j[1].'/'.$fecha_j[0];
    echo $f_fin;?>">  
  </div>
</div>

<div class="row">
<div class="col-md-3"><h4>PUBLICACIÓN:</h4></div>
<div class="col-md-3">

    <select name="idpublicacion"  id="idpublicacion" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT idpublicacion, publicacion FROM publicacion ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[12]) echo "selected";?> ><?php echo $rowv[1];?> </option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>

</div>

<div class="col-md-2"><h4>CUPO MÍNIMO:</h4></div>
<div class="col-md-1">
<input type="text" class="form-control" name="cupo_min" value="<?php echo $row_e[14]?>" required>
</div>
<div class="col-md-2"><h4>CUPO MÁXIMO:</h4></div>
<div class="col-md-1">
<input type="text" class="form-control" name="cupo_max" value="<?php echo $row_e[15]?>" equired>
</div>

</div>

<div class="row">
  <div class="col-md-3"><h4>MODALIDAD:</h4></div>
  <div class="col-md-9">
  <select name="idmodalidad"  id="idmodalidad" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT idmodalidad, modalidad FROM modalidad ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[13]) echo "selected";?> ><?php echo $rowv[1];?> </option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>DEPARTAMENTO:</h4></div>
  <div class="col-md-9">
  <select name="iddepartamento"  id="iddepartamento" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT iddepartamento, departamento FROM departamento ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[9]) echo "selected";?> ><?php echo $rowv[1];?> </option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>PROVINCIA:</h4></div>
  <div class="col-md-9">
  <select name="idprovincia"  id="idprovincia" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT idprovincia, provincia FROM provinciaS ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[10]) echo "selected";?> ><?php echo $rowv[1];?> </option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>MUNICIPIO:</h4></div>
  <div class="col-md-9">
  <select name="idmunicipio"  id="idmunicipio" class="form-control">
      <option selected>Seleccione</option>
      <?php
      $sqlv = "SELECT idmunicipio, municipio FROM municipios ";
      $resultv = mysqli_query($link,$sqlv);
      if ($rowv = mysqli_fetch_array($resultv)){
      mysqli_field_seek($resultv,0);
      while ($fieldv = mysqli_fetch_field($resultv)){
      } do {
      ?>
      <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[11]) echo "selected";?> ><?php echo $rowv[1];?> </option>
      <?php
      } while ($rowv = mysqli_fetch_array($resultv));
      } else {
      }
      ?>
    </select>
</div>
</div>

<div class="row">
<div class="col-md-3"><h4>DOCENTE A CARGO:</h4></div>
<div class="col-md-9">    
  <select name="iddocente"  id="iddocente" class="form-control">
    <option selected>Seleccione</option>
    <?php
    $sqlv = " SELECT usuarios.idusuario, nombre.nombre, nombre.paterno, nombre.materno ";
    $sqlv.= " FROM usuarios, nombre WHERE usuarios.idnombre=nombre.idnombre AND usuarios.condicion='ACTIVO' AND usuarios.perfil='DOCENTE'  ";
    $sqlv.= " ORDER BY nombre.paterno ";
    $resultv = mysqli_query($link,$sqlv);
    if ($rowv = mysqli_fetch_array($resultv)){
    mysqli_field_seek($resultv,0);
    while ($fieldv = mysqli_fetch_field($resultv)){
    } do {
    ?>
    <option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_e[16]) echo "selected";?> ><?php echo $rowv[1];?> <?php echo $rowv[2];?> <?php echo $rowv[3];?></option>
    <?php
    } while ($rowv = mysqli_fetch_array($resultv));
    } else {
    }
    ?>
  </select>
</div>
</div>

<div class="row">
<div class="col-md-4"><h4></h4></div>
<div class="col-md-4">    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
GUARDAR CAMBIOS
</button>
</div>
<div class="col-md-4"></div>
</div>
</div>

<!-- modal de confirmacion de envio de datos-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICAR EVENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        Está seguro de Modificar el Evento?
        posteriormenete no se podrán realizar cambios.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR MODIFICACION</button>    
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
<div class="col-md-8"></div> 
<div class="col-md-4"><a href="modifica_horarios.php"><h4 class="text-info">MODIFICAR HORARIOS</h4></a></div>
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

</body>
</html>