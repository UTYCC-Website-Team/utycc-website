<?php
session_start();
$salt = time('now');
$token = hash("sha256",$salt);
$_SESSION['token'] = $token;
if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_name']))
{
    header("location: post.php");
}
$connect = mysqli_connect("localhost", "root", "", "ycc");
$output = '';
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
     
    $roll = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    
     $table =preg_replace("/\s/u", '', $roll);
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
       
    }
    $destinction="";
    $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    echo "This is Name===>".$name."<br><br>";
   for ($i=3; $i <=12; $i++) { 
     $destinction.= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow($i, $row)->getValue());
      echo "This is destinction==>".$destinction."<br>";
   }
   

    $remark = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
    $remark = "bb";
    echo "<br>This is remark==>".$remark;
    echo "<br>".$name."<====This is Name<br>".$roll."This is e<br><hr>";
    $query = "INSERT INTO ".$table."(Roll_No, Name,Distinction,Remark) VALUES ('".$roll."', '".$name."','".$destinction."','".$remark."')";
    echo "<br>This is query=>".$query;
   $result = mysqli_query($connect, $query);
   var_dump($result);
    $output .= '<td>'.$roll.'</td>';
    $output .= '<td>'.$name.'</td>';
      $output .= '<td>'.$destinction.'</td>';
        $output .= '<td>'.$remark.'</td>';
          
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>Inport YCC Excel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Import Excel to Mysql using PHPExcel in PHP</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
    </form>
   <br />
   <br />
   <?php
   echo $output;
   ?>
  </div>
  <div>
    <form action="image_upload.php" class="container-fluid" enctype="multipart/form-data" method="post">
        <div class="row"  >
      <div class="form-group">
         <select class="form-control container" required=""  name="year">
            <option class="hidden"  selected disabled>Select Year</option>
                <option  value="1">1st</option>
                <option value= "2" >2nd</option>
                <option valuze="3">3rd</option>
                <option valuze="4">4th</option>
                <option valuze="5">5th</option>
                <option valuze="6">6th</option>
                     
          </select>
       </div>
       <div class="form-group">
         <select class="form-control container" required="" name="major">
            <option class="hidden"  selected disabled>Select Major</option>
                <option  value="ict"  >ICT</option>
                <option value="ist" >IS</option>
                 <option valuze="ce">CE</option>
                 <option  value="pre">PrE</option>
                 <option  value="ame">AME</option>
                   
          </select>
       </div>
     </div>  
      <input type="file" name="images[]" multiple="">
      <input type="submit" name="image_submit" value="Upload">
    </form>
  </div>
 </body>
</html>