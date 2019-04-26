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
  $output["add_mp_firstname"] = $row["mp_firstname"];
  $output["add_mp_middlename"] = $row["mp_middlename"];
  $output["add_mp_lastname"] = $row["mp_lastname"];
  $output["add_mp_relative"] = $row["mp_relative"];
  $output["add_mp_house_number"] = $row["mp_house_number"];
  $output["add_mp_street"] = $row["mp_street"];
  $output["add_mp_city"] = $row["mp_city"];
  $output["add_mp_nativity"] = $row["mp_nativity"];
  $output["add_mp_age"] = $row["mp_age"];
  $output["add_mp_remarks"] = $row["mp_remarks"];
  $output["add_mp_last_seen"] = $row["mp_last_seen"];
  $output["add_mp_top_clothing"] = $row["mp_top_clothing"];
  $output["add_mp_bottom_clothing"] = $row["mp_bottom_clothing"];
  $output["add_mp_gender"] = $row["mp_gender"];
  $output["add_mp_height"] = $row["mp_height"];
  $output["add_mp_weight"] = $row["mp_weight"];
  $output["add_mp_status"] = $row["mp_status"];
  $output["add_mp_tag"] = $row["mp_tag"];
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
