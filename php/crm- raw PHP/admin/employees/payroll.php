<?php
include ('../../functions.php');
if(isset($_POST['salary']))
{
    $time=time();
    $no=$_POST['no'];
    $salary=$_POST['salary'];
    if($_POST['bonus']!="")
        $bonus=$_POST['bonus'];
    else
        $bonus=0;
    $total=$bonus+$salary;
    $month=$_POST['month'];
    $year=$_POST['year'];
    if(queryMysql("insert into payroll (employeeNumber,salary,bonus,total,month,year,timeProcessed) values ('$no','$salary','$bonus','$total','$month','$year','$time')"))
        $error="<div class='alert alert-info'>The operation was successful</div>";
    else
       $error="<div class='alert alert-warning'>The operation was not successful</div>";

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

                <!-----Content goes here---->
                <?php
                if(isset($error))
                    echo $error;
                ?>
                <?php displayEmployees(); ?>
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
function displayEmployees()
{
    ?>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Active employees</h5>
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
        $year=date('Y');
         $month=date('M');
       $query="select employeeNo,name,department,userDetails.salary from userDetails where userDetails.status=1";
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                       <th>Employee name</th>
                        <th>Department</th>
                        <th>Employee salary</th>
                        <th>Bonus (if any)</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Process</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         
         while($row = $result->fetch_assoc())
            {
                $check=queryMysql("select employeeNumber from payroll where employeeNumber='".$row['employeeNo']."' and month='$month' and year='$year'");
                if($check->num_rows>0)
                {

                }
                else
                echo "<tr class='gradeX'><td>".$row['name']."</td><td>".$row['department']."</td><td><form method='post' action='payroll.php'><input type='hidden' name='no' value='".$row['employeeNo']."'><input name='salary' value='".$row['salary']."'></td><td><input name='bonus' placeholder='Enter bonus if any'></td><td><input name='month' value='".$month."' readonly></td><td><input name='year' value='".$year."' readonly></td><td><input class='btn btn-default btn-xs' value='Process salary' type='submit'></form></td></tr>";

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Employee name</th>
                        <th>Department</th>
                        <th>Employee salary</th>
                        <th>Bonus (if any)</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Process</th>
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