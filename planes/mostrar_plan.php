<?php include("../cabf.php");?>
<?php include("../inc.config.php");?>
<?php
/**
* SE MUESTRA DATOS DEL AREA OREGANIZACIONAL.
* Desde esta pagina se puede ver datos de cada unidad organizacional.
*
* @idusuario_ss int //variable de sesion de usuario en formato numero entero
* @idnombre_ss int //variable de sesion de nombres y apellidos de usuario en formato numero entero
* @perfil_ss varchar //variable de sesion de perfil de usuario en formato numero entero
*
*/
date_default_timezone_set('America/La_Paz');
$fecha_ram	 = date("Ymd");
$fecha 		 = date("Y-m-d");

$idusuario_ss  =  $_SESSION['idusuario_ss'];
$idnombre_ss   =  $_SESSION['idnombre_ss'];
$perfil_ss     =  $_SESSION['perfil_ss'];

if($_SESSION['perfil_ss'] != "ADMINISTRADOR"){ 		
	header("Location:../index.php");	
}

$idplan_anual_ss =  $_SESSION['idplan_anual_ss'];

$sql_a =" SELECT idplan_anual, denominacion, gestion, idtipo_documento, fecha_aprob, vigencia_i, vigencia_f, ";
$sql_a.=" no_doc, idpartida_presup, presupuesto, codigo FROM plan_anual WHERE idplan_anual='$idplan_anual_ss' ";
$result_a = mysqli_query($link,$sql_a);
$row_a = mysqli_fetch_array($result_a);

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
        <?php echo $rowus[0];?> <?php echo $rowus[1];?> <?php echo $rowus[2];?> - <?php echo $row_e[3];?></p>
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
				<h2 class="pageTitle">PLAN ANUAL <?php echo $idplan_anual_ss; ?></h2>
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
   	<div class="about-logo">
 
    </div>
    </div>

<div class="container">

<!-- javascript --->
<form name="FORM9" action="guarda_mod_plan.php" method="post">
<div class="box-area">


<div class="row">
  <div class="col-md-4"><h4>DENOMINACIÓN DEL PLAN:</h4></div>
  <div class="col-md-8"><textarea class="form-control" rows="3" name="denominacion" required><?php echo $row_a[1];?></textarea></div> 
</div>

<div class="row">
  <div class="col-md-1"><h4>GESTIÓN:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="gestion" value="<?php echo $row_a[2];?>" required></div> 
  <div class="col-md-2"><h4>TIPO DE DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-3">

<select name="idtipo_documento"  id="idtipo_documento" class="form-control">
<option selected>Seleccione</option>
<?php
$sqlv = "SELECT idtipo_documento, tipo_documento FROM tipo_documento ";
$resultv = mysqli_query($link,$sqlv);
if ($rowv = mysqli_fetch_array($resultv)){
mysqli_field_seek($resultv,0);
while ($fieldv = mysqli_fetch_field($resultv)){
} do {
?>
<option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_a[3]) echo "selected";?> ><?php echo $rowv[1];?></option>
<?php
} while ($rowv = mysqli_fetch_array($resultv));
} else {
}
?>
</select>

</div>  
  <div class="col-md-2"><h4>FECHA DE APROBACIÓN:</h4></div>
  <div class="col-md-2">
  
  <input type="text" id="fecha1" class="form-control" name="fecha_aprob" value="<?php 
    $fecha_i        = explode('-',$row_a[4]);
    $f_aprobacion   = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
    echo $f_aprobacion;?>">  

  </div> 
</div>

<div class="row">
  <div class="col-md-2"><h4>VIGENCIA DESDE:</h4></div>
  <div class="col-md-2">
    
  <input type="text" id="fecha2" class="form-control" name="vigencia_i" value="<?php 
    $fecha_j  = explode('-',$row_a[5]);
    $f_desde  = $fecha_j[2].'/'.$fecha_j[1].'/'.$fecha_j[0];
    echo $f_desde;?>">  
  
  </div> 
  <div class="col-md-2"><h4>VIGENCIA HASTA:</h4></div>
  <div class="col-md-2">
    
  <input type="text" id="fecha3" class="form-control" name="vigencia_f" value="<?php 
    $fecha_k  = explode('-',$row_a[6]);
    $f_hasta  = $fecha_k[2].'/'.$fecha_k[1].'/'.$fecha_k[0];
    echo $f_hasta;?>">  
  </div>  
  <div class="col-md-2"><h4>NÚMERO DE DOCUMENTO DE APROBACIÓN:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="no_doc" value="<?php echo $row_a[7]; ?>"></div> 
</div>

<div class="row">
  <div class="col-md-2"><h4>PARTIDA PRESUPUESTARIA:</h4></div>
  <div class="col-md-2">

  <select name="idpartida_presup"  id="idpartida_presup" class="form-control">
<option selected>Seleccione</option>
<?php
$sqlv = "SELECT idpartida_presup, partida_presup FROM partida_presup ";
$resultv = mysqli_query($link,$sqlv);
if ($rowv = mysqli_fetch_array($resultv)){
mysqli_field_seek($resultv,0);
while ($fieldv = mysqli_fetch_field($resultv)){
} do {
?>
<option value="<?php echo $rowv[0];?>" <?php if ($rowv[0]==$row_a[8]) echo "selected";?> ><?php echo $rowv[1];?></option>
<?php
} while ($rowv = mysqli_fetch_array($resultv));
} else {
}
?>
</select>





  </div> 
  <div class="col-md-2"><h4>PRESUPUESTO ASIGNADO [Bs.]:</h4></div>
  <div class="col-md-2"><input type="text" class="form-control" name="presupuesto" value="<?php echo $row_a[9];?>"></div>  
  <div class="col-md-2"><h4> </h4></div>
  <div class="col-md-2"><h4> </h4></div> 
</div>







</div>
<div class="row">
  <div class="col-md-3"><h4></h4></div>
  <div class="col-md-9">    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  GUARDAR DATOS DEL PLAN
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
        <h5 class="modal-title" id="exampleModalLabel">MODIFICACIÓN DEL PLAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de guardar lo cambios del PLAN?
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary pull-center">CONFIRMAR CAMBIOS</button>     
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

<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
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