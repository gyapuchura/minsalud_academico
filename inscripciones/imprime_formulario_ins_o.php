<?php include("../inc.config.php");?>
<?php
date_default_timezone_set('America/La_Paz');
$fecha_ram	= date("Ymd");
$fecha 	= date("Y-m-d");

$idinscripcion   =  $_GET['idinscripcion'];

$gestion       = date("Y");

$sql_i = " SELECT idinscripcion, idevento, idusuario, idnombre, idnombre_datos, iddato_laboral, idestado_inscripcion, ";
$sql_i.= " correlativo, codigo, fecha_preins, fecha_ins, gestion FROM inscripcion WHERE idinscripcion='$idinscripcion' ";
$result_i = mysqli_query($link,$sql_i);
$row_i = mysqli_fetch_array($result_i);

$sql_l = " SELECT iddato_laboral, idusuario, idnombre, iddependencia, entidad, cargo_entidad, ";
$sql_l.= " idministerio, iddireccion, idarea, cargo_mds, iddepartamento, idred_salud, idestablecimiento_salud, cargo_red_salud ";
$sql_l.= " FROM dato_laboral WHERE iddato_laboral='$row_i[5]' ";
$result_l = mysqli_query($link,$sql_l);
$row_l = mysqli_fetch_array($result_l);

$sql_n =" SELECT nombre.nombre, nombre.paterno, nombre.materno, nombre.ci, nombre.complemento, nombre.exp, nombre.fecha_nac, nacionalidad.nacionalidad, ";
$sql_n.=" genero.genero, formacion_academica.formacion_academica, profesion.profesion, especialidad_medica.especialidad_medica, nombre_datos.correo, ";
$sql_n.=" nombre_datos.celular, nombre_datos.idprofesion, nombre_datos.idespecialidad_medica FROM nombre, nombre_datos, usuarios, nacionalidad, genero, formacion_academica, profesion, especialidad_medica ";
$sql_n.=" WHERE nombre_datos.idnombre=nombre.idnombre AND nombre.idnacionalidad=nacionalidad.idnacionalidad AND nombre.idgenero=genero.idgenero AND ";
$sql_n.=" usuarios.idnombre=nombre.idnombre AND nombre_datos.idformacion_academica=formacion_academica.idformacion_academica AND ";
$sql_n.=" nombre_datos.idprofesion=profesion.idprofesion AND nombre_datos.idespecialidad_medica=especialidad_medica.idespecialidad_medica ";
$sql_n.=" AND usuarios.idusuario ='$row_i[2]' ";
$result_n = mysqli_query($link,$sql_n);
$row_n = mysqli_fetch_array($result_n);

