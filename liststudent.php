<?php
session_start();
  if (@!$_SESSION['user']) {
    header("Location:index.php");
  }
?> 

<?php
  require("conexion.php");

  //Evitamos que salgan errores por variables vacías
  error_reporting(E_ALL ^ E_NOTICE);
  $cantidad_resultados_por_pagina = 10;
  //Comprueba si está seteado el GET de HTTP
  if (isset($_GET["pagina"])) {
    //Si el GET de HTTP si es una string / cadena, procede
    if (is_string($_GET["pagina"])) {
      //Si la string es numérica, define la variable 'pagina'
       if (is_numeric($_GET["pagina"])) {
         //Si la petición desde la paginación es la página uno
          //en lugar de ir a 'liststudent.php?pagina=1' se iría directamente a 'liststudent.php'
           if ($_GET["pagina"] == 1) {
            echo "<script>location.href='liststudent.php'</script>"; 
            //header("Location: liststudent.php");
            // die();
               } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
                $pagina = $_GET["pagina"];
             };

              } else { //Si la string no es numérica, redirige al liststudent (por ejemplo: liststudent.php?pagina=AAA)
               header("liststudent.php");
            die();
         };
      };

  } else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al liststudent.php o lo que sea)
    $pagina = 1;
  };

  //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
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
               <form method="post" action="liststudent.php" class="navbar-form navbar-left" role="search"><!--Busquedad-->
                  <div class="form-group">
                  <input name="buscar" type="text" class="form-control" placeholder="Search">
                  <input class="btn btn-info" role="button" type="submit" value="Search"><!--Busquedad-->
                  </div>
                </form>
             <nav>
                 <ul class="nav pull-right">
                    Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
                    <a href="menu.php"  class="btn btn-info" role="button">Back to Menu</a><!--Boton Back to Menu-->
                    <a href="formstudent.php" class="btn btn-info" role="button">Register Student</a><!--Boton Register Sponsors-->
                    <a href="desconectar.php" class="btn btn-info" role="button">Sign off</a><!--Boton Cerrar Cesion-->
                   </ul>
             </nav>
            </header>
    <!--///////////////////////////////////////////////////Inicia cuerpo interno///////////////////////////////-->
            <div class="container">
              <h1>LIST STUDENT</h1>

                <?php
                 $obtener_todo_BD = "SELECT * FROM student";

                 //Realiza la consulta
                 $consulta_todo = mysqli_query($conn, $obtener_todo_BD);

                 //Cuenta el número total de registros
                 $total_registros = mysqli_num_rows($consulta_todo);

                 //Obtiene el total de páginas existentes
                 $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 
                 ?>


                 <?php
                    require("conexion.php");
                     $sql = isset($_POST['buscar']) ? "SELECT * FROM student where name  LIKE '%".$_POST['buscar']."%' OR townorcity LIKE '%".$_POST['buscar']."%' " : ("SELECT * FROM student ORDER BY student.name  ASC LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
                     //$sql=("SELECT * FROM student");

                    
                     $query=mysqli_query($conn,$sql);
                        echo "<table class='table table-bordered';>";
                        echo "<tr class='warning'>";
                        //echo "<td>Id</td>";
                        echo "<th>Name</th>";
                        echo "<th>Last names</th>";
                        //echo "<td>Birthday</td>";
                        echo "<th>E-mail</th>";
                        echo "<th>Phone number</th>";
                        //echo "<td>Adress</td>";
                        echo "<th>Town or city</th>";
                        //echo "<td>Gender</td>";
                        echo "<th>School</th>";
                        echo "<th>Career</th>";

                        //echo "<td>Career Time</td>";
                        //echo "<td>Status type</td>";
                        //echo "<td>Scholarships</td>";
                        //echo "<td>Period Type</td>";
                        //echo "<td>Current job</td>";
                        //echo "<td>Civil Status type</td>";
                        //echo "<td>Do you have childrens</td>";
                        //echo "<td>How many</td>";
                        //echo "<td>Notes</td>";

                       
                        echo "<th>Edit</th>";
                        echo "<th>Delete</th>";
                        echo "<th>Add qualification of student</th>";
                        echo "<th>Information of student</th>";
                        
                      echo "</tr>";
                    ?>

                    <?php 
                 
                     while($arreglo=mysqli_fetch_array($query)){
                         echo "<tr>"; echo "<form method='post' action='detallesstudent.php'>";
                          //echo "<td>$arreglo[0]<input type='hidden' name='id' value='$arreglo[0]'></td>";
                          echo "<td>$arreglo[1]<input type='hidden' name='id' value='$arreglo[0]'></td>";
                          echo "<td>$arreglo[2]</td>";

                          //echo "<td>$arreglo[3]</td>";

                          echo "<td>$arreglo[4]</td>";
                          echo "<td>$arreglo[5]</td>";
                          //echo "<td>$arreglo[6]</td>";
                          echo "<td>$arreglo[7]</td>";
                          //echo "<td>$arreglo[8]</td>";
                          echo "<td>$arreglo[9]</td>";
                          echo "<td>$arreglo[10]</td>";

                          //echo "<td>$arreglo[11]</td>";
                          //echo "<td>$arreglo[12]</td>";
                          //echo "<td>$arreglo[13]</td>";
                          //echo "<td>$arreglo[14]</td>";
                          //echo "<td>$arreglo[15]</td>";
                          //echo "<td>$arreglo[16]</td>";
                          //echo "<td>$arreglo[17]</td>";
                          //echo "<td>$arreglo[18]</td>";
                          //echo "<td>$arreglo[19]</td>";
                         


                          echo "<td><a href='actualizarstudent.php?id=$arreglo[0]'>
                          <img id='imgprimaria' src='img/edit.png'></a></td>";

                          echo "<td><a href='eliminarstudent.php?id=$arreglo[0]'>
                          <img id='imgprimaria' src='img/delete.png'></a></td>";

                          echo "<td><input name='boton1' type='image'src='img/add.png' id='imgprimaria'></td>";

                          echo "<td><a href='Completeinformationofstudent.php?id=$arreglo[0]'>
                          <img id='imgprimaria' src='img/archivar.png'></a></td>";

                          echo '</form>';

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
