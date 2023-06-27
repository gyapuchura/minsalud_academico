<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 			= date("Y-m-d");

$idinscripcion   =  $_GET['idinscripcion'];

$gestion       = date("Y");

$sql_i = " SELECT inscripcion.idinscripcion, inscripcion.idevento, inscripcion.idusuario, nacionalidad.nacionalidad, genero.genero, ";
$sql_i.= " formacion_academica.formacion_academica, profesion.profesion, inscripcion.idespecialidad_medica, inscripcion.correo, inscripcion.celular, ";
$sql_i.= " dependencia.dependencia, inscripcion.entidad, inscripcion.cargo_entidad, inscripcion.idministerio, inscripcion.iddireccion, inscripcion.idarea, inscripcion.cargo_mds,  ";
$sql_i.= " inscripcion.iddepartamento, inscripcion.idred_salud, inscripcion.idestablecimiento_salud, inscripcion.cargo_red_salud, inscripcion.idestado_inscripcion, ";
$sql_i.= " inscripcion.correlativo, inscripcion.codigo, inscripcion.fecha_preins, inscripcion.fecha_ins, inscripcion.idprofesion, inscripcion.iddependencia FROM inscripcion, nacionalidad, genero, formacion_academica, profesion, dependencia ";
$sql_i.= " WHERE inscripcion.idnacionalidad=nacionalidad.idnacionalidad AND inscripcion.idgenero=genero.idgenero ";
$sql_i.= " AND inscripcion.idformacion_academica=formacion_academica.idformacion_academica AND inscripcion.idprofesion=profesion.idprofesion ";
$sql_i.= " AND inscripcion.iddependencia=dependencia.iddependencia AND inscripcion.idinscripcion='$idinscripcion'  ";
$result_i = mysqli_query($link,$sql_i);
$row_i = mysqli_fetch_array($result_i);

$sql_n =" SELECT nombre.nombre, nombre.paterno, nombre.materno, nombre.ci, nombre.complemento, nombre.exp, nombre.fecha_nac ";
$sql_n.=" FROM nombre, usuarios WHERE usuarios.idnombre=nombre.idnombre AND usuarios.idusuario='$row_i[2]' ";
$result_n = mysqli_query($link,$sql_n);
$row_n = mysqli_fetch_array($result_n);

?>

<!DOCTYPE html>
<head>
<meta content="charset=utf-8">
<title>FORMULARIO PREINSCRIPCIÓN</title>
<style type="text/css">
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #003366;
	font-size: 14px;
	font-weight: bold;
}
.Estilo10 {color: #000000; font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Estilo16 {color: #003366; font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Estilo17 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo18 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #003366;
}
.Estilo18 {
    font-family: Times New Roman;
    font-size: 12px;
    text-align: center;
}
.times {
    font-family: Times New Roman;
    font-size: 12px;
}
.Estilo1 tbody tr td table tbody tr .Estilo10 {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
}
.Estilo1 tbody tr td table tbody tr td {
    font-family: Times New Roman;
    font-size: 14px;
}
</style>
</head>
 
<body>
<div>
  <table width="703" border="0" align="center">
    <tbody>
      <tr>
        <td width="264"><img src="../mds_logo.jpg" width="264" height="75"></td>
        <td width="329">&nbsp;</td>
        <td width="101"><table width="88" border="1" cellspacing="0">
          <tbody>
            <tr>
              <td width="83" align="center" style="font-size: 12px; font-family: 'Times New Roman'; text-align: center;"><strong>MDSYD- F-700</strong></td>
            </tr>
          </tbody>
        </table>
        <p style="font-size: 9px; text-align: center;">Cód. de la Norma</p></td>
      </tr>
      <tr>
        <td colspan="3"><table width="470" border="0" align="center" cellspacing="0">
          <tbody>
            <tr>
              <td width="478" align="center"><p style="font-size: 16px">FORMULARIO DE PREINSCIPCIÓN</p>
