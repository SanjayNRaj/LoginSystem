
<?php 
 
 session_start();

 $db = mysqli_connect('localhost', 'root', '', 'php_projects_db');
 
if(isset($_POST['login']))
   {
       
        // $username = $_POST['username'];
        // $gender = $_POST['gender'];
        // $DOB = $_POST['DOB'];
        // $usertype = $_POST['usertype'];
        // $filename = $_POST['filename'];
          $email = $_POST['email'];
          $password = $_POST['password'];

        //  $query = "INSERT INTO user01 ( email, password) 
        //  VALUES('$email','$password')";
        //  $res = mysqli_query($db, $query);

        $query = "SELECT email, password FROM userloginsys 
        WHERE email ='$email' AND password ='$password' ";
        $res = mysqli_query($db, $query);

        //echo '<script type="text/javascript"> window.location="console.log";$res';
        
       if (mysqli_num_rows ($res) == 1) 
       {
        
       
        //$_SESSION['success'] = "You are now logged in";
        //header('location: home.php');  
        //echo '<script type="text/javascript" >window.location="home.php";alert("Your register successfully." );</script>';
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: home.php');  
        }else{
           echo '<script type="text/javascript" >window.location="signup.php";alert("Your register failed.");</script>';
        
       }
   }
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login System</title>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--========================================= bootstrap css =======================================-->
	    <link rel="stylesheet" type="text/css" href="css/bootstrap-5.0.0/dist/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <!--========================================= bootstrap css =======================================-->
	    <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        

    </head>
    <body>
        <div class="container-fluid mainContainer" style="background-image: url('image/bg-01.jpg');"> 
           <div class="loginContainer">

                <form class="fromContainer" method ='POST'>
                    <span class="fromTitle">Login From</span>
                    <div class="input-group">
                        <span class="inputBoxTitle">Email</span>
                        <i class="fa fa-envelope icon"></i>
                        <input type="text" name="email"
                        class="inputBox"
                        placeholder="Enter your email"
                        required
                        >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="input-group">
                        <span class="inputBoxTitle">Password</span>
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="password"
                        class="inputBox"
                        placeholder="Enter your password"
                        required
                        >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="textRow">
                        <input type="checkbox" class="custom-control-input" name="female"  required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <label class="custom-control-label" for="customCheck">Remember me.</label>
                        <span class="forgotText"><a href="forgot.php">Forgot Password?</a></span>
                    </div>
                    <div class="buttonContainer">
                        <button class="buttonProp" type="submit" name="login">LOGIN</button>
                    </div>
                    <div class="SignupText" >
                        <p>Are you New User? Signup using  </p>
                        <p><a href="signup.php">SIGNUP </a></p>
                        <p>OR</p>
                    </div>

                </form>
           </div>
        </div>
        <!--===============================================================================================-->
	    <script src="css/bootstrap-5.0.0/dist/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script>
            // Disable form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
        </script>
    </body>
</html>