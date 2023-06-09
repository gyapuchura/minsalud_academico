<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram = date("Ymd");
$fecha 	   = date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];
$idnombre_ss  = $_SESSION['idnombre_ss'];
$perfil_ss    = $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$gestion = date("Y");

$sql_e =" SELECT evento.idevento, evento.codigo, objetivo_anual.codigo, objetivo_anual.objetivo_anual, macrocurricula.codigo, macrocurricula.macrocurricula, tematica.tematica, ";
$sql_e.=" evento.fecha_inicio, evento.fecha_fin, publicacion.publicacion, evento.cupo_min, evento.cupo_max, modalidad.modalidad, ";
$sql_e.=" departamento.departamento, municipios.municipio, provincias.provincia, nombre.nombre, nombre.paterno, nombre.materno, microcurricula.codigo ";
$sql_e.=" FROM evento, objetivo_anual, macrocurricula, microcurricula, tematica, publicacion, modalidad, departamento, municipios, provincias, nombre, usuarios ";
$sql_e.=" WHERE evento.idobjetivo_anual=objetivo_anual.idobjetivo_anual AND evento.idmacrocurricula=macrocurricula.idmacrocurricula ";
$sql_e.=" AND evento.idmicrocurricula=microcurricula.idmicrocurricula AND microcurricula.idtematica=tematica.idtematica ";
$sql_e.=" AND evento.idpublicacion=publicacion.idpublicacion AND evento.idmodalidad=modalidad.idmodalidad  ";
$sql_e.=" AND evento.iddepartamento=departamento.iddepartamento AND evento.idprovincia=provincias.idprovincia  ";
$sql_e.=" AND evento.idmunicipio=municipios.idmunicipio AND evento.iddocente=usuarios.idusuario ";
$sql_e.=" AND usuarios.idnombre=nombre.idnombre AND microcurricula.idtematica=tematica.idtematica AND evento.idevento='$idevento_ss' ";
$result_e = mysqli_query($link,$sql_e);
$row_e = mysqli_fetch_array($result_e);
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
				<h2 class="pageTitle">ADMINISTRAR EVENTO</h2>
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
        <h2 align="center"><?php echo $codigo_evento_ss;?> .- <?php echo $row_e[6];?></h2> 
  </div>
</br>
    </div>

<div class="container">

<!-- Datos del evento --->

<div class="box-area">

<div class="row">
 <div class="col-md-3"><h4>OBJETIVO ANUAL</h4></div>
  <div class="col-md-9"><h4 class="text-muted"><?php echo $row_e[2];?></h4>
  <h4 class="text-muted"><?php echo $row_e[3];?></h4>
</div>
</div>

<div class="row">
  <div class="col-md-3"><h4>MACROCURRÍCULA</h4></div>
  <div class="col-md-9"><h4 class="text-muted"><?php echo $row_e[4];?> .- <?php echo $row_e[5];?></h4></div>
</div>

<div class="row">
  <div class="col-md-3"><h4>CURSO (Microcurrícula):</h4></div>
  <div class="col-md-9"><h4 class="text-muted"><?php echo $row_e[19];?> .- <?php echo $row_e[6];?></h4></div>
</div>

<div class="row">
  <div class="col-md-3"><h4>FECHA DE INICIO:</h4></div>
  <div class="col-md-3">
    <h4 class="text-muted">
        <?php 
        $fecha_i = explode('-',$row_e[7]);
        $f_inicio    = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
        echo $f_inicio;
        ?>    
    </h4></div>
  <div class="col-md-3"><h4>FECHA DE FINALIZACIÓN:</h4></div>
  <div class="col-md-3">
    <h4 class="text-muted">
        <?php 
        $fecha_f = explode('-',$row_e[8]);
        $f_final = $fecha_f[2].'/'.$fecha_f[1].'/'.$fecha_f[0];
        echo $f_final;
        ?>  
    </h4></div>
</div>

