<?php
include ('../../functions.php');
$error="";
if(isset($_POST['about']))
{

    $about=$_POST['about'];
if (isset($_FILES['profile']['name']))
{
    $name=$_SESSION['userName'];
    $saveto = "profile/".$name;
    
    $typeok = TRUE;
    switch($_FILES['profile']['type'])
    {
    case "image/gif":$ext=".gif";  $saveto=$saveto.$ext; move_uploaded_file($_FILES['profile']['tmp_name'], $saveto); $src = imagecreatefromgif($saveto); break;
    case "image/jpeg": $ext=".jpeg"; $saveto=$saveto.$ext; move_uploaded_file($_FILES['profile']['tmp_name'], $saveto); $src = imagecreatefromjpeg($saveto); break;
    case "image/pjpeg": $ext=".pjpeg";  $saveto=$saveto.$ext; move_uploaded_file($_FILES['profile']['tmp_name'], $saveto); $src = imagecreatefromjpeg($saveto);  break;
    case "image/png": $ext=".png";  $saveto=$saveto.$ext; move_uploaded_file($_FILES['profile']['tmp_name'], $saveto); $src = imagecreatefrompng($saveto); break;
    default: $typeok = FALSE; break;
    }
    if($typeok)
    {
        queryMysql("update userdetails,users set about='$about', pic='$saveto' where userdetails.employeeno=users.no and users.email='".$_SESSION['email']."' ");
        list($w, $h) = getimagesize($saveto);
        $max = 200;
        $tw = $w;
        $th = $h;
        if ($w > $h && $max < $w)
        {
        $th = $max / $w * $h;
        $tw = $max;
        }
        elseif ($h > $w && $max < $h)
        {
        $tw = $max / $h * $w;
        $th = $max;
        }
        elseif ($max < $w)
        {
        $tw = $th = $max;
        }
        $tmp = imagecreatetruecolor($tw, $th);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
        imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
        imagejpeg($tmp, $saveto);
        imagedestroy($tmp);
        imagedestroy($src);
        $error="<div class='alert alert-info'>The operation was successful</div>";
    }
    else
    {
        $error="<div class='alert alert-warning'>The operation was not successful</div>";
    }
    
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
     <?php userMenu("../") ?>
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
                            <strong>Profile</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                  <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                        <div>
                            
                                <?php
                                $query=queryMysql("select dateEmployed, about,pic from userdetails,users where userdetails.employeeNo=users.no and users.email='".$_SESSION['email']."'"); 
                                $row=$query->fetch_assoc();
                                 if($row['pic']=="")
                                {
                                    $pic="profile/profile_big.jpg";
                                }
                                else
                                    $pic=$row['pic']; 
                                ?>
                                <div class="ibox-content no-padding border-left-right">
                                <img alt="image" align="center" class="img-responsive" src="<?php echo $pic; ?>">
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $_SESSION['userName'] ?></strong></h4>
                                <p><i class="fa fa-map-marker"></i> employee since <?php echo $row['dateEmployed']; ?></p>
                                <h5>
                                    About me
                                </h5>
                                <p>
                                    <?php echo $row['about']; $about=$row['about']; ?>
                                </p>
                            
                                <?php uploadProfile($about); ?>
                                
                            </div>
                    </div>
                </div>
                    </div>
            </div>
        </div>

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
function uploadProfile($about)
{
      ?>
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-asset">Edit profile</a>
                            </div>
                            <div id="modal-asset" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Profile</h3>

                                                    <form role="form" method="post" action="profiles.php" enctype="multipart/form-data">
                                                        <div class="form-group"><label>About me</label><textarea name="about" class="form-control" rows="3" cols="20"><?php echo $about; ?></textarea></div>
                                                        <div class="form-group"><label>Upload profile pic (Max size 2MB)</label> 
                                                        <input type="file" name="profile" class="form-group">
                                                        </div>
                                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><strong>Update profile</strong></button>
                                                       
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
            <?php

}
?>