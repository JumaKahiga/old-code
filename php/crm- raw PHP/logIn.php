<?php
include ('functions.php');
titleHeader("Nauphrage CRM || Log in");
if (isset($_POST['email']))
{
	
	$email=sanitizeString($_POST['email']);
	$password=sanitizeString($_POST['password']);
	$password=md5($password.$email);
	$results=queryMysql("select users.no,email,users.name,password,level,title,department from users,userDetails where email='$email' and password='$password' and users.no=userDetails.employeeNo");
	if($results->num_rows > 0)
	{
		$row=$results->fetch_assoc();
		$_SESSION['email']=$row['email'];
        $_SESSION['no']=$row['no'];
		$_SESSION['userName']=$row['name'];
		$_SESSION['level']=$row['level'];
        $_SESSION['department']=$row['department'];
        $_SESSION['title']=$row['title'];
        $_SESSION['loggedIn']=True;
        $no=$row['no'];
        $date=date('Y-m-d', time());
        $time=time();
        $check=queryMysql("select * from tablelog where date='$date' and employeeNo='$no'");
        if($check->num_rows > 0)
        {

        }
        else
        $query=queryMysql("insert into tableLog (date,employeeNo,start) values ('$date','$no','$time')");
		if ($row['level']==1)
		{
			echo <<< script
			<script>location.replace('admin/index.php');</script>
script;

		}
		if ($row['level']==0)
		{
			echo <<< script
			<script>location.replace('user/index.php');</script>

script;
			
		}

	}
	else
	{
         $_SESSION['loggedIn']=False;
		$errorMessage="You have entered a wrong email or password. Please try again";
		?>
		</head>

<body class="gray-bg">
<?php noScript();?>
<div class="wrapper"> 
    <div class="loginColumns animated fadeInDown">
    	<div class="alert alert-info"><?php echo $errorMessage; ?></div>
        <div class="row">
         
            <div class="col-md-6">
                <h2 class="font-bold">Nauphrage CRM+</h2>

                <p>
                    Log in to manage your work projects and communicate with your colleagues easily.
                </p>

                <p>
                    Nauphrage CRM is a system designed to ease common office tasks like communication, project management, payroll, human resource among others leaving you to the task of adding quality to your daily work. 
                </p>

                <p>
                    <small>Nauphrage CRM gives you a 360-degree view of your complete sales cycle and pipeline. Identify trends, spot opportunities, increase efficiency and reduce costs with the right answers, right now.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" method="post" action="logIn.php">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                    </form>
                    <p class="m-t">
                        <small>Nauphrage CRM developed with love by the team at MagnaForte :-) &copy; 2015</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                MagnaForte Enterprises Ltd.
            </div>
            <div class="col-md-6 text-right">
               <small>© 2015</small>
            </div>
        </div>
    </div>
</div>
</body>

</html>
		<?php
	}

}
else
{
?>

</head>

<body class="gray-bg">
<?php noScript();?>
<div class="wrapper"> 
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Nauphrage CRM+</h2>

                <p>
                    Log in to manage your work projects and communicate with your colleagues easily.
                </p>

                <p>
                    Nauphrage CRM is a system designed to ease common office tasks like communication, project management, payroll, human resource among others leaving you to the task of adding quality to your daily work. 
                </p>

                <p>
                    <small>Nauphrage CRM gives you a 360-degree view of your complete sales cycle and pipeline. Identify trends, spot opportunities, increase efficiency and reduce costs with the right answers, right now.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" method="post" action="logIn.php">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                    </form>
                    <p class="m-t">
                        <small>Nauphrage CRM developed with love by the team at MagnaForte :-) &copy; 2015</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                MagnaForte Enterprises Ltd.
            </div>
            <div class="col-md-6 text-right">
               <small>© 2015</small>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
}
?>