<div class="row">
<div class="col-md-3"><h4>PUBLICACIÓN:</h4></div>
<div class="col-md-3"><h4 class="text-muted"><?php echo $row_e[9];?></h4></div>
<div class="col-md-2"><h4>CUPO MÍNIMO:</h4></div>
<div class="col-md-1"><h4 class="text-muted"><?php echo $row_e[10];?></h4></div>
<div class="col-md-2"><h4>CUPO MÁXIMO:</h4></div>
<div class="col-md-1"><h4 class="text-muted"><?php echo $row_e[11];?></h4></div>
</div>

<div class="row">
  <div class="col-md-3"><h4>MODALIDAD:</h4></div>
  <div class="col-md-9"><h4 class="text-muted"><?php echo $row_e[12];?></h4></div>
</div>

<div class="row">
<div class="col-md-2"><h4>DEPARTAMENTO:</h4></div>
<div class="col-md-2"><h4 class="text-muted"><?php echo $row_e[13];?></h4></div>
<div class="col-md-2"><h4>PROVINCIA:</h4></div>
<div class="col-md-2"><h4 class="text-muted"><?php echo $row_e[14];?></h4></div>
<div class="col-md-2"><h4>MUNICIPIO:</h4></div>
<div class="col-md-2"><h4 class="text-muted"><?php echo $row_e[15];?></h4></div>
</div>

<div class="row">
<div class="col-md-3"><h4>DOCENTE A CARGO:</h4></div>
<div class="col-md-9"><h4 class="text-muted"><?php echo $row_e[16];?> <?php echo $row_e[17];?> <?php echo $row_e[18];?></h4></div>
</div>
</div>

</br>
<div class="row">
<div class="col-md-12">  </div>
</div>

<div class="box-area">

<div class="row">
    <div class="col-lg-12">
      <h4 align="center">HORARIOS DEL EVENTO DE CAPACITACIÓN</h4>
    </div>		
</div>

<div class="container" style="padding-top: 1em;">
<table class="table table-condensed">
<thead>
<tr>
<th>De Fecha</th>
<th>A Fecha</th>
<th>Hora de inicio</th>
<th>Hora de Finalizacion</th>
<th>Aula</th>
</tr>
</thead>
<tbody>
<?php
$sqlh ="SELECT horario.hora_i, horario.hora_f, aula.aula, horario.inicio, horario.fin, horario.idhorario FROM horario, aula ";
$sqlh.=" WHERE horario.idaula=aula.idaula AND horario.idevento='$idevento_ss' ";
$resulth = mysqli_query($link,$sqlh);
if ($rowh = mysqli_fetch_array($resulth)){
mysqli_field_seek($resulth,0);
while ($fieldh = mysqli_fetch_field($resulth)){
} do {
?>
<tr>
<td>
    <?php 
    $fecha_del = explode('-',$rowh[3]);
    $f_del    = $fecha_del[2].'/'.$fecha_del[1].'/'.$fecha_del[0];
    echo $f_del; 
    ?>
</td>
<td>
    <?php 
    $fecha_al = explode('-',$rowh[4]);
    $f_al    = $fecha_al[2].'/'.$fecha_al[1].'/'.$fecha_al[0];
    echo $f_al; 
    ?>    
</td>
<td><?php echo $rowh[0]?></td>
<td><?php echo $rowh[1]?></td>
<td><?php echo $rowh[2]?></td>
</tr>

<?php
   }
  while ($rowh = mysqli_fetch_array($resulth));
} else {
}
?>

</tbody>
</table>
</div>

</div>

<div class="row">
<div class="col-md-9"><h4></h4></div>
<div class="col-md-3">
<form name="REGISTRA" action="registro_evento_adm.php" method="post">	
<button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal">
<h4>DESCONSOLIDAR EVENTO</h4>
</button>
</div>
</div>

<!------- modal ------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DES-CONSOLIDAR EVENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">       
            Esta seguro de Desconsolidar el Evento?
            posteriormenete no se podran realizar cambios.
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR</button>    
      </div>
    </div>
  </div>
</div>
</div>
</form>
<!------- modal ------->

</div>
<!-- javascript --->

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