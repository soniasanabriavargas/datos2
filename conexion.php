<?php
	// Create connection
	 
    $conn = mysqli_connect("localhost", "root", "","uva");
    //$conn = mysqli_connect("localhost", "SoniaSV", "Sonia.SV","uva");
   
	// Check connection
	if (!$conn) {
	  die('error de conexion:('.mysqli_connect_errno().')'.mysqli_error());
	}
	    //echo "Connected successfully";

?>