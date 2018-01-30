<?php

function sendEmailToFarmer($subject, $message, $sensorID){
    $email_from = "mikey.wotton@gmail.com";
    // Just saving this here in case we need it $email_password = "Farmer.Cook";
    $email_subject = "Alert: " . $subject;
    $email_body = "You have received a new message from your farm.\n\n\n\n" . "Message:\n $message";
    $email_body = is_null($sensorID) ?  $email_body : $email_body ." ". $sensorID;
    $to = "farmercooksey@outlook.com"; //
    $headers = "From: $email_from \r\n";
    //Send the email!
    $response = new stdClass();
    if (mail($to, $email_subject, $email_body, $headers)) {
        $response->success = "Email sent to Farmer";
    } else {
        $response->errors = "Email failed to send.";
    }
    return $response;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $sensorID = isset($_POST['sensorID']) ? $_POST['sensorID'] : null;
    $response = new stdClass();
    //check if we have been sent a sensorID
    if(!is_null($sensorID)){
        //check if the $_SESSION array has already been sent
        if(isset($_SESSION["sensorIDs"])){
            //Check if the array already contains the $sensorID
            if(strpos($_SESSION["sensorIDs"], $sensorID) !== false){
                //SensorID is already within the array, as such we do not act.     
                $response->noemailsent = "Email has been sent recently, not resending...";
            }else{
                //sensorID is not within session, send email to farmer and
                //put sensor into session
                $sensorID = $sensorID . ",";
                $_SESSION["sensorIDs"] = $_SESSION["sensorIDs"] . $sensorID;
                $response = sendEmailToFarmer($subject, $message, $sensorID);
            }
        }else{
            //session has not been set, this is the first time we have had this sensor reported
            $response = sendEmailToFarmer($subject, $message, $sensorID);
            $_SESSION["sensorIDs"] = $sensorID .",";
        }
    } else {
        //No sensorID attached, regular email we send immediately.
        $response = sendEmailToFarmer($subject, $message, null);
    }
    echo json_encode($response);
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
