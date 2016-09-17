<?php
//extract($_POST);//extraer todos los valores del metodo post del formulario de actualizar
	require("conexion.php");
	$id=$_POST['id'];
	$grade=$_POST['grade'];
	$qualification=$_POST['qualification'];

	$sentencia="UPDATE qualification set grade='$grade', qualification='$qualification' where id='$id'";
	
  

    $resent=mysqli_query($conn,$sentencia);
	if ($resent==null) {
		echo '<script>alert("Error de procesamiento, no se actulizaron los datos")</script>';
		header("location: liststudent.php");
		echo "<script>location.href='liststudent.php'</script>";
	}else {
		echo '<script>alert("Updated register")</script> ';
		echo "<script>location.href='liststudent.php'</script>";	
	}
?>

