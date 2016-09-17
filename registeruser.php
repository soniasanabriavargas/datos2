<?php
//registrouser no lleva validcion de direcionamiento
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password= $_POST['password'];
    $rpassword=$_POST['rpassword'];
     
    require("conexion.php");

    $checkemail=mysqli_query($conn,"SELECT * FROM credentials WHERE email='$email'");
    $check_mail=mysqli_num_rows($checkemail);
        if($password==$rpassword){
            if($check_mail>0){

            echo ' <script language="javascript">alert("Attention, there is already designated for a user mail , check your data");</script> ';
            }else{
                
                mysqli_query($conn,"INSERT INTO `uva`.`credentials` (`id`, `user`,`email`, `password`, `passwordAdmin`)VALUES(NULL,'$name','$email', '$password','')");

            
                //echo 'Se ha registrado con exito';
                echo ' <script language="javascript">alert("User successfully registered");</script> ';
                echo "<script>location.href='listuser.php'</script>";  
            }
            
        }else{
            echo ' <script language="javascript">alert("Wrong passwords");</script> ';
            echo "<script>location.href='formuser.php'</script>";    
                
        }
    
?>

