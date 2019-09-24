<?php
include ('../../functions.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}
if(isset($_POST['message']))
{
	$message=$_POST['message'];
	$id=$_POST['id'];
	$time=time();
	$no=$_SESSION['no'];
    queryMysql("insert into projectDiscussions (message,employeeNo,timeProcessed,milestoneid) values ('$message','$no','$time','$id')");
}
if (isset($_POST['status']))
{
    $id=$_POST['project_id'];
    $status=$_POST['status'];
    queryMysql("update milestones set status='$status' where no='$id'");
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
                            <strong>Project Management</strong>
                        </li>
                        <li class="active">
                            <strong>Project Milestone</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <!---------------content goes here---------->
            <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <?php
                                        $projDetails=queryMysql("select * from milestones where no='$id'");
                                        $projRow=$projDetails->fetch_assoc();
                                        ?>
                                        <h2><?php echo $projRow['name'] ?></h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary"><?php if ($projRow['status']!=100) echo "Active"; else echo "Completed"; ?></span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                   <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                         <dt>Deadline:</dt> <dd>  <?php echo $projRow['endDate'] ?> </dd>
                                         <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary btn-xs" href="#myStatus">Change Project status</a>
                 </div>
                <div id="myStatus" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="getMilestone.php">
                                    <div class="form-group">
                                       <label>Project Status</label>
                                       <input type="hidden" name="project_id" value="<?php echo $id; ?>">
                                       <input type="number" name="status" placeholder="Enter Project status in %" class="form-control">
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="sent" value="submit" >
                                        <strong>Update Status</strong></button>
                                    </div>

                                    </form>


                </div>
                </div>
                </div>
                </div>
                                    </dl>
                                </div>
                                 <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd><?php echo $projRow['timeRecorded'] ?></dd>
                                        <dt>Created:</dt> <dd>  <?php echo $projRow['startDate'] ?> </dd>
                                       
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: <?php echo $projRow['status'] ?>%" class="progress-bar"></div>
                                            </div>
                                            <small>Project completed in <strong><?php echo $projRow['status'] ?>%</strong></small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <small class="pull-right text-muted">Discussion panel</small>
                         MileStones
                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="chat-discussion">
                                	<?php
                                	$query=queryMysql("select name,employeeNo,message,timeProcessed from projectdiscussions,users where milestoneid='$id' and employeeNo=users.no");
                                    if($query->num_rows > 0)
                                    {
                                        while($row=$query->fetch_assoc())
                                        {
                                            if($row['employeeNo']==$_SESSION['no'])
                                            {
                                                echo "<div class='chat-message right'>";
                                            }
                                            else
                                                 echo "<div class='chat-message left'>";
                                                echo "<img class='message-avatar' src='../img/prof.png' alt='' >";
                                                echo  "<div class='message'>";
                                                echo "<a class='message-author' href='#'>".$row['name']."</a>";
                                                $date=date('M jS \'y g:ia', $row['timeProcessed']);
                                                echo "<span class='message-date'>$date</span>";
                                                echo "<span class='message-content'>".$row['message']."</span></div>";
                                                echo "</div>";
                                        
                                        }

                                    }
                                    else
                                    {
                                        echo "<div class='alert alert-info'>There are no messages yet</div>";
                                    }
                                	?>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">


                                    <div class="users-list">
                                    	<?php
                                    	$query=queryMysql("select name,employeeNo from projectusers,users where milestoneid='$id' and employeeNo=users.no");
                                    	if($query->num_rows > 0)
                                    	{
                                    		while($row=$query->fetch_assoc())
                                    		{
                                    			if($row['employeeNo']==$_SESSION['no'])
                                    				continue;
                                    			echo <<<users
                                    		<div class="chat-user">
                                            <img class="chat-avatar" src='../img/prof.png' alt="" >
                                            <div class="chat-user-name">
users;
                                               echo "<a href='#'>".$row['name']."</a></div></div>";

                                    		}

                                    	}
                                    	else
                                    	{
                                    		echo "<div class='alert alert-info'>There are no users for this project</div>";
                                    	}
                                    	?>
                                        
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chat-message-form">
                                	<form method="post" action="getMilestone.php">

                                    <div class="form-group">
                                    	<input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
                                    </div>
                                    <div class="form-group">
                                    	<input type="submit" class="btn btn-primary btn-block" value="Send message">
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
            <!---------------content goes here---------->
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
    <script>
        $(document).ready(function(){



            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
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
?>