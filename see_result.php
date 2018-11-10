<?php
include ('newConfig.php');
session_start();
$roll =$_SESSION['user_roll_no'];

$table= $roll;
$table =preg_replace("/\s/u", '', $table);
$table =preg_replace("/-/", '', $table);

$table = strtolower($table);
$mroll = $table;
if(substr($mroll, 1,2)=='ce')
{
    $table=  substr($table, 0,3);

}
else
{
    $table=  substr($table, 0,4);
    echo "<br>User Roll is==> ".$table;

}

$query = "SELECT * FROM ".$table." WHERE Roll_No = '$roll'";


$result = mysqli_query($con,$query);

if(mysqli_num_rows($result)==1)  //user Pass the exam
{

    echo "Congratulations!<br>";
    while ($row=$result->fetch_assoc())
    {
        $_SESSION['user_current_roll_no'] = $row["ID"];
        $_SESSION['user_name'] = $row["Name"] ;
        $_SESSION['user_distinction'] = $row["Distinction"];
        $_SESSION['user_remark'] = $row["Remark"] ;
        header("Location:show_success_result.php");


    }
}
else   //user name and password are correct but user fail the exam
{
    //header("Location:show_fail_result.php");
    $image_path="resultImages/";


    echo "We Can't find your name in result table<br>";
    echo "See your result table<br>";
    $query = "SELECT image_names  FROM result_images WHERE image_year_major='$year_major'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);

        $test= $row['image_names'];

        echo "<img src='$image_path$test' .'height='300' width='300'/>";


    }
}
