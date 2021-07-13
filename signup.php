
<?php 
 

  $db = mysqli_connect('localhost', 'root', '', 'php_projects_db');
  
 if(isset($_POST['signup']))
	{
		
         $username = $_POST['username'];
         $gender = $_POST['gender'];
         $DOB = $_POST['DOB'];
         $usertype = $_POST['usertype'];
         //$filename = $_POST['filename'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         $filename = $_FILES['filename']['name'];
         $target_dir = "upload/";
         $target_file = $target_dir . basename($_FILES["filename"]["name"]);
         

          // Select file type
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

         // Valid file extensions
         $extensions_arr = array("jpg","jpeg","png","gif");

          // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            if(move_uploaded_file($_FILES['filename']['tmp_name'],$target_dir.$filename)){
            // Insert record
            $query = "INSERT INTO userloginsys (name,gender, DOB, usertype, filename, email, password) 
            VALUES('$username', '$gender','$DOB','$usertype', '$filename', '$email','$password')";
            $res = mysqli_query($db, $query);

                if ($res)
                {
                    echo '<script type="text/javascript" >window.location="index.php";alert("Your register successfully.");</script>';
                }else{
                echo '<script type="text/javascript" >window.location="signup.php";alert("Your register failed.");</script>';
                
                }
            }

        }



        //  $query = "INSERT INTO user01 (name,gender, DOB, usertype, filename, email, password) 
        //  VALUES('$username', '$gender','$DOB','$usertype', '$filename', '$email','$password')";
        //  $res = mysqli_query($db, $query);

		 

		// if ($res)
		// {
		// 	echo '<script type="text/javascript" >window.location="index.php";alert("Your register successfully.");</script>';
		// }else{
        //    echo '<script type="text/javascript" >window.location="signup.php";alert("Your register failed.");</script>';
         
        // }
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        

    </head>
    <body>
        <div class="container-fluid mainContainer" style="background-image: url('image/bg-01.jpg');"> 
           <div class="loginContainer">

                <form class="fromContainer"  method="POST" action="" enctype='multipart/form-data'>
                    <span class="fromTitle">Signup From</span>
                    
                    <div class="input-group">
                        <span class="inputBoxTitle">User Name</span>
                        <i class="fa fa-user icon"></i>
                        <input type="text" name="username"
                        class="inputBox"
                        placeholder="Enter your UserName"
                        id="singname"
                        required
                        >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    
                    
                    <!--<div class="custom-control custom-checkbox radioButtonGroup">
                        <div class="inputBoxTitle">Gender</div>
                        <input type="checkbox" class="custom-control-input" name="male" >
                        <label class="custom-control-label" for="customCheck" style="margin-right: 30px;">Male</label>
                        <input type="checkbox" class="custom-control-input" name="female">
                        <label class="custom-control-label" for="customCheck">Female</label>
                    </div>-->

                    <div class="custom-control custom-radio radioButtonGroup">
                        <div class="inputBoxTitle">Gender</div>
                        <i class="fa fa-male icon" aria-hidden="true"></i>
                        <input type="radio" class="custom-control-input" id="customRadio" name="gender" value="male">
                        <label class="custom-control-label" for="customRadio" style="margin-right: 30px;">Male</label>
                        <i class="fa fa-female icon" aria-hidden="true"></i>
                        <input type="radio" class="custom-control-input" id="customRadio1" name="gender" value="female">
                        <label class="custom-control-label" for="customRadio1">Female</label>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    
                    <div class="input-group">
                        <div class="inputBoxTitle" style="width: 100%;">Date Of Birth</div>
                        <i class="fa fa-calendar icon" aria-hidden="true"></i>
                        <input type="date" id="birthday" name="DOB" class="inputBox"  required> 
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="input-group">
                        <div class="inputBoxTitle" style="width: 100%;">User Type</div>
                        <i class="fa fa-users icon" aria-hidden="true"></i>
                        <select name="usertype" class="custom-select inputBox "  required>
                            <option selected>Select User Type</option>
                            <option value="Student">Student</option>
                            <option value="Student">Profistional</option>
                            <option value="Student">Employee</option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="custom-file input-group"> 
                        <span class="inputBoxTitle">Upload You Are Photo</span> 
                        <i class="fa fa-picture-o icon" aria-hidden="true"></i> 
                        <input type="file" class="inputBox" id="customFile" name="filename" 
                        style="padding: 5px;"  required> 
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    

                    <div class="input-group">
                        <span class="inputBoxTitle">Email</span>
                        <i class="fa fa-envelope icon"></i>
                        <input type="email" name="email"
                        class="inputBox"
                        placeholder="Enter your E-mail"
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
                        <input type="checkbox" class="custom-control-input" name="female">
                        <label class="custom-control-label" for="customCheck">I agree to our Terms & Privacy.</label>
                    </div>
                        
                    <div class="buttonContainer">
                        <button class="buttonProp" type="submit" name="signup">SIGNUP</button>
                    </div>
                    <div class="SignupText" >
                        <p>Alrady an User?   </p>
                        <p><a href="index.php">LOGIN </a></p>
                        
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