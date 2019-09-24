<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_database = "localhost";
$database_database = " nauphragecrm";
$username_database = "magnaForte";
$password_database = "magnaForte";
$database = mysqli_connect($hostname_database, $username_database, $password_database) or trigger_error(mysql_error(),E_USER_ERROR); 
?>