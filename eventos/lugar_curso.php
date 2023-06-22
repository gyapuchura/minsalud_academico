<?php
include("../inc.config.php");

$idmodalidad  = $_POST['modalidad'];

if ($idmodalidad == '2') {
  ?>

<input type="hidden" name="iddepartamento" value="4" >
<input type="hidden" name="idprovincia" value="52" >
<input type="hidden" name="idmunicipio" value="137" >

<?php 
} else {
    ?>   
<div class="row">
  <div class="col-md-3"><h4>DEPARTAMENTO:</h4></div>
  <div class="col-md-9">
       <select name="iddepartamento"  id="iddepartamento" class="form-control">
          <option value="">ELEGIR</option>
          <?php
          /*
          Realizamos una consulta ala tabla autor
          para mostrar los datos en un combo
          */

          $sql1 = "select iddepartamento, departamento from departamento";
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

  <div class="row">
    <div class="col-md-3"><h4>PROVINCIA:</h4></div>
    <div class="col-md-9"><select name="idprovincia" id="idprovincia" class="form-control"></select></div>
  </div>   

  <div class="row">
    <div class="col-md-3"><h4>MUNICIPIO:</h4></div>
    <div class="col-md-9"><select name="idmunicipio" id="idmunicipio" class="form-control"></select></div>
  </div>

        <?php    
        }
        ?>

<script language="javascript">
$(document).ready(function(){
   $("#iddepartamento").change(function () {
           $("#iddepartamento option:selected").each(function () {
            departamentos=$(this).val();
            $.post("provincias.php", { departamentos:departamentos }, function(data){
            $("#idprovincia").html(data);
            });
        });
   })
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idprovincia").change(function () {
            $("#idprovincia option:selected").each(function () {
            provincia=$(this).val();
            $.post("municipios.php", { provincia: provincia }, function(data){
            $("#idmunicipio").html(data);
            });
        });
   })
});
</script>
</body>
</html>
















