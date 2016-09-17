<?php
	require("conexion.php");
	  $id = $_POST['id'];
	  mysqli_query($conn, "DELETE from credentials where id='$id'")
	    or die("Error al eliminar los datos");
	      mysqli_close($conn);
	        echo '<script>alert("User Deleted")</script> ';
            echo "<script>location.href='listuser.php'</script>";	
            //header("Location: listuser.php" );
	         //die();
?>
 
 

