<?php
include ('../../functions.php');
if (isset($_POST['description']))
{
	$description=$_POST['description'];
	$date=date('Y-m-d', strtotime($_POST['date']));
	$amount=$_POST['amount'];
	$type=$_POST['type'];
	$time=time();
	$assetsQuery="insert into assets (description,dateAcquired,amount,type) values ('$description','$date','$amount','$type')";
	$transactionsQuery="insert into transactions (description,amount,date,account,category,dateRecorded,transaction ) values ('$description','$amount','$date','Cash on Hand','Asset Acquisition','$time','Credit')";
	$cashQuery="insert into cash (description,amount,date) values ('$description','-$amount','$date')";
	$updateQuery="update assets set amount=amount-$amount where description='Cash'";
	queryMysql($assetsQuery);
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