<?php
include ('../../functions.php');
$date=$month=$year="";
$results=FALSE;
if(isset($_POST['date']))
{
    $date=date('Y-m-d', strtotime($_POST['date']));
    $results=TRUE;
}
if(isset($_POST['month']))
{
    $month=date('m', strtotime($_POST['month']));
    $results=TRUE;
}
if(isset($_POST['year']))
{
    $year=$_POST['year'];
    $results=TRUE;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Projects</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="../css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="../css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

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
                            <a href="../index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Employee Payroll</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                       <div class="col-md-4">
                    <h4>Payroll reports by day</h4>
                    <form role="form" method="post" action="payrollReports.php">
                    <div class="form-group" id="data_1"><label>Date</label>
                    <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                    </div></div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>
                <div class="col-md-4">
                    <h4>Payroll reports by month</h4>
                    <form role="form" method="post" action="payrollReports.php">
                    <div class="form-group" id="data_4">
                    <label class="font-noraml">Month</label>
                    <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="month" class="form-control" value="07/01/2015">
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>
                <div class="col-md-4">
                    <h4>Payroll reports by year</h4>
                    <form role="form" method="post" action="payrollReports.php">
                    <div class="form-group"><label>Year</label> <input type="number" placeholder="Enter year" name="year" min="2000" max="2020" class="form-control" required></div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>
                </div>
                <div class="row">
                    <?php
                    if($date!="")
                    $sql="select employeeNumber,salary,bonus,total,timeProcessed from payroll where status=1 and DATE(date)='$date';";
                    if($month!="")
                    $sql="select employeeNumber,salary,bonus,total,timeProcessed from payroll where status=1 and month(date)='$month';";
                   if($year!="")
                    $sql="select employeeNumber,salary,bonus,total,timeProcessed from payroll where status=1 and year(date)='$year';";
                if(isset($sql))
                     displayEmployees($sql); 
                     ?>
                </div>

                <!-----Content goes here---->
                <div class="row">
                    <br/>
                <?php
                if(isset($error))
                    echo $error;
                if(isset($sql))
                     $query=queryMysql($sql);
                 else
                $query=queryMysql("select sum(total) as 'total' from payroll where status=1");
                $row=$query->fetch_assoc();
                if($row['total']==null)
                    $salary=0;
                else
                $salary=$row['total'];

                ?>
                 <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Total amount paid</h5>
                                <h1 class="no-margins"><?php echo $salary; ?> KShs</h1>
                                <div class="stat-percent font-bold text-navy"><?php echo $salary; ?>% <i class="fa fa-bolt"></i></div>
                                <small>Total amount already paid</small>
                            </div>
                        </div>
                    </div>
                <?php
                if(isset($sql))
                 {}
                 else 
                    displayEmployees("select employeeNumber,salary,bonus,total,timeProcessed from payroll where status=1;");
                ?>
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
    <script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

     <!-- Data picker -->
   <script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Data Tables -->
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="../js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="../js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <script>
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true)

                // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

                simpleLoad(btn, false)
            });
        });

         $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "../js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });


        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Loading");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Refresh");
                }, 2000);
            }
        }
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
function displayEmployees($query)
{
    ?>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Past records</h5>
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
                    
        <?php 
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                       <th>Employee number</th>
                        <th>Salary</th>
                        <th>Bonus</th>
                        <th>Total</th>
                        <th>Time processed</th>
                       
                    </tr>
                    </thead>
                    <tbody>
    <?php
         
         while($row = $result->fetch_assoc())
            {
               
                $time= $timestamp=date('M jS \'y g:ia', $row['timeProcessed']);
                echo "<tr class='gradeX'><td>".$row['employeeNumber']."</td><td>".$row['salary']."</td><td>".$row['bonus']."</td><td>".$row['total']."</td><td>$time</td></tr>";

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                     <th>Employee number</th>
                        <th>Salary</th>
                        <th>Bonus</th>
                        <th>Total</th>
                        <th>Time processed</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no transactions yet</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>