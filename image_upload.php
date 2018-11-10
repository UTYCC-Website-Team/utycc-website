<?php 
 include 'newConfig.php';
	if(isset($_POST['image_submit']))
	{
		    $year=$_POST['year'];
		    $major1=$_POST['major'];
		 	$year_major = $year."".$major1;
		 	echo $year_major."<br>";
			$targetfolder ='resultImages/';
			$photoNameArray=$_FILES['images']['name'];
			$photoTemp = $_FILES['images']['tmp_name'];
			$totalPhoto= count($photoNameArray);
			$photo_string = implode(",", $photoNameArray);
			$query ="INSERT INTO result_images (image_year_major,image_names)
			VALUES ('$year_major','$photo_string')";

			 $result = mysqli_query($con,$query);
              var_dump($result);
               for ($i=0; $i <$totalPhoto ; $i++) {
				$upload_images = $targetfolder.basename($photoNameArray[$i]);
				if(move_uploaded_file($photoTemp[$i], $upload_images))
				{
					echo "Success";
				}

				else{
					echo "false";
				}

							}


	 
}
 ?>