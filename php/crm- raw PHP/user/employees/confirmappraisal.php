<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Form Verify</title>
	</head>
	<body>
		<?php
		if(empty($_POST['namesfull'])|| empty($_POST['department']) || empty($_POST['datepicker']) || 
			empty($_POST['jobdesc'])|| empty($_POST['actionplan']) || empty($_POST['skillrange']) || 
			empty($_POST['opportunities']) || empty($_POST['improvement']) || empty($_POST['accomplishments']) ||
			 empty($_POST['difficulties']) || empty($_POST['dobest']) || empty($_POST['doless']) || empty($_POST['difficultywith']) || 
			 empty($_POST['failenjoy'])|| empty($_POST['aptitudes']) || empty($_POST['performance']) || empty($_POST['aob'])){
		echo "<script type='text/javascript'>
		alert('You have to fill all the contents to continue!!');
		</script>";
		echo "<br/>";
		echo "<a href='appraisal.html'>PLEASE CONFIRM YOUR DETAILS</a>";
		exit;
		}
		?>
		<h2 style="text-decoration:blink;">Thank you <?php echo $_POST['namesfull'];?>  for the feedback. </h2>

		<!--Mail sending code-->
<?php
$recipient = "kchrismucheke@gmail.com";
$subject = "Contents of the Self Appraisal Form."; 
$name= $_POST['namesfull'];
$department= $_POST['department'];
$datepicker= $_POST['datepicker'];
$jobdesc= $_POST['jobdesc'];
$actionplan= $_POST['actionplan'];
$skillrange= $_POST['skillrange'];
$opportunities= $_POST['opportunities'];
$improvement= $_POST['improvement'];
$accomplishments= $_POST['accomplishments'];
$difficulties= $_POST['difficulties'];
$dobest= $_POST['dobest'];
$doless= $_POST['doless'];
$difficultywith= $_POST['difficultywith'];
$failenjoy= $_POST['failenjoy'];
$aptitudes= $_POST['aptitudes'];
$performance= $_POST['performance'];
$aob= $_POST['aob'];



$msg = "<b>Message from</b>: $name\n\n 
		<b>Department</b/>: $department\n\n
		<b>Date of Appraisal</b>: $datepicker\n\n 
		<b>1. Do you have an up-to-date job description?</b>: $jobdesc\n\n 
		<b>2. Do you have an up-to-date action plan? </b>: $actionplan\n\n 
		<b>3. On a scale of 1 to 10, how well matched do you feel are the tasks assigned to you and your skills/proficiency?</b>: $skillrange\n\n 
		<b>4. Do you have regular opportunities to discuss  your work, and action plans?</b>: $opportunities\n\n 
		<b>5. Have you carried out the improvements agreed  with your manager which were made at the last appropriate meeting? </b>: $improvement\n\n 
		<b>6. What have you accomplished, over and above the minimum requirements of your job description, in the period 
		under review (consider the early part of the period as well as more recent events)? Have you made any innovations?</b>: $accomplishments \n\n 
		<b>7. List any difficulties you have in carrying out your work. Were  there any obstacles outside your own control which prevented you from
		 performing effectively?</b>: $difficulties\n\n 
		<b>8. What parts of your job, do you do best</b>: $dobest\n\n
		<b>9. What parts of your job, do you do less well </b>: $doless\n\n
		<b>10. What parts of your job, do you have difficulty with</b>: $difficultywith\n\n 
		<b>11. What parts of your job, do you fail to enjoy</b>: $failenjoy\n\n 
		<b>12. Have you any skills, aptitudes, or knowledge not fully utilised in  your job? If so, what are they and how could they be used?</b>: $aptitudes\n\n 
		<b>13. Can you suggest training which would help to improve your performance or development?</b>: $performance\n\n
		<b>14. Additional remarks, notes, questions, or suggestions </b> : $aob .";
//if (mail($recipient, $subject, $msg))
//echo "Thank You. Your Feedback has been sent appreciated.";
//else
//echo "Failed to send";
?>


<!--Input to Database-->
<?php
include('database.php');

if(isset($_POST['Submit'])){

$named= $_POST['namesfull'];
$department= $_POST['department'];
$datepicker= $_POST['datepicker'];
$jobdesc= $_POST['jobdesc'];
$actionplan= $_POST['actionplan'];
$skillrange= $_POST['skillrange'];
$opportunities= $_POST['opportunities'];
$improvement= $_POST['improvement'];
$accomplishments= $_POST['accomplishments'];
$difficulties= $_POST['difficulties'];
$dobest= $_POST['dobest'];
$doless= $_POST['doless'];
$difficultywith= $_POST['difficultywith'];
$failenjoy= $_POST['failenjoy'];
$aptitudes= $_POST['aptitudes'];
$performance= $_POST['performance'];
$aob= $_POST['aob'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql=" INSERT INTO appraisal (namesfull, department, datepicker, jobdesc, actionplan, skillrange, opportunities, improvement, accomplishments, difficulties, dobest, doless, difficultywith, failenjoy, aptitudes, performance, aob)
VALUES('$named', '$department', '$datepicker', '$jobdesc', '$actionplan', '$skillrange', '$opportunities', '$improvement', '$accomplishments', '$difficulties', '$dobest', '$doless', '$difficultywith', '$failenjoy', '$aptitudes', '$performance', '$aob') "; 
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