<?php
require_once ('../../functions.php');
require_once ('database2.php');
/*
Add email field for mail to purposes
*/
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
                            <a href="#">Sales</a>
                        </li>
                        <li>
                            <a href="#">Generate leads</a>
                        </li>
                    </ol>
                </div>
            </div>
           
                <!-----Content goes here---->
                           <?php modalLead(); ?>
                <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
      <div class="col-sm-8">
                    <div class="ibox">
                        <div class="ibox-content">
                            <?php
                            $lastupdated_row_id = mysqli_insert_id($conn);
                            echo '<span class="text-muted small pull-right">Last modification: ';
                            echo '<i class="fa fa-clock-o">';
                            echo '</i>'.$lastupdated_row_id.'</span>';
                            ?>
                            <h2>Leads</h2>
                            <p>
                                "Marketing is no longer about the stuff that you make, but about the stories that you tell"- Seth Godin
                            </p>
                            <div class="input-group">
                                <input type="text" placeholder="Search client " class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                </span>
                            </div>
                            <div class="clients-list">
                            <ul class="nav nav-tabs">
                                <?php

                                $leadql = "SELECT * FROM new_leads";
                                if ($result=queryMysql($leadql)){

                                $rowcount=mysqli_num_rows($result);
                                echo '<span class="pull-right small text-muted">'.$rowcount. " Leads";
                                echo '</span>';

                            }
                            ?>

                                <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Contacts</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Timestamp</th>
                                                    <th>Status</th>
                                                    <th>Contact</th>
                                                    <th>Company</th>
                                                    <th>Overview</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                           <?php
                                                           

                                                           $leadql = "SELECT * FROM new_leads";
                                                          $result=queryMysql($leadql);

                                                      while ($row = $result->fetch_assoc()) {
                                                          echo "<tr>";
                                                          echo '<td><a data-toggle="tab" href="#contact-'.$row['id'].'" target="_blank">'.$row['id']."</td>";
                                                          echo "<td>".$row['opened']."</td>";
                                                          echo "<td>".$row['status']."</td>";
                                                          echo "<td>".$row['contact']."</td>";
                                                          echo "<td>".$row['company']."</td>";
                                                          echo "<td>".$row['overview']."</td>";
                                                          echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div></div>
                     <?php tabContent(); ?>
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
<?php
function modalLead()
{
    ?>
     <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="ibox-content">
                <a class="btn btn-primary btn-rounded btn-block" data-toggle="modal" href="#myModal"><i class="fa fa-plus-square-o"></i> Create New Lead</a>
                </div>
                </div>

                <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method= "POST" action= "leadconnect.php">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">New Lead</h4>
                                            <small class="font-bold">How you gather, manage and use information will determine whether you win or lose.</small>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-group"><label>Overview</label> <input type="text" name= "overview" placeholder="Enter your email" class="form-control"></div>
                                        <div class="form-group"><label>Company</label> <input type="text" name="company"placeholder="Enter your email" class="form-control"></div>
                                        <div class="form-group"><label>City</label> <input type="text" name="city" placeholder="Enter your email" class="form-control"></div>
                                        <div class="form-group"><label>Industry</label> <input type="text" name="industry" placeholder="Enter your email" class="form-control"></div>
                                        <div class="form-group"><label>Contact Person</label> <input type="text" name="contact" placeholder="Enter your email" class="form-control"></div>
                                        <div class="form-group"><label>Status</label>
                                          <div class="input-group">
                                            <select id="status" name="status" value="In progress" class="form-control">
                                               <option value="">Select</option>
                                               <option value="In Progress">In Progress</option>
                                               <option value="Pending to be assigned">Pending to be assigned</option>
                                               <option value="Converted">Converted</option>
                                               <option value="Dropped">Dropped</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group"><label>Tracking Note</label> <input type="text" name="tracking" placeholder="Enter your email" class="form-control"></div>
                                        <div class="form-group"><label>Creator</label> <input type="text" name="creator" placeholder="Enter your email" class="form-control"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" type="Sent" formaction="leadconnect.php">Create</button>
                                        </div>
                                        </div>
                                </form>
                                </div>
                                </div>
        </div>   

    <?php
}
function tabContent()
{
    ?>
<div class="col-sm-4">
                    <div class="ibox ">

                        <div class="ibox-content">
                            <div class="tab-content">
                                <!----Div starts here---->
                                <?php
                                $activityResults=queryMysql("select * from new_leads");
                                $counter=0;
                                if($activityResults->num_rows>0)
                                {
                                while($r=$activityResults->fetch_assoc())
                                {
                                ?>
                                <div id="contact-<?php echo $r['id']; ?>" class="tab-pane <?php if($counter==0) echo 'active'; ?>">
                                    <div class="row m-b-lg">
                                        <div class="col-lg-4 text-center">
                                            <h2><?php echo $r['contact']; ?></h2>
                                        </div>
                                        <div class="col-lg-8">
                                            <strong>
                                                About me
                                            </strong>

                                            <p>
                                                <?php echo $r['company']; ?>
                                            </p>
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                                    class="fa fa-envelope"></i> Send Message
                                            </button>
                                            <br/>
                                            <?php modalActivity(); ?>

                                        </div>
                                    </div>
                                    <div class="client-detail">
                                        <div class="full-height-scroll">

                                            <strong>Last activity</strong>

                                            <ul class="list-group clear-list">
                                                <?php
                                            $newQuery=queryMysql("select * FROM activity_log where id=".$r['id']."");
                                            if($newQuery->num_rows>0)
                                            {
                                                while($act=$newQuery->fetch_assoc())
                                                {
                                                ?>
                                        <li class="list-group-item fist-item">
                                                <span class="pull-right"><?php echo $act['time']; ?>HRS </span>
                                                <?php echo $act['activity']; ?> logged by: <?php echo $act['magnacontact']; ?> 
                                            </li>

                        <?php
                                            }//end while
                                            }
                                            else
                                            {
                                                echo "<li class='list-group-item fist-item'>
                                                <span class='pull-right'> 0:00  </span>
                                                No activity has been logged yet
                                            </li>";
                                            }
                                            ?>
                                            </ul>
                                            <strong>Notes</strong>
                                            <p>
                                                <?php echo $r['tracking']; ?>
                                            </p>
                                            <hr/>
                                            <strong>Timeline activity</strong>
                                            <div id="vertical-timeline" class="vertical-container dark-timeline">
                                                 <?php
                                                 $new=queryMysql("select * FROM activity_log where id=".$r['id']."");
                                                if($new->num_rows>0)
                                                {
                                                    while($action=$new->fetch_assoc())
                                                    {
                                                        ?>
                                                    <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-coffee"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p><?php echo $action['notes']; ?>
                                                        </p>
                                                        <span class="vertical-date small text-muted"> <?php echo $action['time']; ?>HRS - <?php echo $action['dater']; ?> </span>
                                                    </div>
                                                     </div>

                                                        <?php
                                                    }

                                                }
                                                else
                                                {
                                                    echo <<<noResults
                                                    <div class="vertical-timeline-block">
                                                    <div class="vertical-timeline-icon gray-bg">
                                                        <i class="fa fa-coffee"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content">
                                                        <p>No activity yet
                                                        </p>
                                                        <span class="vertical-date small text-muted"> 0:00 pm - 00.00.0000 </span>
                                                    </div>
                                                </div>
noResults;

                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-----------Div ends here---------->
                                <?php
                                $counter++;
                            }//end while
                        }//end if
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
<?php
}
function modalActivity()
{?>
    <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Log Activity</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Activity</h3>

                                                    <p>Think Big! Think Magna!</p>

                                                    <form method= "POST" action= "activitylogger.php">
                                                        <div class="form-group">
                                                        <label>Client</label>
                                                        <div class="input-group">
                                                            <select id="id" name="id" class="form-control">
                                                                    
                                                                        <?php
                                                                        
                                                                        
                                                                        $listquery="SELECT id, contact FROM new_leads";
                                                                        $kazimbaya=queryMysql($listquery);
                                                                        
                                                                        while ($row=$kazimbaya->fetch_assoc()) {
                                                                        $contact=$row["contact"];
                                                                        $id=$row["id"];
                                                                        echo "<option value='$id'>$contact</option>";

                                                                        
                                                                        }
                                                                            
                                                                        ?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                        <label>Activity</label>
                                                        <div class="input-group">
                                                            <select name="activity" class="form-control">
                                                        <option value="Call">Call</option>
                                                        <option value="Physical Meeting">Physical Meeting</option>
                                                        <option value="Email">Email</option>
                                                        <option value="Refer to Supervisor">Refer to Supervisor</option>
                                                        <option value="Send Quotation">Send Quotation</option>
                                                        <option value="Send Catalogue">Send Catalogue</option>
                                                        <option value="Send Project Proposal">Send Project Proposal</option>
                                                        <option value="Invite for a Corporate Meeting">Invite for a Corporate Meeting</option>
                                                        <option value="Negotiate Price">Negotiate Price</option>
                                                        <option value="Office Meeting">Office Meeting</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                        <label>Time</label>
                                                        <div class="input-group">
                                                            <select name="time" class="form-control">
                                                        <option value="0000">0000 hrs</option>
                                                        <option value="0100">0100 hrs</option>
                                                        <option value="0200">0200 hrs</option>
                                                        <option value="0300">0300 hrs</option>
                                                        <option value="0400">0400 hrs</option>
                                                        <option value="0500">0500 hrs</option>
                                                        <option value="0600">0600 hrs</option>
                                                        <option value="0700">0700 hrs</option>
                                                        <option value="0800">0800 hrs</option>
                                                        <option value="0900">0900 hrs</option>
                                                        <option value="1000">1000 hrs</option>
                                                        <option value="1100">1100 hrs</option>
                                                        <option value="1200">1200 hrs</option>
                                                        <option value="1300">1300 hrs</option>
                                                        <option value="1400">1400 hrs</option>
                                                        <option value="1500">1500 hrs</option>
                                                        <option value="1600">1600 hrs</option>
                                                        <option value="1700">1700 hrs</option>
                                                        <option value="1800">1800 hrs</option>
                                                        <option value="1900">1900 hrs</option>
                                                        <option value="2000">2000 hrs</option>
                                                        <option value="2100">2100 hrs</option>
                                                        <option value="2200">2200 hrs</option>
                                                        <option value="2300">2300 hrs</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="data_1">
                                                        <label class="font-noraml">Date</label>
                                                        <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name = "dater" value="03/04/2014">
                                                        </div>
                                                    </div>
                                                        <div class="form-group"><label>Notes</label> <input type="text" name="notes"  placeholder="Enter item" class="form-control"></div>
                                                        <div class="form-group"><label>Your Name</label> <input type="text" name="magnacontact"  placeholder="Enter name" class="form-control"></div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="Sent" value="submit" formaction="activitylogger.php"><strong>Create Log</strong></button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6"><div class="col-sm-6"><h4>We are E.P.I.C!!</h4>
                                                        <a href=""><i class="fa fa-coffee big-icon"></i></a>
                                                    </p>
                                            </div>                                                    
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div> 
<?php
}
?>