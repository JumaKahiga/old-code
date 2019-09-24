<?php
require_once ('../../functions.php');
if (isset($_POST['date']))
{
  $date=$_POST['date'];
  $assets=queryMysql("select description,dateAcquired as 'date' ,amount,type from assets where flag=0 and year(dateAcquired)<='$date'");
  $liabilities=queryMysql("select description,dateAcquired as 'date',amount,type from liabilities where flag=0 and year(dateAcquired)<='$date'");
  $disposedAssets=queryMysql("select description,dateAcquired as 'date',amount,amountsold, type from assets where flag=1 and year(dateAcquired)<='$date'");
  $disposedLiabilities=queryMysql("select description,dateAcquired as 'date',amount,amountsold, type from liabilities where flag=1 and year(dateAcquired)<='$date'");
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
                            <strong>Assets and Liabilities Reports</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
            	<h3 align="center">Current Assets and Liabilities </h3>

                <!-----Content goes here---->
                <?php 
                displayAssets($assets);
                displayLiabilities($liabilities)
                ?>
            </div>  
            <div class="row">
            	<h3 align="center">Disposed Assets and Liabilities </h3>

                <!-----Content goes here---->
                <?php 
                disposedAssets($assets);
                disposedLiabilities($liabilities)
                ?>
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
	echo <<< script
	<script>location.replace('reports.php')</script>
script;
}
function displayAssets($assets)
{
?>
<div class="col-md-6">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Current Assets</h5>
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
        $result=$assets;
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Cost</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                if($row['type']=="1")
                {
                	$category="Non Current";
                echo "<tr class='gradeX'><td>".$row['amount']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }
                 if($row['type']=="0")
                {
                $category="Current";
                echo "<tr class='gradeA'><td>".$row['amount']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Cost</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no assets yet</div>";
         }
        ?>
         

                    </div>
    </div>
</div>
<?php
}
function displayLiabilities($liabilities)
{
?>
<div class="col-md-6">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Current Liabilities</h5>
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
        $result=$liabilities;
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Cost</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                        
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                if($row['type']=="1")
                {
                	$category="Non Current";
                echo "<tr class='gradeX'><td>".$row['amount']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }
                 if($row['type']=="0")
                {
                $category="Current";
                echo "<tr class='gradeA'><td>".$row['amount']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Cost</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no liabilities yet.</div>";
         }
        ?>
         

                    </div>
    </div>
</div>
<?php
}
function disposedAssets($disposedAssets)
{
?>
<div class="col-md-6">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Disposed Assets</h5>
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
        $result=$disposedAssets;
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        
                        <th>Cost</th>
                        <th>Amount Sold</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                if($row['type']=="1")
                {
                	$category="Non Current";
                echo "<tr class='gradeX'><td>".$row['amount']."</td><td>".$row['amountSold']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }
                 if($row['type']=="0")
                {
                $category="Current";
                echo "<tr class='gradeA'><td>".$row['amount']."</td><td>".$row['amountSold']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Cost</th>
                        <th>Amount Sold</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no disposed assets yet.</div>";
         }
        ?>
         

                    </div>
    </div>
</div>
<?php
}

function disposedLiabilities($disposedLiabilities)
{
?>
<div class="col-md-6">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Disposed Liabilities</h5>
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
        $result=$disposedLiabilities;
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        
                        <th>Cost</th>
                        <th>Amount Sold</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                if($row['type']=="1")
                {
                	$category="Non Current";
                echo "<tr class='gradeX'><td>".$row['amount']."</td><td>".$row['amountSold']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }
                 if($row['type']=="0")
                {
                $category="Current";
                echo "<tr class='gradeA'><td>".$row['amount']."</td><td>".$row['amountSold']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$category."</td></tr>";
                }

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                       <th>Cost</th>
                        <th>Amount Sold</th>
                        <th>Description</th>
                        <th>Date Acquired</th>
                        <th>Category</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no disposed liabilities yet.</div>";
         }
        ?>
         

                    </div>
    </div>
</div>
<?php
}
?>