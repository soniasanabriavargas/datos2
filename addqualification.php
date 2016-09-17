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
        <header class="header">
           <ul class="nav pull-right">
              Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
           </ul>
        </header>
<!--///////////////////////////////////////////////////Inicia cuerpo interno///////////////////////////////-->
       <div class="container">
      	   <h1>Add qualification</h1>
             <div class="center">
               <form action="registerqualification.php" method="post">
                    <label>Grade:</label><br>
              		   <input title="You need to add the grade" type="text" name="grade" required placeholder="Grade"><br>
                
              		   <label>Qualification:</label><br>
              		   <!--<label style="color: #FFFFFF;">Name:</label><br>-->
              		   <input title="You need to add the qualification" type="text" name="qualification" required placeholder="Qualification"><br>

              		   <input type="hidden" value=<?php echo $_POST['id'];?> name = "id">
                       <input class="btn btn-info" role="button" type="submit" value="Accept">
              	     <a href="liststudent.php" class="btn btn-info" role="button">Cancel</a>
        	      </form>
           </div> 
       </div>
    </body>
</html>