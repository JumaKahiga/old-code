<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_admin = "localhost";
$database_admin = "nauphrageCRM";
$username_admin = "magnaForte";
$password_admin = "magnaForte";
$admin = mysql_pconnect($hostname_admin, $username_admin, $password_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>