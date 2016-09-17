<?php
	require("conexion.php");
	  $id = $_POST['id'];
	  mysqli_query($conn, "DELETE from student where id_student='$id'")
	    or die("Error al eliminar los datos");
	      mysqli_close($conn);
	       echo '<script>alert("User Deleted")</script> ';
            echo "<script>location.href='liststudent.php'</script>";
	       // header("Location: liststudent.php" );
	         //die();

?>



