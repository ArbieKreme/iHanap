<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script type="text/javascript" src="js/script.js"></script>

              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <h4>Missing Persons Details</h4>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="pull-right">
                              <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
                          </div>
                      </div>
                  </div>
                  <br>
              </div>

              <div class="records_content"></div>
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
                    <input type="text" id="add_mp_firstname" placeholder="First Name" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="text" id="add_mp_middlename" placeholder="Middle Name" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="text" id="add_mp_lastname" placeholder="Last Name" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="email" id="add_mp_email" placeholder="Email Address" class="form-control" required/>
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

                <div class="form-group" style="text-align:left;" for="update_mp_gender">
                  <select id="add_mp_gender">
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

                <!--Relative-->
                <!--
                <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" id="sel1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>-->
</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color:teal">Update</h4>
            </div>

              <div class="modal-body">
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
                    <input type="email" id="update_mp_email" placeholder="Email Address" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="text" id="update_mp_house_number" placeholder="House Number" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="text" id="update_mp_street" placeholder="Street" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="text" id="update_mp_city" placeholder="City" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="text" id="update_mp_nativity" placeholder="Nativity" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="number" id="update_mp_age" placeholder="Age" max="100" class="form-control" required/>
                </div>

                <div class="form-group"> <!-- Date input -->
                  <input class="form-control" id="update_mp_last_seen" name="date" placeholder="MM/DD/YYY (Last Seen)" type="text" required/>
                </div>



                <div class="form-group">
                    <input type="number" id="update_mp_height" placeholder="Height (cm)" max="100" class="form-control" required/>
                </div>

                <div class="form-group">
                    <input type="number" id="update_mp_weight" placeholder="Weight (kg)" max="100" class="form-control" required/>
                </div>

              <!--Relative-->
              <!--
              <div class="form-group">
              <label for="sel1">Select list:</label>
              <select class="form-control" id="sel1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_missing_person_id">
            </div>
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
      readRecords(); // calling function
    });
</script>
</body>
</html>
