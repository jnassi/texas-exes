<?php

require_once('../twilio/Services/Twilio.php');
require_once('./twilio-config.php');

$client = new Services_Twilio($sid, $token);



	$CallSid = $_POST['CallSid'];
	$From = $_POST['From'];
	$CallStatus = $_POST['CallStatus'];
	$Direction = $_POST['Direction'];
	$FromCity = $_POST['FromCity'];
	$FromState = $_POST['FromState'];
	$CallDuration = round($_POST['CallDuration']/60,2);

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
		
$message = 'Call Sid: ' . $CallSid . PHP_EOL . 'Caller ID: ' . $From . PHP_EOL . 'From City: ' . $FromCity . PHP_EOL . 'From State: ' . $FromState . PHP_EOL . 'Duration: ' . $CallDuration . ' minutes';

//mail('jnassi@gmail.com', 'Texas Exes Call Participant', $message);
mail('rick.valenzi@wellsfargoadvisors.com', 'Texas Exes Call Participant', $message);

?>