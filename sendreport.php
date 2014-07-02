<?php

require_once('../twilio/Services/Twilio.php');
require_once('./twilio-config.php');

$client = new Services_Twilio($sid, $token);

global $CallSid = $_POST['CallSid'];
global $From = $_POST['From'];
global $CallStatus = $_POST['CallStatus'];
global $Direction = $_POST['Direction'];
global $FromCity = $_POST['FromCity'];
global $FromState = $_POST['FromState'];
global $CallDuration = round($_POST['CallDuration']/60,2);

function getConference() {
	
	// Loop over the list of conferences and echo a property for each one
	foreach ($client->account->conferences as $conference) {
	    echo $conference->status;		
	}
}


function writeToLog() {

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