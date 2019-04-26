
<body>
  <div class="container w3-container" width="100%">
    <div class="table-responsive" width="100%">
 <h3 align="center">All Reports</h3>

  <div align="right">
   <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
   <br></br>
  </div>
  <table id="user_data" class="table table-hover table-condensed table-bordered" width="100%">
   <thead>
    <tr>
      <th width="15">Image</th>
      <th width="15">Name</th>
      <th width="10">Relative</th>
      <th width="5">Status</th>
      <th width="15">Tagged As</th>
      <th width="15">Address</th>
      <th width="5">Nativity</th>
      <th width="5">Age</th>
      <th width="5">Gender</th>
      <th width="5">Update</th>
      <th width="5">Delete</th>
    </tr>
   </thead>
  </table>

 </div>
 </div>

</body>

<div id="userModal" class="modal fade" tabindex="-1" role="dialog" >
<div class="modal-dialog">
  <font color="grey">
<form method="post" id="user_form" enctype="multipart/form-data">
 <div class="modal-content">

  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4 class="modal-title">Add Record</h4>
  </div>
<div class="modal-body">
   <label>Select Image</label>
   <input type="file" name="user_image" id="user_image" />
   <span id="user_uploaded_image"></span>

   <br>

  <div class="form-group">
    <select class="form-dropdown form-control" style="width:100%" id="add_mp_relative" name="add_mp_relative">
      <option style="color:grey">--Select Relative--</option>
   <?php
     include '../config/config.php';
     $sql="SELECT firstname, middlename, lastname from  accounts";
     $result = mysqli_query($con,$sql);
      $menu=" ";
       while($row =mysqli_fetch_assoc($result))
       {$menu .="<option style=\"color:grey\" value=\"" . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . "\">" . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . "</option>";
       }
       echo $menu;
    ?>
  </select>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_firstname" placeholder="First Name" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_middlename" placeholder="Middle Name" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_lastname" placeholder="Last Name" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_house_number" placeholder="House Number" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_street" placeholder="Street" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_city" placeholder="City" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_nativity" placeholder="Nativity" class="form-control" required/>
  </div>


  <div class="form-group">
      <input type="number" id="add_mp_age" placeholder="Age" max="100" class="form-control" required/>
  </div>

  <div class="form-group"> <!-- Date input -->
    <input class="form-control" id="add_mp_last_seen" name="date" placeholder="MM/DD/YYY (Last Seen)" type="text" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_top_clothing" placeholder="Top Clothing" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="text" id="add_mp_bottom_clothing" placeholder="Bottom Clothing" class="form-control" required/>
  </div>

  <div class="form-group" style="text-align:left;" for="add_mp_gender">
    <select id="add_mp_gender" class="form-control">
     <option value="">--Gender--</option>
     <option value="Male">Male</option>
     <option value="Female">Female</option>
    </select>
  </div>

  <div class="form-group">
      <input type="number" id="add_mp_height" placeholder="Height (cm)" max="100" class="form-control" required/>
  </div>

  <div class="form-group">
      <input type="number" id="add_mp_weight" placeholder="Weight (kg)" max="100" class="form-control" required/>
  </div>

  <div class="form-group">
  <textarea type="text" id="add_mp_remarks" placeholder="Remarks" class="form-control"></textarea>
  </div>
</div>

  <div class="modal-footer">
   <input type="hidden" name="missing_person_id" id="missing_person_id" />
   <input type="hidden" name="operation" id="operation" />
   <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>

 </div>
</form>
</font>
</div>
</div>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
$('#add_button').click(function(){
$('#user_form')[0].reset();
$('.modal-title').text("Add Missing Person");
$('#action').val("Add");
$('#operation').val("Add");
$('#user_uploaded_image').html('');
});

var dataTable = $('#user_data').DataTable({
"processing":true,
"serverSide":true,
"order":[],
"ajax":{
 url:"operations/fetch.php",
 type:"POST"
},
"columnDefs":[
 {
  "targets":[0,9,10],
  "orderable":false,
 },
],

});

