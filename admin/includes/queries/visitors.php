<?php

include '../../../config.php';

// function generateOTP($visitorOTP, $vcno, $vname, $startdate, $duration)
// {

//     $enddate = date('Y-m-d', strtotime($startdate . " + " . $duration . " day"));
//     // echo $enddate;

//     $fields = array(
//         "sender_id" => "CHKSMS",
//         // "message" => $vname." your Visiting OTP is <strong>". $visitorOTP ." </strong>valid from <strong> ". $startdate . " to ". $enddate ."</strong>",
//         "message" => "2",
//         "variables_values" => $visitorOTP,
//         "route" => "s", //check
//         // "numbers" => '"' . $number1 . ', ' . $number2 . '"', //not working
//         "numbers" => $vcno,
//     );
//     // print_r($fields);

//     // echo '<script>console.log('.$fields.')</script>';
//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10, //c
//         CURLOPT_TIMEOUT => $duration * 24 * 3600, //c
//         CURLOPT_SSL_VERIFYHOST => 0,
//         CURLOPT_SSL_VERIFYPEER => 0,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "POST",
//         CURLOPT_POSTFIELDS => json_encode($fields),
//         CURLOPT_HTTPHEADER => array(
//             "authorization: 4XTW3u2vgelpOVUiDj0K1RSd9fc8GHNyYsFqL5aJoM7PAwQBIbuFjJ8IVgKcLQhrvdOfmzYB1WplUMo2",
//             "accept: */*",
//             "cache-control: no-cache",
//             "content-type: application/json",
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//         echo "cURL Error #:" . $err;

//     } else {
//         //echo $response;
//         // echo "<script>console.log('Done succ')</script>";
//         // return $visitorOTP;
//     }
// }

if (isset($_POST['addvisitors-btn'])) {

    //define the form input variables and extract their values
    $vname = mysqli_escape_string($con, $_POST['name']);
    $contactno = mysqli_escape_string($con, $_POST['contact']);
    $altcontactno = mysqli_escape_string($con, $_POST['contact1']);
    $block = mysqli_escape_string($con, $_POST['block']);
    $flatno = mysqli_escape_string($con, $_POST['flat']);
    $people = mysqli_escape_string($con, $_POST['people']);
    $whomtomeet = mysqli_escape_string($con, $_POST['whomToMeet']);
    $reasontomeet = mysqli_escape_string($con, $_POST['reasonToMeet']);

    $startdate = mysqli_escape_string($con, $_POST['startDate']);
    $duration = mysqli_escape_string($con, $_POST['duration']);

    $timestamp = date("Y-m-d H:i:s");
    $added_by = $_SESSION['username'];
    // $added_by = 'admin1';

    //Fetching the FlatID from Flats table
    $fetch_query = "SELECT FlatID from flats where BlockNumber='" . $block . "' AND FlatNumber=" . $flatno . ";";
    $result = mysqli_query($con, $fetch_query);
    $flatID = mysqli_fetch_array($result);

    $check_query = "SELECT * from visitors where BlockNumber='" . $block . "' AND FlatNumber=" . $flatno . " AND VisitorName='" . $vname . "' ;";
    $check_res = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_res) != 0) {
        $_SESSION['error_message'] = "<strong>Failure!</strong> Record for this Block, Flat and the visitor already exists!";
        header("Location: ../../add_visitors.php");
        exit();

    } else {
        // store in the database; check if error doesnt occur while storing
        // $otp = rand(100000, 999999);
        $query = "INSERT INTO visitors(`VisitorID`,`FlatID`, `VisitorName`,`VisitorContactNo`,`AlternateVisitorContactNo`,`BlockNumber`, `FlatNumber`, `NoOfPeople`,`WhomToMeet`, `ReasonToMeet`,`StartDate`,`Duration`,`updated_by`, `updated_at`)
                  VALUES ('' ,'" . $flatID['FlatID'] . "','$vname' , '$contactno' , '$altcontactno' , '$block' , '$flatno' , '$people', '$whomtomeet' , '$reasontomeet',  '$startdate', '$duration', '$added_by' , '$timestamp' )";

       echo "\n" . $query;
       echo "\n";
        if (mysqli_query($con, $query)) {
            echo "Visitor Added successfully\n";
            // generateOTP($otp, $contactno, $vname, $startdate, $duration);
            //Start the session if already not started.
            $_SESSION['success_message'] = "<strong>Success!</strong> Visitor added successfully!";

            // redirect to the form page again with success message or to the datatable page
            header("Location: ../../add_visitors.php");

            exit();

        } else {
            $query = "UPDATE visitors 
                      WHERE BlockNumber='$block', FlatNumber='$flatno',VisitorName = '$vname'";

            $result = mysqli_query($con, $query);

            $_SESSION['error_message'] = "<strong>Failure!</strong>Could not able to execute the query!";
            header("Location: ../../add_visitors.php");
            exit();
            // echo "ERROR: Could not able to execute " .mysqli_error($con);
        }
    }
}

