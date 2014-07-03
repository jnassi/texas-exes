<?php

$emailto = 'rick.valenzi@wellsfargoadvisors.com';
//$emailto = 'jnassi@gmail.com';

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

mail($emailto, 'Texas Exes Call Participant', $message);

?>