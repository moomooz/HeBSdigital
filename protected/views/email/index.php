<?php
/* @var $this EmailController */

//set subject line, message and header
$subject = "Web Application";
$message = "No message";
$header = 'From: Noreply <noreply@example.com>' . "\r\n";

?>

<center>
<?php

//Send mail out. Returns true if mail was sent and false if mail sending failed
if(mail($email,$subject, $message, $header)){
	echo  "Email sent as: <br><br><br><br>" .
	"To: " . $email . "<br>" .
	$header . "<br>" .
	"Subject: " . $subject . "<br>" .
	"Message: " . $message;
}
else{
	echo "Sending email failed...";
}
?>
</center>