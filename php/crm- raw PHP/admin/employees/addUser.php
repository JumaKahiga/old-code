<?php
include ('../../functions.php');
$success="";
if (isset($_POST['userEmail']))
{
     global $success;
    $email=$_POST['userEmail'];
    $name=$_POST['name']. " ". $_POST['surname'];
    $password=$_POST['password'];
    $password=md5($password.$email);
    $firstName=$_POST['name'];
    $surname=$_POST['surname'];
    $title=$_POST['position'];
    $department=$_POST['department'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $salary=$_POST['salary'];
    $level=$_POST['level'];
    $date=date('Y-m-d', strtotime($_POST['date']));
    $query=queryMysql("insert into users (email,password,name,level) values ('$email','$password','$name','$level')");
    if($query)
    {
        $no=queryMysql("select no from users where email='$email' and password='$password'");
        $employeeNo=$no->fetch_assoc();
        $employeeNo=$employeeNo['no'];
        if (queryMysql("insert into userDetails (name,surname,title,department,employeeNo,address,mobile,salary,dateEmployed) values ('$firstName','$surname','$title','$department','$employeeNo','$address','$mobile','$salary','$date')"))
         $success="Details for employee $name entered successfully.";
     else
     {
         $success="Details for employee $name were not entered successfully. Please try again";
     }
    }
    else
    {
        $success="Details for employee $name were not entered successfully. Please try again";
    }

}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nauphrgae CRM Admin || Add Employee</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">

</head>

<body>
    <?php noScript(); ?>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
     <?php adminMenu("../") ?>
    </nav>
            <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
<?php userHeader(); ?>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Project list</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Add Employees</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                <div class="alert alert-info"><?php echo $success; ?></div>
                <?php addUser(); ?>
                        
                <!-----Content goes here---->
            </div>
    <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>
<!-- Mainly scripts -->
    <?php script(); ?>
</body>
</html>
<?php
function script()
{
?>
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>
    <!-- Data picker -->
   <script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Steps -->
    <script src="../js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>
    <script>
        $(document).ready(function(){

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });


    </script>
<?php
}
function addUser()
{
 ?>
 <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Add an employee</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Fill in employee details
                            </h2>
                            <p>
                                To add an employee complete the steps below.
                            </p>

                            <form id="form" method="post" action="addUser.php" class="wizard-big">
                                <h1>Account</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="userEmail" type="email" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Profile</h1>
                                <fieldset>
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Other names *</label>
                                                <input id="name" name="name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Surname *</label>
                                                <input id="surname" name="surname" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Department*</label>
                                                <select class="form-control required" name="department">
                                                <?php 
                                                $results=queryMysql("select department from departments");

                                                while ($row=$results->fetch_assoc())
                                                {
                                                    $option=$row['department'];
                                                    echo "<option>$option</option>";

                                                }

                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Position*</label>
                                                <input id="address" name="position" type="text" class="form-control required">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Employee details</h1>
                                <fieldset>
                                    <div class="form-group">
                                                <label>Enter address: *</label>
                                                <input  name="address" type="text" class="form-control required">
                                            </div>
                                        <div class="form-group">
                                            <label>Enter mobile number *</label>
                                            <input  name="mobile" type="text" class="form-control required">
                                        </div>
                                    <div class="form-group">
                                                <label>Enter monthly salary: *</label>
                                                <input id="salary" name="salary" type="text" class="form-control required">
                                            </div>
                                </fieldset>
                                <h1>Finish</h1>
                                <fieldset>
                                    <div class="form-group">
                                                <label>Admin user? *</label>
                                                <input type="radio" name="level" value="1" class="required">Yes  
                                                <input type="radio" name="level" value="0" checked class="required">No
                                            </div>
                                <div class="form-group" id="data_1"><label class="font-noraml">Date</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                            </div></div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
 <?php   
}
?>