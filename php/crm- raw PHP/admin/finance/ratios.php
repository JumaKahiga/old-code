<?php
include ('../../functions.php');
$grossProfit;$netProfit;$totalCosts;$totalRevenue;$totalExpenses;$netAssets;$netLiabilities;$netEquity;
if (isset($_POST['date']))
{
	$date=$_POST['date'];
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
                        <li>
                            <a href="reports.php">Reports</a>
                        </li>
                        <li class="active">
                            <strong>Financial ratios</strong>
                        </li>
                    </ol>
                </div>
            </div>            
                <!-----Content goes here---->
                      <div class="row">
                        <h3 align="center">Margin Analysis</h3>
                        <?php marginRatios($date); ?>

                      </div> 
                      <div class="row">
                        <h3 align="center">Profitability Ratios</h3>
                        <?php profitRatios($date); ?>

                      </div>
                      <div class="row">
                        <h3 align="center">Liquidity Ratios</h3>
                        <?php liquidityRatios($date); ?>

                      </div>
                      <div class="row">
                        <h3 align="center">Leverage Ratios</h3>
                        <?php leverageRatios($date); ?>

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
        <!-- Mainly scripts -->
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
</body>
</html>
<?php
}
else
{
	echo <<<script
    <script>location.replace('reports.php')</script>
script;
}
function marginRatios($date)
{
    global $grossProfit;global $netProfit; global $totalCosts; global $totalRevenue; global $totalExpenses;
    $salesQuery="SELECT sum(amount) as 'amount' from transactions where transaction='Debit' and category='Sales' and YEAR(date)='$date'";
    $purchasesQuery="SELECT sum(amount) as 'amount' from transactions where transaction='Credit' and category='Purchases' and YEAR(date)='$date'";
    $expensesQuery="SELECT sum(amount) as 'amount' FROM transactions WHERE transaction='Credit' and YEAR(date)='$date' and  category <> 'Purchases'";
    $revenue=queryMysql($salesQuery);
    $cost=queryMysql($purchasesQuery);
    $expenses=queryMysql($expensesQuery);
    $row=$revenue->fetch_assoc();
    $totalRevenue=$row['amount'];
    $row1=$cost->fetch_assoc();
    $totalCosts=$row1['amount'];
    $row2=$expenses->fetch_assoc();
    $totalExpenses=$row2['amount'];
    $grossProfit=$row['amount']-$row1['amount'];
    $grossProfitMargin=($grossProfit/$row['amount'])*100;
    $grossProfitMargin=round($grossProfitMargin,2);
    $netProfit=$grossProfit-$row2['amount'];
    $netProfitMargin=($netProfit/$row['amount'])*100;
    $netProfitMargin=round($netProfitMargin,2);
?>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Gross Profit</h5>
                                <h1 class="no-margins"><?php echo $grossProfit; ?> KShs</h1>
                                <div class="stat-percent font-bold text-navy"><?php echo $grossProfitMargin; ?>% <i class="fa fa-bolt"></i></div>
                                <small>Total gross profit</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h3>Gross Profit margin</h3>
                                <h2><?php echo $grossProfitMargin; ?>%</h2>
                                <div class="progress progress-mini">
                                    <div style="width: <?php echo $grossProfitMargin; ?>%;" class="progress-bar progress-bar-danger"></div>
                                </div>

                                <div class="m-t-sm small">Gross profit margin for the year <?php echo $date; ?></div>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Net Profit</h5>
                                <h1 class="no-margins"><?php echo $netProfit; ?> KShs</h1>
                                <div class="stat-percent font-bold text-navy"><?php echo $netProfitMargin; ?>% <i class="fa fa-bolt"></i></div>
                                <small>Total net profit</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h3>Net Profit margin</h3>
                                <h2><?php echo $netProfitMargin; ?>%</h2>
                                <div class="progress progress-mini">
                                    <div style="width: <?php echo $grossProfitMargin; ?>%;" class="progress-bar progress-bar-danger"></div>
                                </div>

                                <div class="m-t-sm small">Net profit margin for the year <?php echo $date; ?></div>
                            </div>
                        </div>
                    </div>
<?php
}
function profitRatios($date)
{
    global $netAssets; global $netEquity;
 $assets=queryMysql("select sum(amount) as 'amount' from assets where flag=0 and year(dateAcquired)<='$date'");
 $row=$assets->fetch_assoc();
 $netAssets=$row['amount'];
 global $netProfit;
 $returnOnAssets=$netAssets/$netProfit *100;
 $returnOnAssets=round($returnOnAssets,2);
 $liabilities=queryMysql("select sum(amount) as 'amount' from liabilities where flag=0 and year(dateAcquired)<='$date'");
 $row=$liabilities->fetch_assoc();
 $netEquity=$row['amount'];
 $returnOnEquity=$netEquity/$netProfit *100;
 $returnOnEquity=round($returnOnEquity,2);
 ?>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Net Value of all assets: </h5>
                                <h1 class="no-margins"><?php echo $netAssets; ?> KShs</h1>
                                <div class="stat-percent font-bold text-navy"><?php echo $returnOnAssets ?>% <i class="fa fa-bolt"></i></div>
                                <small>Asset value</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h3>Return on assets</h3>
                                <h2><?php echo $returnOnAssets; ?>%</h2>
                                <div class="progress progress-mini">
                                    <div style="width: <?php echo $returnOnAssets; ?>%;" class="progress-bar progress-bar-danger"></div>
                                </div>

                                <div class="m-t-sm small">Return on assets for the year <?php echo $date; ?></div>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Net Equity</h5>
                                <h1 class="no-margins"><?php echo $netEquity; ?> KShs</h1>
                                <div class="stat-percent font-bold text-navy"><?php echo $returnOnEquity; ?>% <i class="fa fa-bolt"></i></div>
                                <small>Total equity</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h3>Return on Equity</h3>
                                <h2><?php echo $returnOnEquity; ?>%</h2>
                                <div class="progress progress-mini">
                                    <div style="width: <?php echo $returnOnEquity; ?>%;" class="progress-bar progress-bar-danger"></div>
                                </div>

                                <div class="m-t-sm small">Return on equity for the year <?php echo $date; ?></div>
                            </div>
                        </div>
                    </div>
<?php
}
function liquidityRatios($date)
{
 $assets=queryMysql("select sum(amount) as 'amount' from assets where flag=0 and year(dateAcquired)<='$date' and type=0");
 $row=$assets->fetch_assoc();
 $netCurrentAssets=$row['amount'];
 $liabilities=queryMysql("select sum(amount) as 'amount' from liabilities where flag=0 and year(dateAcquired)<='$date' and type=0");
 $row=$liabilities->fetch_assoc();
 $netCurrentLiabilities=$row['amount'];
 $currentRatio=round(($netCurrentAssets/$netCurrentLiabilities),2);
 $workingCapital=$netCurrentAssets-$netCurrentLiabilities;
 ?>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Net current assets </h5>
                                <h1 class="no-margins"><?php echo $netCurrentAssets; ?> KShs</h1>
                                <small>Net Current Assets</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                       <div class="ibox">
                            <div class="ibox-content">
                                <h5>Net current liabilities </h5>
                                <h1 class="no-margins"><?php echo $netCurrentLiabilities; ?> KShs</h1>
                                <small>Net Current Liabilities</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Current Ratio</h5>
                                <h1 class="no-margins"><?php echo $currentRatio; ?> </h1>
                                <small>Current Ratio</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Working capital</h5>
                                <h1 class="no-margins"><?php echo $workingCapital; ?> </h1>
                                <small>Working capital</small>
                            </div>
                        </div>
                    </div>
<?php
}
function leverageRatios($date)
{
 global $netEquity; global $netAssets; global $netLiabilities;
 $liabilities=queryMysql("select sum(amount) as 'amount' from liabilities where flag=0 and year(dateAcquired)<='$date' and equity=0");
 $row=$liabilities->fetch_assoc();
 $netLiabilities=$row['amount'];
 $debtToAssets=round (($netLiabilities/$netAssets),2);
 $debtToEquity=round (($netLiabilities/$netEquity),2)
 ?>
<div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Debt to Assets</h5>
                                <h1 class="no-margins"><?php echo $debtToAssets; ?> </h1>
                                <small>Debt to Assets ratio</small>
                            </div>
                        </div>
                    </div>
<div class="col-lg-6">
                       <div class="ibox">
                            <div class="ibox-content">
                                <h5>Debt to equity</h5>
                                <h1 class="no-margins"><?php echo $debtToEquity; ?> </h1>
                                <small>Debt to equity ratio</small>
                            </div>
                        </div>
                    </div>
<?php
}
?>