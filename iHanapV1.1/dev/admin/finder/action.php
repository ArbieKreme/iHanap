<?php
if(isset($_POST["action"]))
{
 include 'config/config.php';
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM missingpersons ORDER BY missing_person_id DESC";
  $result = mysqli_query($con, $query);
  $output = '
  <div class="container w3-container" width="100%">
    <div class="table-responsive" width="100%">
   <table id="missing_persons_table" class="table table-hover table-condensed table-bordered" width="100%">
   <thead>
    <tr>
     <th width="5%">ID</th>
     <th width="10%">Image</th>
     <th width="10%">Name</th>
     <td width="5%">Relative</td>
     <td width="5%">Status</td>
     <td width="5%">Tagged As</td>
     <td width="10%">Address</td>
     <td width="5%">Nativity</td>
     <td width="5%">Age</td>
     <td width="5%">Last Seen</td>
     <td width="5%">Gender</td>
     <td width="15%">Created At</td>
     <th width="5%">Update</th>
     <th width="5%">Delete</th>
    </tr>
    </thead>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["missing_person_id"].'</td>
     <td><img src="data:image/jpeg;base64,'.base64_encode($row['mp_photo'] ).'" height="60" width="75" class="img-thumbnail" /></td>
     <td class="td">'.$row["mp_firstname"].' '.$row["mp_middlename"].' '.$row["mp_lastname"].'</td>
     <td class="td">'.$row["mp_relative"].'</td>
     <td class="td">'.$row["mp_status"].'</td>
     <td class="td">'.$row["mp_tag"].'</td>
     <td class="td">'.$row["mp_house_number"].' '.$row["mp_street"].' '.$row["mp_city"].'</td>
     <td class="td">'.$row["mp_nativity"].'</td>
     <td class="td">'.$row["mp_age"].'</td>
     <td class="td">'.$row["mp_last_seen"].'</td>
     <td class="td">'.$row["mp_gender"].'</td>
     <td class="td">'.$row["mp_created_at"].'</td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["missing_person_id"].'">Update</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["missing_person_id"].'">Delete</button></td>
    </tr>
   ';
  }
  $output .= '</table>
  </div>
  </div>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $mp_firstname = $_POST['mp_firstname'];
  $mp_middlename = $_POST['mp_middlename'];
  $mp_lastname = $_POST['mp_lastname'];
  $mp_relative = $_POST['mp_relative'];
  $mp_house_number = $_POST['mp_house_number'];
  $mp_street = $_POST['mp_street'];
  $mp_city = $_POST['mp_city'];
  $mp_nativity = $_POST['mp_nativity'];
  $mp_age = $_POST['mp_age'];
  $mp_remarks = $_POST['mp_remarks'];
  $mp_last_seen = $_POST['mp_last_seen'];
  //$mp_missing_duration_hrs = $_POST['mp_missing_duration_hrs'];
  $mp_top_clothing = $_POST['mp_top_clothing'];
  $mp_bottom_clothing = $_POST['mp_bottom_clothing'];
  $mp_gender = $_POST['mp_gender'];
  $mp_height = $_POST['mp_height'];
  $mp_weight = $_POST['mp_weight'];
  $query = "INSERT INTO missingpersons(mp_photo, mp_firstname, mp_middlename, mp_lastname, mp_relative, mp_house_number
  , mp_street, mp_city, mp_nativity, mp_age, mp_remarks, mp_last_seen, mp_top_clothing, mp_bottom_clothing, mp_gender, mp_height
, mp_weight)
  VALUES('$file','$mp_firstname','$mp_middlename', '$mp_lastname','$mp_relative',
    '$mp_house_number','$mp_street','$mp_city','$mp_nativity','$mp_age','$mp_remarks','$mp_last_seen'
  ,'$mp_top_clothing','$mp_bottom_clothing','$mp_gender','$mp_height','$mp_weight')";
  if(mysqli_query($con, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "UPDATE missingpersons SET mp_photo = '$file' WHERE missing_person_id = '".$_POST["missing_person_id"]."'";

  if(mysqli_query($con, $query))
  {
   echo 'Image Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM missingpersons WHERE missing_person_id = '".$_POST["missing_person_id"]."'";
  if(mysqli_query($con, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
}
?>
