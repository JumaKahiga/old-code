<?php
require_once('../../functions.php');
$error="";
if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $sql=queryMysql("insert into training (name,description) values ('$name','$description')");
    if($sql)
    {
        $error="<div class='alert alert-success fade-in'>The operation was successful</div>";
    }
    else
    {
        $error="<div class='alert alert-warning fade-in'>The operation was not successful. Please try again</div>";
    }
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
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Human Resource</a>
                        </li>
                        <li class="active">
                            <strong>Training</strong>
                        </li>
                    </ol>
                </div>
            </div>
          

                <!-----Content goes here---->
                  <div class="row">
                    <div class="col-md-12">
                       <div class="ibox">
                        <div class="ibox-title">
                            <?php
                            if($error!="")
                                echo $error;
                            ?>
                        </div>
                        <div class="ibox-content">
                <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myModal">Add a Course</a>
                 </div>
                <div id="myModal" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="training.php">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="text" name="name" placeholder="Enter Deliverable Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>Description</label>
                                       <textarea type="text" name="description" placeholder="Enter Description" class="form-control" cols="40" rows="3"></textarea>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                        <strong>Create a Course</strong></button>
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
                displayCourses();
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
function displayCourses()
{?>
        <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Courses Available</h5>
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
       $query="select *  from training";
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {
            ?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>View Course</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
               
                echo "<tr class='gradeX'><td>".$row['name']."</td><td><a class='btn btn-success btn-xs' href='getCourse.php?id=".$row['no']."&&gtdhdf=jhgyhjh&name=".$row['name']."'>View More</a></td></tr>";   
            }
    ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Course Name</th>
                        <th>View Course</th>
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