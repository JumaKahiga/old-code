<?php
include ('../../functions.php');
$error="";
$querys="select * from forecasts";
if(isset($_POST['estimated_qty']))
{
    
    $month=$_POST['month'];
    $item=$_POST['item'];
    $estimated_qty=$_POST['estimated_qty'];
    $estimated_price=$_POST['estimated_price'];
    $category=$_POST['category'];
    $year=date('Y',time());
    $query=queryMysql("insert into forecasts (month,item,quantity,price,category,year) values ('$month','$item','$estimated_qty','$estimated_price','$category','$year')");
    if($query)
    {
        $error="<div class='alert alert-info'>Data entry was successful</div>";
    }
    else
    {
        $error="<div class='alert alert-warning'>The action was unsuccessful. Please try again</div>";
    }
}
if (isset($_POST['year']))
{
	$month=$_POST['month'];
	$year=$_POST['year'];
	$querys="select * from forecasts where month='$month' and year='$year'";


}
if (isset($_POST['categorys']))
{
	$category=$_POST['categorys'];
	$querys="select * from forecasts where category='$category'";


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
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Campaigns</strong>
                        </li>
                    </ol>
                </div>
            </div>
                <!-----Content goes here---->
                <div class="row">
                <?php
                if($error!="")
                echo $error;
                ?>
                </div>
                <div class="row">
                                 <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Financial Forecast<small>  Record activity</small></h5>
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
                        	<br><br>
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-forms">Add Forecast</a>
                            </div>
                            <div id="modal-forms" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Item</h3>

                                                    <p>Record a transaction here: </p>

                                                    <form method= "POST" action= "forecasts.php">
                                                        <div class="form-group">
                                                        <label>Month</label>
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
                                                        <div class="form-group">
                                                        <label>Category</label>
                                                        <select name="category" class="form-control">
                                                        <option value="brand optimization">Brand optimization</option>
                                            <option value="social media">Social media</option>
                                            <option value="brand optimization">Brand optimization</option>
                                            <option value="web development">Web development</option>
                                            <option value="software development">Software development</option>
                                            <option value="app development">Mobile app development</option>
                                            <option value="business optimization">Business optimization</option>
                                            <option value="research">Research</option>
                                                        

                                                        </select>
                                                    </div>
                                                        <div class="form-group"><label>Item</label> <input type="text" name="item"  placeholder="Enter item" class="form-control"></div>
                                                        <div class="input-group m-b"><span class="input-group-addon">Qty</span><input type="text" name="estimated_qty" class="form-control"> <span class="input-group-addon">.00</span></div>
                                                        <div class="input-group m-b"><span class="input-group-addon">Kes</span> <input type="text" name="estimated_price" class="form-control"> <span class="input-group-addon">.00</span></div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="Sent" value="submit"><strong>Submit Forecast</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            	<div class="ibox">
            		<div class="ibox-title">
            			<h3>View Forecasts by month</h3>
            		</div>
            		<div class="ibox-content">
            			<br>
            			<br>
						<div class="text-center">
						<a data-toggle="modal" class="btn btn-primary" href="#modal-select">Choose by month</a>
						</div>
            	
            			                            <div id="modal-select" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r">
                                                			<form method="post" action="forecasts.php">
            				<div class="form-group">
            					<label>Select month</label>
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
            				<div class="form-group">
            					<label>Enter year</label>
            					<input type="number" name="year" placeholder="Enter year" class="form-control">
            				</div>
            				<button type="submit" class="btn btn-primary btn-block">View</button>
            			</form>

                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <br>
            		</div>
            	</div>
            </div>
                    <div class="col-lg-4">
            	<div class="ibox">
            		<div class="ibox-title">
            			<h3>View Forecasts by category</h3>
            		</div>
            		<div class="ibox-content">
            			<form method="post" action="forecasts.php">
            				<div class="form-group">
            					 <select name="categorys" class="form-control">
                                                        <option value="brand optimization">Brand optimization</option>
                                            <option value="social media">Social media</option>
                                            <option value="brand optimization">Brand optimization</option>
                                            <option value="web development">Web development</option>
                                            <option value="software development">Software development</option>
                                            <option value="app development">Mobile app development</option>
                                            <option value="business optimization">Business optimization</option>
                                            <option value="research">Research</option>
                                                        

                                                        </select>
            				</div>
            				<button type="submit" class="btn btn-primary btn-block">View</button>
            			</form>
            		</div>
            	</div>
            </div>
                </div>
                 <div class="row">
                    <?php
                        displayTransactions($querys);
                    ?>
                </div>
                <div>
                	<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Forecasts chart
                                <small>per month</small>
                            </h5>
                            <div ibox-tools></div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="lineChart" height="140"></canvas>
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
      <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

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
             var lineData = {
        labels: [
        <?php
        $year=date('Y',time());
        $chart=queryMysql("select month,sum(price) as sum from forecasts where year='$year' group by month order by MONTH(STR_TO_DATE(month,'%M'))");
        while($row=$chart->fetch_assoc())
        {
        	echo "'".$row['month']."',";
        }
        ?>
        ],
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [
                <?php
                $chart=queryMysql("select month,sum(price) as sum from forecasts where year='$year' group by month order by MONTH(STR_TO_DATE(month,'%M'))");
                while($new=$chart->fetch_assoc())
                {
                	echo $new['sum'].",";
                }
                ?>]
            }
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);



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
function displayTransactions($querys)
{
?>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Forecasts</h5>
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
       $result=queryMysql($querys);
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>    
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                
                echo "<tr class='gradeX'><td>".$row['item']."</td><td>".$row['quantity']."</td><td>".$row['price']."</td><td>".$row['month']."</td><td>".$row['year']."</td><td>".$row['category']."</td></tr>";
                

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Category</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no results yet</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>