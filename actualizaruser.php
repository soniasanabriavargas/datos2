<?php
session_start();
if (@!$_SESSION['user']) {/*arroba oculta mensaje de error, que posiblemente pudiera salir al autentificarse*/
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
				<?php
				extract($_GET);
				require("conexion.php");

				$sql="SELECT * FROM credentials WHERE id=$id";
			
				$ressql=mysqli_query($conn,$sql);
				   while ($row=mysqli_fetch_row ($ressql)){
				    	$id=$row[0];
				    	$user=$row[1];
				    	$email=$row[2];
				    	$password=$row[3];
				    	$passwordAdmin=$row[4];
				    	
				    }
				?>
		          <br><br><br>
		          <h1>EDIT USER</h1>
		            <div class="center">
				       <form action="ejecutaractualizaruser.php" method="post">
							<!--Id<br>-->
							<input type="hidden" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
							User<br> 
							<input type="text" name="user" value="<?php echo $user?>"><br>
							
							E-mail user<br> 
							<input type="text" name="email" value="<?php echo $email?>"><br>

							Password<br> 
							<input type="text" name="password" value="<?php echo $password?>"><br>

							Password administrator<br> 
							<input type="text" name="passwordAdmin" value="<?php echo $passwordAdmin?>"><br>
						    <br>
							<input class="btn btn-info" role="button" type="submit" value="Save">
							<a href="listuser.php" class="btn btn-info" role="button">Cancel</a>
					   </form>
				   </div>
	         </div> 
	 <!--///////////////////////////////////////////////////Fin cuerpo interno///////////////////////////////--> 
	  </body>
</html> 


