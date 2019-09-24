<?php
include ('functions.php');
if(isset($_SESSION['loggedIn']))
{
if($_SESSION['loggedIn']==True)
{
    if($_SESSION['level']==1)
    {
        reload("admin/index.php");

    }
    if($_SESSION['level']==0)
    {
        reload("user/index.php");

    }
}
else
{
    reload("logIn.php");
}
}
else
{
    reload("logIn.php");
}
?>