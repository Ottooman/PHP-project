<?php  

include_once 'registration.php';
include_once 'User.php';


 if(isset($_POST['SignIn'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $obj = new Registration();
      $obj->Registration($username, $password);
     }

     if(isset($_POST['login'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          
          $obj = new User();
          $obj->Login($username, $password);
          $obj->Error();
         }


           
     
     

 

     
   
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      </head>  
      <body> 
      <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <input type="submit" name="login" value="login">
                            <input type="submit" name="SignIn" value="SignIn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
      </body>  
 </html>  