<?php
require_once('../../functions.php');
$error="";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
elseif (isset($_GET['no']))
{
    $no=$_GET['no'];
    $id=$_GET['unitId'];
    $query=queryMysql("update unitemployees set status=1 where employeeNo='$no' and unitId='$id'");
      if($query)
        {
        $error="<div class='alert alert-success fade-in'>The operation was successful</div>";
        }
        else
        {
        $error="<div class='alert alert-warning fade-in'>The operation was not successful. Please try again</div>";
        }
}
elseif (isset($_POST['department'])) 
{
    $department=$_POST['department'];
    $id=$_POST['unitId'];
    $sql=queryMysql("select employeeNo from userdetails where department='$department' and status='1'");
    if($sql->num_rows >0)
    {
        while($row=$sql->fetch_assoc())
        {
            $no=$row['employeeNo'];
            $query=queryMysql("insert into unitEmployees (unitId,employeeNo) values ('$id','$no')");
        }
        if($query)
        {
        $error="<div class='alert alert-success fade-in'>The operation was successful</div>";
        }
        else
        {
        $error="<div class='alert alert-warning fade-in'>The operation was not successful. Please try again</div>";
        }

    }
    else
    {
        $error="<div class='alert alert-info'> There are no employees in this department. </div>";
    }
}
elseif (isset($_POST['employee'])) 
{
    $employee=$_POST['employee'];
    $id=$_POST['unitId'];
    $query=queryMysql("insert into unitEmployees (unitId,employeeNo) values ('$id','$employee')");
    if($query)
        {
        $error="<div class='alert alert-success fade-in'>The operation was successful</div>";
        }
        else
        {
        $error="<div class='alert alert-warning fade-in'>The operation was not successful. Please try again</div>";
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
    <?php noScript();?>
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
            <?php
            if($error!="")
                echo $error;
            ?>
           </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myModal">Add employees by department</a>
                 </div>
                <div id="myModal" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="getUnit.php">
                                    <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" value='<?php echo $id; ?>' name="unitId">
                                    <select class="form-control" name="department">
                                        <option value="Finance">Finance</option>
                                        <option value="Human Resource">Human Resource</option>
                                        <option value="IT">IT</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Management">Management</option>
                                        <option value="Creatives">Creatives</option>
                                    </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                        <strong>Add Employees</strong></button>
                                    </div>

                                </form>


                </div>
                </div>
                </div>
                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="ibox">
                        <div class="ibox-content">
                            <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myModals">Choose individual employee</a>
                 </div>
                <div id="myModals" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="getUnit.php">
                                    <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" value='<?php echo $id; ?>' name="unitId">
                                    <select class="form-control" name="employee">
                                        <?php
                                        $sql=queryMysql("select no,name from users");
                                        while($row=$sql->fetch_assoc())
                                        {
                                            echo "<option value='".$row['no']."'>".$row['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                        <strong>Add Employee</strong></button>
                                    </div>

                                </form>


                </div>
                </div>
                </div>
                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myDocumentation">Add Files</a>
                 </div>
                <div id="myDocumentation" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="unitFiles.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="hidden" value='<?php echo $id; ?>' name="unitId">
                                       <input type="text" name="name" placeholder="Enter name of the file" class="form-control" required>
                                    </div>
                                    <div class="form-group"><label>Upload documentation (.doc and .pdf file supported. *.docx not supported)</label> 
                                    <input type="file" name="documentation" class="form-group">
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="sent" value="submit" >
                                        <strong>Upload documentation</strong></button>
                                    </div>

                                    </form>


                </div>
                </div>
                </div>
                </div>

            </div>
                </div>
            </div>
            <div class="row">
                <div class="ibox-content">
                <?php
                $sql = queryMysql("SELECT * FROM unitdocuments where unitId='$id' ORDER BY uploadTime DESC");
                if($sql->num_rows > 0)
                {
                $result= queryMysql($sql);
                ?>
<table class="table table-striped table-bordered table-hover dataTables-example">
                
            <thead>
            <tr>
                <th>Upload Time</th>
                <th>Name</th>
                <th>Location</th>
            </tr>
            </thead>
            <tbody>
           
<?php
       while ($row = $result->fetch_assoc()) {
           echo "<tr class='gradeX'>";
           echo "<td>".$row['uploadTime']."</td>";
           echo "<td>".$row["name"]."</td>";
           echo "<td><a href='".$row["location"]."' class='btn btn-primary btn-xs'>Download File</a></td>";
           echo "</tr>";
     }
     ?>

            </tbody>
            </table>
            <?php
            }
            else
            {
                echo "<div class='alert alert-info'>There are no documents for this order yet</div>";
            }
            ?>
                </div>
            </div>
            <div class="row">
                <?php
                unitEmployees($id);
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
function unitEmployees($id)
{?>
        <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employees taking the course</h5>
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
       $query="select name,status,employeeNo from unitemployees,users where users.no=unitemployees.employeeNo and unitid='$id' ";
       $result=queryMysql($query);
       if ($result->num_rows > 0) 
        {
            ?>
         <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                if($row['status']==0)
                {
                     $status="Ongoing";
                     echo "<tr class='gradeX'><td>".$row['name']."</td><td>$status</td><td><a class='btn btn-success btn-xs' href='getUnit.php?unitId=".$id."&no=".$row['employeeNo']."'>Mark as complete</a></td></tr>";  
                }
                   
                else
                {
                     $status="complete";
                     echo "<tr class='gradeX'><td>".$row['name']."</td><td>$status</td><td>-</td></tr>";  

                }
                   
               
                
            }
    ?>
           </tbody>
                    <tfoot>
                    <tr>
                        <th>Employee Name</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        }
        else
        {
            echo "<div class='alert alert-info' role='alert'>There are no employees yet</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>