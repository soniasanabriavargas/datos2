<?php
	$grade= $_POST ['grade'];
	$qualification= $_POST['qualification'];
	$studId = $_POST['id'];

	require("conexion.php");
	   mysqli_select_db($conn, "uva");
       $tildes =$conn->query("SET NAMES 'utf8'");
	   //mysqli_query($conn, "INSERT into qualification values('', '$grade', '$qualification', '$studId')");
	    $query=mysqli_query($conn,"INSERT INTO `uva`.`qualification`(`id`, `grade`, `qualification`, `id_student`) VALUES (NULL, '$grade', '$qualification', '$studId')");
            if (!$query) {
               die("Invalid query: " . mysql_error());
                }
                  else{

	     
	    echo ' <script language="javascript">alert("Qualification add");</script> ';
	     //echo `Se ha registrado con exito`;
	    echo "<script>location.href='liststudent.php'</script>";
	     echo "Success"; } 
	      mysqli_close($conn);
	//header("Location: liststudent.php" );
	  // die();
?>









