 <head>
 </head>
 <body>
  <div class="container">
   <h1 align="center">All Reports</h1>
   <div class="table-responsive">
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
    </div>
  </br>
    <table id="user_data" class="table table-bordered">
     <thead>
      <tr>
       <th width="20%">Image</th>
       <th width="8%">Name</th>
       <th width="10%">Relative</th>
       <th width="3%">Status</th>
       <th width="8%">Tagged As</th>
       <th width="10%">Address</th>
       <th width="3%">Nativity</th>
       <th width="5%">Age</th>
       <th width="10%">Last Seen</th>
       <th width="3%">Gender</th>
       <th width="10%">Created At</th>
       <th width="5%">Update</th>
       <th width="5%">Delete</th>
      </tr>
     </thead>
    </table>

   </div>
  </div>
 </body>
<font color="gray">
<div id="userModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Missing Person</h4>
    </div>

    <div class="modal-body">

      <div align="left">
      <font color="gray">Select Image </font>
    </div>

      <div class="form-group">
        <input type="file" name="user_image" id="user_image" />
        <span id="user_uploaded_image"></span>
      </div>

      <div class="form-group">
          <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control" required/>
      </div>

      <div class="form-group">
          <input type="text" id="middlename" name="middlename" placeholder="Middle Name" class="form-control" required/>
      </div>

      <div class="form-group">
          <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control" required/>
      </div>

     <div class="form-group">
       <select class="form-dropdown form-control" style="width:100%" id="relative" name="relative">
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
         <input type="text" id="house_number" name="house_number" placeholder="House Number" class="form-control" required/>
     </div>

     <div class="form-group">
         <input type="text" id="street" name="street" placeholder="Street" class="form-control" required/>
     </div>

     <div class="form-group">
         <input type="text" id="city" name="city" placeholder="City" class="form-control" required/>
     </div>

     <div class="form-group">
         <input type="text" id="nativity" name="nativity" placeholder="Nativity" class="form-control" required/>
     </div>


     <div class="form-group">
         <input type="number" id="age" name="age" placeholder="Age" max="100" class="form-control" required/>
     </div>

     <div class="form-group"> <!-- Date input -->
       <input class="form-control" id="last_seen" name="last_seen" placeholder="MM/DD/YYY (Last Seen)" type="text" required/>
     </div>

     <div class="form-group">
         <input type="text" id="top_clothing" name="top_clothing" placeholder="Top Clothing" class="form-control" required/>
     </div>

     <div class="form-group">
         <input type="text" id="bottom_clothing" name="bottom_clothing" placeholder="Bottom Clothing" class="form-control" required/>
     </div>

     <div class="form-group" style="text-align:left;" for="gender">
       <select id="gender" name="gender" class="form-control">
        <option value="">--Gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
       </select>
     </div>

     <div class="form-group">
         <input type="number" id="height" name="height" placeholder="Height (cm)" class="form-control" required/>
     </div>

     <div class="form-group">
         <input type="number" id="weight" name="weight" placeholder="Weight (kg)" class="form-control" required/>
     </div>

     <div class="form-group">
     <textarea type="text" id="remarks" name="remarks" placeholder="Remarks" class="form-control"></textarea>
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
 </div>
</div>
</font>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

  var date_input=$('input[name="last_seen"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  var options={
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
  };
  date_input.datepicker(options);

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
    "targets":[0, 11, 12],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var extension = $('#user_image').val().split('.').pop().toLowerCase();
  var firstname = $('#firstname').val();
  var middlename = $('#middlename').val();
  var lastname = $('#lastname').val();
  var relative = $('#relative').val();
  var house_number = $('#house_number').val();
  var street = $('#street');
  var city = $('#city');
  var nativity = $('#nativity');
  var age = $('#age');
  var last_seen = $('#last_seen');
  var top_clothing = $('#top_clothing');
  var bottom_clothing = $('#bottom_clothing');
  var gender = $('#gender');
  var height = $('#height');
  var weight = $('#weight');
  var remarks = $('#remarks');
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#user_image').val('');
    return false;
   }
  }
  if(firstname != '' && middlename != '' && lastname != '' && relative != '' && house_number != '' && street != '' && city != '' && nativity != '' && age != '' && last_seen !='' && top_clothing != '' && bottom_clothing != '' && gender != '' && height != '' && weight != '' && remarks != '')
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
   alert("All Fields are Required");
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
    $('#firstname').val(data.firstname);
    $('#middlename').val(data.middlename);
    $('#lastname').val(data.lastname);
    $('#relative').val(data.relative);
    $('#house_number').val(data.house_number);
    $('#street').val(data.street);
    $('#city').val(data.city);
    $('#nativity').val(data.nativity);
    $('#age').val(data.age);
    $('#last_seen').val(data.last_seen);
    $('#top_clothing').val(data.top_clothing);
    $('#bottom_clothing').val(data.bottom_clothing);
    $('#gender').val(data.geder);
    $('#height').val(data.height);
    $('#weight').val(data.weight);
    $('#remarks').val(data.remarks);
    $('.modal-title').text("Update Missing Person");
    $('#missing_person_id').val(missing_person_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Update");
    $('#operation').val("Update");
   }
  })
 });

 $(document).on('click', '.delete', function(){
  var missing_person_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this report?"))
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
