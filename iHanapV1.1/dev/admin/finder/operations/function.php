<?php

function upload_image()
{
 if(isset($_FILES["user_image"]))
 {
  $extension = explode('.', $_FILES['user_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = '../upload/' . $new_name;
  move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($missing_person_id)
{
 include('../config/config.php');
 $statement = $connection->prepare("SELECT mp_photo FROM missingpersons WHERE missing_person_id = '$missing_person_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image"];
 }
}

function get_total_all_records()
{
 include('../config/config.php');
 $statement = $connection->prepare("SELECT * FROM missingpersons");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>
