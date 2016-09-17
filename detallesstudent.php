<?php
session_start();
  if (@!$_SESSION['user']) {
    header("Location:index.php");
  }
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
    <body>
   
       <header class="header">
           <ul class="nav pull-right">
              Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
              <a href="liststudent.php"  class="btn btn-info" role="button">Back to List student</a><!--Boton Back to Menu-->
             <a href="desconectar.php" class="btn btn-info" role="button">Sign off</a><!--Boton Cerrar Cesion-->
            </ul>
        </header>
  <!--///////////////////////////////////////////////////Inicia contenido///////////////////////////////-->
            <div class="container">

                 <?php

                  require("conexion.php");
                  $id=$_POST['id'];
                  $sql=("SELECT qualification.id, qualification.grade, qualification.qualification FROM qualification  WHERE qualification.id_student = '".$id."'");
                  $query=mysqli_query($conn,$sql);

                     echo "<table class='table table-bordered';>";
                     echo "<tr class='warning'>";
                     echo "<td>Grade</td>";
                     echo "<td>Qualification</td>";
                     echo "<td>Edit</td>";
                     echo "</tr>";       
                  ?>

                  <?php 
                     while($arreglo=mysqli_fetch_array($query)){
                      echo "<tr>"; 
                      echo "<form method='post' action='updatequalification.php'>";
                      echo "<td>$arreglo[1]<input type='hidden' name='id' value=".$arreglo[0]."></td>";
                      echo "<td>$arreglo[2]</td>";
                      echo "<td><input name='boton1' type='image'src='img/edit.png' id='imgprimaria'></td>";
                      echo '</form>';
                      echo "</tr>";   
                   }

                   echo "</table>";

                 ?>
                 <div class="center">
                   <form method="post" action="addqualification.php">
                     <input type='hidden' name='id' value=<?php echo $id; ?>>
                     <!--<input name='boton1' type='image'src='img/add.png'>-->
                     <input class="btn btn-info" role="button" type="submit" value="Add qualification">
                     <a href="liststudent.php" class="btn btn-info" role="button">Cancel</a>
                 </form>
            </div>
       </div>
  <!--///////////////////////////////////////////////////Finaliza Contenido//////////////////////-->
     </body>
</html>
<?php
  mysqli_close($conn);
?>
