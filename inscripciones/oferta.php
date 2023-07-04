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
<script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
	</header><!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">OFERTA ACADÉMICA</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">

<div class="container">
<div class="row">
<div class="col-lg-12">

</div>
</div>
<!--- OFERTA ACADÉMICA ---->

<div class="table-responsive">
      <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nª</th>
                    <th>TEMÁTICA EN SALUD</th>
                    <th>DATOS DEL EVENTO DE CAPACITACIÓN</th>
                </tr>
            </thead>
			<tbody>
            <?php
            $numero=1;
            $sql =" SELECT idtematica, tematica, descripcion, url FROM tematica WHERE idtematica != '1' ORDER BY idtematica ";
            $result = mysqli_query($link,$sql);
            if ($row = mysqli_fetch_array($result)){
            mysqli_field_seek($result,0);
            while ($field = mysqli_fetch_field($result)){
            } do {
            ?>
				<tr>
				        <td><?php echo $numero;?></td>
                <td><img src="<?php echo $row[3];?>" class="img-thumbnail" alt=""></td>
				        <td>
                <h4 class="text-muted">EVENTO:</h4>
                <h4><?php echo $row[1];?></h4>
                <p><?php echo $row[2];?>.</p>
                </br>
                <form name="VALIDA" action="valida_tematica_oferta_o.php" method="post">
                <input name="idtematica" type="hidden" value="<?php echo $row[0];?>">
                <button type="submit" class="btn btn-primary" >VER EVENTOS PROGRAMADOS</button> 
                </form>
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
<script>
$(document).ready(function() {
$('#example2').DataTable( {
    "lengthMenu": [[ 3, 5, 10, -1], [ 3, 5, 10, "All"]] ,
    "language": {
        "lengthMenu": "Mostrar _MENU_ TEMÁTICAS POR PÁGINA",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first":    "Primero",
            "last":    "Último",
            "next":    "Siguiente",
            "previous": "Anterior"
        },
    }
} );
} );
</script>  
</body>
</html>