<?php
require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
	 <!-- <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>
 <div id="wrapper">
  <center><h2>Login Form</h2></center>
    <center><img src="avatar.png" class="avator"></center>
  <form class="myform" action="loginpage.php" method="post">
    <label><strong>Username</strong></label><br>
    <input type="text" class="inputvalues" name="usname" placeholder="Type name"/ required><br>
    <label><strong>Password</strong></label><br>
    <input type="password" class="inputvalues" name="psw" placeholder="Type password" required/><br>
    <input name="login" type="submit" id="login_btn" value="Login"/><br>
    <a href="regpage.php"><input type="button" id="register_btn" value="Register"/></a><br>
 </form>
  <?php
     if(isset($_POST['login']))
       { $username=$_POST['usname'];
         $password=$_POST['psw'];
         $query="select * from user WHERE username='$username' AND password='$password'";
         $query_run=mysqli_query($con,$query);
         if(mysqli_num_rows($query_run)>0)
          {  $_SESSION['username']=$username;
               header('location:start.php');
          }
         else {
              echo '<script type="text/javascript">alert("Invalid credentials")</script>';

         }
       }
   ?>
</div>
</body>
</html>
