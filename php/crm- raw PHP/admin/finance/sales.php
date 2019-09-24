<?php
require_once ('../../functions.php');
$success="";
if(isset($_POST['customer']))
{
    $customer=sanitizeString($_POST['customer']);
    $name=sanitizeString($_POST['name']);
    $product=sanitizeString($_POST['product']);
    $amount=sanitizeString($_POST['amount']);
    if (isset($_POST['description']))
    $description=sanitizeString($_POST['description']);
else
    $description="";
    $date=date('Y-m-d', strtotime($_POST['date']));
    $project=sanitizeString($_POST['project']);
    $time = time();
    $query=queryMysql("insert into sales (customerId,product,amount,description,date,projectid) values ('$customer','$product','$amount','$description','$date','$project')");
    $sql=queryMysql("insert into transactions (description,amount,date,category, account,transaction,dateRecorded) values ('$name','$amount','$date','sales','Cash on hand','Debit','$time')");
    $updateQuery=queryMysql("update assets set amount=amount+$amount where description='Cash'");
    $cashLedger=queryMysql("insert into cash (description,date,amount) values ('$name','$date','$amount')");
    if($query)
    {
        $success="<div class='alert alert-info'>The sale was recorded successfully</div>";
    }
    else
    {
         $success="<div class='alert alert-warning'>Data was not added successfully</div>";
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
                    <h2>Record a sale</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="transactions.php">Finance</a>
                        </li>
                        <li class="active">
                            <strong>Sales</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                 <?php //echo ini_get('session.gc_maxlifetime'); 
                 //$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                 //if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) different_user();
                 //$_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
                 //if ($_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']) different_user();
                 //$_SESSION['check'] = hash('ripemd128', $_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']);
                 //if ($_SESSION['check'] != hash('ripemd128', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])) different_user();
                 /*if (!isset($_SESSION['initiated']))
{
session_regenerate_id();
$_SESSION['initiated'] = 1;
}
if (!isset($_SESSION['count'])) $_SESSION['count'] = 0;
else ++$_SESSION['count'];
echo $_SESSION['count'];*/
//ini_set('session.save_path', '/home/user/myaccount/sessions');
                 ?>
                 <div class="col-md-3">
                    <br>
                    <a href="../contacts/addContact.php" class="btn btn-primary btn-success">Add customer</a>
                </div>
                 <div class="col-md-6">
                    <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5 align="center">Record a sale</h5>
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
                        <?php
                        if($success!="")
              {
                echo $success;
              }
              ?>
                   
                                <form role="form" method="post" action="sales.php">
                                    <div class="form-group"><label>Title</label> <input type="text" placeholder="Enter title" name="name" class="form-control" required></div>
                                    <div class="form-group"><label>Choose customer</label> 
                                    <?php
                                    $sql=queryMysql("select name,company,no from contacts");
                                    if($sql->num_rows > 0)
                                    {
                                        echo "<select name='customer' class='form-control' required>";
                                        while($row=$sql->fetch_assoc())
                                        {
                                            echo "<option value=".$row['no'].">".$row['name']." from ".$row['company']."</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else
                                    {
                                        echo "<input type='no' name='customer' class='form-control' placeholder='Enter customer no.'>";
                                    }
                                    ?>
                                    </div>
                                    <div class="form-group"><label>Product</label>
                                        <select name="product" class="form-control" required>
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
                                    <div class="form-group"><label>Total amount</label> <input type="number" placeholder="Enter amount" name="amount" class="form-control" required></div>
                                    <div class="form-group"><label>Description</label><textarea placeholder="Enter description of the transaction" rows="2" cols="40" wrap="hard" name="description" class="form-control"></textarea></div>
                                    <div class="form-group" id="data_1"><label>Date</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" value="03/04/2015" required>
                                                        </div></div>
                                    <div class="form-group"><label>Project number</label>
                                         <?php
                                    $sql=queryMysql("select project_name,project_id from project_data");
                                    if($sql->num_rows > 0)
                                    {
                                        echo "<select name='project' class='form-control' required>";
                                        while($row=$sql->fetch_assoc())
                                        {
                                            echo "<option value=".$row['project_id'].">".$row['project_name']."</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else
                                    {
                                        echo "<input type='no' name='project' class='form-control' placeholder='Enter project no.'>";
                                    }
                                    ?>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary btn-block pull-right m-t-n-xs" type="submit"><strong>Add a contact</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                 <div class="col-md-3"></div>
                <br><!-----Content goes here---->
            </div>
            <br>
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
?>