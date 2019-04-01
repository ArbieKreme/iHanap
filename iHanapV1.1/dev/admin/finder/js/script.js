// Add Record
function addRecord() {
    // get values
    var mp_firstname = $("#add_mp_firstname").val();
    var mp_middlename = $("#add_mp_middlename").val();
    var mp_lastname = $("#add_mp_lastname").val();
    var mp_email = $("#add_mp_email").val();
    var mp_house_number = $("#add_mp_house_number").val();
    var mp_street = $("#add_mp_street").val();
    var mp_city = $("#add_mp_city").val();
    var mp_nativity = $("#add_mp_nativity").val();
    var mp_age = $("#add_mp_age").val();
    var mp_last_seen = $("#add_mp_last_seen").val();
    var mp_gender = $("#add_mp_gender").val();
    var mp_height = $("#add_mp_height").val();
    var mp_weight = $("#add_mp_weight").val();

    // Add record
    $.post("ajax/addRecord.php", {
        mp_firstname: mp_firstname,
        mp_middlename: mp_middlename,
        mp_lastname: mp_lastname,
        mp_email: mp_email,
        mp_house_number: mp_house_number,
        mp_street: mp_street,
        mp_city: mp_city,
        mp_nativity: mp_nativity,
        mp_age: mp_age,
        mp_last_seen: mp_last_seen,
        mp_gender: mp_gender,
        mp_height: mp_height,
        mp_weight: mp_weight
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#add_mp_firstname").val("");
        $("#add_mp_middlename").val("");
        $("#add_mp_lastname").val("");
        $("#add_mp_email").val("");
        $("#add_mp_house_number").val("");
        $("#add_mp_street").val("");
        $("#add_mp_city").val("");
        $("#add_mp_nativity").val("");
        $("#add_mp_age").val("");
        $("#add_mp_last_seen").val("");
        $("#add_mp_gender").val("");
        $("#add_mp_height").val("");
        $("#add_mp_weight").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(missing_person_id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteRecord.php", {
                missing_person_id: missing_person_id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
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
            // Assing existing values to the modal popup fields
            $("#update_mp_firstname").val(user.mp_firstname);
            $("#update_mp_middlename").val(user.mp_middlename);
            $("#update_mp_lastname").val(user.mp_lastname);
            $("#update_mp_email").val(user.mp_email);
            $("#update_mp_house_number").val(user.mp_house_number);
            $("#update_mp_street").val(user.mp_street);
            $("#update_mp_city").val(user.mp_city);
            $("#update_mp_nativity").val(user.mp_nativity);
            $("#update_mp_age").val(user.mp_age);
            $("#update_mp_last_seen").val(user.mp_last_seen);
            $("#update_mp_gender").val(user.mp_gender);
            $("#update_mp_height").val(user.mp_height);
            $("#update_mp_weight").val(user.mp_weight);
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
    var mp_email = $("#update_mp_email").val();
    var mp_house_number = $("#update_mp_house_number").val();
    var mp_street = $("#update_mp_street").val();
    var mp_city = $("#update_mp_city").val();
    var mp_nativity = $("#update_mp_nativity").val();
    var mp_age = $("#update_mp_age").val();
    var mp_last_seen = $("#update_mp_last_seen").val();
    var mp_gender = $("#update_mp_gender").val();
    var mp_height = $("#update_mp_height").val();
    var mp_weight = $("#update_mp_weight").val();
    // get hidden field value
    var missing_person_id = $("#hidden_user_missing_person_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
      mp_firstname: mp_firstname,
      mp_middlename: mp_middlename,
      mp_lastname: mp_lastname,
      mp_email: mp_email,
      mp_house_number: mp_house_number,
      mp_street: mp_street,
      mp_city: mp_city,
      mp_nativity: mp_nativity,
      mp_age: mp_age,
      mp_last_seen: mp_last_seen,
      mp_gender: mp_gender,
      mp_height: mp_height,
      mp_weight: mp_weight
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
