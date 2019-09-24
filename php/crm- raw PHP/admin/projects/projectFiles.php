<?php
require_once("../../functions.php");
if(isset($_POST['name']))
{
	$projectId=$_POST['projectId'];
	$name=$_POST['name'];
if (isset($_FILES['documentation']['name']))
{
	$saveto = "documentation/".$name;
	
	$typeok = TRUE;
	switch($_FILES['documentation']['type'])
	{

		case "application/doc":$ext=".doc"; break;
		case "application/vnd.openxmlformats-officedocument.wordprocessingml.document": $ext=".docx"; break;
		case "application/pdf": $ext=".pdf"; break;
		case "application/msword":$ext=".doc"; break;
		default: $typeok = FALSE; break;
	}
	if($typeok)
	{
		$saveto=$saveto.$ext;
		move_uploaded_file($_FILES['documentation']['tmp_name'], $saveto);
		queryMysql("insert into projectDocuments (name,projectID,location) values ('$name','$projectId','$saveto')");
		echo "<script>location.replace('getProject.php?id=$projectId')</script>";
	}
	else
	{
		echo "An error occured. Press go back and try again";
	}
	
}
}
?>