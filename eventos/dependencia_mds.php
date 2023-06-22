<?php
include("../inc.config.php");

$iddependencia  = $_POST['dependencia'];

    if ($iddependencia == '1') {
  ?>
<div class="row">
    <div class="col-md-3"><h4>ENTIDAD A LA QUE PERTENECE:</h4></div>
    <div class="col-md-9"><textarea class="form-control" rows="3" name="entidad" required></textarea></div>
</div>
<div class="row">
    <div class="col-md-3"><h4>CARGO EN LA ENTIDAD:</h4></div>
    <div class="col-md-9"><textarea class="form-control" rows="2" name="cargo_entidad" required></textarea></div>
</div>

<?php 
} else {
    if ($iddependencia == '2') {
        ?>
 
    <div class="row">
    <div class="col-md-3"><h4>DEPENDIENTE DEL:</h4></div>
    <div class="col-md-9">
       <select name="idministerio"  id="idministerio" class="form-control">
          <option value="">ELEGIR</option>
          <?php
          $sql1 = "select idministerio, ministerio, sigla from ministerio";
          $result1 = mysqli_query($link,$sql1);
          if ($row1 = mysqli_fetch_array($result1)){
          mysqli_field_seek($result1,0);
          while ($field1 = mysqli_fetch_field($result1)){
          } do {
          echo "<option value=". $row1[0]. ">". $row1[2].".- ".$row1[1]."</option>";
          } while ($row1 = mysqli_fetch_array($result1));
          } else {
          echo "No se encontraron resultados!";
          }
          ?>
          </select>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3"><h4>DIRECCIÓN/PROGRAMA/</br>INSTITUCIÓN:</h4></div>
    <div class="col-md-9">
    <select name="iddireccion" id="iddireccion" class="form-control" required></select>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3"><h4>UNIDAD ORGANIZACIONAL:</h4></div>
    <div class="col-md-9">
    <select name="idarea" id="idarea" class="form-control" required></select>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3"><h4>CARGO QUE EJERCE:</h4></div>
    <div class="col-md-9"><textarea class="form-control" rows="2" name="cargo_mds" required></textarea></div>
    </div>

    <?php } else { ?>
   

        <div class="row">
    <div class="col-md-3"><h4>DEPARTAMENTO:</h4></div>
    <div class="col-md-9">
       <select name="iddepartamento"  id="iddepartamento" class="form-control">
          <option value="">ELEGIR</option>
          <?php
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
    <div class="col-md-3"><h4>RED DE SALUD:</h4></div>
    <div class="col-md-9">
    <select name="idred_salud" id="idred_salud" class="form-control" required></select>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3"><h4>ESTABLECIMIENTO DE SALUD:</h4></div>
    <div class="col-md-9">
    <select name="idestablecimiento_salud" id="idestablecimiento_salud" class="form-control" required></select>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3"><h4>CARGO:</h4></div>
    <div class="col-md-9"><textarea class="form-control" rows="2" name="cargo_red_salud" required></textarea></div>
    </div>

    <?php    
    }}
    ?>


<script language="javascript">
$(document).ready(function(){
   $("#idministerio").change(function () {
           $("#idministerio option:selected").each(function () {
            ministerio=$(this).val();
            $.post("direccion.php", { ministerio:ministerio }, function(data){
            $("#iddireccion").html(data);
            });
        });
   })
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#iddireccion").change(function () {
            $("#iddireccion option:selected").each(function () {
            direccion=$(this).val();
            $.post("areas.php", { direccion:direccion }, function(data){
            $("#idarea").html(data);
            });
        });
   })
});
</script>

<!------- para REDES DE SALUD ----->

<script language="javascript">
$(document).ready(function(){
   $("#iddepartamento").change(function () {
            $("#iddepartamento option:selected").each(function () {
                departamento=$(this).val();
            $.post("red_salud.php", { departamento:departamento }, function(data){
            $("#idred_salud").html(data);
            });
        });
   })
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#idred_salud").change(function () {
            $("#idred_salud option:selected").each(function () {
                red_salud=$(this).val();
            $.post("establecimiento_salud.php", { red_salud:red_salud }, function(data){
            $("#idestablecimiento_salud").html(data);
            });
        });
   })
});
</script>
