<?php
extract($_POST);//extraer todos los valores del metodo post del formulario de actualizar
	require("conexion.php");
	
		$sentencia="UPDATE student set name='$name', lastNames='$lastNames', birthdate='$birthdate', email='$email', phoneNumber='$phoneNumber', address='$address', townorcity='$townorcity', gender='$gender', school='$school', career='$career', careerTime='$careerTime', statustype='$statustype', scholarships='$scholarships', periodType='$periodType', currentjob='$currentjob', civilstatusType='$civilstatusType', doyouhavechildrens='$doyouhavechildrens', howmany='$howmany', notes='$notes' where id_student='$id'";

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


