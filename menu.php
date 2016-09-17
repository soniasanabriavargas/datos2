
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
  <body background="img/fondo.jpg">
      <header>
         <div class="center">
               <ul class="nav pull-right">
                  Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
                  <a href="desconectar.php" class="btn btn-info" role="button">Sign off</a><!--Boton Cerrar Cesion-->
               </ul>
              
            <a><img  src="img/logo.gif"/></a>
            <nav>

                <div class="container">
                 <a href="listuser.php"  class="btn btn-info" role="button">USERS</a>
                 <a href="listboard.php"  class="btn btn-info" role="button">BOARD</a>
                 <a href="listsponsors.php" class="btn btn-info" role="button">SPONSORS</a>
                 <a href="liststudent.php"  class="btn btn-info" role="button">STUDENT</a>  
                </div>
            </nav>
          </div>
       </header>
    </body>
</html>