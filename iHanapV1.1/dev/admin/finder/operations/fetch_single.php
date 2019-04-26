<?php
include('../config/config.php');
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
  $output["mp_firstname"] = $row["mp_firstname"];
  $output["mp_middlename"] = $row["mp_middlename"];
  $output["mp_lastname"] = $row["mp_lastname"];
  $output["mp_relative"] = $row["mp_relative"];
  $output["mp_house_number"] = $row["mp_house_number"];
  $output["mp_street"] = $row["mp_street"];
  $output["mp_city"] = $row["mp_city"];
  $output["mp_nativity"] = $row["mp_nativity"];
  $output["mp_age"] = $row["mp_age"];
  $output["mp_remarks"] = $row["mp_remarks"];
  $output["mp_last_seen"] = $row["mp_last_seen"];
  $output["mp_top_clothing"] = $row["mp_top_clothing"];
  $output["mp_bottom_clothing"] = $row["mp_bottom_clothing"];
  $output["mp_gender"] = $row["mp_gender"];
  $output["mp_height"] = $row["mp_height"];
  $output["mp_weight"] = $row["mp_weight"];
  $output["mp_status"] = $row["mp_status"];
  $output["mp_tag"] = $row["mp_tag"];
  if($row["image"] != '')
  {
   $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="100" height="85" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
