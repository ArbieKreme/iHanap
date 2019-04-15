<?php
    if(isset($_POST['mp_firstname']))
    {
        // include Database connection file
        include("../config/config.php");

        // get values
        $mp_firstname = $_POST['mp_firstname'];
        $mp_middlename = $_POST['mp_middlename'];
        $mp_lastname = $_POST['mp_lastname'];
        $mp_relative = $_POST['mp_relative'];
        $mp_house_number = $_POST['mp_house_number'];
        $mp_street = $_POST['mp_street'];
        $mp_city = $_POST['mp_city'];
        $mp_nativity = $_POST['mp_nativity'];
        $mp_age = $_POST['mp_age'];
        $mp_remarks = $_POST['mp_remarks'];
        $mp_last_seen = $_POST['mp_last_seen'];
        //$mp_missing_duration_hrs = $_POST['mp_missing_duration_hrs'];
        $mp_top_clothing = $_POST['mp_top_clothing'];
        $mp_bottom_clothing = $_POST['mp_bottom_clothing'];
        $mp_gender = $_POST['mp_gender'];
        $mp_height = $_POST['mp_height'];
        $mp_weight = $_POST['mp_weight'];
        //$mp_photo = $_POST['mp_photo'];


        $query = "INSERT INTO missingpersons(mp_firstname, mp_middlename, mp_lastname, mp_relative, mp_house_number
        , mp_street, mp_city, mp_nativity, mp_age, mp_remarks, mp_last_seen, mp_top_clothing, mp_bottom_clothing, mp_gender, mp_height
      , mp_weight)
        VALUES('$mp_firstname','$mp_middlename', '$mp_lastname','$mp_relative',
          '$mp_house_number','$mp_street','$mp_city','$mp_nativity','$mp_age','$mp_remarks','$mp_last_seen'
        ,'$mp_top_clothing','$mp_bottom_clothing','$mp_gender','$mp_height','$mp_weight')";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        echo "1 Record Added!";
    }
?>
