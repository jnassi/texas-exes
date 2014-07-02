<?php

require_once('../twilio/Services/Twilio.php');
require_once('./twilio-config.php');

$client = new Services_Twilio($sid, $token);

function getConference() {
	
	// Loop over the list of conferences and echo a property for each one
	foreach ($client->account->conferences as $conference) {
	    echo $conference->status;		
	}
}

function callDetail() {

	global $CallSid;
	global $From;
	global $CallStatus;
	global $Direction;
	global $FromCity;
	global $FromState;
	global $CallDuration;

	$CallSid = $_POST['CallSid'];
	$From = $_POST['From'];
	$CallStatus = $_POST['CallStatus'];
	$Direction = $_POST['Direction'];
	$FromCity = $_POST['FromCity'];
	$FromState = $_POST['FromState'];
	$CallDuration = round($_POST['CallDuration']/60,2);
	
}


function writeToLog() {

	callDetail();

	$fp = fopen('mylog.txt','a');

	fwrite(
		$fp, 'CallSid: ' . $CallSid . PHP_EOL . 
		'Caller ID: ' . $From . PHP_EOL . 
		'From City: ' . $FromCity . PHP_EOL . 
		'From State: ' . $FromState . PHP_EOL . 
		'Duration: ' . $CallDuration . ' minutes' . PHP_EOL .
		'-----' . PHP_EOL
	);	

	fclose($fp);
		
}

writeToLog();

?>