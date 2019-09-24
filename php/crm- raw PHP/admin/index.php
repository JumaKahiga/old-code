<?php
require_once('../functions.php');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Projects</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

</head>

<body>
    <?php noScript(); ?>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
     <?php adminMenu("") ?>
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
                            <strong>Welcome <?php echo $_SESSION['userName']; ?> Admin</strong>
                        </li>
                    </ol>
                </div>
            </div>
                <!-----Content goes here---->
                 <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <?php 
                                $department=$_SESSION['department'];
                                $level=$_SESSION['level'];
                                $month=date('m',time());
                                $query=queryMysql("select sum(amount) as sum from sales where MONTH(date)='".$month."'");
                                if($query->num_rows > 0)
                                {
                                    $row=$query->fetch_assoc();
                                    echo "<h1 class='no-margins'>".$row['sum']."</h1>";
                                }
                                else
                                    echo "<h1 class='no-margins'>0</h1>"
                                ?>
                                
                                
                                <small>Monthly income</small>
                            </div>
                        </div>
                    </div>
                       <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Departmental Expenses</h5>
                            </div>
                            <div class="ibox-content">
                                <?php 
                                $month=date('m',time());
                                if($level==1)
                                {
                                     if($department=="Finance")
                                        $querys="select sum(amount) as sum from transactions where MONTH(date)='".$month."' and transaction='credit' or category = 'Accounting Fees' OR category='Payroll- Employee Benefits' OR category='Bank Service Charges' OR category='CSR' OR category='Interest Expense' OR category='Utilities' OR category='Rent Expense' OR category='Vehicle-Repairs and Maintenance' OR category='Insurance- General Liability' OR category='Insurance- Vehicles' OR category='Repairs and Maintenance'";
                                     if($department=="Human Resource")
                                        $querys="select sum(amount) as sum from transactions where MONTH(date)='".$month."' and transaction='credit' or category = 'Education and Training' OR category='Meals and Entertainment' OR category='Payroll- Employee Benefits' OR category='Payroll- Salary and Wages' OR category='Office Supplies'";
                                     if($department=="IT")
                                        $querys="select sum(amount) as sum from transactions where MONTH(date)='".$month."' and transaction='credit'
                                OR category='Computer- Hardware'
                                OR category='Computer- Hosting'
                                OR category='Computer- Internet'
                                OR category='Computer- Software'
                                OR category='Dues and Subscriptions'
                                OR category='Professional Fees'
                                OR category='Telephone- Land Line'
                                OR category='Telephone - Wireless'
                                OR category='Vehicle-Fuel'";
                                     if($department=="Creatives")
                                        $querys="select sum(amount) as sum from transactions where MONTH(date)='".$month."' and transaction='credit' or category= 'Brand Development'
                                OR category='Purchases'
                                OR category='Computer- Hardware'
                                OR category='Computer- Hosting'
                                OR category='Computer- Internet'
                                OR category='Computer- Software'
                                OR category='Dues and Subscriptions'
                                OR category='Professional Fees'
                                OR category='Telephone- Land Line'
                                OR category='Telephone - Wireless'
                                OR category='Vehicle-Fuel'";
                                     if($department=="Sales")
                                        $querys="select sum(amount) as sum from transactions where MONTH(date)='".$month."' and transaction='credit' or category = 'Advertising and Promotion' OR category= 'Travel Expense'";
                                    $query=queryMysql($querys);

                                }
                                else 
                                $query=queryMysql("select sum(amount) as sum from transactions where MONTH(date)='".$month."' and transaction='credit'");
                                if($query->num_rows > 0)
                                {
                                    $row=$query->fetch_assoc();
                                    echo "<h1 class='no-margins'>".$row['sum']."</h1>";
                                }
                                else
                                    echo "<h1 class='no-margins'>0</h1>"
                                ?>
                                
                                
                                <small>Monthly expenses</small>
                            </div>
                        </div>
                    </div>
                                       <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Daily</span>
                                <h5>Active users</h5>
                            </div>
                            <div class="ibox-content">
                                <?php 
                                $date=date('Y-m-d',time());
                                $query=queryMysql("select count(tablelog.employeeNo) as count from tablelog,userdetails where date='$date' and tablelog.employeeNo=userdetails.employeeNo and department='$department'");
                                if($query->num_rows > 0)
                                {
                                    $row=$query->fetch_assoc();
                                    echo "<h1 class='no-margins'>".$row['count']."</h1>";
                                }
                                else
                                    echo "<h1 class='no-margins'>0</h1>"
                                ?>
                                
                                
                                <small>Daily active users</small>
                            </div>
                        </div>
                    </div>
                             <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Active Projects</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $month=date('m',time());
                                $query=queryMysql("select count(project_id) as sum from project_data where status<>100");
                                if($query->num_rows > 0)
                                {
                                    $row=$query->fetch_assoc();
                                    echo "<h1 class='no-margins'>".$row['sum']."</h1>";
                                }
                                else
                                    echo "<h1 class='no-margins'>0</h1>"
                                ?>
                                
                                
                                <small>Active Projects</small>
                            </div>
                        </div>
                    </div>
                </div>   

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Expenses versus Income</h5>
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
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart-multi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                     <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Messages</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><i class="fa fa-envelope-o"></i> New messages</h3>                                
                                    <?php
                                    $user=$_SESSION['email'];
                                    $query=queryMysql("select message.no,subject,name as 'sender',logtime,status from message,users where users.email=receiver and receiver='$user' and status=0 order by logtime");
                                    if($query->num_rows > 0)
                                    {
                                        echo "<small><i class='fa fa-tim'> You have ".$query->num_rows." new messages</small>";
                                    ?>
                                </i>
                            </div>
                            <div class="ibox-content">
                                 <div class="feed-activity-list">
                                <?php
                                while ($row=$query->fetch_assoc())
                                {?>
                                     <div class="feed-element">
                                        <div>
                                            <strong><?php echo $row['name']?></strong>
                                            <div><?php echo $row['subject']?></div>
                                            <small class="text-muted"><?php echo $row['logtime']?></small>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                </div>
                                <?php
                                    }
                                    else 
                                        echo "<div class='alert alert-info'>You have no messages yet.</div>"
                                    ?>

                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>User project list</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <?php
                                        $query=queryMysql("select status,project_start,name,project_name from project_data,users where projectmanager=no and status <> 100");
                                        if($query->num_rows > 0)
                                        {?>
                                      <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Rate</th>
                                                <th>Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                        while ($row=$query->fetch_assoc())
                                        {


                                        ?>
                                            <tr>
                                            <td><small>Pending...</small></td>
                                            <td><i class="fa fa-clock-o"></i><?php echo $row['project_start']?></td>
                                            <td><?php echo $row['name']?></td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> <?php echo $row['status']?>% </td>
                                            <td><?php echo $row['project_name']?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                        </table>

                                        <?php }
                                        else
                                        {
                                            echo "<div class='alert alert-info>There are no active projects yet</div>";
                                        }
                                        ?>

                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Notice board</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <?php
                                        $query=queryMysql("select notice from noticeBoard where status=0");
                                        if($query->num_rows > 0)
                                        {?>
                                            <ul class="todo-list m-t small-list">
                                                <?php
                                            while($row=$query->fetch_assoc())
                                            {?>
                                                <li>
                                                <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                                <span class="m-l-xs"><?php echo $row['notice'] ?></span>
                                                </li>
                                            <?php
                                            }
                                            echo "</ul>";

                                        }
                                        else
                                        {
                                        ?>
                                       <ul class="todo-list m-t small-list">
                                        <li>
                                                <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                                <span class="m-l-xs todo-completed">There are no notices yet</span>
                                                </li>
                                        </ul>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Project distribution</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div>
                                        <canvas id="barChart" height="140"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                <!-----Content goes here---->
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
<script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

     <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>
     <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

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
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
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
            var barData = {
        <?php
        $query=queryMysql("select category,count(project_name) as count from project_data group by category");
        ?>
        labels: [
        <?php
        while ($row=$query->fetch_assoc())
        {
            echo "'".$row['category']."',";
        }
        ?>
        ],
        datasets: [
            {
                label: "Project distribution",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [
                  <?php
        $query=queryMysql("select category,count(project_name) as count from project_data group by category");
        while ($row=$query->fetch_assoc())
        {
            echo $row['count'].",";
        }
        ?>]
            },
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);
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
        //Flot Multiple Axes Line Chart
$(function() {
    var income = [
    <?php
    $query=queryMysql("select sum(amount) as amount,unix_timestamp (date)*1000 as time from transactions where transaction='Debit' group by time");
    while($row=$query->fetch_assoc())
    {
        $time=$row['time'];
        $amount=$row['amount'];
        echo "[$time,$amount],";
    }
    ?>
      ];
    var expenses = [
     <?php
    $query=queryMysql("select sum(amount) as amount,unix_timestamp (date)*1000 as time from transactions where transaction='Credit' group by time");
    while($row=$query->fetch_assoc())
    {
        $time=$row['time'];
        $amount=$row['amount'];
        echo "[$time,$amount],";
    }
    ?>
    ];

    function euroFormatter(v, axis) {
        return v.toFixed(axis.tickDecimals) + "Kshs";
    }

    function doPlot(position) {
        $.plot($("#flot-line-chart-multi"), [{
            data: income,
            label: "Income (Kshs)"
        }, {
            data: expenses,
            label: "Expenses (Kshs)",
            yaxis: 2
        }], {
            xaxes: [{
                mode: 'time'
            }],
            yaxes: [{
                min: 0
            }, {
                // align if we are to the right
                alignTicksWithAxis: position == "right" ? 1 : null,
                position: position,
                tickFormatter: euroFormatter
            }],
            legend: {
                position: 'sw'
            },
            colors: ["#1ab394"],
            grid: {
                color: "#999999",
                hoverable: true,
                clickable: true,
                tickColor: "#D4D4D4",
                borderWidth:0,
                hoverable: true //IMPORTANT! this is needed for tooltip to work,

            },
            tooltip: true,
            tooltipOpts: {
                content: "%s for %x was %y",
                xDateFormat: "%y-%0m-%0d",

                onHover: function(flotItem, $tooltipEl) {
                    // console.log(flotItem, $tooltipEl);
                }
            }

        });
    }

    doPlot("right");

    $("button").click(function() {
        doPlot($(this).text());
    });
});

        });


    </script>
<?php
}
?>