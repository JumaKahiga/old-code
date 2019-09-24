<?php
require_once ('../../functions.php');
if (isset($_POST['date']))
{
	$date=$_POST['date'];
	$cash=getCurrentCash($date);
	$income=netIncome($date);
	$cashReceipts=cashReceipts($date);
	$salesReceipts=salesReceipts($date);
	$payroll=payroll($date);
	$assetPurchase=assetPurchase($date);
	$assetSale=assetSale($date);
	$dividend=dividend($date);
	$loanPayment=loanPayment($date);
	$netCash=$cash+$income+$cashReceipts-$salesReceipts-$payroll-$assetPurchase+$assetSale-$dividend-$loanPayment;
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
                            <strong>Balance Sheet</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                        <h2 align="center">Cash Flow statement for the year <?php echo $date; ?></h2>
                        <table class="table table hover table striped">
                        	<tr><th>Cash flow from operating activities</th><th>Amount</th></tr>
                        	<tr><th>Net Income</th><th><?php echo $income; ?></th></tr>
                        	<?php
                        	echo "<tr><td>Cash receipts from customers</td><td>$cashReceipts</td></tr>";
                        	echo "<tr><td>Cash paid to suppliers</td><td>($salesReceipts)</td></tr>";
                        	echo "<tr><td>Cash paid to employees</td><td>($payroll)</td></tr>";
                        	echo "<tr><th>Cash flow from investment activities</th><th>Amount</th></tr>";
                        	echo "<tr><td>Purchase of non-current assets</td><td>($assetPurchase)</td></tr>";
                        	echo "<tr><td>Sale of non-current assets</td><td>$assetSale</td></tr>";
                        	echo "<tr><th>Cash flow from financing activities</th><th>Amount</th></tr>";
                        	echo "<tr><td>Loan repayment</td><td>($loanPayment)</td></tr>";
                        	echo "<tr><tdIssuance of dividends</td><td>($dividend)</td></tr>";
                        	echo "<tr><th>Net increase/decrease in cash</th><th>Amount</th></tr>";
                        	echo "<tr><th>Cash at the beginning of the period</th><th>$cash</th></tr>";
                        	echo "<tr><th>Cash at the end of the period</th><th>$netCash</th></tr>";
                        	?>
                        	
                        </table>
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
	<script>
	location.replace('reports.php');
	</script>
script;
}
?>