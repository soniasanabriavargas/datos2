<?php
session_start();
  if (@!$_SESSION['user']) {/*arroba oculta mensaje de error, que posiblemente pudiera salir al autentificarse*/
	header("Location:index.php");
}
?>	
<!DOCTYPE html>	
<html>
	  <head lang="en">
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
					extract($_POST);
					require("conexion.php");

			        $id=$_POST['id'];
				    $sql=("SELECT qualification.id, qualification.grade, qualification.qualification FROM qualification  WHERE qualification.id = '$id'");
				
					$ressql=mysqli_query($conn,$sql);
					while ($row=mysqli_fetch_row ($ressql)){
					        $id=$row[0];
					        $grade=$row[1];
					    	$qualification=$row[2];
					    	
					    }
					?>

		         <br><br><br>
		         <h1>EDIT QUALIFICATION</h1>
		            <div class="center">
					    <form action="runupdatequalification.php" method="post">			 
							Grade<br> 
							<input type='text' name='grade' value='<?php echo $grade;?>'><br>

							Qualification<br> 
							<input type='text' name='qualification' value='<?php echo $qualification;?>'><br>

							
			                 <input type='hidden' name='id' value='<?php echo $id; ?>'>
					
						    <br>
							<input class="btn btn-info" role="button" type="submit" value="Save">
							<a href="liststudent.php" class="btn btn-info" role="button">Cancel</a>
						 </form>
				 </div>
	       </div> 
	 <!--///////////////////////////////////////////////////Fin cuerpo interno///////////////////////////////--> 
	  </body>
</html> 


