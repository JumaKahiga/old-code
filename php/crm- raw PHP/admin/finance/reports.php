<?php
require_once('../../functions.php');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Financial reports</title>

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
                            <strong>Reports</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                <div class="container-fluid">
                 <div class="row">
                <div class="col-md-6">
                    <h3>View Balance Sheet</h3>
                    <form method="post" action="balanceSheet.php">
                    <div class="form-group" id="data_1">
                    <label class="font-noraml">Balance Sheet as at:</label>
                    <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"><strong>Generate balance sheet</strong></button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h3>View Income Statement</h3>
                    <form method="post" action="incomeStatement.php">
                    <div class="form-group" id="data_1">
                    <label class="font-noraml">Income statement for the year:</label>
                    <div>
                    <input type="number" name="date" class="form-control" placeholder="Enter the year" required>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"><strong>View Income statement</strong></button>
                    </form>
                </div>
                
                  </div>  
                  <div class="row">
                    <div class="col-md-6">
                    <h3>Assets and Liabilities Report</h3>
                    <form method="post" action="assetsLiabilitiesReport.php">
                    <div class="form-group" id="data_1">
                    <label class="font-noraml">Assets and reports:</label>
                    <div>
                    <input type="number" name="date" class="form-control" placeholder="Enter the year" required>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"><strong>View Assets and Liabilities</strong></button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>View Cash flow statement</h3>
                    <form method="post" action="cashFlowStatement.php">
                    <div class="form-group" id="data_1">
                    <label class="font-noraml">Cash flow for the year:</label>
                    <div>
                    <input type="number" name="date" class="form-control" placeholder="Enter the year" required>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"><strong>View Cash Flow statement</strong></button>
                    </form>
                </div>
                  </div>   
                <div class="row">
                    <div class="col-md-6">
                    <h3>Business Ratios</h3>
                    <form method="post" action="ratios.php">
                    <div class="form-group" id="data_1">
                    <label class="font-noraml">choose the year:</label>
                    <div>
                    <input type="number" name="date" class="form-control" placeholder="Enter the year" required>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"><strong>Generate ratios</strong></button>
                    </form>
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
        <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

     <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

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