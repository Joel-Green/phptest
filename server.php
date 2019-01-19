<?php

$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'testphp');


if (isset($_POST['input_image'])) {

  $heading = mysqli_real_escape_string($db, $_POST['heading']);
  $text1 = mysqli_real_escape_string($db, $_POST['text1']);
  $file= $_FILES["file"]["name"];
  $filepath = "images/" . $_FILES["file"]["name"];
  

  if (empty($heading)) { array_push($errors, "Heading cannot be empty"); }
  if (empty($text1)) { array_push($errors, "Text cannot be empty"); }
  if (empty($file)) { array_push($errors, "Image is required"); }
  
  if (count($errors) == 0) {
  	$query = "INSERT INTO dynamic (heading, text1, file) 
  			     VALUES('$heading', '$text1', '$filepath')";
    move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
}


if (isset($_POST['deldata']))
{ 
  $id = $_POST['id'];
  $img_del_query="SELECT * FROM dynamic WHERE id='$id'";
  $result = mysqli_query($db, $img_del_query);
  $imgdel = mysqli_fetch_assoc($result);
  unlink($imgdel['file']);
  $del_row_query="DELETE FROM dynamic WHERE id = '$id' ";
  echo $id;
  $result = mysqli_query($db, $del_row_query);
  header('location: index.php');
}
$db->close(); 
?>
