<?php
     
     $name= $_POST ['name'];
     $lastNames= $_POST ['lastNames'];
     $email= $_POST ['email'];
     $phoneNumber= $_POST ['phoneNumber'];
     $address= $_POST ['address'];
     $townorcity= $_POST ['townorcity'];
     $statustype= $_POST ['statustype'];
     
    require("conexion.php");
    mysqli_select_db($conn, "uva");
    $tildes =$conn->query("SET NAMES 'utf8'");
    //mysqli_query($conn,"INSERT INTO sponsors VALUES(``,`$name`, `$lastNames`, `$email`, `$phoneNumber`, `$address`, `$townorcity`, `$statustype`)");
     //mysqli_query($conn,"INSERT INTO `uva`.`sponsors`(`id`, `name`, `lastNames`, `email`, `phoneNumber`, `address`, `townorcity`, `statustype`) VALUES (``,`$name`, `$lastNames`, `$email`, `$phoneNumber`, `$address`, `$townorcity`, `$statustype`)");
     //mysqli_query($conn," INSERT INTO `uva`.`sponsors` (`id`, `name`, `lastNames`, `email`, `phoneNumber`, `address`, `townorcity`, `statustype`) VALUES (``,`$name`, `$lastNames`, `$email`, `$phoneNumber`, `$address`, `$townorcity`, `$statustype`)");
     
     //mysqli_query($conn,"INSERT INTO `uva`.`sponsors` (id, name, lastNames, email, phoneNumber, address, townorcity, statustype) VALUES (``,`$name`, `$lastNames`, `$email`, `$phoneNumber`, `$address`, `$townorcity`, `$statustype`)");

//$query = mysqli_query($conn,"INSERT INTO `uva`.`sponsors` (`id`, `name`, `lastNames`, `email`, `phoneNumber`, `address`, `townorcity`, `statustype`) VALUES (``,`".$name."`, `".$lastNames."`, `".$email."`, `".$phoneNumber."`, `".$address."`, `".$townorcity."`, `".$statustype."`)");
$query = mysqli_query($conn,"INSERT INTO `uva`.`sponsors` (`id`, `name`, `lastNames`, `email`, `phoneNumber`, `address`, `townorcity`, `statustype`) VALUES (NULL,'$name', '$lastNames', '$email', '$phoneNumber', '$address', '$townorcity', '$statustype')");
if (!$query) {
    die("Invalid query: " . mysql_error());
}
else{ 
      
        echo ' <script language="javascript">alert("User successfully registered");</script> ';
        //echo `Se ha registrado con exito`;
        
        echo "<script>location.href='listsponsors.php'</script>"; 
echo "Success"; }
      mysqli_close($conn);
        //header("Location: listsponsors.php" );
       //die();
?>   







