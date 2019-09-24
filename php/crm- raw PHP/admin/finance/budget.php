<?php
include ('../../functions.php');
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
                            <a href="index.php">Home</a>
                        </li>
                         <li>
                            <a href="transactions.php">Finance</a>
                        </li>
                        <li class="active">
                            <strong>Budgets</strong>
                        </li>
                    </ol>
                </div>
            </div>

                <!-----Content goes here---->
                            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Annual</span>
                                <h5>Budget</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $mwaka = "SELECT SUM(estimated_price) FROM expenses";
                                $jibu=queryMysql($mwaka);
                                while ($row = $jibu->fetch_assoc()) {
                                echo "<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-success'>98% <i class='fa fa-bolt'></i></div>";
                                echo "<small>Total budget</small>";

                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Monthly</span>
                                <h5>Budget</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $mwezi ="SELECT SUM(estimated_price) FROM expenses WHERE MONTH(STR_TO_DATE(month,'%M'))=month(now())";
                                $jibu2= queryMysql($mwezi);
                                while ($row=$jibu2->fetch_assoc()){
                                echo "<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-danger'>38% <i class='fa fa-level-down'></i></div>";
                                //echo "<small>In August</small>";
                            }
                            ?>
                            </div>
                        </div>
            </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Monthly</span>
                                <h5>Sales Budget</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $sellme = "SELECT SUM(estimated_price) FROM expenses WHERE MONTH(STR_TO_DATE(month,'%M'))=month(now()) AND category = 'Advertising and Promotion' OR category= 'Travel Expense'";
                                $muuzaji=queryMysql($sellme);
                                while($row=$muuzaji->fetch_assoc()){
                                echo "<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-info'>20% <i class='fa fa-level-up'></i></div>";
                                echo "<small>Departmental</small>";
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Monthly</span>
                                <h5>HR Budget</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $hr = "SELECT SUM(estimated_price) FROM expenses WHERE MONTH(STR_TO_DATE(month,'%M'))=month(now()) AND category = 'Education and Training' 
                                OR category='Meals and Entertainment'
                                OR category='Payroll- Employee Benefits'
                                OR category='Payroll- Salary and Wages'
                                OR category='Office Supplies'";
                                $mfanyikazi=queryMysql($hr);
                                while($row=$mfanyikazi->fetch_assoc()){
                                echo "<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-navy'>44% <i class='fa fa-level-up'></i></div>";
                                echo "<small>Departmental</small>";
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Monthly</span>
                                <h5>Finance Budget</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $pesa = "SELECT SUM(estimated_price) FROM expenses WHERE MONTH(STR_TO_DATE(month,'%M'))=month(now()) AND category = 'Accounting Fees' 
                                OR category='Payroll- Employee Benefits'
                                OR category='Bank Service Charges'
                                OR category='CSR'
                                OR category='Interest Expense'
                                OR category='Utilities'
                                OR category='Rent Expense'
                                OR category='Vehicle-Repairs and Maintenance'
                                OR category='Insurance- General Liability'
                                OR category='Insurance- Vehicles'
                                OR category='Repairs and Maintenance'";
                                $mtupesa=queryMysql($pesa);
                                while($row=$mtupesa->fetch_assoc()){
                                echo"<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-navy'>44% <i class='fa fa-level-up'></i></div>";
                                echo "<small>Departmental</small>";
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Monthly</span>
                                <h5>Creatives Budget</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $ujanja= "SELECT SUM(estimated_price) FROM expenses WHERE MONTH(STR_TO_DATE(month,'%M'))=month(now()) AND category= 'Brand Development'
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

                                $brander =queryMysql($ujanja);
                                while($row=$brander->fetch_assoc()){
                                echo "<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-danger'>38% <i class='fa fa-level-down'></i></div>";
                                echo "<small>Departmental</small>";
                            }
                                ?>
                            </div>
                        </div>
            </div>
            <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Monthly</span>
                                <h5>Petty Cash Allocation</h5>
                            </div>
                            <div class="ibox-content">
                                <?php
                                $petty= "SELECT SUM(estimated_price) FROM expenses WHERE category= 'Petty Cash'";
                                $mbesa =queryMysql($petty);
                                while($row=$mbesa->fetch_assoc()){
                                echo "<h1 class='no-margins'>".$row['SUM(estimated_price)']."</h1>";
                                echo "<div class='stat-percent font-bold text-danger'>38% <i class='fa fa-level-down'></i></div>";
                                echo "<small>Departmental</small>";
                            }
                                ?>
                            </div>
                            </div>
            </div>
            <div class="wrapper wrapper-content">
            <div class="row">
                    <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                    <div>
                                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br/>
                                            All sales: 162,862
                                        </span>
                                        <h1 class="m-b-xs">$ 50,992</h1>
                                        <h3 class="font-bold no-margins">
                                            Half-year revenue margin
                                        </h3>
                                        <small>Sales marketing.</small>
                                    </div>

                                <div>
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>

                                <div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on 16.07.2015
                                    </small>
                                   <small>
                                       <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                                   </small>
                                </div>
                            </div>

                            
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Budget Table</h5>
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
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add Budget Item</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Budget Item</h3>

                                                    <p>If you fail to plan you are planning to fail.</p>

                                                    <form method= "POST" action= "process.php">
                                                        <div class="form-group">
                                                        <label>Month</label>
                                                        <div class="input-group">
                                                            <select name="month" class="form-control">
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                        <label>Category</label>
                                                        <div class="input-group">
                                                        <select name="category" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Accounting Fees">Accounting Fees</option>
                                                        <option value="Purchases">Purchases</option>
                                                        <option value="Advertising and Promotion">Advertising and Promotion</option>
                                                        <option value="Bank Service Charges">Bank Service Charges</option>
                                                        <option value="Bank Service Charges">Brand Development</option>
                                                        <option value="Computer- Hardware">Computer- Hardware</option>
                                                        <option value="Computer- Hosting">Computer- Hosting</option>
                                                        <option value="Computer- Internet">Computer- Internet</option>
                                                        <option value="Computer- Software">Computer- Software</option>
                                                        <option value="CSR">CSR</option>
                                                        <option value="Dues and Subscriptions">Dues and Subscriptions</option>
                                                        <option value="Education and Training">Education and Training</option>
                                                        <option value="Insurance- General Liability">Insurance- General Liability</option>
                                                        <option value="Insurance- Vehicles">Insurance- Vehicles</option>
                                                        <option value="Interest Expense">Interest Expense</option>
                                                        <option value="Meals and Entertainment">Meals and Entertainment</option>
                                                        <option value="Office Supplies">Office Supplies</option>
                                                        <option value="Payroll- Employee Benefits">Payroll- Employee Benefits</option>
                                                        <option value="Payroll- Salary and Wages">Payroll- Salary and Wages</option>
                                                        <option value="Professional Fees">Professional Fees</option>
                                                        <option value="Rent Expense">Rent Expense</option>
                                                        <option value="Repairs and Maintenance">Repairs and Maintenance</option>
                                                        <option value="Telephone- Land Line">Telephone- Land Line</option>
                                                        <option value="Telephone - Wireless">Telephone - Wireless</option>
                                                        <option value="Travel Expense">Travel Expense</option>
                                                        <option value="Petty Cash">Petty Cash</option>
                                                        <option value="Utilities">Utilities</option>
                                                        <option value="Vehicle-Fuel">Vehicle-Fuel</option>
                                                        <option value="Vehicle-Repairs and Maintenance">Vehicle-Repairs and Maintenance</option>
                                                        

                                                        </select>
                                                        </div>
                                                    </div>
                                                        <div class="form-group"><label>Item</label> <input type="text" name="item"  placeholder="Enter item" class="form-control"></div>
                                                        <div class="input-group m-b"><span class="input-group-addon">Qty</span><input type="text" name="estimated_qty" class="form-control"> <span class="input-group-addon">.00</span></div>
                                                        <div class="input-group m-b"><span class="input-group-addon">Kes</span> <input type="text" name="estimated_price" class="form-control"> <span class="input-group-addon">.00</span></div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="Sent" value="submit" formaction="process.php"><strong>Submit Budget Item</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6"><h4>Put something motivating</h4>
                                                    <p>or a picture here:</p>
                                                    <p class="text-center">
                                                        <a href=""><i class="fa fa-calculator big-icon"></i></a>
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="ibox-content">

                    <div class="col-lg-4">
                        <div align= "center">
                                    <div class="panel panel-primary" style="width: 980px">
                                        <div class="panel-heading">
                                            Budget
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                    
                         
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Timestamp</th>
                        <th>Month</th>
                        <th>Category</th>
                        <th>Estimated Quantity</th>
                        <th>Estimated Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    

                    $sql = "SELECT * FROM expenses";
                   $result=queryMysql($sql);

               while ($row = $result->fetch_assoc()) {
                   echo "<tr class='gradeX'>";
                   echo "<td>".$row['id']."</td>";
                   echo "<td>".$row['time']."</td>";
                   echo "<td>".$row['month']."</td>";
                   echo "<td>".$row['category']."</td>";
                   echo "<td>".$row['estimated_qty']."</td>";
                   echo "<td>".$row['estimated_price']."</td>";
                   echo "</tr>";
             }
             ?>

                    </tbody>
                    </table>
                        </div>
                                        </div>
                                    </div>
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

     <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>
    <script src="../js/demo/chartjs-demo.js"></script>

        <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>
    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="../js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="../js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>

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
        <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>

    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });

            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });


        });
        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#range_slider").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
<?php
}
?>