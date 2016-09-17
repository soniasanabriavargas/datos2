
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

				$consulta="SELECT * FROM board WHERE id=$id";

				$resql=mysqli_query($conn,$consulta);
				while ($row=mysqli_fetch_row ($resql)){
				    	$id=$row[0];
				    	$name=$row[1];
				    	$lastNames=$row[2];
				    	$email=$row[3];
				    	$phoneNumber=$row[4];
				    	$address=$row[5];
				    	$townorcity=$row[6];
				    	$statustype=$row[7];
				    }
		  
				?>
		       <br><br><br>
		       <h1>EDIT BOARD</h1>
		         <div class="center">
					<form action="ejecutaractualizarboard.php" method="post">
							
							<input type="hidden" name="id" value= "<?php echo $id?>" readonly="readonly"><br>
                            Name<br>
							<input type="text" name="name" value= "<?php echo $name?>"><br>
							Last names<br> 
							<input type="text" name="lastNames" value="<?php echo $lastNames?>"><br>
							E-mail<br> 
							<input type="text" name="email" value="<?php echo $email?>"><br>
							Phone number<br> 
							<input type="text" name="phoneNumber" value="<?php echo $phoneNumber?>"><br>
						    <br>
			                Address<br>
							<input type="text" name="address" value= "<?php echo $address?>"><br>
							Town or city<br> 
							<input type="text" name="townorcity" value="<?php echo $townorcity?>"><br>
							
							Status type<br> 
							<input type="text" name="statustype" value="<?php echo $statustype?>"><br><br>

							<input class="btn btn-info" role="button" type="submit" value="Save">
							<a href="listboard.php" class="btn btn-info" role="button">Cancel</a>
						</form>
			     </div>
	       </div> 
	 <!--///////////////////////////////////////////////////Fin cuerpo interno///////////////////////////////--> 
	  </body>
</html> 


