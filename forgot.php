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

            $db = mysqli_connect('localhost', 'root', '', 'php_projects_db');

            

            if(isset($_POST["email"]) && (!empty($_POST["email"]))){
                $email = $_POST["email"];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                if (!$email)
                {
                echo "<p>Invalid email address please type a valid email address!</p>";
                 }
                else
                {
                $sel_query = "SELECT * FROM `userloginsys` WHERE email='".$email."'";
                
                $results = mysqli_query($db,$sel_query);
                $row = mysqli_num_rows($results);
                if ($row=="")
                    {
                    echo "<p>No user is registered with this email address!</p>";
                    }

                    else{


                        $output='<p>Dear user,</p>';
                        $output.='<p>Please click on the following link to reset your password.</p>';
                        $output.='<p>-------------------------------------------------------------</p>';
                        $output.='<p>plse click this link to reset your password</p>';
                        $output.='<p><a herf = "http://google.com"> click </a> </p>';
                        $output.='<p>-------------------------------------------------------------</p>';
                        $output.='<p>Please be sure to copy the entire link into your browser.
                        The link will expire after 1 day for security reason.</p>';
                        $output.='<p>If you did not request this forgotten password email, no action 
                        is needed, your password will not be reset. However, you may want to log into 
                        your account and change your security password as someone may have guessed it.</p>';   
                        $output.='<p>Thanks,</p>';
                        
                        $body = $output; 
                        $subject = "Password Recovery";
                        
                        $email_to = $email;
                        $fromserver = "mdv.sanjay@gmail.com"; 

                        require("PHPMailer/PHPMailerAutoload.php");
                       // require("PHPMailer/class.smtp.php");
                       // require("PHPMailer/class.phpmailer.php");

                       
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->Host = "smtp.gmail.com"; // Enter your host here
                        //$mail->Host = "ssl://smtp.gmail.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = "mdv.sanjay@gmail.com"; // Enter your email here
                        $mail->Password = "mdv@task1"; //Enter your password here
                        $mail->Port = 465;
                       // $mail->SMTPDebug = 1;
                        $mail->SMTPSecure = 'ssl';
                        $mail->IsHTML(true);
                        $mail->From = "mdv.sanjay@gmail.com";
                        $mail->FromName = "Sanjay N";
                        $mail->Sender = $fromserver; // indicates ReturnPath header
                        $mail->Subject = $subject;
                        $mail->Body = $body;
                        $mail->AddAddress($email_to);
                        if(!$mail->Send()){
                        echo "Mailer Error: " . $mail->ErrorInfo;
                        }else{
                        echo '<script type="text/javascript" >window.location="forgot.php";alert("An email has been sent to you with instructions on how to reset your password.");</script>';
                        }

                    }
                }
                
               }
         ?>
        <div class="container-fluid mainContainer" style="background-image: url('image/bg-01.jpg');"> 
           <div class="loginContainer">

                <form class="fromContainer" method = "POST">
                    <span class="fromTitle">Forgot Password</span>
                    
                    <div class="input-group">
                        <span class="inputBoxTitle">Email</span>
                        <i class="fa fa-envelope icon"></i>
                        <input type="email" name="email"
                        class="inputBox"
                        placeholder="Enter your E-mail"
                        
                        >
                    </div>
                    
                    <div class="buttonContainer" style="margin-top: 20px;">
                        <button class="buttonProp" type="submit" name="forgot">SUBMIT</button>
                    </div>
                    

                </form>
           </div>
        </div>
        <!--===============================================================================================-->
	    <script src="css/bootstrap-5.0.0/dist/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
    </body>
</html>