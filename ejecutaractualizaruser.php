<?php
extract($_POST);//extraer todos los valores del metodo post del formulario de actualizar
	require("conexion.php");
	
		$sentencia="UPDATE credentials set user='$user', password='$password', email='$email' where id='$id'";
	    $resent=mysqli_query($conn,$sentencia);
		if ($resent==null) {
			echo '<script>alert("Error de procesamiento, no se actulizaron los datos")</script>';
			header("location: listuser.php");
			echo "<script>location.href='listuser.php'</script>";
		}else {
			echo '<script>alert("Updated register")</script> ';
			echo "<script>location.href='listuser.php'</script>";	
		}
?>


