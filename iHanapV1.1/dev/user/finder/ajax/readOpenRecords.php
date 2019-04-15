<?php
	include("../config/config.php");

	// Design initial table header
	$data = '
		<div class="container w3-container" width="100%">
  		<div class="table-responsive" width="100%">
       <table id="missing_persons_table" class="table table-hover table-condensed table-bordered" width="100%">
            <thead>
                 <tr>
                 <td>Name</td>
								 <td>Relative</td>
								 <td>Status</td>
								 <td>Tagged As</td>
                 <td>Address</td>
                 <td>Nativity</td>
								 <td>Age</td>
								 <td>Last Seen</td>
								 <td>Gender</td>
								 <td>Created At</td>
								 <td>Update</td>
								 <td>Delete</td>
              </tr>
         </thead>';

	$query = "SELECT * FROM missingpersons WHERE mp_status = 'Open'
";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .=
        '<tr>
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
				<td>
					<button onclick="GetUserDetails('.$row['missing_person_id'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['missing_person_id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found
    	$data .= '<tr><td class="td" colspan="18">No Available Records</td></tr>';
    }

    $data .= "</div></div></table>
		<script>
		    $(document).ready(function(){
		      $('#missing_persons_table').DataTable();
		    });
		</script>
		";

    echo $data;
?>
