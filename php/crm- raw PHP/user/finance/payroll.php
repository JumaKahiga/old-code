<?php
require_once('../../functions.php');
?>
<?php require_once('Connections/database.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$conn = mysqli_connect("localhost", "magnaForte", "magnaForte", "nauphrageCRM");
mysqli_select_db($conn, "nauphrageCRM");
$query_payroll = "SELECT * FROM payroll";
$payroll = mysqli_query($conn, $query_payroll) or die(mysql_error());
$row_payroll = mysqli_fetch_assoc($payroll);
$totalRows_payroll = mysqli_num_rows($payroll);
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Financial transactions</title>

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
     <?php userMenu("../") ?>
    </nav>
            <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
<?php userHeader(); ?>
   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Payroll</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="transactions.php">Finance</a>
                        </li>
                        <li class="active">
                            <strong>Payroll</strong>
                        </li>
                    </ol>
                </div>
            </div>

                <!-----Content goes here---->
                                         <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="wrapper wrapper-content">
                         <div class="ibox-content profile-content">
                                 <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                    <tr>
                                        <th>Employee Number</th>
                                        <th>Full Names</th>
                                        <th>Department</th> 
                                        <th>Position</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                 <?php
                                        
                                        $dbhost = 'localhost';
                                        $dbname = 'nauphrageCRM';
                                        $dbuser = 'magnaForte';
                                        $dbpass = 'magnaForte';
                                        $conn = mysqli_connect("localhost", "magnaForte", "magnaForte", "nauphrageCRM");
                                        //  mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysqli_error());
                                        mysqli_select_db($conn, $dbname) or die(mysql_error());
                                        function queryMysqli($query)
                                        {
                                        $conn = mysqli_connect("localhost", "magnaForte", "magnaForte", "nauphrageCRM");
                                        $result = mysqli_query($conn, $query) or die(mysql_error());
                                        return $result;
                                        }
                                        $result = queryMysqli("select employeeNo,userDetails.name,surname,department,title from userdetails,users where users.no=userdetails.employeeNo and users.email='$email'");
                                       
                                        $num=mysqli_num_rows($result);
                                        if($num==0)
                                        {
                                        echo "<div class='warning'>There are no records yet</div>";
                                        }
                                        else
                                        {
                                        for ($i=0;$i<$num;$i++)
                                        {
                                        $row=mysqli_fetch_row($result);
                                        echo "<tr><td>$row[0]</td><td>$row[1]"." "."$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
                                        }
                                        }
                                        ?></tr></tbody></table>
                            </div>

                            <div>
                              <table width="438" border="0" class="table">
                                   <tr>
                                     <th scope="row">Basic Pay</th>
                                     <td><?php echo $row_payroll['basicpay']; ?></td>
                                   </tr>
                                   <tr>
                                     <th scope="row">Days of Work</th>
                                     <td><?php echo $row_payroll['workdays']; ?></td>
                                   </tr>
                                   <tr>
                                     <th scope="row">Allowance</th>
                                     <td><?php echo $row_payroll['allowance']; ?></td>
                                   </tr>
                                   <tr>
                                     <th scope="row">Advance</th>
                                     <td><?php echo $row_payroll['advances']; ?></td>
                                   </tr>
                                   <tr>
                                     <th scope="row">Insurance</th>
                                     <td><?php echo $row_payroll['insurance']; ?></td>
                                   </tr>
                                   <tr>
                                     <th scope="row">Bonuses</th>
                                     <td><?php echo $row_payroll['bonuses']; ?></td>
                                   </tr>
                              </table>
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
