<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	   = date("Ymd");
$fecha 		   = date("Y-m-d");

$idusuario_ss  = $_SESSION['idusuario_ss'];
$idnombre_ss   = $_SESSION['idnombre_ss'];
$perfil_ss     = $_SESSION['perfil_ss'];

$idevento_ss      = $_SESSION['idevento_ss'];
$codigo_evento_ss = $_SESSION['codigo_evento_ss'];

$gestion = date("Y");

$sql_e =" SELECT evento.idevento, tematica.tematica FROM evento, microcurricula, tematica WHERE evento.idmicrocurricula=microcurricula.idmicrocurricula ";
$sql_e.=" AND microcurricula.idtematica=tematica.idtematica AND evento.idevento='$idevento_ss'  ";
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
                  <a class="navbar-brand" href="../inicio.php"><img src="../img/logo_saes.png" alt="logo"/></a>
                </div>
                <?php include("../menu_academico.php");?>
            </div>
        </div>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">HORARIOS DEL EVENTO</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

<div class="container">
<div class="row" align="center">
<div class="row">
			<div class="col-lg-12">
        <h2 class="text-muted"><?php echo $codigo_evento_ss;?> .- <?php echo $row_e[1];?></h2>
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
<th>Acción</th>
</tr>
</thead>
<tbody>

<?php

$sqlh ="SELECT horario.hora_i, horario.hora_f, aula.aula, horario.inicio, horario.fin, horario.idhorario FROM horario, aula";
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
<td>

<form name="FORM11" action="elimina_horario.php" method="post">
          <input name="idhorario" type="hidden" value="<?php echo $rowh[5]?>">

          <button type="submit" class="btn-link">QUITAR</button>
          </form>

</td>
</tr>

<?php }
  while ($rowh = mysqli_fetch_array($resulth));
} else {
} ?>

</tbody>
</table>
</div>



<div class="row">

<div class="col-md-12">

<h4>ESPECIFICAR LOS HORARIOS DEL EVENTO</h4>

</div>
</div>

<form name="FORMh" action="guarda_horario.php" method="post">
<div class="box-area">

<div class="row">

<div class="col-md-3"><h4>Del:</h4></div>
<div class="col-md-3">
<input type="text" id="fecha1" class="form-control" name="inicio" required>
</div>

<div class="col-md-3"><h4>Al:</h4></div>
<div class="col-md-3">
<input type="text" id="fecha2" class="form-control" name="fin" required>
</div>
</div>

<div class="row">
<div class="col-md-3">
<h4>Hora de Inicio:</h4>
</div>
<div class="col-md-3">
    <input class="form-control" type="time" value="" name="hora_i" required>
</div>
<div class="col-md-3">
<h4>Hora de Finalización:</h4>
</div>
 <div class="col-md-3">
    <input class="form-control" type="time" value="" name="hora_f" required>
  </div>		
</div>


<div class="row">
<div class="col-md-3"><h4>Aula:</h4></div>
<div class="col-md-3">

<select name="idaula"  id="idaula" class="form-control" required>
   <option value="">-SELECCIONE-</option>
<?php

$sql1 = "select idaula, aula from aula";
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

<div class="col-md-6">
	
<button type="submit" class="btn btn-primary" >
AGREGAR HORARIO
</button>

</div>

</div>
</div>

</div>
</form>

<div class="row">
<div class="col-md-6"><a href="eventos.php"><h4>SALIR SIN CONSOLIDAR</h4></a></div>
<div class="col-md-6">
<form name="REGISTRA" action="registro_evento.php" method="post">	
<button type="button" class="btn-link" data-toggle="modal" data-target="#exampleModal">
<h4>CONSOLIDAR EVENTO</h4>
</button>
</div>
</div>
<!------- modal ------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONSOLIDAR EVENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">       
            Esta seguro de Consolidar el Evento?
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

<!------- modal ------->

</form>

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