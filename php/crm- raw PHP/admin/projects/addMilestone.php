<?php
include ('../../functions.php');
$projectId=$_POST['projectId'];
$deliverableId=$_POST['deliverableId'];
$name=$_POST['name'];
$description=$_POST['description'];
$startDate=date('Y-m-d', strtotime($_POST['start']));
$endDate=date('Y-m-d', strtotime($_POST['end']));
$users=$_POST['users'];
$time=time();
if($query=queryMysql("insert into milestones (projectId,deliverableId,name,description,startDate,endDate,timeProcessed) values ('$projectId','$deliverableId','$name','$description','$startDate','$endDate','$time')"))
{
	$result=queryMysql("select no from milestones where projectId='$projectId' and name='$name' and startDate='$startDate' and endDate='$endDate' and timeProcessed='$time'");
	$r=$result->fetch_assoc();
	$milestoneId=$r['no'];
	foreach ($users as $user)
	{
		queryMysql("insert into projectUsers (employeeNo,milestoneId,projectId) values ('$user','$milestoneId','$projectId')");
	}
	echo "<script>location.replace('getProject.php?id=$projectId')</script>";

}
?>