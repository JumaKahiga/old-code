<?php
include ('../../functions.php');
$error="";
if(isset($_POST['description']))
{
    $description=sanitizeString($_POST['description']);
    $amount=sanitizeString($_POST['amount']);
    $date=date('Y-m-d',strtotime($_POST['date']));
    $type=$_POST['type'];
    $link=$_POST['link'];
    $query=queryMysql("insert into adverts (description,amount,date,type,link) values ('$description','$amount','$date','$type','$link')");
    if($query)
    {
        $error="<div class='alert alert-info'>Data entry was successful</div>";
    }
    else
    {
        $error="<div class='alert alert-warning'>The action was unsuccessful. Please try again</div>";
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
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>CSR</strong>
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
                                 <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add an Advert<small>  Record activity</small></h5>
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
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-forms">Add Activity</a>
                            </div>
                            <div id="modal-forms" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Expense</h3>

                                                    <p>Record a transaction here: </p>

                                                    <form role="form" method="post" action="adverts.php">
                                                        <div class="form-group"><label>Description</label> <input type="text" placeholder="Enter a description of the transaction" name="description" class="form-control" required></div>
                                                        <div class="form-group"><label>Link</label> <input type="text" placeholder="Enter url tp the advert" name="link" class="form-control"></div>
                                                        <div class="form-group"><label>Advert type</label> 
                                                            <select class="form-control" name="type">
                                                                <option value="Radio">Radio</option>
                                                                <option value="Print">Print</option>
                                                                <option value="Website">Website</option>
                                                                <option value="Social Media">Social Media</option>
                                                                <option value="Television">Television</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group"><label>Enter amount</label> <input type="number" placeholder="Enter the amount" class="form-control" name="amount" required></div>
                                                        <div>
                                                        <div class="form-group" id="data_1"><label class="font-noraml">Date</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Add Activity</strong></button>
                                                       
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
                </div>
                 <div class="row">
                    <?php
                        displayTransactions();
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
function displayTransactions()
{
    $query="select * from adverts";
?>
    <div class="col-md-12">
        <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Magna Adverts</h5>
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
                        <th>Advert Name</th>
                        <th>Cost</th>
                        <th>Date</th>
                        <th>Advert Type</th>
                        <th>Advert link</th>
                    </tr>
                    </thead>
                    <tbody>
    <?php
         while($row = $result->fetch_assoc())
            {
                
                echo "<tr class='gradeX'><td>".$row['description']."</td><td>".$row['amount']."</td><td>".$row['date']."</td><td>".$row['type']."</td><td><a class='btn btn-primary btn-xs' target='_blank' href='".$row['link']."'>View Link</a></td></tr>";
                

          
            }
             ?>
           </tbody>
                    <tfoot>
                    <tr>
                       <th>Advert Name</th>
                        <th>Cost</th>
                        <th>Date</th>
                        <th>Advert Type</th>
                        <th>Advert link</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
           <?php
        } else
        {
            echo "<div class='alert alert-info' role='alert'>There are no activities yet</div>";
         }
        ?>
         

                    </div>
    </div>
<?php
}
?>