<?php
require_once('../../functions.php');
if (isset($_GET['no']))
{
    $no=$_GET['no'];
    $id=$_GET['unitId'];
    echo $no. " ". $id;
    /*
    $query=queryMysql("update unitemployees set status=1 where employeeNo='$no' and unitId='$id'");
      if($query)
        {
        $error="<div class='alert alert-success fade-in'>The operation was successful</div>";
        }
        else
        {
        $error="<div class='alert alert-warning fade-in'>The operation was not successful. Please try again</div>";
        }
        */
}
?>