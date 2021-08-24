<?php

if (isset($_POST['message'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$msg = 'New Message : 
			Name : '.$name.'
			Email : '.$email.'
			Phone : '.$phone.'
			Subject : '.$subject.'
			Message : '.$message.'';


	 $to = 'Startup@sky21.xyz';
	   $subject = '[New Message] From '.$name.' Contact - Sky21';
	   $headers = "From: ".$name." <".$email."> \r\n";
	   $send_email = mail($to,$subject,$msg,$headers);

	   echo ($send_email) ? 'success' : 'error';
}

?>