
<?php
session_start();
	require("conexion.php");

	$username=$_POST['email'];
	$password=$_POST['password'];

	$sql2=mysqli_query($conn,"SELECT * FROM credentials WHERE email='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($password==$f2['passwordAdmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			
            echo '<script>alert("WELCOME")</script> ';
			echo "<script>location.href='menu.php'</script>";
		

	   }
	}


	$sql=mysqli_query($conn,"SELECT * FROM credentials WHERE email='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($password==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			

			echo '<script>alert("WELCOME")</script> ';
			echo "<script>location.href='menu.php'</script>";

             }else{
			echo '<script>alert("INCORRECT PASSWORD")</script> ';

		
			echo "<script>location.href='index.php'</script>";
		   }
	     }else{
		
		echo '<script>alert("USER NOT EXIST")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}
?>

