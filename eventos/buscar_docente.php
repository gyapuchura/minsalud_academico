<?php include("../inc.config.php");

      $b = $_POST['b'];

            $sql =" SELECT usuarios.idusuario, nombre.nombre, nombre.paterno, nombre.materno ";
            $sql.=" FROM usuarios, nombre WHERE usuarios.idnombre=nombre.idnombre ";
            $sql.=" AND nombre.nombre LIKE '%$b%' AND usuarios.condicion='ACTIVO' AND usuarios.perfil='DOCENTE' ";
            $result2 = mysqli_query($link,$sql);

            $contar = mysqli_num_rows($result2);

            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row = mysqli_fetch_array($result2)){
                        $id      = $row[0];
                        $nombre  = $row[1];
                        $paterno = $row[2];
                        $materno = $row[3];

                        echo $nombre." ".$paterno." ".$materno." - ";
                        echo "<input name='iddocente' type='radio' value=".$id.">";	                        
                        echo "</BR>";                                             
                  }
            }
      

?>