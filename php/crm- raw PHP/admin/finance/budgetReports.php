<?php
include ('../../functions.php');
$dates=$months=$years=$categorys=$items="";
$results=FALSE;
$sql="SELECT id, month, time, category, item, estimated_qty, estimated_price FROM expenses";
if(isset($_POST['date']))
{
	$dates=date('Y-m-d', strtotime($_POST['date']));
	$results=TRUE;
}
if(isset($_POST['month']))
{
	$months=date('m', strtotime($_POST['month']));
	$results=TRUE;
}
if(isset($_POST['year']))
{
	$years=$_POST['year'];
	$results=TRUE;
}
if(isset($_POST['category']))
{
    $categorys=$_POST['category'];
    $results=TRUE;
}
if(isset($_POST['item']))
{
    $items=$_POST['item'];
    $results=TRUE;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Budget Reports</title>

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
                    <h2>Budget</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Finance</a>
                        </li>
                        <li class="active">
                            <strong>Budget Reports</strong>
                        </li>
                    </ol>
                </div>
            </div>
           

                <!-----Content goes here---->
                 <div class="row">
                <div class="col-md-4">
                	<h4>Budget by Day</h4>
                	<form role="form" method="post" action="budgetreports.php">
					<div class="form-group" id="data_1">
					<div class="input-group date">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/05/2015" required>
					</div></div>
					<button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                	</form>
                </div>
                <div class="col-md-4">
                	<h4>Budget by Month</h4>
                	<form role="form" method="post" action="budgetreports.php">
					<div class="form-group" id="data_4">
					<div class="input-group date">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="month" class="form-control" value="07/01/2015">
					</div>
					</div>
					<button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                	</form>
                </div>
                <div class="col-md-4">
                	<h4>Budget by Year</h4>
                	<form role="form" method="post" action="budgetreports.php">
					<div class="form-group"><!--label>Year</label--> <input type="number" placeholder="Enter year" name="year" min="2000" max="2020" class="form-control" required></div>
					<button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                	</form>
                </div>
                
                <div class="col-md-4">
                    <h4>Budget by Category</h4>
                    <form role="form" method="post" action="budgetreports.php">
                    <div class="form-group">
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
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>
                <div class="col-md-4">
                    <h4>Budget by Item</h4>
                    <form role="form" method="post" action="budgetreports.php">
                    <div class="form-group"><input type="text" name="item"  placeholder="Enter item" class="form-control"></div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>

                </div>
                <div class="row">
                	<?php
                    if($dates!="")
                    {
                         $sql="SELECT id, month, time, category, item, estimated_qty, estimated_price FROM expenses WHERE time='$dates'";
                    }
                        
                    if($months!="")
                    $sql="SELECT id, month, time, category, item, estimated_qty, estimated_price FROM expenses WHERE month='$months'";
                   if($years!="")
                    $sql="SELECT id, month, time, category, item, estimated_qty, estimated_price FROM expenses WHERE year(time)='$years'";
                   if($categorys!="")
                    $sql="SELECT id, month, time, category, item, estimated_qty, estimated_price FROM expenses WHERE category='$categorys'";
                   if($items!="")
                   {

                     $sql="SELECT id, month, time, category, item, estimated_qty, estimated_price FROM expenses WHERE item LIKE '$items'";
                   }
                                       
                if(isset($sql))
                {
                    displayBudget($sql); 
                }
                     
                     ?>
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
       $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

    </script>
<?php
}
function displayBudget($query)
{
?>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales</h5>
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
                        <th>ID</th>
                        <th>Month</th>
                        <th>Date Recorded</th>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Estimated Qty</th>
                        <th>Estimated Price</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                
                echo "<tr class='gradeX'><td>".$row['id']."</td><td>".$row['month']."</td><td>".$row['time']."</td><td>".$row['category']."</td><td>".$row['item']."</td><td>".$row['estimated_qty']."</td><td>".$row['estimated_price']."</td></tr>";
                

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Month</th>
                        <th>Date Recorded</th>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Estimated Qty</th>
                        <th>Estimated Price</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>No leads were found within the specified parameters</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>