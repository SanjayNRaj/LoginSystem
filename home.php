


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
            
           
           <div class="container">
                <div class="welcomeContainer">
                    <span>Wel Come</span>
                    
                </div>
           </div>

           <?php
                session_start();
                $pemail =  $_SESSION['email'] ;
                $db = mysqli_connect('localhost', 'root', '', 'php_projects_db');
           ?>

          <div class="container mainContainer">

          
          <?php   // start  php code for fatching the code 

            $sql = "SELECT * FROM userloginsys 
            WHERE email ='$pemail'  ";
            $result = $db->query($sql);


            if($row=$result->fetch_assoc())
            {
                
                $image = $row['filename'];
                $image_src = "upload/".$image;

           ?>

            <div class="imgContainer">
                <img src='<?php echo $image_src;  ?>' alt="Img" class="imgProp">
            </div>

            <!--  user Details -->

            <div class="userContainer">
                
                <div class="userText">
                    <label>USER NAME :</label>
                    <span><?php echo $row['name'];?></span>
                </div>
                <div class="userText">
                    <label>GENDER :</label>
                    <span><?php echo $row['gender'];?></span>
                </div>
                <div class="userText">
                    <label>DATE OF BIRTH :</label>
                    <span><?php echo $row['DOB'];?></span>
                </div>
                <div class="userText">
                    <label>USER TYPE :</label>
                    <span><?php echo $row['usertype'];?></span>
                </div>
                <div class="userText">
                    <label>E-mail ID :</label>
                    <span><?php echo $row['email'];?></span>
                </div> 
                
            <?php // end php code 
                }
             ?>
            </div>
          </div>

           
           

        </div>
        <!--===============================================================================================-->
	    <script src="css/bootstrap-5.0.0/dist/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
    </body>
</html>