if (isset($_POST['delete_visitors'])) {
    $visitorID = mysqli_escape_string($con, $_POST['visitor_id']);
    $startdate = mysqli_escape_string($con, $_POST['startdate']);
    $duration = mysqli_escape_string($con, $_POST['duration']);

    $enddate = date('Y-m-d', strtotime($startdate. ' + ' . $duration .'day'));
    $todaysDate = date("Y-m-d");
    
    if (strtotime($enddate) > strtotime($todaysDate)){  
        $sql = "DELETE FROM visitors WHERE VisitorID='$visitorID'";
        mysqli_query($con, $sql);
    }

    // header("Location: ../bla.php");
    exit();
}

if (isset($_POST['update_visitors'])) {

    $visitorID = mysqli_escape_string($con, $_POST['visitor_id']);
    $block_new = mysqli_escape_string($con, $_POST['blockno_new']);
    $flatno_new = mysqli_escape_string($con, $_POST['flatno_new']);
    $vname_new = mysqli_escape_string($con, $_POST['vname_new']);
    $vcontact_new = mysqli_escape_string($con, $_POST['vcontact_new']);
    $whom_new = mysqli_escape_string($con, $_POST['whom_new']);
    $reason_new = mysqli_escape_string($con, $_POST['reason_new']);
    $people_new = mysqli_escape_string($con, $_POST['people_new']);
    $startdate_new = mysqli_escape_string($con, $_POST['startdate_new']);
    $duration_new = mysqli_escape_string($con, $_POST['duration_new']);

    // $added_by = 'Admin1';
    $added_by = $_SESSION['username'];
    $timestamp = date("Y-m-d H:i:s");

    $block_old = mysqli_escape_string($con, $_POST['blockno_old']);
    $flatno_old = mysqli_escape_string($con, $_POST['flatno_old']);
    $vname_old = mysqli_escape_string($con, $_POST['vname_old']);
    $vcontact_old = mysqli_escape_string($con, $_POST['vcontact_old']);
    $whom_old = mysqli_escape_string($con, $_POST['whom_old']);
    $reason_old = mysqli_escape_string($con, $_POST['reason_old']);
    $people_old = mysqli_escape_string($con, $_POST['people_old']);
    $startdate_old = mysqli_escape_string($con, $_POST['startdate_old']);
    $duration_old = mysqli_escape_string($con, $_POST['duration_old']);

    // if the admin is changing unique value constraints, we check if they already exist or not
    if (($block_new != $block_old) || ($flatno_new != $flatno_old) || ($vname_new != $vname_old)) {

        $check_query = "SELECT * from visitors where BlockNumber='$block_new' AND FlatNumber='$flatno_new' AND VisitorName = '$vname_new';";
        $check_result = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_result) != 0) {
            echo "Exists_record";
        } else {

            //check whether the start date or duration is changing
            if (($startdate_new != $startdate_old) || ($duration_new != $duration_old)) {

                // $otp_new = rand(100000, 999999);
                $query = "UPDATE visitors  WHERE VisitorID='$visitorID'";
                mysqli_query($con, $query);
                // generateOTP($otp_new, $vcontact_new, $vname_new, $startdate_new, $duration_new);
            }

            $sql = "UPDATE visitors
                    SET BlockNumber='$block_new', FlatNumber='$flatno_new',VisitorName = '$vname_new',
                    VisitorContactNo='$vcontact_new', WhomToMeet = '$whom_new', ReasonToMeet = '$reason_new',
                    NoOfPeople = '$people_new', StartDate = '$startdate_new', Duration = '$duration_new',
                    updated_by='$added_by',updated_at='$timestamp' WHERE VisitorID='$visitorID';";

            mysqli_query($con, $sql);
            exit();
        }
    }
    //unique value constraints are not changing, so will be update it directly
    else {

        //check whether the start date or duration is changing
        if (($startdate_new != $startdate_old) || ($duration_new != $duration_old)) {

            // $otp_new = rand(100000, 999999);
            $query = "UPDATE visitors  WHERE VisitorID='$visitorID'";
            mysqli_query($con, $query);
            // generateOTP($otp_new, $vcontact_new, $vname_new, $startdate_new, $duration_new);
        }

        $sql = "UPDATE visitors
                SET BlockNumber='$block_new', FlatNumber='$flatno_new',VisitorName='$vname_new',
                VisitorContactNo='$vcontact_new', WhomToMeet = '$whom_new', ReasonToMeet = '$reason_new',
                NoOfPeople = '$people_new', StartDate = '$startdate_new', Duration = '$duration_new',
                updated_by='$added_by',updated_at='$timestamp' WHERE VisitorID='$visitorID';";
        // echo $sql;
        mysqli_query($con, $sql);
        exit();
    }

}
// }