$(document).on('submit', '#user_form', function(event){
event.preventDefault();
var mp_photo = $('#user_image').val().split('.').pop().toLowerCase();
var mp_firstname = $("#add_mp_firstname").val();
var mp_middlename = $("#add_mp_middlename").val();
var mp_lastname = $("#add_mp_lastname").val();
var mp_relative = $("#add_mp_relative").val();
var mp_house_number = $("#add_mp_house_number").val();
var mp_street = $("#add_mp_street").val();
var mp_city = $("#add_mp_city").val();
var mp_nativity= $("#add_mp_nativity").val();
var mp_age = $("#add_mp_age").val();
var mp_remarks = $("#add_mp_remarks").val();
var mp_last_seen = $("#add_mp_last_seen").val();
var mp_top_clothing = $("#add_mp_top_clothing").val();
var mp_bottom_clothing = $("#add_mp_bottom_clothing").val();
var mp_gender = $("#add_mp_gender").val();
var mp_height = $("#add_mp_height").val();
var mp_weight = $("#add_mp_weight").val();
if(mp_photo != '')
{
 if(jQuery.inArray(mp_photo, ['gif','png','jpg','jpeg']) == -1)
 {
  alert("Invalid Image File");
  $('#user_image').val('');
  $("#add_mp_firstname").val('');
  $("#add_mp_middlename").val('');
  $("#add_mp_lastname").val('');
  $("#add_mp_relative").val('');
  $("#add_mp_house_number").val('');
  $("#add_mp_street").val('');
  $("#add_mp_city").val('');
  $("#add_mp_nativity").val('');
  $("#add_mp_age").val('');
  $("#add_mp_remarks").val('');
  $("#add_mp_last_seen").val('');
  $("#add_mp_top_clothing").val('');
  $("#add_mp_bottom_clothing").val('');
  $("#add_mp_gender").val('');
  $("#add_mp_height").val('');
  $("#add_mp_weight").val('');
  return false;
 }
}
if(mp_firstname != '' && mp_lastname != '')
{
 $.ajax({
  url:"operations/insert.php",
  method:'POST',
  data:new FormData(this),
  contentType:false,
  processData:false,
  success:function(data)
  {
   alert(data);
   $('#user_form')[0].reset();
   $('#userModal').modal('hide');
   dataTable.ajax.reload();
  }
 });
}
else
{
 alert("Both Fields are Required");
}
});

$(document).on('click', '.update', function(){
var missing_person_id = $(this).attr("id");
$.ajax({
 url:"operations/fetch_single.php",
 method:"POST",
 data:{missing_person_id:missing_person_id},
 dataType:"json",
 success:function(data)
 {
  $('#userModal').modal('show');

  $("#add_mp_firstname").val(data.mp_firstname);
  $("#add_mp_middlename").val(data.mp_middlename);
  $("#add_mp_lastname").val(data.mp_lastname);
  $("#add_mp_relative").val(data.mp_relative);
  $("#add_mp_house_number").val(data.mp_house_number);
  $("#add_mp_street").val(data.mp_street);
  $("#add_mp_city").val(data.mp_city);
  $("#add_mp_nativity").val(data.mp_nativity);
  $("#add_mp_age").val(data.mp_age);
  $("#add_mp_remarks").val(data.mp_remarks);
  $("#add_last_seen").val(data.mp_last_seen);
  $("#add_mp_top_clothing").val(data.mp_top_clothing);
  $("#add_mp_bottom_clothing").val(data.mp_bottom_clothing);
  $("#add_mp_gender").val(data.mp_gender);
  $("#add_mp_height").val(data.mp_height);
  $("#add_mp_weight").val(data.mp_weight);
  $("#add_mp_status").val(data.mp_status);
  $("#add_mp_tag").val(data.mp_tag);


  $('.modal-title').text("Edit Missing Person");
  $('#missing_person_id').val(missing_person_id);
  $('#user_uploaded_image').html(data.user_image);
  $('#action').val("Edit");
  $('#operation').val("Edit");
 }
})
});

$(document).on('click', '.delete', function(){
var missing_person_id = $(this).attr("id");
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
  url:"operations/delete.php",
  method:"POST",
  data:{missing_person_id:missing_person_id},
  success:function(data)
  {
   alert(data);
   dataTable.ajax.reload();
  }
 });
}
else
{
 return false;
}
});


});
</script>
