


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

          <div class="container mainContainer">

            <div class="imgContainer">
                <img src="image/avatar.png" alt="Img" class="imgProp">
            </div>

            <!--  user Details -->

                <?php

                session_start();

                $pemail =  $_SESSION['email'] ;

                //echo $pemail ;

                $db = mysqli_connect('localhost', 'root', '', 'php_projects_db');

                // $query = "SELECT * FROM user01 ";
                //         $res = mysqli_query($db, $query);
                //         $result=mysql_fetch_array($res);
                //         echo $result;


                        // while($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
                        //     echo $row;
                        //  }

                //mysql_close($conn);

                $sql = "SELECT * FROM userloginsys 
                WHERE email ='$pemail'  ";
                $result = $db->query($sql);

               // $query = "SELECT email, password FROM user01 
                //WHERE email ='$email' AND password ='$password' ";

                if ($result->num_rows > 0) {
                // output data of each row
                while(
                    $row = $result->fetch_assoc()
                    ) {
                    echo "//////email: " . $row["email"];
                    echo "//////name: " . $row["name"];
                    echo "//////gender: " . $row["gender"];
                    echo "//////DOB: " . $row["DOB"];
                   

                    
                    //  echo "<div class="userContainer">
                    //  <div class="userText">
                    //      <label>USER NAME :</label>
                    //      <span> " .$row["username"] . "</span>
                    //     </div>
                    //  </div>"
                    
                }
                //} else {
               // echo "0 results";
                }

               

                ?>

                <!-- 
                    <?php  if (isset($_SESSION['email'])) : ?>
                        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                       
                <?php endif ?>
             -->

                <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>GFG UserHandle</th>
                <th>Practice Problems</th>
                <th>Coding Score</th>
                <th>GFG Articles</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 

                $sql = "SELECT * FROM user01 
                WHERE email ='$pemail'  ";
                $result = $db->query($sql);


                while($row=$result->fetch_assoc())
                {
                    
                
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $row['email'];?></td>
                <td> name </td>
                <td>name 1</td>
                <td> name2</td>
            </tr>
            <?php
                }
             ?>
        </table>



            <div class="userContainer">
                
            <?php   // LOOP TILL END OF DATA 

                $sql = "SELECT * FROM user01 
                WHERE email ='$pemail'  ";
                $result = $db->query($sql);


                while($row=$result->fetch_assoc())
                {
                    

            ?>

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
                
            <?php
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