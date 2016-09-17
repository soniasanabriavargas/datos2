 <?php

     $name= $_POST ['name'];
     $lastNames= $_POST ['lastNames'];
     $birthdate= $_POST ['birthdate'];
     $email= $_POST ['email'];
     $phoneNumber= $_POST ['phoneNumber'];
     $address= $_POST ['address'];
     $townorcity= $_POST ['townorcity'];
     $gender= $_POST ['gender'];
     $school= $_POST ['school'];
     $career= $_POST ['career'];
     $careerTime= $_POST ['careerTime'];
     $statustype= $_POST ['statustype'];
     $scholarships= $_POST ['scholarships'];
     $periodType= $_POST ['periodType'];
     $currentjob= $_POST ['currentjob'];
     $civilstatusType= $_POST ['civilstatusType'];
     $doyouhavechildrens= $_POST ['doyouhavechildrens'];
     $howmany= $_POST ['howmany'];
     $notes= $_POST ['notes'];
     
     require("conexion.php");
        mysqli_select_db($conn, "uva");
       $tildes =$conn->query("SET NAMES 'utf8'");
        //mysqli_query($conn,"INSERT INTO student VALUES('','$name', '$lastNames', '$birthdate', '$email', '$phoneNumber', '$address', '$townorcity', '$gender', '$school', '$career', 
        //'$careerTime', '$statustype', '$scholarships', '$periodType', '$currentjob', '$civilstatusType', '$doyouhavechildrens', '$howmany', '$notes')");
        //$query = mysqli_query($conn,"INSERT INTO `uva`.`sponsors` (`id`, `name`, `lastNames`, `email`, `phoneNumber`, `address`, `townorcity`, `statustype`) VALUES (NULL,'$name', '$lastNames', '$email', '$phoneNumber', '$address', '$townorcity', '$statustype')");
        $query=mysqli_query($conn,"INSERT INTO `uva`.`student`(`id_student`, `name`, `lastNames`, `birthdate`, `email`, `phoneNumber`, `address`, `townorcity`, `gender`, `school`, `career`, `careerTime`, `statustype`, `scholarships`, `periodType`, `currentjob`, `civilstatusType`, `doyouhavechildrens`, `howmany`, `notes`) 
          VALUES(NULL,'$name', '$lastNames', '$birthdate', '$email', '$phoneNumber', '$address', '$townorcity', '$gender', '$school', '$career', 
          '$careerTime', '$statustype', '$scholarships', '$periodType', '$currentjob', '$civilstatusType', '$doyouhavechildrens', '$howmany', '$notes')");
        
        if (!$query) {
            die("Invalid query: " . mysql_error());
                }
                else{ 
         

             echo ' <script language="javascript">alert("User successfully registered");</script> ';
             //echo `Se ha registrado con exito`;
             echo "<script>location.href='liststudent.php'</script>";   
               echo "Success"; } 
               mysqli_close($conn);
          //header("Location: listboard.php" );
         //die();
            
?>  



