<?php
require_once('../../functions.php');
if (isset($_POST['description']))
{
	$description=$_POST['description'];
	$date=date('Y-m-d', strtotime($_POST['date']));
	$amount=$_POST['amount'];
	$type=$_POST['type'];
	$equity=$_POST['equity'];
	$time=time();
	$liabilityQuery="insert into liabilities (description,dateAcquired,amount,type,equity) values ('$description','$date','$amount','$type','$equity')";
	$transactionsQuery="insert into transactions (description,amount,date,account,category,dateRecorded,transaction ) values ('$description','$amount','$date','Cash on Hand','Asset Acquisition','$time','Debit')";
	$cashQuery="insert into cash (description,amount,date) values ('$description','$amount','$date')";
	$updateQuery="update assets set amount=amount+$amount where description='Cash'";
	queryMysql($liabilityQuery);
	queryMysql($transactionsQuery);
	queryMysql($cashQuery);
	queryMysql($updateQuery);
	echo <<< script
		<script>location.replace('transactions.php')</script>
script;
}
else
{
	echo <<< script
	<script>location.replace('transactions.php')</script>
script;
}
?>