 <head>
 </head>
 <body text="teal">
  <br /><br />
  <div class="container">
   <h3 align="center">All Reports</h3>
   <br />
   <div align="right">
    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
   </div>
   <br />
   <div id="image_data">

   </div>
  </div>
 </body>

<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add Image</h4>
   </div>
   <div class="modal-body">

    <form id="image_form" method="post" enctype="multipart/form-data">

   <div class="form-group">
     <p><label>Select Image</label>
     <input type="file" name="image" id="image" /></p><br />
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="missing_person_id" id="missing_person_id" />
   </div>

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
       <input type="text" id="add_mp_middlename" placeholder="Middle Name" class="form-control"/>
   </div>

   <div class="form-group">
       <input type="text" id="add_mp_lastname" placeholder="Last Name" class="form-control" required/>
   </div>

   <div class="form-group">
   <input id="add_mp_house_number" type="number" name="add_mp_house_number"  placeholder="House Number" class="form-control" required>
   </div>

   <div class="form-group">
   <input id="add_mp_street" type="text" name="add_mp_street"  placeholder="Street" class="form-control"  required>
   </div>

   <div class="form-group">
   <input id="add_mp_city" type="text" name="add_mp_city"  placeholder="City" class="form-control" required>
   </div>

   <div class="form-group">
   <input id="add_mp_nativity" type="text" name="add_mp_nativity"  placeholder="Nativity" class="form-control" required>
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

   <div class="form-group" style="text-align:left;" for="add_mp_mp_gender">
     <select id="add_mp_gender" class="form-control">
      <option value="">--Gender--</option>
      <option value="Open">Male</option>
      <option value="Female">Female</option>
     </select>
   </div>

   <div class="form-group">
       <input type="number" id="add_mp_height" placeholder="Height (cm)" class="form-control" required/>
   </div>

   <div class="form-group">
       <input type="number" id="add_mp_weight" placeholder="Weight (kg)" class="form-control" required/>
   </div>

   <div class="form-group">
   <textarea type="text" id="add_mp_remarks" placeholder="Remarks" class="form-control"></textarea>
   </div>
   </div>
   <div class="modal-footer">
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
   </form>
  </div>
 </div>
</div>

<script>
$(document).ready(function(){

 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  $('#missing_person_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var image_name = $('#image').val();
  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   }
  }
 });
 $(document).on('click', '.update', function(){
  $('#missing_person_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var missing_person_id = $(this).attr("id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this record from database?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{missing_person_id:missing_person_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
    }
   })
  }
  else
  {
   return false;
  }
 });
});
</script>
