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

         <div class="container">
            <h1>REGISTER USER</h1>
             <div class="center">
                <form action="registeruser.php" method="post">
            
                		<label>Name*</label><br>
                		<!--<label style="color: #FFFFFF;">Name:</label><br>-->
                		<input title="You need to add the name" type="text" name="name" required placeholder="Name"><br>
                		

                		<label>E-mail*</label><br>
                		<input title="You need to add the email" type="email" name="email" required placeholder="Email"><br>

                		<label>Password*</label><br>
                		<input type="password" name="password" required placeholder="Password"><br>

                		<label>Repeat your password*</label><br>
                		<input type="password" name="rpassword" required placeholder="Password"><br>		
                	
                		<br><br>
                        <input class="btn btn-info" role="button" type="submit" value="Save">
                	  <a href="listuser.php" class="btn btn-info" role="button">Cancel</a>
          	    </form>
             </div> 
         </div> 
    </body>
</html>