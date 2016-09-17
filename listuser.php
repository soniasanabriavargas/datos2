
<?php
session_start();
  if (@!$_SESSION['user']) {
	  header("Location:index.php");
  }
?>
<?php
  require("conexion.php");

  error_reporting(E_ALL ^ E_NOTICE);
  $cantidad_resultados_por_pagina = 5;

  if (isset($_GET["pagina"])) {

    if (is_string($_GET["pagina"])) {
   
       if (is_numeric($_GET["pagina"])) {
        
           if ($_GET["pagina"] == 1) {
            echo "<script>location.href='listuser.php'</script>"; 
            //header("Location: listuser.php");
             //die();
               } else { 
                $pagina = $_GET["pagina"];
             };

              } else { 
                echo "<script>location.href='listuser.php'</script>"; 
               //header("Location: listuser.php");
            //die();
         };
      };

  } else { 
    $pagina = 1;
  };

  $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UVA</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <link href="css/style.css"  rel="stylesheet" type="text/css"/>
    </head>
    <body background="img/fondo.jpg">
        <header class="header">
        <nav>
           <ul class="nav pull-right">
              Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
              <a href="menu.php"  class="btn btn-info" role="button">Back to Menu</a><!--Boton Back to Menu-->
              <a href="formuser.php" class="btn btn-info" role="button">Register User</a>
              <a href="desconectar.php" class="btn btn-info" role="button">Sign off</a><!--Boton Cerrar Cesion-->
            </ul>
         </nav>
         </header>

  <!--//////////////////////////////////////////////////Inicia cuerpo del documento interno///////////////////////////////-->
        <div class="container">
           <h1>LIST USERS</h1>

              <?php
                 $obtener_todo_BD = "SELECT * FROM credentials";

                 //Realiza la consulta
                 $consulta_todo = mysqli_query($conn, $obtener_todo_BD);

                 //Cuenta el número total de registros
                 $total_registros = mysqli_num_rows($consulta_todo);

                 //Obtiene el total de páginas existentes
                 $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 
               ?>


                <?php

                  require("conexion.php");
                  
                  //$sql=("SELECT * FROM credentials");
                  $sql =("SELECT * FROM credentials ORDER BY credentials.user  ASC LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
                 
               

                  $query=mysqli_query($conn,$sql);

                  echo "<table class='table table-bordered';>";
                    echo "<tr class='warning'>";
                      //echo "<td>Id</td>";
                      echo "<th>User</th>";
                      echo "<th>E-mail</th>";
                      echo "<th>Password</th>";
                      echo "<th>Password of administrator</th>";
                      
                      echo "<th>Edit</th>";
                      echo "<th>Delete</th>";
                    echo "</tr>";

                    
                ?>
                
                <?php 
                   while($arreglo=mysqli_fetch_array($query)){
                      echo "<tr>";
                        //echo "<td>$arreglo[0]</td>";
                        echo "<td>$arreglo[1]</td>";
                        echo "<td>$arreglo[2]</td>";
                        echo "<td>$arreglo[3]</td>";
                        echo "<td>$arreglo[4]</td>";

                        echo "<td><a href='actualizaruser.php?id=$arreglo[0]'>
                        <img id='imgprimaria' src='img/edit.png'></a></td>";

                        echo "<td><a href='eliminaruser.php?id=$arreglo[0]'>
                        <img id='imgprimaria' src='img/delete.png'></a></td>";
                    echo "</tr>";
                  }

                  echo "</table>";
               ?>  

                <?php
                for ($i=1; $i<=$total_paginas; $i++) {
                //En el bucle, muestra la paginación
                echo "<div class='pagination'> <ul><li><a href='?pagina=".$i."'>".$i."</a></li></ul></div>";
                }; 

                ?>         
         </div>
  <!--///////////////////////////////////////////////////Finaliza cuerpo del documento interno//////////////////////-->

     </body>
</html>
<?php
mysqli_close($conn);
?>

