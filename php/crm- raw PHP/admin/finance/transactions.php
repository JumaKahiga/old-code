<?php
require_once('../../functions.php');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Financial transactions</title>

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
                        <li class="active">
                            <strong>Finance</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Daily</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php 
                                $result=queryMysql("select sum(amount) as 'Total' from transactions where date=CURRENT_DATE and transaction='debit'");
                                if($result->num_rows > 0)
                                {
                                    $row=$result->fetch_assoc();
                                    if($row['Total']==null)
                                    {
                                        echo "0 Kshs";
                                    }
                                    else
                                    {
                                        echo $row['Total']. " Kshs";
                                    }
                                }

                                ?></h1>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Daily</span>
                                <h5>Expenses</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php 
                                $result=queryMysql("select sum(amount) as 'Total' from transactions where date=CURRENT_DATE and transaction='credit'");
                                if($result->num_rows > 0)
                                {
                                    $row=$result->fetch_assoc();
                                    if($row['Total']==null)
                                    {
                                        echo "0 Kshs";
                                    }
                                    else
                                    {
                                        echo $row['Total']. " Kshs";
                                    }
                                }

                                ?></h1>
                                <small>Total expenses</small>
                            </div>
                        </div>
                    </div>
        </div>

                <!-----Content goes here---->
                        <?php addExpense(); ?>
                         <?php addIncome(); ?>
                         <?php addAsset(); ?>
                         <?php addLiability(); ?>
                <!-----Content goes here---->
            </div>
            <div class="row">

                <!-----Content goes here---->
                        <?php disposeAsset(); ?>
                        <?php disposeLiability(); ?>
                <!-----Content goes here---->
            </div>
            <div class="row">
                 <?php displayTransactions(); ?>
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
function addExpense()
{
    ?>
             <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Expense<small>  Record a transaction</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-forms">Add Expense</a>
                            </div>
                            <div id="modal-forms" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Expense</h3>

                                                    <p>Record a transaction here: </p>

                                                    <form role="form" method="post" action="addExpense.php">
                                                        <div class="form-group"><label>Description</label> <input type="text" placeholder="Enter a description of the transaction" name="description" class="form-control" required></div>
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Date</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <div class="form-group"><label>Category</label> 
                                                        <select name="category" class="form-control">
                                                            <optgroup label="ALL">    
                                                            <option value="all">All Transactions</option>    
                                                            <option value="categorized">All Categorized</option>    
                                                            <option value="uncategorized">All Uncategorized</option>    
                                                            </optgroup>
                                                            <optgroup label="EXPENSE">    
                                                            <option value="Accounting Fees">Accounting Fees</option> 
                                                            <option value="Brand optimisation">Brand optimisation</option> 
                                                            <option value="CSR">CSR</option> 
                                                            <option value="Purchases">Purchases</option>   
                                                            <option value="Advertising and Promotion">Advertising &amp; Promotion</option>    
                                                            <option value="Bank Service Charges">Bank Service Charges</option>    
                                                            <option value="Computer – Hardware">Computer – Hardware</option>    
                                                            <option value="Computer – Hosting">Computer – Hosting</option>    
                                                            <option value="Computer – Internet">Computer – Internet</option>    
                                                            <option value="Computer – Software">Computer – Software</option>    
                                                            <option value="Dues and Subscriptions">Dues &amp; Subscriptions</option>    
                                                            <option value="Education and Training">Education &amp; Training</option>    
                                                            <option value="Insurance – General Liability">Insurance – General Liability</option>    
                                                            <option value="Insurance – Vehicles">Insurance – Vehicles</option>    
                                                            <option value="Interest Expense">Interest Expense</option>    
                                                            <option value="Meals and Entertainment">Meals and Entertainment</option>    
                                                            <option value="Office Supplies">Office Supplies</option>    
                                                            <option value="Payroll – Employee Benefits">Payroll – Employee Benefits</option>    
                                                            <option value="Payroll – Employer's Share of Benefits">Payroll – Employer's Share of Benefits</option>    
                                                            <option value="Payroll – Salary and Wages">Payroll – Salary &amp; Wages</option>    
                                                            <option value="Professional Fees">Professional Fees</option>    
                                                            <option value="Rent Expense">Rent Expense</option>    
                                                            <option value="Repairs and Maintenance">Repairs &amp; Maintenance</option>    
                                                            <option value="Telephone – Land Line">Telephone – Land Line</option>    
                                                            <option value="Telephone – Wireless">Telephone – Wireless</option>    
                                                            <option value="Travel Expense">Travel Expense</option>    
                                                            <option value="Uncategorized Expense">Uncategorized Expense</option>    
                                                            <option value="Utilities">Utilities</option>    
                                                            <option value="Vehicle – Fuel">Vehicle – Fuel</option>    
                                                            <option value="Vehicle – Repairs and Maintenance">Vehicle – Repairs &amp; Maintenance</option>    
                                                            </optgroup>
                                                            <optgroup label="INCOME">    
                                                            <option value="Consulting Income">Consulting Income</option>    
                                                            <option value="Sales">Sales</option>    
                                                            <option value="Uncategorized Income">Uncategorized Income</option>    
                                                            </optgroup>
                                                            <optgroup label="EQUITY">
                                                            <option value="Owner Investment / Drawings">Owner Investment / Drawings</option>
                                                            <option value="Owner's Equity">Owner's Equity</option>
                                                            </optgroup>
                                                        </select>
                                                        </div>
                                                        <div class="form-group"><label>Account</label>
                                                            <select name="account" class="form-control">
                                                            <optgroup label="ASSET">
                                                            <option value="Cash on Hand">Cash on Hand</option>    
                                                            </optgroup>
                                                            <optgroup label="EQUITY">    
                                                            <option value="Owner Investment / Drawings">Owner Investment / Drawings</option>    
                                                            </optgroup>
                                                            </select> 
                                                        </div>
                                                         <div class="form-group"><label>Type</label>
                                                            <select name="type" class="form-control">
                                                            <optgroup label="Assets">
                                                            <option value="Current Assets">Current Assets</option>
                                                            <option value="Non-current assets">Non-current assets</option>    
                                                            </optgroup>
                                                            <optgroup label="Liability">    
                                                            <option value="Current Liabilities">Current Liabilities</option> 
                                                            <option value="Non-Current Liabilities">Non-Current Liabilities</option>   
                                                            </optgroup>
                                                            </select> 
                                                        </div>
                                                        <input type="hidden" name="transaction" value="Credit">
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Add expense</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
function addIncome()
{
    ?>
             <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Income<small>  Record a transaction</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add Income</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Expense</h3>

                                                    <p>Record a transaction here: </p>

                                                    <form role="form" method="post" action="addIncome.php">
                                                        <div class="form-group"><label>Description</label> <input type="text" placeholder="Enter a description of the transaction" name="description" class="form-control" required></div>
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Date</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <div class="form-group"><label>Category</label> 
                                                        <select name="category" class="form-control">
                                                            <optgroup label="ALL">    
                                                            <option value="all">All Transactions</option>    
                                                            <option value="categorized">All Categorized</option>    
                                                            <option value="uncategorized">All Uncategorized</option>    
                                                            </optgroup>
                                                            <optgroup label="EXPENSE">    
                                                            <option value="Accounting Fees">Accounting Fees</option> 
                                                            <option value="Purchases">Purchases</option>   
                                                            <option value="Advertising and Promotion">Advertising &amp; Promotion</option>    
                                                            <option value="Bank Service Charges">Bank Service Charges</option>  
                                                             <option value="Brand optimisation">Brand optimisation</option> 
                                                            <option value="CSR">CSR</option>  
                                                            <option value="Computer – Hardware">Computer – Hardware</option>    
                                                            <option value="Computer – Hosting">Computer – Hosting</option>    
                                                            <option value="Computer – Internet">Computer – Internet</option>    
                                                            <option value="Computer – Software">Computer – Software</option>    
                                                            <option value="Dues and Subscriptions">Dues &amp; Subscriptions</option>    
                                                            <option value="Education and Training">Education &amp; Training</option>    
                                                            <option value="Insurance – General Liability">Insurance – General Liability</option>    
                                                            <option value="Insurance – Vehicles">Insurance – Vehicles</option>    
                                                            <option value="Interest Expense">Interest Expense</option>    
                                                            <option value="Meals and Entertainment">Meals and Entertainment</option>    
                                                            <option value="Office Supplies">Office Supplies</option>    
                                                            <option value="Payroll – Employee Benefits">Payroll – Employee Benefits</option>    
                                                            <option value="Payroll – Employer's Share of Benefits">Payroll – Employer's Share of Benefits</option>    
                                                            <option value="Payroll – Salary and Wages">Payroll – Salary &amp; Wages</option>    
                                                            <option value="Professional Fees">Professional Fees</option>    
                                                            <option value="Rent Expense">Rent Expense</option>    
                                                            <option value="Repairs and Maintenance">Repairs &amp; Maintenance</option>    
                                                            <option value="Telephone – Land Line">Telephone – Land Line</option>    
                                                            <option value="Telephone – Wireless">Telephone – Wireless</option>    
                                                            <option value="Travel Expense">Travel Expense</option>    
                                                            <option value="Uncategorized Expense">Uncategorized Expense</option>    
                                                            <option value="Utilities">Utilities</option>    
                                                            <option value="Vehicle – Fuel">Vehicle – Fuel</option>    
                                                            <option value="Vehicle – Repairs and Maintenance">Vehicle – Repairs &amp; Maintenance</option>    
                                                            </optgroup>
                                                            <optgroup label="INCOME">    
                                                            <option value="Consulting Income">Consulting Income</option>    
                                                            <option value="Sales">Sales</option>    
                                                            <option value="Uncategorized Income">Uncategorized Income</option>    
                                                            </optgroup>
                                                            <optgroup label="EQUITY">
                                                            <option value="Owner Investment / Drawings">Owner Investment / Drawings</option>
                                                            <option value="Owner's Equity">Owner's Equity</option>
                                                            </optgroup>
                                                        </select>
                                                        </div>
                                                        <div class="form-group"><label>Account</label>
                                                            <select name="account" class="form-control">
                                                            <optgroup label="ASSET">
                                                            <option value="Cash on Hand">Cash on Hand</option>    
                                                            </optgroup>
                                                            <optgroup label="EQUITY">    
                                                            <option value="Owner Investment / Drawings">Owner Investment / Drawings</option>    
                                                            </optgroup>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group"><label>Type</label>
                                                            <select name="type" class="form-control">
                                                            <optgroup label="Assets">
                                                            <option value="Current Assets">Current Assets</option>
                                                            <option value="Non-current assets">Non-current assets</option>    
                                                            </optgroup>
                                                            <optgroup label="Liability">    
                                                            <option value="Current Liabilities">Current Liabilities</option> 
                                                            <option value="Non-Current Liabilities">Non-Current Liabilities</option>   
                                                            </optgroup>
                                                            </select> 
                                                        </div>
                                                        <input type="hidden" name="transaction" value="Debit">
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Add income</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
function addAsset()
{
    ?>
             <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add an Asset<small>  Record a transaction</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-asset">Add an Asset</a>
                            </div>
                            <div id="modal-asset" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add an Asset</h3>

                                                    <p>Enter details here: </p>

                                                    <form role="form" method="post" action="asset.php">
                                                        <div class="form-group"><label>Description</label> <input type="text" placeholder="Enter a description of the transaction" name="description" class="form-control" required></div>
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Acquisition Date:</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <div class="form-group"><label>Type of asset:</label> 
                                                        <select name="type" class="form-control">    
                                                            <option value="0">Current Assets</option>    
                                                            <option value="1">Non-current Assets</option>
                                                        </select>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Add Asset</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
function addLiability()
{
    ?>
 <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add a liability<small>  Record a transaction</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-liability">Add a liability</a>
                            </div>
                            <div id="modal-liability" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Liability</h3>

                                                    <p>Enter details here: </p>

                                                    <form role="form" method="post" action="liability.php">
                                                        <div class="form-group"><label>Description</label> <input type="text" placeholder="Enter a description of the transaction" name="description" class="form-control" required></div>
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Acquisition Date:</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <div class="form-group"><label>Type of asset:</label> 
                                                        <select name="type" class="form-control">    
                                                            <option value="0">Current Liability</option>    
                                                            <option value="1">Non-current Liability</option>
                                                        </select>
                                                        </div>
                                                        <div class="form-group"><label>Affect Owners Equity</label> 
                                                        <select name="equity" class="form-control">    
                                                            <option value="0">No</option>    
                                                            <option value="1">Yes</option>
                                                        </select>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Add Liability</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
function disposeAsset()
{
    ?>
 <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Dispose assets<small>  Record sales of assets</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-sale">Dispose Asset</a>
                            </div>
                            <div id="modal-sale" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Record sale</h3>

                                                    <p>Enter details here: </p>

                                                                <?php
                                                                $query="select description from assets where flag=0 and description!='Cash'";
                                                                $results=queryMysql($query);
                                                                if ($results->num_rows >0)
                                                                {
                                                                    echo <<<form
                                                                <form role="form" method="post" action="assetSale.php">
                                                                <div class="form-group"><label>Choose asset</label> 
                                                                <select name="description" class="form-control">
form;
                                                                 while ($row=$results->fetch_assoc())
                                                                 {
                                                                    $description=$row['description'];
                                                                    echo "<option>$description</option>";
                                                                 }
                                                                echo "</select></div>";

                                                                }
                                                                else
                                                                {
                                                                    echo "<input class='form-control' value='There are no assets to dispose yet'>";
                                                                }
                                                                ?>
                                                            
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Disposal Date:</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Dispose asset</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
}
function disposeLiability()
{
?>
 <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Dispose Liabilities <small>  Record disposal of assets</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-liabilitySale">Dispose Liability</a>
                            </div>
                            <div id="modal-liabilitySale" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Record liability</h3>

                                                    <p>Enter details here: </p>

                                                                <?php
                                                                $query="select description from liabilities where flag=0";
                                                                $results=queryMysql($query);
                                                                if ($results->num_rows >0)
                                                                {
                                                                    echo <<<form
                                                                <form role="form" method="post" action="liabilitySale.php">
                                                                <div class="form-group"><label>Choose asset</label> 
                                                                <select class="form-control" name="description">
form;
                                                                 while ($row=$results->fetch_assoc())
                                                                 {
                                                                    $description=$row['description'];
                                                                    echo "<option>$description</option>";
                                                                 }
                                                                echo "</select></div>";

                                                                }
                                                                else
                                                                {
                                                                    echo "<input class='form-control' value='There are no liabilities to dispose yet'>";
                                                                }
                                                                ?>
                                                            
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Disposal Date:</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Dispose Liability</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
function displayTransactions()
{
?>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Transactions</h5>
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
       $query="select description,date,amount,dateRecorded,transaction from transactions order by timeRecorded desc";
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                       <th>Expense</th>
                        <th>Income</th>
                        <th>Description</th>
                        <th>Transaction date</th>
                        <th>Timestamp</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                if($row['transaction']=="Credit")
                {
                $timestamp=date('M jS \'y g:ia', $row['dateRecorded']);
                echo "<tr class='gradeX'><td>-".$row['amount']."</td><td>-</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$timestamp."</td></tr>";
                }
                 if($row['transaction']=="Debit")
                {
                 $timestamp=date('M jS \'y g:ia', $row['dateRecorded']);
                echo "<tr class='gradeA'><td>-</td><td>".$row['amount']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$timestamp."</td></tr>";
                }

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                         <th>Expense</th>
                        <th>Income</th>
                        <th>Description</th>
                        <th>Transaction date</th>
                        <th>Timestamp</th>
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