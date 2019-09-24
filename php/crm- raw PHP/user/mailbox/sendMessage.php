<?php
require_once ('../../functions.php');
$from=$_POST['from'];
$to=$_POST['recepient'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$messageQuery=queryMysql("insert into message (subject,message,receiver,sender) values ('$subject','$message','$to','$from')");
	if($messageQuery)
	{
		echo <<< script
		<script>location.replace('inbox.php')</script>
script;
	}
	else
	{
		echo "<div class='alert alert-info' role='alert'>Your message was not successfully sent.</div>";
		echo "<div class='alert alert-info' role='alert'>Try again <a href='mail_compose.php'>here</a></div>";
	}
?>