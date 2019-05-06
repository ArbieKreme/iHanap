<?php

include('db.php');
include("function.php");

if(isset($_POST["missing_person_id"]))
{
 $image = get_image_name($_POST["missing_person_id"]);
 if($image != '')
 {
  unlink("../uploads/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM users WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':missing_person_id' => $_POST["missing_person_id"]
  )
 );

 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}
?>
