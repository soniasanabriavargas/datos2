<?php
extract($_POST);//extraer todos los valores del metodo post del formulario de actualizar
	require("conexion.php");
	
		$sentencia="UPDATE board set name='$name', lastNames='$lastNames', email='$email', phoneNumber='$phoneNumber', address='$address', townorcity='$townorcity', statustype='$statustype' where id='$id'";
		
	  

	    $resent=mysqli_query($conn,$sentencia);
		if ($resent==null) {
			echo '<script>alert("Error de procesamiento, no se actulizaron los datos")</script>';
			header("location: listboard.php");
			echo "<script>location.href='listboard.php'</script>";
		}else {
			echo '<script>alert("Updated register")</script> ';
			echo "<script>location.href='listboard.php'</script>";	
		}
?>
