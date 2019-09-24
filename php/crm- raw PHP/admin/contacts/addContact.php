<?php
require_once ('../../functions.php');
$success="";
if(isset($_POST['email']))
{
    $email=sanitizeString($_POST['email']);
    $name=sanitizeString($_POST['name']);
    $mobile=sanitizeString($_POST['mobile']);
    $company=sanitizeString($_POST['company']);
    $address=sanitizeString($_POST['address']);
    $query=queryMysql("insert into contacts (name,email,mobile,company,address) values ('$name','$email','$mobile','$company','$address')");
    if($query)
    {
        $success="<div class='alert alert-info'>The customer was added successfully</div>";
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
                    <h2>MagnaForte Contacts</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Contacts</strong>
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
              if($success!="")
              {
                echo $success;
              }
                 ?>
                 <div class="col-md-3"></div>
                 <div class="col-md-6"><h3 align="center">Add a contact</h3>
                                <p align="center">Add a new client details</p>
                                <form role="form" method="post" action="addContact.php">
                                    <div class="form-group"><label>Client's email address</label> <input type="email" name="email" placeholder="Enter customer's email" class="form-control" required></div>
                                    <div class="form-group"><label>Name</label> <input type="text" placeholder="Enter customer's name" name="name" class="form-control" required></div>
                                    <div class="form-group"><label>Clients mobile number</label> <input type="number" placeholder="Enter mobile number" name="mobile" class="form-control" required></div>
                                    <div class="form-group"><label>Clients address</label> <input type="text" placeholder="Enter clients address" name="address" class="form-control" required></div>
                                    <div class="form-group"><label>Clients company</label> <input type="text" placeholder="Enter clients company" name="company" class="form-control" required></div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Add a contact</strong></button>
                                    </div>
                                </form>
                            </div>
                 <div class="col-md-3"></div>
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