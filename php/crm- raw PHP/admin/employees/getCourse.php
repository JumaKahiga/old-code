<?php
require_once('../../functions.php');
$error="";
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
}
elseif (isset($_REQUEST['unitName']))
{
    # code...
    $id=$_REQUEST['projectId'];
    $name=$_REQUEST['projectName'];
    $unitName=$_REQUEST['unitName'];
    $trainer=$_REQUEST['trainer'];
    $start=date('Y-m-d', strtotime($_POST['start']));
    $end=date('Y-m-d', strtotime($_POST['end']));
    $description=$_REQUEST['description'];
    $sql=queryMysql("insert into units (projectid,name,trainer,startdate,enddate,description) values ('$id','$unitName','$trainer','$start','$end','$description')");
     if($sql)
    {
        $error="<div class='alert alert-info' role='alert'>The operation was successful</div>";
    }
    else
    {
        $error="<div class='alert alert-warning fade-in' role='alert'>The operation was not successful. Please try again</div>";
    }
}
else
{
    echo "<script>location.replace('training.php')</script>";
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
    <link href="../css/plugins/chosen/chosen.css" rel="stylesheet">

    <!-- Morris -->
    <link href="../css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

     <link href="../css/plugins/chartist/chartist.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="../css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <link href="../css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">
     <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">

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
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            <strong>Creatives</strong>
                        </li>
                    </ol>
                </div>
            </div>
                <!-----Content goes here---->
                 <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h3><?php echo $name; ?></h3>
                                Add units for this course
                                <?php if($error!="") echo $error; ?>
                                </div>
                                <div class="ibox-content">
                                <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myModal">Add a Unit</a>
                 </div>
                <div id="myModal" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="getCourse.php">
                                    <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" value='<?php echo $name; ?>' name="projectName">
                                    <input type="hidden" value='<?php echo $id; ?>' name="projectId">
                                    <input type="text" name="unitName" placeholder="Enter unit's Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label>Trainer</label>
                                    <input type="text" name="trainer" placeholder="Enter trainer's name" class="form-control">
                                    </div>
                                    <div class="form-group" id="data_5">
                                    <label>Milestone Timeline</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="start" value="05/14/2015"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="end" value="05/22/2015" />
                                    </div>

                                    </div>
                                    <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" name="description" placeholder="Enter Description" class="form-control" cols="40" rows="3"></textarea>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                        <strong>Create a Unit</strong></button>
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
                <div class="row">
                    <?php
                    displayUnits($id);
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
        <!-- Date range use moment.js same as full calendar plugin -->
    <script src="../js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="../js/plugins/daterangepicker/daterangepicker.js"></script>
     <!-- Chosen -->
    <script src="../js/plugins/chosen/chosen.jquery.js"></script>

    <!-- Chartist -->
    <script src="../js/plugins/chartist/chartist.min.js"></script>

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
          $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

         $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "../js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });


        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"100%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

          $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
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
<?php
}
function displayUnits($id)
{?>
        <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Course units</h5>
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
       $query="select *  from units where projectid='$id'";
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {
            ?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Unit Name</th>
                        <th>Trainer</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>View Details</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
               
                echo "<tr class='gradeX'><td>".$row['name']."</td><td>".$row['trainer']."</td><td>".$row['startDate']."</td><td>".$row['endDate']."</td><td><a class='btn btn-success btn-xs' href='getUnit.php?id=".$row['no']."&&gtdhdf=jhgyhjh&name=".$row['name']."'>View More</a></td></tr>";   
            }
    ?>
           </tbody>
                    <tfoot>
                    <tr>
                       <th>Unit Name</th>
                        <th>Trainer</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>View Details</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        }
        else
        {
            echo "<div class='alert alert-info' role='alert'>There are no projects yet</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>