<?php
include('db.php');
include('function.php');
if(isset($_POST["missing_person_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM missingpersons
  WHERE missing_person_id = '".$_POST["missing_person_id"]."'
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["firstname"] = $row["firstname"];
  $output["middlename"] = $row["middlename"];
  $output["lastname"] = $row["lastname"];
  $output["relative"] = $row["relative"];
  $output["status"] = $row["status"];
  $output["tag"] = $row["tag"];
  $output["house_number"] = $row["house_number"];
  $output["street"] = $row["street"];
  $output["city"] = $row["city"];
  $output["nativity"] = $row["nativity"];
  $output["age"] = $row["age"];
  $output["last_seen"] = $row["last_seen"];
  $output["top_clothing"] = $row["top_clothing"];
  $output["bottom_clothing"] = $row["bottom_clothing"];
  $output["gender"] = $row["gender"];
  $output["height"] = $row["height"];
  $output["weight"] = $row["weight"];
  $output["remarks"] = $row["remarks"];
  if($row["image"] != '')
  {
   $output['user_image'] = '<img src="uploads/'.$row["image"].'" class="img-thumbnail" width="200" height="185" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
