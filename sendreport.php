<?php

$CallSid = "CallSid: " . $_POST['CallSid'];
$From = "From Number: " . $_POST['From'];
$CallStatus = $_POST['CallStatus'];
$Direction = $_POST['Direction'];
$FromCity = "From City: " . $_POST['FromCity'];
$FromState = "From State: " . $_POST['FromState'];
$CallDuration = "Duration: " . round($_POST['CallDuration']/60,2) . " minutes";

require_once('../twilio/Services/Twilio.php');

$fp = fopen('mylog.txt','a');
fwrite($fp, $CallSid . PHP_EOL . $From . PHP_EOL . $FromCity . PHP_EOL . $FromState . PHP_EOL . $CallDuration . PHP_EOL . '-----' . PHP_EOL);

fclose($fp);


?>

