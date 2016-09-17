
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

				$sql="SELECT * FROM student WHERE id_student=$id";
			   
				$ressql=mysqli_query($conn,$sql);
				while ($row=mysqli_fetch_row ($ressql)){
				    	$id=$row[0];
				    	$name=$row[1];
				    	$lastNames=$row[2];
				    	$birthdate=$row[3];
				    	$email=$row[4];
				    	$phoneNumber=$row[5];
				    	$address=$row[6];
				    	$townorcity=$row[7];
				    	$gender=$row[8];
				    	$school=$row[9];
				    	$career=$row[10];
				    	$careerTime=$row[11];
				    	$statustype=$row[12];
				    	$scholarships=$row[13];
				    	$periodType=$row[14];
				    	$currentjob=$row[15];
				    	$civilstatusType=$row[16];
				    	$doyouhavechildrens=$row[17];
				    	$howmany=$row[18];
				    	$notes=$row[19];
				    	
				    }
				?>
		          <br><br><br>
		          <h1>EDIT STUDENT</h1>
		            <div class="center">
				       <form action="ejecutaractualizarstudent.php" method="post">
							<!--Id<br>-->
							<input type="hidden" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
							Name<br> 
							<input type="text" name="name" value="<?php echo $name?>"><br>
							Last names<br> 
							<input type="text" name="lastNames" value="<?php echo $lastNames?>"><br>
							Birthdate<br> 
							<input type="text" name="birthdate" value="<?php echo $birthdate?>"><br>
						   

							E-mail<br>
							<input type="text" name="email" value= "<?php echo $email?>"><br>
							phoneNumber<br> 
							<input type="text" name="phoneNumber" value="<?php echo $phoneNumber?>"><br>
							Address<br> 
							<input type="text" name="address" value="<?php echo $address?>"><br>
							Town or city<br> 
							<input type="text" name="townorcity" value="<?php echo $townorcity?>"><br>
						  

							Gender<br>
							<input type="text" name="gender" value= "<?php echo $gender ?>"><br>
							School<br> 
							<input type="text" name="school" value="<?php echo $school?>"><br>
							Career<br> 
							<input type="text" name="career" value="<?php echo $career?>"><br>
							Career time<br> 
							<input type="text" name="careerTime" value="<?php echo $careerTime?>"><br>
						   

							Status type<br>
							<input type="text" name="statustype" value= "<?php echo $statustype ?>"><br>
							Scholarships<br> 
							<input type="text" name="scholarships" value="<?php echo $scholarships?>"><br>
							Period type<br> 
							<input type="text" name="periodType" value="<?php echo $periodType?>"><br>
							currentjob<br> 
							<input type="text" name="currentjob" value="<?php echo $currentjob?>"><br>
						    

							Civil status type<br>
							<input type="text" name="civilstatusType" value= "<?php echo $civilstatusType ?>"><br>
							
							Do you have childrens<br> 
							<input type="text" name="doyouhavechildrens" value="<?php echo $doyouhavechildrens?>"><br>
							
							howmany<br> 
							<input type="text" name="howmany" value="<?php echo $howmany?>"><br>
						    <br>

						    Notes<br> 
							<input type="text" name="notes" value="<?php echo $notes?>"><br>
						    <br>

							<input class="btn btn-info" role="button" type="submit" value="Save">
							<a href="liststudent.php" class="btn btn-info" role="button">Cancel</a>
					  </form>
		       </div>
         </div> 
 <!--///////////////////////////////////////////////////Fin cuerpo interno///////////////////////////////--> 
    </body>
</html> 


