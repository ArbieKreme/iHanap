<?php
include('../config/config.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connection->prepare("
   INSERT INTO missingpersons (mp_firstname, mp_middlename, mp_lastname, mp_relative, mp_house_number, mp_street, mp_city, mp_nativity, mp_age, mp_remarks, mp_last_seen, mp_top_clothing, mp_bottom_clothing, mp_gender, mp_height, mp_weight, mp_photo)
   VALUES (:mp_firstname, :mp_middlename, :mp_lastname, :mp_relative, :mp_house_number, :mp_street, :mp_city, :mp_nativity, :mp_age, :mp_remarks, :mp_last_seen, :mp_top_clothing, :mp_bottom_clothing, :mp_gender, :mp_height, :mp_weight, :image)");
  $result = $statement->execute(
   array(
    ':mp_firstname' => $_POST["mp_firstname"],
    ':mp_middlename' => $_POST["mp_middlename"],
    ':mp_lastname' => $_POST["mp_lastname"],
    ':mp_relative' => $_POST["mp_relative"],
    ':mp_house_number' => $_POST["mp_house_number"],
    ':mp_street' => $_POST["mp_street"],
    ':mp_city' => $_POST["mp_city"],
    ':mp_nativity' => $_POST["mp_nativity"],
    ':mp_age' => $_POST["mp_age"],
    ':mp_remarks' => $_POST["mp_remarks"],
    ':mp_last_seen' => $_POST["mp_last_seen"],
    ':mp_top_clothing' => $_POST["mp_top_clothing"],
    ':mp_bottom_clothing' => $_POST["mp_bottom_clothing"],
    ':mp_gender' => $_POST["mp_gender"],
    ':mp_height' => $_POST["mp_height"],
    ':mp_weight' => $_POST["mp_weight"],
    ':image'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connection->prepare(
   "UPDATE missingpersons
   SET
   mp_firstname = :mp_firstname,
   mp_middlename = :mp_middlename,
   mp_lastname = :mp_lastname,
   mp_relative = :mp_relative,
   mp_house_number = :mp_house_number,
   mp_street = :mp_street,
   mp_city = :mp_city,
   mp_nativity = :mp_nativity,
   mp_age = :mp_age,
   mp_remarks = :mp_remarks,
   mp_last_seen = :mp_last_seen,
   mp_top_clothing = :mp_top_clothing,
   mp_bottom_clothing = :mp_bottom_clothing,
   mp_gender = :mp_gender,
   mp_height = :mp_height,
   mp_weight = :mp_weight,
   image = :image
   WHERE missing_person_id = :missing_person_id
   "
  );
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["first_name"],
    ':last_name' => $_POST["last_name"],
    ':image'  => $image,
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