$sql_ev =" SELECT nivel_curricular.nivel_curricular, evento.codigo, tematica.tematica, departamento.departamento, tipo_evento.tipo_evento, modalidad.modalidad, evento.fecha_inicio, evento.fecha_fin, microcurricula.idtipo_costo, microcurricula.costo ";
$sql_ev.=" FROM evento, microcurricula, nivel_curricular, tematica, departamento, tipo_evento, modalidad WHERE evento.idmicrocurricula=microcurricula.idmicrocurricula ";
$sql_ev.=" AND evento.iddepartamento=departamento.iddepartamento AND microcurricula.idtipo_evento=tipo_evento.idtipo_evento AND evento.idmodalidad=modalidad.idmodalidad ";
$sql_ev.=" AND microcurricula.idnivel_curricular=nivel_curricular.idnivel_curricular AND microcurricula.idtematica=tematica.idtematica AND evento.idevento='$row_i[1]' ";
$result_ev = mysqli_query($link,$sql_ev);
$row_ev = mysqli_fetch_array($result_ev);
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
              <td width="478" align="center"><p><strong>FORMULARIO  DE PREINSCRIPCIÓN</strong></p></td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td colspan="3" align="center"><strong><?php echo $row_i[8];?></strong></td>
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
              <td width="132" style="font-size: 12px">&nbsp;<?php echo $row_n[3];?> <?php echo $row_n[4];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>NOMBRE COMPLETO DEL SOLICITANTE:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[0];?> <?php echo $row_n[1];?> <?php echo $row_n[2];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>FECHA DE NACIMIENTO:</strong></td>
              <td colspan="2" style="font-size: 12px">
              <?php 
                $fecha_nac    = explode('-',$row_n[6]);
                $f_nacimiento = $fecha_nac[2].'/'.$fecha_nac[1].'/'.$fecha_nac[0];
                echo $f_nacimiento; 
                ?>
              </td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>TIPO DE NACIONALIDAD:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[7];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>GÉNERO:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[8];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>FORMACIÓN ACADÉMICA:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[9];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>PROFESIÓN / OCUPACIÓN:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[10];?></td>
            </tr>

            <?php if ($row_n[14] == '1') { ?>           
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>ESPECIALIDAD:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php               
              $sql_e =" SELECT idespecialidad_medica, especialidad_medica FROM especialidad_medica WHERE idespecialidad_medica = '$row_n[15]' ";
              $result_e = mysqli_query($link,$sql_e);
              $row_e = mysqli_fetch_array($result_e);
              echo $row_e[1];?></td>            
            </tr>
            <?php } else { } ?>

            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>CORREO ELECTRÓNICO:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[12];?></td>
            </tr>
            <tr>
              <td style="text-align: left; font-size: 12px;"><strong>Nº DE CELULAR:</strong></td>
              <td colspan="2" style="font-size: 12px"><?php echo $row_n[13];?></td>
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
              <td width="412" style="font-size: 12px"><?php 
                $sql_dep =" SELECT iddependencia, dependencia FROM dependencia WHERE iddependencia = '$row_l[3]' ";
                $result_dep = mysqli_query($link,$sql_dep);
                $row_dep = mysqli_fetch_array($result_dep);
                echo $row_dep[1]; ?></td>
            </tr>
            <!------ Otra Entidad Publicas ---->

            <?php if ($row_l[3] == '1') { ?>
              <tr>
              <td><strong style="font-size: 12px">DEPARTAMENTO:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_d =" SELECT iddepartamento, departamento FROM departamento WHERE iddepartamento = '$row_l[10]' ";
              $result_d = mysqli_query($link,$sql_d);
              $row_d = mysqli_fetch_array($result_d);
              echo $row_d[1];?></td>
             </tr>
             
              <tr>
              <td><strong style="font-size: 12px">ENTIDAD A LA QUE PERTENECE:</strong></td>
              <td style="font-size: 12px"><?php echo $row_l[4];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CARGO QUE EJERCE:</strong></td>
              <td style="font-size: 12px"><?php echo $row_l[5];?></td>
            </tr>

        <!------ Funcionario del Ministerio de Salud ---->

             <?php } else { if ($row_l[3] == '2') { ?>

              <tr>
              <td><strong style="font-size: 12px">DEPARTAMENTO:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_d =" SELECT iddepartamento, departamento FROM departamento WHERE iddepartamento = '$row_l[10]' ";
              $result_d = mysqli_query($link,$sql_d);
              $row_d = mysqli_fetch_array($result_d);
              echo $row_d[1];?></td>
             </tr>

              <tr>
              <td><strong style="font-size: 12px">INSTANCIA:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_r =" SELECT idministerio, ministerio FROM ministerio WHERE idministerio = '$row_l[6]' ";
              $result_r = mysqli_query($link,$sql_r);
              $row_r = mysqli_fetch_array($result_r);
              echo $row_r[1];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>DIRECCION GENERAL:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_r =" SELECT iddireccion, direccion FROM direccion WHERE iddireccion = '$row_l[7]' ";
              $result_r = mysqli_query($link,$sql_r);
              $row_r = mysqli_fetch_array($result_r);
              echo $row_r[1];?></td>
            </tr>
            <tr>
              <td><strong style="font-size: 12px">UNIDAD ORGANIZACIONAL:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_r =" SELECT idarea, area FROM area WHERE idarea = '$row_l[8]' ";
              $result_r = mysqli_query($link,$sql_r);
              $row_r = mysqli_fetch_array($result_r);
              echo $row_r[1];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CARGO:</strong></td>
              <td style="font-size: 12px"><?php echo $row_l[9];?></td>
            </tr>            

          <!------ Funcionario de una RED DE SALUD ---->
            
             <?php } else { if ($row_l[3] == '3') { ?>
 
              <tr>
              <td><strong style="font-size: 12px">DEPARTAMENTO:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_d =" SELECT iddepartamento, departamento FROM departamento WHERE iddepartamento = '$row_l[10]' ";
              $result_d = mysqli_query($link,$sql_d);
              $row_d = mysqli_fetch_array($result_d);
              echo $row_d[1];?></td>
             </tr>
            <tr>
              <td style="font-size: 12px"><strong>RED DE SALUD:</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_r =" SELECT idred_salud, red_salud FROM red_salud WHERE idred_salud = '$row_l[11]' ";
              $result_r = mysqli_query($link,$sql_r);
              $row_r = mysqli_fetch_array($result_r);
              echo $row_r[1];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>ESTABLECIMIENTO DE SALUD</strong></td>
              <td style="font-size: 12px"><?php               
              $sql_s =" SELECT idestablecimiento_salud, establecimiento_salud FROM establecimiento_salud WHERE idestablecimiento_salud = '$row_l[12]' ";
              $result_s = mysqli_query($link,$sql_s);
              $row_s = mysqli_fetch_array($result_s);
              echo $row_s[1];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CARGO</strong></td>
              <td style="font-size: 12px"><?php echo $row_l[13];?></td>
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
        <td><strong style="font-size: 12px"><span style="font-size: 12px">III. DATOS DEL EVENTO DE CAPACITACIÓN</span></strong></td>
      </tr>
      <tr>
        <td><table width="700" border="1" cellspacing="0">
          <tbody>
            <tr>
              <td width="188"><strong style="font-size: 12px">NIVEL:</strong></td>
              <td colspan="3" style="font-size: 12px"><?php echo $row_ev[0];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CÓDIGO DEL EVENTO:</strong></td>
              <td colspan="3" style="font-size: 12px"><?php echo $row_ev[1];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>CURSO (TEMÁTICA):</strong></td>
              <td colspan="3" style="font-size: 12px"><?php echo $row_ev[2];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>LUGAR:</strong></td>
              <td colspan="3" style="font-size: 12px"><?php echo $row_ev[3];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>TIPO DE CURSO:</strong></td>
              <td width="159" style="font-size: 12px"><?php echo $row_ev[4];?></td>
              <td width="175" style="font-size: 12px"><strong>MODALIDAD:</strong></td>
              <td width="160" style="font-size: 12px"><?php echo $row_ev[5];?></td>
            </tr>
            <tr>
              <td style="font-size: 12px"><strong>FECHA DE INICIO:</strong></td>
              <td style="font-size: 12px"><?php 
                $fecha_i = explode('-',$row_ev[6]);
                $f_inicio    = $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0];
                echo $f_inicio;
                ?></td>
              <td style="font-size: 12px"><strong>FECHA DE FINALIZACIÓN:</strong></td>
              <td style="font-size: 12px"><?php 
                $fecha_f = explode('-',$row_ev[7]);
                $f_final = $fecha_f[2].'/'.$fecha_f[1].'/'.$fecha_f[0];
                echo $f_final;
                ?></td>
              </tr>
          <?php if ($row_ev[8] != '1') { ?>
              <tr>
              <td style="font-size: 12px"><strong>MONTO TOTAL A CANCELAR:</strong></td>
              <td colspan="3" style="font-size: 12px"><?php echo $row_ev[9];?> Bs.</td>
              </tr>
          <?php }  else { ?>
          <?php } ?>
            <tr>
              <td colspan="2" style="font-size: 12px; text-align: center;"><strong>FECHAS:</strong></td>
              <td colspan="2" style="font-size: 12px; text-align: center;"><strong>HORARIOS:</strong></td>
              </tr>

 
            <tr>
              <td colspan="2" align="center" style="font-size: 12px"><?php
          $sqlf =" SELECT horario.inicio, horario.fin FROM horario, aula";
          $sqlf.=" WHERE horario.idaula=aula.idaula AND horario.idevento='$row_i[1]' ";
          $resultf = mysqli_query($link,$sqlf);
          if ($rowf = mysqli_fetch_array($resultf)){
          mysqli_field_seek($resultf,0);
          while ($fieldf = mysqli_fetch_field($resultf)){
          } do {
          ?>

          <?php 
          $fecha_del = explode('-',$rowf[0]);
          $f_del    = $fecha_del[2].'/'.$fecha_del[1].'/'.$fecha_del[0];
          echo $f_del; 
          ?> - <?php 
          $fecha_al = explode('-',$rowf[1]);
          $f_al    = $fecha_al[2].'/'.$fecha_al[1].'/'.$fecha_al[0];
          echo $f_al; 
          ?>   </br>
          <?php }
            while ($rowf = mysqli_fetch_array($resultf));
          } else {
          } ?></td>
              <td colspan="2" align="center" style="font-size: 12px"><?php
          $sqlh =" SELECT horario.hora_i, horario.hora_f FROM horario, aula";
          $sqlh.=" WHERE horario.idaula=aula.idaula AND horario.idevento='$row_i[1]' ";
          $resulth = mysqli_query($link,$sqlh);
          if ($rowh = mysqli_fetch_array($resulth)){
          mysqli_field_seek($resulth,0);
          while ($fieldh = mysqli_fetch_field($resulth)){
          } do {
          ?>
            <?php echo $rowh[0];?> - <?php echo $rowh[1];?> </br>
          <?php }
            while ($rowh = mysqli_fetch_array($resulth));
          } else {
          } ?></td>
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
              <td width="219" style="font-size: 12px">Lugar y Fecha de Preinscripción:</td>
              <?php
              $fecha_i = explode('-',$row_i[10]);
              $fecha_form = $fecha_i[2].'-'.$fecha_i[1].'-'.$fecha_i[0];
              ?>
              <td width="472" align="left" style="font-size: 12px">
              <?php
              $lugar = strtolower($row_ev[3]);
              $lugar_cap = ucwords($lugar);
              
              echo $lugar_cap;?>, <?php echo $fecha_i[2];?> de <?php 
              
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
              ?> de <?php echo $fecha_i[0];?></td>
            </tr>
          </tbody>
      </table></td>
      </tr>
      <tr>
        <td><table width="702" border="0">
          <tbody>
            <tr>
              <td style="text-align: justify; font-size: 12px;"><strong style="font-size: 12px; text-align: right;">Nota:</strong> El contenido de la Información a registrada en el presente formulario es de entera responsabilidad del solicitante.</td>
              <td width="195" style="text-align: center"><p>
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

    include "../eventos/phpqrcode.php";

    //capturamos el valor de "data"

    $separador='|';
    $tamano='M';

    $_REQUEST['data'] = 'http://'.$_SERVER['HTTP_HOST'].'/safci/eventos/imprime_formulario_ins.php?idinscripcion='.$row_i[0];
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
                <p style="font-family: Arial; font-size: 10px;">Codigo de Verificación</p></td>
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