<?php
require_once('../../functions.php');
if (isset($_POST['date']))
{
	$date=$timestamp=date('Y-m-d', strtotime($_POST['date']));
	$assetQuery="select description,amount from assets where dateAcquired <= '$date' and flag=0 and type='1'";
	$assetQuery1="select description,amount from assets where dateAcquired <= '$date' and flag=0 and type='0'";
	$liabilityQuery="select description,amount from liabilities where dateAcquired <= '$date' and flag=0 and type='1'";
	$liabilityQuery1="select description,amount from liabilities where dateAcquired <= '$date' and flag=0 and type='0'";
	$currentAssets=queryMysql($assetQuery);
	$nonCurrentAssets=queryMysql($assetQuery1);
	$currentLiabilities=queryMysql($liabilityQuery);
	$nonCurrentLiabilities=queryMysql($liabilityQuery1);
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
                <div class="col-md-12">
                      <?php
                      balanceSheet($currentAssets,$nonCurrentAssets,$currentLiabilities,$nonCurrentLiabilities);
                      ?>
                </div>
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
		echo <<< script
		<script>
		<script>location.replace('reports.php')</script>
		</script>
script;
}
function balanceSheet($currentAssets,$nonCurrentAssets,$currentLiabilities,$nonCurrentLiabilities)
{
	$assetsTotal=$currentTotal=$nonCurrentTotal=$liabilitiesTotal=$currentLiability=$nonCurrentLiability=0;
    echo "<h2>Balance sheet</h2>";
	if ($nonCurrentAssets->num_rows > 0) 
	 {
	 	echo "<h3>Non current assets</h3>";
	 	echo "<table class='table table-hover'><tr><th>Description</th><th>Amount</th></tr>";
	 	while($row = $nonCurrentAssets->fetch_assoc())
	 	{
	 		$nonCurrentTotal+=$row['amount'];
	 		echo "<tr><td>".$row['description']."</td><td>".$row['amount']."</td></tr>";  
	 	}
	 	echo "<tr><th>Total </th><th>$nonCurrentTotal</th></tr>";
	 	echo "</table>";

	 }
	 else
	 {
	 	echo "<div class='alert alert-info' role='alert'>There are no Non-current assets recorded yet</div>";
	 }
	 if ($currentAssets->num_rows > 0) 
	 {
	 	echo "<h3>Current assets</h3>";
	 	echo "<table class='table table-hover'><tr><th>Description</th><th>Amount</th></tr>";
	 	while($row = $currentAssets->fetch_assoc())
	 	{
	 		$currentTotal+=$row['amount'];
	 		echo "<tr><td>".$row['description']."</td><td>".$row['amount']."</td></tr>";  
	 	}
        echo "<tr><th>Total </th><th>$currentTotal</th></tr>";
	 	echo "</table>";
	 }
	 else
	 {
	 	echo "<div class='alert alert-info' role='alert'>There are no current assets recorded yet</div>";
	 }
	 $assets=$currentTotal+$nonCurrentTotal;
	 if ($nonCurrentLiabilities->num_rows > 0) 
	 {
        echo "<h3>Non-Current Liabilities</h3>";
	 	echo "<table class='table table-hover'><tr><th>Description</th><th>Amount</th></tr>";
	 	while($row = $nonCurrentLiabilities->fetch_assoc())
	 	{
	 		$nonCurrentLiability+=$row['amount'];
	 		echo "<tr><td>".$row['description']."</td><td>".$row['amount']."</td></tr>";  
	 	}
         echo "<tr><th>Total </th><th>$nonCurrentLiability</th></tr>";
	 	echo "</table>";

	 }
	 else
	 {
	 	echo "<div class='alert alert-info' role='alert'>There are no Non-Current liabilities yet </div>";
	 }
	 if ($currentLiabilities->num_rows > 0) 
	 {
          echo "<h3>Current Liabilities</h3>";
	 	echo "<table class='table table-hover'><tr><th>Description</th><th>Amount</th></tr>";
	 	while($row = $currentLiabilities->fetch_assoc())
	 	{
	 		$currentLiability+=$row['amount'];
	 		echo "<tr><td>".$row['description']."</td><td>".$row['amount']."</td></tr>";  
	 	}
         echo "<tr><th>Total </th><th>$currentLiability</th></tr>";
	 	echo "</table>";

	 }
	 else
	 {
	 	echo "<div class='alert alert-info' role='alert'>There are no current liabilities recorded yet</div>";
	 }
	 $liabilitiesTotal=$currentLiability+$nonCurrentLiability;
}
?>