<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM missingpersons ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE firstname LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR middlename LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR lastname LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR relative LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR status LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR tag LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR house_number LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR street LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR city LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR nativity LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR age LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR last_seen LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR gender LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR created_at LIKE "%'.$_POST["search"]["value"].'%" ';
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
  $image = '<img src="uploads/'.$row["image"].'" class="img-thumbnail" width="100" height="85" />';
 }
 else
 {
  $image = '';
 }
 $sub_array = array();
 $sub_array[] = $image;
 $sub_array[] = '<font color="white">'.$row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"] . '</font>';
 $sub_array[] = '<font color="white">'.$row["relative"].'</font>';
 $sub_array[] = '<font color="white">'.$row["status"].'</font>';
 $sub_array[] = '<font color="white">'.$row["tag"].'</font>';
 $sub_array[] = '<font color="white">'.$row["house_number"] . ' ' . $row["street"] . ' ' . $row["city"] . '</font>';
 $sub_array[] = '<font color="white">'.$row["nativity"].'</font>';
 $sub_array[] = '<font color="white">'.$row["age"].'</font>';
 $sub_array[] = '<font color="white">'.$row["last_seen"].'</font>';
 $sub_array[] = '<font color="white">'.$row["gender"].'</font>';
 $sub_array[] = '<font color="white">'.$row["created_at"] . '</font>';
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
