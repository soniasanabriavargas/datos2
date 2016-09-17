<?php
session_start();
  if (@!$_SESSION['user']) {
    header("Location:index.php");
  }
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
    	 <title>UVA</title>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <link href="css/style.css"  rel="stylesheet" type="text/css"/>
    </head>
    <body background="img/fondo.jpg">
         <header>
           <ul class="nav pull-right">
           Welcome <strong><?php echo $_SESSION['user'];?></strong><!--Mostreo de usuario-->
           </ul>
         </header>
         <div class="container">
    	     <h1>REGISTER STUDENT</h1>

             <div class="center">
                 <form action="registerstudent.php" method="post" name="form">
          
                      <label>Name*</label><br>
                      <input title="You need to add the name" type="text" name="name" required placeholder="Name"><br>

                      <label>Last names*</label><br>
                      <input title="You need to add the lastnames" type="text" name="lastNames" required placeholder="Last names"><br>

                      <label>Birthday*</label><br>
                      <input title="You need to add the birthday" type="date" name="birthdate"  placeholder="Birthday"><br>
                        
                      <label>E-mail*</label><br>
                      <input title="You need to add the email" type="email" name="email"  placeholder="E-mail"><br>

                      <label>Phone number*</label><br>
                      <input title="You need to add the phone number" type="text" name="phoneNumber"  placeholder="Phone number"><br>

                      <label>Adress*</label><br>
                      <input title="You need to add the address" type="text" name="address" required placeholder="Address"><br>

                      <label>Town or city*</label><br>
                      <input title="You need to add the town or city" type="text" name="townorcity" required required placeholder="Town or city"><br><br>

                      <label>Gender*</label><br>
                        <input title="You need to add the gender" type="radio" name="gender" value="male" checked required> Male
                        <input title="You need to add the gender" type="radio" name="gender" value="female" required> Female
                        <input title="You need to add the gender" type="radio" name="gender" value="other" required> Other<br><br>

                      <label>School*</label><br>
                      <input title="You need to add the school" type="text" name="school" required required placeholder="School"><br> 

                      <label>Career*</label><br>
                      <input title="You need to add the career" type="text" name="career" required placeholder="Career"><br> 

                      <label>Career Time*</label><br>
                      <input title="You need to add the career time" type="text" name="careerTime" required placeholder="Career Time"><br><br><!--checar tipo de dato en la base de datos-->

                      <label>Status type*</label><br>
                       <select title="You need to add the status type" name="statustype" required>
                          <option value="graduated with degree">Graduated with degree</option>
                          <option value="only graduated">Only graduated</option>
                          <option value="truncate carrer">Truncate carrer</option>
                          <option value="university student">University student</option>
                          <option value="collegue student">Collegue student</option>
                          <option value="Students with incomplete qualification">Students with incomplete qualification</option>
                       </select><br><br> 

                      <label>Becado*</label><br> 
                      <!-- <input type="radio" name="gender" value="female"> YES
                      <input type="radio" name="gender" value="other"> NO<br><br>-->
                      <input title="You need to add the field" type="text" name="scholarships" required><br><br><!--checar palabra becado-->

                      <label>Period Type*</label><br>
                        <select title="You need to add the period type" name="periodType" required>
                            <option value="Quarter">Quarter</option>
                            <option value="Semester">Semester</option>
                            <option value="Other">Other</option>
                        </select><br><br> 

                       <label>Current job*</label><br>
                       <input title="You need to add the Current job" type="text" name="currentjob" required placeholder="Current job"><br><br>

                        <label>Civil Status type*</label><br>
                        <select title="You need to add the civil status type" name="civilstatusType" required>
                            <option value="married">Married</option>
                            <option value="Single">Single</option>
                            <option value="divorced">divorced</option>
                            <option value="widower">widower</option>
                            <option value="unknown">unknown</option>
                        </select><br><br> 

                        <label>Do you have childrens*</label><br>
                        <input title="You need to add the field" type="text" name="doyouhavechildrens" required placeholder="Do you have childrens"><br> 

                        <label>How many*</label><br> 
                        <input title="You need to add the field" type="text" name="howmany"  placeholder="How many"><br> 

                        <label>Notes</label><br> 
                        <textarea rows="4" cols="50" type="text" name="notes"></textarea>
                        <br><br>
                        <input class="btn btn-info" role="button" type="submit" value="Save">
                        <a href="liststudent.php" class="btn btn-info" role="button">Cancel</a>
                   </form>
              </div>
         </div>
     </body>
</html>