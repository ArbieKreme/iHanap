<?php
include('../config/config.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM missingpersons ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE mp_firstname LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_middlename LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_lastname LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_relative LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_house_number LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_street LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_city LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_nativity LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_age LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_remarks LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_last_seen LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_top_clothing LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_bottom_clothing LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_gender LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_height LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_weight LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_status LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mp_tag LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY missing_person_id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $image = '';
 if($row["image"] != '')
 {
  $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="100" height="85" />';
 }
 else
 {
  $image = '';
 }
 $sub_array = array();
 $sub_array[] = $image;
 $sub_array[] = $row["mp_firstname"];
 $sub_array[] = $row["mp_middlename"];
 $sub_array[] = $row["mp_lastname"];
 $sub_array[] = $row["mp_relative"];
 $sub_array[] = $row["mp_house_number"];
 $sub_array[] = $row["mp_street"];
 $sub_array[] = $row["mp_city"];
 $sub_array[] = $row["mp_nativity"];
 $sub_array[] = $row["mp_age"];
 $sub_array[] = $row["mp_remarks"];
 $sub_array[] = $row["mp_last_seen"];
 $sub_array[] = $row["mp_top_clothing"];
 $sub_array[] = $row["mp_bottom_clothing"];
 $sub_array[] = $row["mp_gender"];
 $sub_array[] = $row["mp_height"];
 $sub_array[] = $row["mp_weight"];
 $sub_array[] = $row["mp_status"];
 $sub_array[] = $row["mp_tag"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["missing_person_id"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["missing_person_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>
