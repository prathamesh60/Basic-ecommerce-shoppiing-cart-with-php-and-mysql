<?php
   require 'dbconfig/config.php';
   ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration page</title>
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
  <center><h2>Registration Form</h2></center>
  <center><img src="avatar.png" class="avator"></center>
  <form class="myform" name="myForm" onsubmit="return validatePassword()" action="regpage.php"  method="post">
    <label><strong>Username</strong></label><br>
    <input type="text" class="inputvalues" name="usname" placeholder="Type name" required/><br>
    <label><strong>Password</strong></label><br>
    <input type="password" class="inputvalues" name="psw" placeholder="Type password" required/><br>
    <label><strong>Confirm Password</strong></label><br>
    <input type="password" class="inputvalues" name="cpsw" placeholder="confirm password" required/><br>
    <input name="submit_btn" type="submit" id="signup_btn" value="Register"/><br>
  <a href="loginpage.php"><input type="button" id="back_btn" value="Back to login"/></a><br>

  </form>
</div>
<script>
function validatePassword()
        {
            var ans=true;
            var c = document.forms["myForm"]["psw"].value;
            var w = String(c);
            var len = w.length;
            var count_A = 0;
            var count_a = 0;
            var count_n = 0;
            var count_sc = 0;
            if( len == 0 )
            {
    	        alert("Password must be filled");
              return false;
            }
            else if( len < 8 )
            {
    	        alert("Password length must be atleast 8");
                return false;
            }
            else
            {
    	        for(var k=0;k<len;k++)
                {
        	         if(w[k]>='A' && w[k]<='Z')
                    {
            	       count_A ++;
                    }
                   else if(w[k]>='a' && w[k]<='z')
                    {
            	       count_a ++;
                    }
                    else if(w[k]>='0' && w[k]<='9')
                    {
                        count_n ++;
                    }
                    else if( (w[k]>=' ' && w[k]<='/') || ( w[k]>=':' && w[k]<='@' ) || ( w[k]>='[' && w[k]<='`' ) || ( w[k]>='{' && w[k]<='~' ) )
                    {
            	       count_sc ++;
                    }
                }
                if( (count_a==0) || (count_A==0) || (count_n==0) || (count_sc==0) )
                {
                  alert("Password must contain atleast one of each uppercase alphabet, lowercase alphabet , digit and special character");
                    return false;

                }
            }
	       return ans;
        }
      </script>
<?php
    if(isset($_POST['submit_btn']))
       { //echo '<script type="text/javascript">alert("Submit button clicked")</script> ';
         $username=$_POST['usname'];
         $password=$_POST['psw'];
         $cpassword=$_POST['cpsw'];
         if($password==$cpassword)
           { $query="select * from user WHERE username='$username'";
             $query_run=mysqli_query($con,$query);
             if(mysqli_num_rows($query_run)>0)
              {echo '<script type="text/javascript">alert("USER Already exists..try another name") </script>';
              }
             else { $query="insert into user values('$username','$password')";
                    $query_run=mysqli_query($con,$query);
                    if($query_run)
                      { echo '<script type="text/javascript">alert("SUCCESSFULLY REGISTERED")</script>';
                      }
                    else {echo '<script type="text/javascript"> alert("ERROR()")</script>';

                    }
                }

           }
          else {echo '<script type="text/javascript"> alert("password dont match")</script>';
            // code...
          }
       }
 ?>
</body>
</html>
