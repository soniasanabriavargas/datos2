<?php
session_start();
  if (@!$_SESSION['user']) {
    header("Location:index.php");
  }
?> 
<!DOCTYPE html>
<hml lang="en">
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
              <h1>REGISTER BOARD</h1>
                  <div class="center">
                     <form action="registerboard.php" method="post" name="form">
                    		<label>Name*</label><br>
                    		<input title="You need to add the name" type="text" name="name" required placeholder="Name"><br>

                    		<label>Last names*</label><br>
                    		<input title="You need to add the lastnames" type="text" name="lastNames" required placeholder="Last names"><br>

                    		<label>E-mail*</label><br>
                    		<input title="You need to add the email" type="email" name="email" required placeholder="Email"><br>

                    		<label>Phone number*</label><br>
                    		<input title="You need to add the phone number" type="text" name="phoneNumber" required placeholder="Phone number"><br>

                    		<label>Address*</label><br>
                    		<input title="You need to add the address" type="text" type="text" name="address" required placeholder="Address"><br>

                    		<label>Town or city*</label><br>
                    		<input title="You need to add the town or city" type="text" name="townorcity" required placeholder="Town or city"><br>

                            
                        <label>Status type*</label><br>
                            <select title="You need to add the status type" name="statustype" required placeholder="Status type">
                    		    <option value="President">President</option>
                    		    <option value="Secretary">Secretary</option>
                    		    <option value="Treasurer">Treasurer</option>
                    		    <option value="Member">Member</option>
                    		    <option value="Consejero">Consejero</option>
                            </select>
                    		  <br><br>
                    		
                    	    <input class="btn btn-info" role="button" type="submit" value="Save">
                    		  <a href="listboard.php" class="btn btn-info" role="button">Cancel</a>
              	    </form>
               </div>
          </div> 
     </body>
</html>