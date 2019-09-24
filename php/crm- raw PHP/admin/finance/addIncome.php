<?php
require_once ('../../functions.php');
if (isset($_POST['description']))
{
	$description=$_POST['description'];
	$amount=$_POST['amount'];
	$date=date('Y-m-d', strtotime($_POST['date']));
	$category=$_POST['category'];
	$account=$_POST['account'];
	$account=$_POST['account'];
	$transaction=$_POST['transaction'];
	$type=$_POST['type'];
	$time = time();
	$sql="insert into transactions (description,amount,date,category, account,transaction,dateRecorded) values ('$description','$amount','$date','$category','$account','$transaction','$time')";
	$updateQuery="update assets set amount=amount+$amount where description='Cash'";
	$cashLedger="insert into cash (description,date,amount) values ('$description','$date','$amount')";
	if (queryMysql($sql))
	{
		queryMysql($updateQuery);
		queryMysql($cashLedger);
		echo <<< script
		<script>location.replace('transactions.php')</script>
script;
	}
	else
	{
		echo <<< script
		<script>
		alert("Data entry was not successful. Please try again.");
		<script>location.replace('transactions.php')</script>
		</script>
script;
	}
}
?>