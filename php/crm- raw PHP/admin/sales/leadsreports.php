<?php
include ('../../functions.php');
$dates=$months=$years=$statuss=$creators=$companys="";
$results=FALSE;
 $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads";
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
if(isset($_POST['status']))
{
    $statuss=$_POST['status'];
    $results=TRUE;
}
if(isset($_POST['creator']))
{
    $creators=$_POST['creator'];
    $results=TRUE;
}
if(isset($_POST['company']))
{
    $companys=$_POST['company'];
    $results=TRUE;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Leads Reports</title>

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
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Sales</a>
                        </li>
                        <li class="active">
                            <strong>Leads Reports</strong>
                        </li>
                    </ol>
                </div>
            </div>
           

                <!-----Content goes here---->
                 <div class="row">
                <div class="col-md-4">
                	<h4>Leads by Day</h4>
                	<form role="form" method="post" action="leadsreports.php">
					<div class="form-group" id="data_1">
					<div class="input-group date">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/05/2015" required>
					</div></div>
					<button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                	</form>
                </div>
                <div class="col-md-4">
                	<h4>Leads by Month</h4>
                	<form role="form" method="post" action="leadsreports.php">
					<div class="form-group" id="data_4">
					<div class="input-group date">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="month" class="form-control" value="07/01/2015">
					</div>
					</div>
					<button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                	</form>
                </div>
                <div class="col-md-4">
                	<h4>Leads by Year</h4>
                	<form role="form" method="post" action="leadsreports.php">
					<div class="form-group"><!--label>Year</label--> <input type="number" placeholder="Enter year" name="year" min="2000" max="2020" class="form-control" required></div>
					<button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                	</form>
                </div>
                
                <div class="col-md-4">
                    <h4>Leads by Status</h4>
                    <form role="form" method="post" action="leadsreports.php">
                    <div class="form-group">
                    <div class="input-group">
                    <select id="status" name="status" value="In progress" class="form-control">
                    <option value="">Select</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Pending to be assigned">Pending to be assigned</option>
                    <option value="Converted">Converted</option>
                    <option value="Dropped">Dropped</option>
                    </select>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>
                <div class="col-md-4">
                    <h4>Leads by Employee</h4>
                    <form role="form" method="post" action="leadsreports.php">
                    <div class="form-group">
                       <div class="input-group">
                       <select id="creator" name="creator" class="form-control">
                       <option value="">Select</option>
                    <?php
                    $listme= queryMysql("SELECT creator FROM new_leads");
                    while ($row=$listme->fetch_assoc()){
                        $creator=$row['creator'];
                        echo "<option value='$creator'>".$creator."</option>";

                    }
                    
                    ?>
                    </select>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>
                <div class="col-md-4">
                    <h4>Leads by Company</h4>
                    <form role="form" method="post" action="leadsreports.php">
                    <div class="form-group">
                       <div class="input-group">
                       <select id="company" name="company" class="form-control">
                       <option value="">Select</option>
                    <?php
                    $listme2= queryMysql("SELECT company FROM new_leads");
                    while ($row=$listme2->fetch_assoc()){
                        $company=$row['company'];
                        echo "<option value='$company'>".$company."</option>";

                    }
                    
                    ?>
                    </select>
                    </div>
                    </div>
                    <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Generate report</strong></button>
                    </form>
                </div>

                </div>
                <div class="row">
                	<?php
                    if($dates!="")
                    {
                         $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads WHERE opened='$dates'";
                    }
                        
                    if($months!="")
                    $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads WHERE month(opened)='$months'";
                   if($years!="")
                    $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads WHERE year(opened)='$years'";
                   if($statuss!="")
                    $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads WHERE status='$statuss'";
                   if($creators!="")
                   {

                     $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads WHERE creator='$creators'";
                   }
                    
                   if($companys!="")
                   {
                     $sql="SELECT opened, overview, company, industry, city, contact, status, creator FROM new_leads WHERE company='$companys'";
                   }
                   
                if(isset($sql))
                {
                    displayLeads($sql); 
                }
                     
                     ?>
                </div>

                <?php
                if(isset($error))
                    echo $error;
                if(isset($sql))
                    $query=queryMysql($sql);

                ?>
                <!-----Content goes here---->
                <!--

                <div class="row">
                    <br/>
                php
                if(isset($error))
                    echo $error;
                if(isset($sql))
                     $query=queryMysql($sql);
                 else
                $query=queryMysql("SELECT COUNT(*) AS 'id' FROM new_leads WHERE status='In Progress'");
                $row=$query->fetch_assoc();
                if($row['id']==null)
                    $leadcount=0;
                else
                $leadcount=$row['id'];

                $leadtotal=queryMysql("SELECT COUNT(*) AS 'opened' FROM new_leads");
                $row2=$leadtotal->fetch_assoc();
                $leadtracer= $row2['opened'];
                $leadpercent= $leadcount/$leadtracer

                ?>
                 <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Total leads currently being pursued</h5>
                                <h1 class="no-margins"><php echo $leadcount; ?> Leads</h1>
                                <div class="stat-percent font-bold text-navy"><php echo $leadpercent; ?>% <i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                    </div>
                php
                if(isset($sql))
                 {}
                 else 
                    displayLeads("SELECT * FROM new_leads;");
                ?>
                -->

                <!--Content two ends here-->
            
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
function displayLeads($query)
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
                       <th>Date</th>
                        <th>Description</th>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Creator</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                
                echo "<tr class='gradeX'><td>".$row['opened']."</td><td>".$row['overview']."</td><td>".$row['company']."</td><td>".$row['contact']."</td><td>".$row['status']."</td><td>".$row['creator']."</td></tr>";
                

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Creator</th>
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