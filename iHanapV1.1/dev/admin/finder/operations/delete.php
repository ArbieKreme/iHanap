<?php

include('../config/config.php');
include("function.php");

if(isset($_POST["missing_person_id"]))
{
 $image = get_image_name($_POST["missing_person_id"]);
 if($image != '')
 {
  unlink("../upload/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM missingpersons WHERE missing_person_id = :missing_person_id"
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
