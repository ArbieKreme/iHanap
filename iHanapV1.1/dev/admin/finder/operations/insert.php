<?php
include('db.php');
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
   INSERT INTO missingpersons (firstname, middlename, lastname, relative, house_number, street, city, nativity, age, last_seen, top_clothing, bottom_clothing, gender, height, weight, remarks, image)
                        VALUES (:firstname, :middlename, :lastname, :relative, :house_number, :street, :city, :nativity, :age, :last_seen, :top_clothing, :bottom_clothing, :gender, :height, :weight, :remarks, :image)
  ");
  $result = $statement->execute(
   array(
    ':firstname' => $_POST["firstname"],
    ':middlename' => $_POST["middlename"],
    ':lastname' => $_POST["lastname"],
    ':relative' => $_POST["relative"],
    ':house_number' => $_POST["house_number"],
    ':street' => $_POST["street"],
    ':city' => $_POST["city"],
    ':nativity' => $_POST["nativity"],
    ':age' => $_POST["age"],
    ':last_seen' => $_POST["last_seen"],
    ':top_clothing' => $_POST["top_clothing"],
    ':bottom_clothing' => $_POST["bottom_clothing"],
    ':gender' => $_POST["gender"],
    ':height' => $_POST["height"],
    ':weight' => $_POST["weight"],
    ':remarks' => $_POST["remarks"],
    ':image'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Report Created Succesfully';
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
   SET firstname = :firstname, middlename = :middlename, lastname = :lastname  , relative = :relative , house_number = :house_number , street = :street , city = :city , nativity = :nativity , age = :age , last_seen = :last_seen , top_clothing = :top_clothing , bottom_clothing = :bottom_clothing , gender = :gender , height = :height , weight = :weight , remarks = :remarks , image = :image
   WHERE missing_person_id = :missing_person_id
   "
  );
  $result = $statement->execute(
   array(
     ':firstname' => $_POST["firstname"],
     ':middlename' => $_POST["middlename"],
     ':lastname' => $_POST["lastname"],
     ':relative' => $_POST["relative"],
     ':house_number' => $_POST["house_number"],
     ':street' => $_POST["street"],
     ':city' => $_POST["city"],
     ':nativity' => $_POST["nativity"],
     ':age' => $_POST["age"],
     ':last_seen' => $_POST["last_seen"],
     ':top_clothing' => $_POST["top_clothing"],
     ':bottom_clothing' => $_POST["bottom_clothing"],
     ':gender' => $_POST["gender"],
     ':height' => $_POST["height"],
     ':weight' => $_POST["weight"],
     ':remarks' => $_POST["remarks"],
      ':image'  => $image,
      ':missing_person_id'   => $_POST["missing_person_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
