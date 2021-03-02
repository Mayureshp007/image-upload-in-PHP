<?php
//check if file is submitted or not 
if(isset($_FILES['file']['name'])){
  //Set Image Name
  $imagename = "my-image";

  // Getting file name
   $filename = $_FILES['file']['name'];
   $temp = explode(".", $_FILES["file"]["name"]);
   $filename = $imagename . '.' . end($temp);

   // Location
   $location = "upload/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);
   $response = 0;
      // Upload file
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
      }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP Image Upload</title>
  <meta name="description" content="Upload Image via PHP form">
  <meta name="author" content="Mayuresh Pitale">
</head>

<body>
  <form method="post" action=""  enctype="multipart/form-data">
    <label>Upload Image</label>
    <input type="file" name="file" />
    <button type="submit" name="submit">
      Upload File
    </button>
  </form>
  <div style="display:block;font-size:18px;color:lightgrey;">
    <?php
      //display file path
  echo $resonse;
    ?>
  </div>
</body>
</html>
