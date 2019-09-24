<?php
include ('../../functions.php');
if(isset($_POST['project_name']))
{
$project_name= $_POST['project_name'];
$project_start= date('Y-m-d', strtotime($_POST['project_start']));
$project_end= date('Y-m-d', strtotime($_POST['project_end']));
$project_desc= $_POST['project_desc'];
$category= $_POST['category'];
$magnacontact= $_POST['magnacontact'];
$client_name= $_POST['client_name'];
$projectManager=$_SESSION['no'];
queryMysql("INSERT INTO project_data (project_name, project_start, project_end, project_desc, category, magnacontact, client_name,projectManager) VALUES ('$project_name', '$project_start', '$project_end', '$project_desc', '$category', '$magnacontact', '$client_name','$projectManager')");
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
    <link href="../css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

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
                            <strong>Project Management</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                 <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myModal">Add Project</a>
                 </div>
                <div id="myModal" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="projects.php">
                                    <div class="form-group">
                                       <label>Project Name</label>
                                       <input type="text" name="project_name" placeholder="Enter Project Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>Project Description</label>
                                       <textarea type="text" name="project_desc" placeholder="Enter Project Description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group" id="data_5">
                                       <label class="font-noraml">Project Timeline</label>
                                       <div class="input-daterange input-group" id="datepicker">
                                       <input type="text" class="input-sm form-control" name="project_start" value="05/14/2015"/>
                                       <span class="input-group-addon">to</span>
                                       <input type="text" class="input-sm form-control" name="project_end" value="05/22/2015" />
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Category</label>
                                       <div class="input-group">
                                          <select name="category" class="form-control">
                                          <option value="">Select</option>
                                          <option value="Brand Optimization">Brand Optimization</option>
                                          <option value="Social Media">Social Media</option>
                                          <option value="Web Development">Web Development</option>
                                          <option value="Software Development">Software Development</option>
                                          <option value=" Mobile App Development">Mobile App Development</option>
                                          <option value="Business Optimization">Business Optimization</option>
                                          <option value="Research Others"></option>
                                          </select>
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <label>Client</label>
                                        <input type="text" name="client_name" placeholder="Enter Client's Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>MagnaContact</label>
                                        <input type="text" name="magnacontact" placeholder="Enter Name of Sales Rep that closed the Deal" class="form-control">
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="sent" value="submit" >
                                        <strong>Create Project</strong></button>
                                    </div>

                                    </form>


                </div>
                </div>
                </div>
                </div>

            </div>
                <?php
                displayProjects();
                ?>
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
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <script>
        $(document).ready(function(){



            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });



            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });


        });
        


    </script>

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


    </script>
<?php
}
function displayProjects()
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
       $query="select * from project_data";
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Project manager</th>
                        <th>Project Start date</th>
                        <th>Project End Date</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>View Project</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
               
                echo "<tr class='gradeX'><td>".$row['project_name']."</td><td>".$row['projectManager']."</td><td>".$row['project_start']."</td><td>".$row['project_end']."</td><td>".$row['category']."</td><td><small>Completion with: ".$row['status']."%</small>
                                                <div class='progress progress-mini'>
                                                    <div style='width: ".$row['status']."%;' class='progress-bar'></div>
                                                </div></td><td><a class='btn btn-success btn-xs' href='getProject.php?id=".$row['project_id']."'>View Project</a></td></tr>";   
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Project Name</th>
                        <th>Project manager</th>
                        <th>Project Start date</th>
                        <th>Project End Date</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>View Project</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no projects yet</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>