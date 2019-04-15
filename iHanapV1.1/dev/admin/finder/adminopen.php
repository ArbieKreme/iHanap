<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script src="js/script.js"></script>

              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <h4>Open Reports</h4>
                      </div>
                  </div>
                  <br>
              </div>

              <div class="openRecords_content"></div>
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <label>Add Missing Person</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" style="color:teal" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

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
                <label for="house_number"><b>House Number</b></label>
                <input id="add_mp_house_number" type="text" name="add_mp_house_number" required>
                </div>

                <div class="form-group">
                <label for="street"><b>Street</b></label>
                <input id="add_mp_street" type="text" name="add_mp_street" required>
                </div>

                <div class="form-group">
                <label for="city"><b>City</b></label>
                <input id="add_mp_city" type="text" name="add_mp_city" required>
                </div>

                <div class="form-group">
                <label for="add_mp_nativity"><b>Nativity</b></label>
                <input id="add_mp_nativity" type="text" name="add_mp_nativity" required>
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
                  <select id="add_mp_mp_gender" class="form-control">
                   <option value="">--Gender--</option>
                   <option value="Open">Male</option>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <label>Update Missing Person</label>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" style="color:teal" id="myModalLabel">Update New Record</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <select class="form-dropdown form-control" style="width:100%" id="update_mp_relative" name="update_mp_relative">
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
                  <input type="text" id="update_mp_firstname" placeholder="First Name" class="form-control" required/>
              </div>

              <div class="form-group">
                  <input type="text" id="update_mp_middlename" placeholder="Middle Name" class="form-control" required/>
              </div>

              <div class="form-group">
                  <input type="text" id="update_mp_lastname" placeholder="Last Name" class="form-control" required/>
              </div>

              <div class="form-group">
              <label for="house_number"><b>House Number</b></label>
              <input id="update_mp_house_number" type="text" name="update_mp_house_number" required>
              </div>

              <div class="form-group">
              <label for="street"><b>Street</b></label>
              <input id="update_mp_street" type="text" name="update_mp_street" required>
              </div>

              <div class="form-group">
              <label for="city"><b>City</b></label>
              <input id="update_mp_city" type="text" name="update_mp_city" required>
              </div>

              <div class="form-group">
              <label for="update_mp_nativity"><b>Nativity</b></label>
              <input id="update_mp_nativity" type="text" name="update_mp_nativity" required>
              </div>

              <div class="form-group">
                  <input type="number" id="update_mp_age" placeholder="Age" max="100" class="form-control" required/>
              </div>

              <div class="form-group"> <!-- Date input -->
                <input class="form-control" id="update_mp_last_seen" name="date" placeholder="MM/DD/YYY (Last Seen)" type="text" required/>
              </div>

              <div class="form-group">
                  <input type="text" id="update_mp_top_clothing" placeholder="Top Clothing" class="form-control" required/>
              </div>

              <div class="form-group">
                  <input type="text" id="update_mp_bottom_clothing" placeholder="Bottom Clothing" class="form-control" required/>
              </div>

              <div class="form-group" style="text-align:left;" for="update_mp_mp_gender">
                <select id="update_mp_mp_gender" class="form-control">
                 <option value="">--Gender--</option>
                 <option value="Open">Male</option>
                 <option value="Female">Female</option>
                </select>
              </div>

              <div class="form-group">
                  <input type="number" id="update_mp_height" placeholder="Height (cm)" max="100" class="form-control" required/>
              </div>

              <div class="form-group">
                  <input type="number" id="update_mp_weight" placeholder="Weight (kg)" max="100" class="form-control" required/>
              </div>

              <div class="form-group">
              <textarea type="text" id="update_mp_remarks" placeholder="Remarks" class="form-control"></textarea>
              </div>

            </div>
          </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
        <input type="hidden" id="hidden_user_missing_person_id">
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
      $('#missing_persons_table').DataTable();
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
      readOpenRecords(); // calling function
    });
</script>
</body>
