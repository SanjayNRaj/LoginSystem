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
        <?php
            session_start();
            $pemail =  $_SESSION['email'] ;
            $db = mysqli_connect('localhost', 'root', '', 'php_projects_db');

            if(isset($_POST['reset']))
            {
                
                // $username = $_POST['username'];
                // $gender = $_POST['gender'];
                // $DOB = $_POST['DOB'];
                // $usertype = $_POST['usertype'];
                // $filename = $_POST['filename'];
                // $email = $_POST['email'];
                $password = $_POST['password'];

                $query = "UPDATE userloginsys 
                SET  password ='$password'
                WHERE  WHERE email ='$pemail' "

                // $query = "INSERT INTO user01 (name,gender, DOB, usertype, filename, email, password) 
                // VALUES('$username', '$gender','$DOB','$usertype', '$filename', '$email','$password')";
                $res = mysqli_query($db, $query);

                

                if ($res)
                {
                echo '<script type="text/javascript" >window.location="index.php";alert("Your register successfully.");</script>';
                }else{
                //echo '<script type="text/javascript" >window.location="signup.php";alert("Your register failed.");</script>';
                echo 'set done'
                }
            }
        ?>

        <div class="container-fluid mainContainer" style="background-image: url('image/bg-01.jpg');"> 
           <div class="loginContainer">

                <form class="fromContainer">
                    <span class="fromTitle">Reset Password</span>
                    
                    <div class="input-group">
                        <span class="inputBoxTitle">New Password</span>
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="password"
                        class="inputBox"
                        placeholder="Enter your New password"
                        >
                    </div>
                    
                    <div class="buttonContainer" style="margin-top: 20px;">
                        <button class="buttonProp" type="submit" name="reset">RE-SET</button>
                    </div>
                    

                </form>
           </div>
        </div>
        <!--===============================================================================================-->
	    <script src="css/bootstrap-5.0.0/dist/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
    </body>
</html>