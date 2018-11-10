<?php
include("db_config.php");
 if(isset($_POST['login'])){
    echo "here";
     $roll = addslashes(strip_tags($_POST['roll']));
     $roll=preg_replace('/\s/u', '', $roll);
       
     
     
     $password=addslashes(strip_tags($_POST['password']));
     
     echo $password;
     $query = "SELECT Password  
		 		  FROM users 
		 		  WHERE Roll_No = :rol";
     $prepare = $conn -> prepare($query);
     $prepare -> execute(array(":rol"=>"$roll"));
     $check = $prepare -> fetch();
     $rowCount = $prepare -> rowCount();
     if($rowCount == 1) {
         $sql = "SELECT id FROM table WHERE Password = :pass";
         $pre = $conn -> prepare($sql);
         $pre -> execute(array(":pass"=>"$password"));
         $row = $pre -> fetch();
         $count = $pre -> rowCount();
         if($count == 1)
         {		
            echo "You are user";
         }
         else{
             header("location: login.php");
         }
     
    
 }
    else{
        header("location: login.php");  
    }
 }
?>