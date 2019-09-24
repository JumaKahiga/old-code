<?php
require_once ("../../functions.php");
$item=$_POST['name'];
$projectId=$_POST['projectId'];
$amount=$_POST['amount'];
$description=$_POST['description'];
$milestone=$_POST['milestone'];
if(queryMysql("insert into projectCosts (projectId,milestoneId,item,description,amount) values ('$projectId','$milestone','$item','$description','$amount')"))
	echo "<script>location.replace('getProject.php?id=$projectId')</script>";
	else
		echo "please try again";
?>