<p style="font-size: 16px"><strong><?php echo $row_i[23];?></strong></p></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td colspan="3"><strong style="font-size: 12px">I. DATOS PERSONALES</strong></td>
      </tr>
      <tr>
        <td colspan="3"><table width="700" border="1" cellspacing="0">
          <tbody>
            <tr>
              <td width="274" style="text-align: left; font-size: 12px;"><strong>IDENTIFICACIÓN DEL SOLICITANTE:</strong></td>
              <td width="280" style="font-style: normal; font-size: 12px;"><strong>NÚMERO DE DOCUMENTO DE IDENTIDAD C.I.</strong></td>
              <td width="132">&nbsp;<?php echo $row_n[3];?> <?php echo $row_n[4];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>NOMBRE COMPLETO DEL SOLICITANTE:</strong></td>
              <td colspan="2"><?php echo $row_n[0];?> <?php echo $row_n[1];?><?php echo $row_n[2];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>FECHA DE NACIMIENTO:</strong></td>
              <td colspan="2"><?php echo $row_n[6];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>TIPO DE NACIONALIDAD:</strong></td>
              <td colspan="2"><?php echo $row_i[3];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>GÉNERO:</strong></td>
              <td colspan="2"><?php echo $row_i[4];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>FORMACIÓN ACADÉMICA:</strong></td>
              <td colspan="2"><?php echo $row_i[5];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>PROFESIÓN / OCUPACIÓN:</strong></td>
              <td colspan="2"><?php echo $row_i[6];?></td>
            </tr>

            <?php if ($row_i[26] == '1') { ?>           
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>ESPECIALIDAD:</strong></td>
              <td colspan="2">
              <?php               
              $sql_e =" SELECT idespecialidad_medica, especialidad_medica FROM especialidad_medica WHERE idespecialidad_medica = '$row_i[7]' ";
              $result_e = mysqli_query($link,$sql_e);
              $row_e = mysqli_fetch_array($result_e);
              echo $row_e[1];?>
              </td>            
            </tr>
            <?php } else { } ?>

            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>CORREO ELECTRÓNICO:</strong></td>
              <td colspan="2"><?php echo $row_i[8];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>Nº DE CELULAR:</strong></td>
              <td colspan="2"><?php echo $row_i[9];?></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><strong style="font-size: 12px">II. DATOS LABORALES</strong></td>
      </tr>
      <tr>
        <td colspan="3"><table width="698" border="1" cellspacing="0">
          <tbody>
            <tr>
              <td width="276" style="font-size: 12px"><strong>TIPO DE DEPENDENCIA:</strong></td>
              <td width="412"><?php echo $row_i[10];?></td>
            </tr>
            <!------ Otra Entidad Publicas ---->

            <?php if ($row_i[27] == '1') { ?>

              <tr>
              <td><strong style="font-size: 12px">ENTIDAD A LA QUE PERTENECE:</strong></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CARGO QUE EJERCE:</strong></td>
              <td>&nbsp;</td>
            </tr>

        <!------ Funcionario del Ministerio de Salud ---->

             <?php } else { if ($row_i[27] == '2') { ?>

              <tr>
              <td><strong style="font-size: 12px">INSTANCIA:</strong></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>DIRECCION GENERAL:</strong></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><strong style="font-size: 12px">UNIDAD ORGANIZACIONAL:</strong></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CARGO:</strong></td>
              <td>&nbsp;</td>
            </tr>            

          <!------ Funcionario de una RED DE SALUD ---->
            
             <?php } else { if ($row_i[27] == '3') { ?>
 
              <tr>
              <td><strong style="font-size: 12px">DEPARTAMENTO:</strong></td>
              <td>
              <?php               
              $sql_d =" SELECT iddepartamento, departamento FROM departamento WHERE iddepartamento = '$row_i[17]' ";
              $result_d = mysqli_query($link,$sql_d);
              $row_d = mysqli_fetch_array($result_d);
              echo $row_d[1];?>  
              </td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>RED DE SALUD:</strong></td>
              <td>
              <?php               
              $sql_r =" SELECT idred_salud, red_salud FROM red_salud WHERE idred_salud = '$row_i[18]' ";
              $result_r = mysqli_query($link,$sql_r);
              $row_r = mysqli_fetch_array($result_r);
              echo $row_r[1];?>    
             </td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>ESTABLECIMIENTO DE SALUD</strong></td>
              <td>
              <?php               
              $sql_s =" SELECT idestablecimiento_salud, establecimiento_salud FROM establecimiento_salud WHERE idestablecimiento_salud = '$row_i[19]' ";
              $result_s = mysqli_query($link,$sql_s);
              $row_s = mysqli_fetch_array($result_s);
              echo $row_s[1];?>   
              </td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CARGO</strong></td>
              <td><?php echo $row_i[20];?></td>
            </tr>
              
             <?php } else { }}} ?>

          </tbody>
        </table></td>
      </tr>
    </tbody>
  </table>
