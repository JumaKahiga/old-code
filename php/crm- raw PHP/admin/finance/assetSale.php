<?php
require_once ('../../functions.php');
$description=$_POST['description'];
$amount=$_POST['amount'];
$date=date('Y-m-d', strtotime($_POST['date']));
$time=time();
$sql="update assets set dateDisposed='$date',amountSold='$amount',dateDisposed='$date' and flag='1' where description='$description'";
$transactionsQuery="insert into transactions (description,amount,date,account,category,dateRecorded,transaction ) values ('$description','$amount','$date','Cash on Hand','Asset Sale','$time','Debit')";
$cashQuery="insert into cash (description,amount,date) values ('$description','$amount','$date')";
$updateQuery="update assets set amount=amount+$amount where description='Cash'";
queryMysql($sql);
queryMysql($transactionsQuery);
queryMysql($cashQuery);
queryMysql($updateQuery);
echo <<< script
		<script>location.replace('transactions.php')</script>
script;
?>