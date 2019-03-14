<?php  

include_once 'User.php';

 if(isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $obj = new User();
      $obj->Login($username, $password);
 }

     
   
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
            
      </head>  
      <body> 
                <h3 align="">PHP Login </h3><br />  
                <form method="post" action="login.php">  
                     Username: <input type="text" name="username">
                     Password: <input type="password" name="password">
                     <input type="submit" name="login" value="Log In">
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  