<?php 
             if(isset($_POST['login']))
             {
             include 'newConfig.php';
             echo "you";
             $roll = addslashes(strip_tags($_POST['roll']));
             $password=addslashes(strip_tags($_POST['password']));
             //$password = hash("sha512", $password);
               echo "This is roll==>".$roll;
               echo "<br>This is roll==>".$password;


             $query = "SELECT *  FROM users WHERE Roll_No= '$roll' AND Password= '$password'";
             echo "<br>Thsi is query==>".$query;
             $result = mysqli_query($con,$query);
             if(mysqli_num_rows($result)==1)  //if the user name and password are correct
             {
                 session_start();
                    $_SESSION['user_roll_no'] = $roll;
                    header("Location:see_result.php");

             }
             else
             {
                 echo "User Name or Password is Incorrect";

             }
       	             
              
             
          }


 ?>