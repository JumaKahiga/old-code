<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Form Verify</title>
	</head>
	<body>
		<?php
		if(empty($_POST['feedname'])|| empty($_POST['feeddept']) || empty($_POST['feeddate']) ||
			empty($_POST['personalgrowth'])|| empty($_POST['leadership']) || empty($_POST['supervisor']) ||
			empty($_POST['rewarded']) || empty($_POST['valued']) || empty($_POST['positive']) ||
			empty($_POST['changesd']) || empty($_POST['solve']) || empty($_POST['overall']) || empty($_POST['productive']) ||
			empty($_POST['quotas'])|| empty($_POST['jobproduction']) || empty($_POST['beyond']) || empty($_POST['courteously']) ||
			empty($_POST['qualityservice']) || empty($_POST['goals']) || empty($_POST['adequate']) || empty($_POST['careeradvance']) ||
			empty($_POST['jobrequirements'])){
		echo "<script type='text/javascript'>
		alert('You have to fill all the contents to continue!!');
		</script>";
		echo "<br/>";
		echo "<a href='feedback.html'>PLEASE CONFIRM YOUR DETAILS</a>";
		exit;
		}
		?>
		<h2 style="text-decoration:blink;">Thank you <?php echo $_POST['feedname'];?>  for filling the survey. </h2>
		<!--Database code-->
		<?php
		include('database.php');
		if(isset($_POST['submit'])){
		$feedname= $_POST['feedname'];
		$feeddept= $_POST['feeddept'];
		$feeddate= $_POST['feeddate'];
		$personalgrowth= $_POST['personalgrowth'];
		$leadership= $_POST['leadership'];
		$supervisor= $_POST['supervisor'];
		$rewarded= $_POST['rewarded'];
		$valued= $_POST['valued'];
		$positive= $_POST['positive'];
		$changesd= $_POST['changesd'];
		$solve= $_POST['solve'];
		$overall= $_POST['overall'];
		$productive= $_POST['productive'];
		$quotas= $_POST['quotas'];
		$jobproduction= $_POST['jobproduction'];
		$beyond= $_POST['beyond'];
		$courteously= $_POST['courteously'];
		$qualityservice= $_POST['qualityservice'];
		$goals= $_POST['goals'];
		$adequate= $_POST['adequate'];
		$careeradvance= $_POST['careeradvance'];
		$jobrequirements= $_POST['jobrequirements'];
		try {
		$conn = new PDO("mysql:host=$servername;dbname=magnacrm", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql=" INSERT INTO feedback (feedname, feeddept, feeddate, personalgrowth, leadership, supervisor, rewarded, valued, positive, changesd, solve,
		overall, productive, quotas, jobproduction, beyond, courteously, qualityservice, goals, adequate, careeradvance, jobrequirements)
		VALUES('feedname', 'feeddept', 'feeddate', 'personalgrowth', 'leadership', 'supervisor', 'rewarded', 'valued', 'positive', 'changesd', 'solve',
		'overall', 'productive', 'quotas', 'jobproduction', 'beyond', 'courteously', 'qualityservice', 'goals', 'adequate', 'careeradvance', 'jobrequirements')";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully";
		echo "<a href='home.html'>Go Back</a>";
		}
		catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}}
		$conn = null;
		?>
	</body>
</html>