<?php
$dbhost = ''; 
$dbname = ''; 
$dbuser = ''; 
$dbpass = ''; 
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
sessionStart();
//ini_set('session.gc_maxlifetime', 60 * 60 * 0.5);
if ($connection->connect_error) die($connection->connect_error);


function queryMysql($query)
{
global $connection;
$result = $connection->query($query);
if (!$result) die($connection->error);
return $result;
}
function closeDB()
{
	global $connection;
	$connection->close();
}
function sessionStart()
{
session_start();
}
function createTable($name, $query)
{
if (tableExists($name))
{
echo "Table '$name' already exists<br />";
}
else
{
queryMysql("CREATE TABLE $name($query)");
echo "Table '$name' created<br />";
}
}
function tableExists($name)
{
$result = queryMysql("SHOW TABLES LIKE '$name'");
return mysql_num_rows($result);
}
function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();
closeDB();
}
function sanitizeString($var)
{
global $connection;
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
return $connection->real_escape_string($var);
}


function processQuery($query)
{
    
    $result=queryMysql($query);
    return $result;
    
}

function longdate($timestamp)
{
return date("l F jS Y", $timestamp);
}
?>