</div>
<!--- <div class="saltoDePagina"></div>  --->
<div>
  <table width="706" border="0" align="center" cellspacing="0">
    <tbody>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong style="font-size: 12px">III. DATOS DE EVENTO DE <span style="font-size: 12px">CAPACITACIÓN</span></strong></td>
      </tr>
      <tr>
        <td><table width="700" border="1" cellspacing="0">
          <tbody>
            <tr>
              <td width="188"><strong style="font-size: 12px">NIVEL:</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CÓDIGO DEL EVENTO:</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CURSO (TEMÁTICA):</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>LUGAR:</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>TIPO DE CURSO:</strong></td>
              <td width="159">&nbsp;</td>
              <td width="175" style="font-size: 12px"><strong>MODALIDAD:</strong></td>
              <td width="160">&nbsp;</td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>FECHA DE INICIO:</strong></td>
              <td>&nbsp;</td>
              <td style="font-size: 12px"><strong>FECHA DE FINALIZACIÓN:</strong></td>
              <td>&nbsp;</td>
              </tr>
            <tr>
              <td style="font-size: 12px"><strong>MONTO TOTAL A CANCELAR:</strong></td>
              <td colspan="3">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2" style="font-size: 12px; text-align: center;"><strong>FECHAS:</strong></td>
              <td colspan="2" style="font-size: 12px; text-align: center;"><strong>HORARIOS:</strong></td>
              </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="701" border="0">
          <tbody>
            <tr>
              <td width="36" valign="top"><strong style="font-size: 12px; text-align: right;">Nota:</strong></td>
              <td width="649"><p><strong><span style="font-size: 12px">El contenido de la Información a registrar en el presente formulario es de entera responsabilidad del solicitante.<br>
              </span></strong></p></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td style="font-size: 10px; text-align: justify;">Yo OSWALDO JULIAN SOLIZ VILLEGAS, con CI: 6844536, declaro que la información proporcionada en el presente formulario de inscripción en su totalidad, constituye información fidedigna, la misma que tiene carácter de Declaración Jurada para fines consiguientes. A este efecto, la CGE a través del CENCAP podrá verificar la misma en el momento que lo considere necesario y en caso de encontrar irregularidades, autorizo y me sujeto de manera expresa a las acciones y sanciones que correspondan de acuerdo a normativa vigente.</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <?php
          $fecha_i = explode('-',$row1[13]);
          $fecha_form = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];
          ?>
              <td><p style="font-size: 12px; text-align: center;">La Paz <?php echo $fecha_i[2];?> de <?php 
              
              switch ($fecha_i[1]) {
                case 1:
                    echo "Enero";
                    break;
                case 2:
                    echo "Febrero";
                    break;
                case 3:
                    echo "Marzo";
                    break;
                case 4:
                  echo "Abril";
                  break;
                case 5:
                  echo "Mayo";
                  break;
                case 6:
                  echo "Junio";
                  break;
                case 7:
                  echo "Julio";
                  break;
                case 8:
                  echo "Agosto";
                  break;
                case 9:
                  echo "Septiembre";
                  break;
                case 10:
                  echo "Octubre";
                  break;
                case 11:
                  echo "Noviembre";
                  break;
                case 12:
                  echo "Diciembre";
                  break;
            }              
              ?> de <?php echo $fecha_i[0];?></p></td>
            </tr>
          </tbody>
      </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="696" border="0">
          <tbody>
            <tr>
              <td width="224" style="text-align: center">&nbsp;</td>
              <td width="260" style="text-align: center">&nbsp;</td>
              <td width="190" style="text-align: center"><p>&nbsp;</p>
                <p style="font-family: Arial; font-size: 10px;">
                  <?php
/*
 * Algoritmo para codificacion QR
 *
 * SE emplea el include con el scripti phpqrcode.php
 *
 */
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "phpqrcode.php";

    //capturamos el valor de "data"

    $separador='|';
    $tamano='M';

    $_REQUEST['data'] = 'https://'.$_SERVER['HTTP_HOST'].'/impresion_documentos/imprime_formulario_cd.php?idformulario_cd='.$row1[0];
    $_REQUEST['size'] = 2 ;
    $_REQUEST['level'] = $tamano ;

    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);


    $filename = $PNG_TEMP_DIR.'test.png';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) {

        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');

        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    } else {

        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>
        <div align="right">';
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    }

    //display generated file


echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';

?>
                </p>
                <p style="font-family: Arial; font-size: 10px;">Codigo de Seguimiento Digital </p></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
    </tbody>
  </table>
</div>
<!-----  <div class="saltoDePagina"></div>  ---->
<!------  <div></div>   ---->
</body>
</html>