function addRecord() {
    // get values
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
    //var mp_missing_duration_hrs = $("#add_mp_missing_duration_hrs").val();
    var mp_top_clothing = $("#add_mp_top_clothing").val();
    var mp_bottom_clothing = $("#add_mp_bottom_clothing").val();
    var mp_gender = $("#add_mp_gender").val();
    var mp_height = $("#add_mp_height").val();
    var mp_weight = $("#add_mp_weight").val();
    //var mp_photo = $("#add_mp_photo").val();


    // Add record
    $.post("ajax/addRecord.php", {
        mp_firstname: mp_firstname,
        mp_middlename: mp_middlename,
        mp_lastname: mp_lastname,
        mp_relative: mp_relative,
        mp_house_number: mp_house_number,
        mp_street: mp_street,
        mp_city: mp_city,
        mp_nativity: mp_nativity,
        mp_age: mp_age,
        mp_remarks: mp_remarks,
        mp_last_seen: mp_last_seen,
        //mp_missing_duration_hrs: mp_missing_duration_hrs,
        mp_top_clothing: mp_top_clothing,
        mp_bottom_clothing: mp_bottom_clothing,
        mp_gender: mp_gender,
        mp_height: mp_height,
        mp_weight: mp_weight,
        //mp_photo: mp_photo
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();
        readOpenRecords();
        readClosedRecords();

        $("#add_mp_firstname").val("");
        $("#add_mp_middlename").val("");
        $("#add_mp_lastname").val("");
        $("#add_mp_relative").val("");
        $("#add_mp_house_number").val("");
        $("#add_mp_street").val("");
        $("#add_mp_city").val("");
        $("#add_mp_nativity").val("");
        $("#add_mp_age").val("");
        $("#add_mp_remarks").val("");
        $("#add_mp_last_seen").val("");
        //$("#add_mp_missing_duration_hrs").val("");
        $("#add_mp_top_clothing").val("");
        $("#add_mp_bottom_clothing").val("");
        $("#add_mp_gender").val("");
        $("#add_mp_height").val("");
        $("#add_mp_weight").val("");
        //$("#add_mp_photo").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function readOpenRecords() {
    $.get("ajax/readOpenRecords.php", {}, function (data, status) {
        $(".openRecords_content").html(data);
    });
}

function readClosedRecords() {
    $.get("ajax/readClosedRecords.php", {}, function (data, status) {
        $(".closedRecords_content").html(data);
    });
}


function DeleteUser(missing_person_id) {
    var conf = confirm("Are you sure, do you really want to delete report?");
    if (conf == true) {
        $.post("ajax/deleteRecord.php", {
                missing_person_id: missing_person_id},
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
                readOpenRecords();
                readClosedRecords();
            }
        );
    }
}

function GetUserDetails(missing_person_id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_missing_person_id").val(missing_person_id);
    $.post("ajax/readUserDetails.php", {
            missing_person_id: missing_person_id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);

            $("#update_mp_firstname").val(user.mp_firstname);
            $("#update_mp_middlename").val(user.mp_middlename);
            $("#update_mp_lastname").val(user.mp_lastname);
            $("#update_mp_relative").val(user.mp_relative);
            $("#update_mp_house_number").val(user.mp_house_number);
            $("#update_mp_street").val(user.mp_street);
            $("#update_mp_city").val(user.mp_city);
            $("#update_mp_nativity").val(user.mp_nativity);
            $("#update_mp_age").val(user.mp_age);
            $("#update_mp_remarks").val(user.mp_remarks);
            $("#update_mp_last_seen").val(user.mp_last_seen);
            //$("#update_mp_missing_duration_hrs").val(user.mp_missing_duration_hrs);
            $("#update_mp_top_clothing").val(user.mp_top_clothing);
            $("#update_mp_bottom_clothing").val(user.mp_bottom_clothing);
            $("#update_mp_gender").val(user.mp_gender);
            $("#update_mp_height").val(user.mp_height);
            $("#update_mp_weight").val(user.mp_weight);
            $("#update_mp_status").val(user.mp_status);
            $("#update_mp_tag").val(user.mp_tag);
            //$("#update_mp_photo").val(user.mp_photo);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var mp_firstname = $("#update_mp_firstname").val();
    var mp_middlename = $("#update_mp_middlename").val();
    var mp_lastname = $("#update_mp_lastname").val();
    var mp_relative = $("#update_mp_relative").val();
    var mp_house_number = $("#update_mp_house_number").val();
    var mp_street = $("#update_mp_street").val();
    var mp_city = $("#update_mp_city").val();
    var mp_nativity= $("#update_mp_nativity").val();
    var mp_age = $("#update_mp_age").val();
    var mp_remarks = $("#update_mp_remarks").val();
    var mp_last_seen = $("#update_mp_last_seen").val();
    //var mp_missing_duration_hrs = $("#update_mp_missing_duration_hrs").val();
    var mp_top_clothing = $("#update_mp_top_clothing").val();
    var mp_bottom_clothing = $("#update_mp_bottom_clothing").val();
    var mp_gender = $("#update_mp_gender").val();
    var mp_height = $("#update_mp_height").val();
    var mp_weight = $("#update_mp_weight").val();
    var mp_status = $("#update_mp_status").val();
    var mp_tag= $("#update_mp_tag").val();
    //var mp_photo = $("#update_mp_photo").val();

    var missing_person_id = $("#hidden_user_missing_person_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
      missing_person_id: missing_person_id,
      mp_firstname: mp_firstname,
      mp_middlename: mp_middlename,
      mp_lastname: mp_lastname,
      mp_relative: mp_relative,
      mp_house_number: mp_house_number,
      mp_street: mp_street,
      mp_city: mp_city,
      mp_nativity: mp_nativity,
      mp_age: mp_age,
      mp_remarks: mp_remarks,
      mp_last_seen: mp_last_seen,
      //mp_missing_duration_hrs: mp_missing_duration_hrs,
      mp_top_clothing: mp_top_clothing,
      mp_bottom_clothing: mp_bottom_clothing,
      mp_gender: mp_gender,
      mp_height: mp_height,
      mp_weight: mp_weight,
      mp_status: mp_status,
      mp_tag: mp_tag
      //mp_photo: mp_photo
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
            readOpenRecords();
            readClosedRecords();
        }
    );
}
