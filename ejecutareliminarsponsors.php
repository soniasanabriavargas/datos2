<?php
	require("conexion.php");
	  $id = $_POST['id'];
	  mysqli_query($conn, "DELETE from sponsors where id='$id'")
	    or die("Error al eliminar los datos");
	      mysqli_close($conn);
	         echo '<script>alert("User Deleted")</script> ';
	          echo "<script>location.href='listsponsors.php'</script>";	
	          //header("Location: listsponsors.php" );
	           // die();
?>



