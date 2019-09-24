<?php
$servername = "localhost";
$username = "magnaForte";
$password = "magnaForte";
$dbname = "nauphrageCRM";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// create a variable
$month=$_POST['month'];
$category= $_POST['category'];
$item= $_POST['item'];
$estimated_qty= $_POST['estimated_qty'];
$estimated_price= $_POST['estimated_price'];
 
//Execute the query
 
 
mysqli_query($conn,"INSERT INTO expenses (month,category,item,estimated_qty, estimated_price)
		        VALUES ('$month','$category','$item','$estimated_qty', '$estimated_price')");
				
	if(mysqli_affected_rows($conn) > 0){
	echo "<a href= 'budget.php' >Go Back</a>";
} else {
	echo "Budget item not added<br/>";
	echo mysqli_error ($conn);
}


// Close connection
mysqli_close($conn);

echo "<script>location.replace('budget.php')</script>";
?>
