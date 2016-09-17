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
            echo "<script>location.href='listsponsors.php'</script>"; 
            //header("Location: listsponsors.php");
             //die();
               } else { 
                $pagina = $_GET["pagina"];
             };

              } else { 
               header("Location: listsponsors.php");
            die();
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
          <form  method="post" action="listsponsors.php" class="navbar-form navbar-left" role="search"><!--Busquedad-->
               <div class="form-group">
               <input name="buscar" type="text" class="form-control" placeholder="Search">
               </div>
               <input class="btn btn-info" role="button" type="submit" value="Search"><!--Busquedad-->
           </form>
           <nav>
            <ul class="nav pull-right">
                Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
                <a href="menu.php"  class="btn btn-info" role="button">Back to Menu</a><!--Boton Back to Menu-->
                <a href="formsponsors.php" class="btn btn-info" role="button">Register Sponsors</a><!--Boton Register Sponsors-->
                <a href="desconectar.php" class="btn btn-info" role="button">Sign off</a><!--Boton Cerrar Cesion-->
             </ul>
           </nav>
          </header>
  <!--///////////////////////////////////////////////////Inicia cuerpo interno///////////////////////////////-->
          
          <div class="container">
             

              <?php
                 $obtener_todo_BD = "SELECT * FROM sponsors";

                 //Realiza la consulta
                 $consulta_todo = mysqli_query($conn, $obtener_todo_BD);

                 //Cuenta el número total de registros
                 $total_registros = mysqli_num_rows($consulta_todo);

                 //Obtiene el total de páginas existentes
                 $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 
               ?>




               <?php
                 require("conexion.php"); 

                $consulta = isset($_POST['buscar']) ? "SELECT * FROM sponsors where name  LIKE '%".$_POST['buscar']."%' OR townorcity LIKE '%".$_POST['buscar']."%' " : ("SELECT * FROM sponsors ORDER BY sponsors.name  ASC LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
                 //Seleciona todos de la tabla sponsors donde el campo townorcity contega(LIKE) la variable 'buscar' enviada desde el POST, por el usuario
                //si la variable 'buscar' contiene ajijic, buscara todos los de ajijic de lo contrario si la variable 'buscar' contiene chapala buscara todos los de chapala.
                $resultado=mysqli_query($conn,$consulta);
               
          
                  echo "<table class='table table-bordered';>";
                  echo "<h1>LIST SPONSORS</h1>";
                  echo "<tr class='warning'>";
               
                  echo "<th>Name</th>";
                  echo "<th>Last Names</th>";
                  echo "<th>E-mail</th>";
                  echo "<th>Phone Number</th>";
                  echo "<th>Address</th>";
                  echo "<th>Town or City</th>";
                  echo "<th>Status type</th>";
                  echo "<th>Edit</th>";
                  echo "<th>Delete</th>";
                  echo "</tr>";
            
                ?>
                <?php

                   while($fila=mysqli_fetch_array($resultado)){
                      echo "<tr>";
                    
                       echo "<td>$fila[1]</td>";
                       echo "<td>$fila[2]</td>";
                       echo "<td>$fila[3]</td>";
                       echo "<td>$fila[4]</td>";
                       echo "<td>$fila[5]</td>";
                       echo "<td>$fila[6]</td>";
                       echo "<td>$fila[7]</td>";
                    
                       echo "<td><a href='actualizarsponsors.php?id=$fila[0]'>
                       <img id='imgprimaria' src='img/edit.png'></a></td>";

                       echo "<td><a href='eliminarsponsors.php?id=$fila[0]'>
                       <img id='imgprimaria'src='img/delete.png'/></a></td>";
                    
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
<!--///////////////////////////////////////////////////Finaliza Cuerpo Interno///////////////////////////////-->
      </body>
</html>

<?php
mysqli_close($conn);
?>

