<?php
$servername= "localhost";
$username= "magnaForte";
$password= "magnaForte";
$dbname = "nauphragecrm";

//Create Connection
$conn= mysqli_connect($servername, $username, $password, $dbname);

// Check connetion
if (!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

//Variables to collect input fields
$name=$_POST['invoiceName'];
$id=$_POST['projectId'];
$clientNo= $_POST['clientNo'];
$item1= $_POST['item1'];
$itemprice1= $_POST['itemprice1'];
$item2= $_POST['item2'];
$itemprice2= $_POST['itemprice2'];
$item3= $_POST['item3'];
$itemprice3= $_POST['itemprice3'];
$item4= $_POST['item4'];
$itemprice4= $_POST['itemprice4'];
$item5= $_POST['item5'];
$itemprice5= $_POST['itemprice5'];
$item6= $_POST['item6'];
$itemprice6= $_POST['itemprice6'];
$time=time();
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];




//Tufanye hii query sasa

mysqli_query($conn, "INSERT INTO invoices (name,projectId,clientNo, startDate, endDate, timeRecorded, item1, itemprice1, item2, itemprice2, item3, itemprice3, item4, itemprice4, item5, itemprice5, item6, itemprice6)
                  VALUES ('$name','$id','$clientNo', '$startDate', '$endDate','$time','$item1', '$itemprice1', '$item2', '$itemprice2', '$item3', '$itemprice3', '$item4', '$itemprice4', '$item5', '$itemprice5', '$item6', '$itemprice6')");


        if(mysqli_affected_rows($conn) > 0){
        echo "<script>location.replace('getProject.php?id=$id&&hjhjh=dfdsf')</script>";
        } else {
          echo "Project not created";
          echo mysqli_error($conn);
        }

//Funga hiyo maneno ya connection


$query=mysqli_query($conn, "select invoiceNo from invoices where timeRecorded='$time'");
$row=$query->fetch_assoc();
$invoiceNo=$row['invoiceNo'];

if(isset($_GET['clientNo']))
{
    $clientNo=$_GET['clientNo'];
}

echo "<script>location.replace('getProject.php?id=$id&&hjhjh=dfdsf')</script>";

?>