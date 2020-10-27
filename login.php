<html>
   
   <head>
      <title>Login Page</title>      
      <link rel="stylesheet" type="text/css" href="login.css">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">      
   </head>   
     
   <div class="login_box">
   <form action = "reg.php" method = "post">
       <div class="form_title"><b>Login</b></div>      
      
         <div class="form_item"> 
       
            <label class="form_label">Username</label>
            <input type = "text" name = "userName" class="form_input" placeholder="Input your username">

            <label class="form_label">Password</label>
            <input type = "password" name = "password" class="form_input">
            <span><?php echo $error; ?></span>

            <p><a href="login2.php">Admin Login</a></p>
            
            <button class="B1" type="submit" value=" Submit ">Login</button>
         </div>
            <p>Don't have an account yet? <a href="../Homepage/Register.html">Sign up now</a>.</p>

   </form>   
   </div>         
              
   </body>
</html>

