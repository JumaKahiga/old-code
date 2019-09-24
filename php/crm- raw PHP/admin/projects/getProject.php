<?php
require_once('gantt.php');

if(isset($_GET['id']))
{
	$id=$_GET['id'];
}
if (isset($_POST['deliverable_name']))
{
	$id=$_POST['deliverable_id'];
	$name=$_POST['deliverable_name'];
	$description=$_POST['deliverable_description'];
	queryMysql("insert into deliverables (projectId,name,description) values ('$id','$name','$description')");

}
if (isset($_POST['status']))
{
    $id=$_POST['project_id'];
    $status=$_POST['status'];
    queryMysql("update project_data set status='$status' where project_id='$id'");
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

     <link href="../css/plugins/chartist/chartist.min.css" rel="stylesheet">

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

<body onLoad="hideElement();">
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
            <div class="col-md-2">
                           <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myModal">Add Deliverables</a>
                 </div>
                <div id="myModal" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="getProject.php">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="hidden" name="deliverable_id" value="<?php echo $id; ?>">
                                       <input type="text" name="deliverable_name" placeholder="Enter Deliverable Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>Description</label>
                                       <textarea type="text" name="deliverable_description" placeholder="Enter Description" class="form-control" cols="40" rows="3"></textarea>
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
            </div>
            <div class="col-md-2">
                           <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myInvoice">Generate Invoice</a>
                 </div>
                <div id="myInvoice" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="invoicelogger.php">
                                  <div class="form-group">


                                       <label>Invoice Name</label>
                                      <input  type="text" name="invoiceName" class="form-control" placeholder="Simple description of your invoice">
                                      <input type="hidden" name="projectId" value="<?php echo $id ?>">
                                    </div>
                                    <div class="form-group">


                                       <label>Choose Client</label>
                                       <select name="clientNo" class="form-control">
                                       <?php

                                        $jinayaclient = "SELECT no, name FROM contacts";
                                        $clientmgani = queryMysql($jinayaclient);

                                             
                                             while($row = $clientmgani->fetch_assoc()) {
                                                echo '<option value='.$row["no"].'>';
                                                echo $row["name"];
                                                echo '</option>';
                                             }
  
                                       ?>
                                       </select>
                                    </div>

                                    <div class="form-group" id="data_5">
                                    <label>Invoice Timeline</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="startDate" value="06/14/2015"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="endDate" value="06/22/2015" />
                                    </div>

                                    </div>
                                   
                                    <div class= "form-group">
                                       <label>List Items</label>
                                       <div class="form-inline">
                                           <div class="input-group m-b">
                                           <span class="input-group-addon">Item 1</span> 
                                           <input type="text" name="item1" class="form-control"> 
                                           </div>
                                           <div class="input-group m-b">
                                           <span class="input-group-addon">Kes</span> 
                                           <input type="text" name="itemprice1" placeholder="Price for item one" class="form-control"> 
                                           <span class="input-group-addon">.00</span></div>
            
                                       </div>

                                       <div class="form-inline">
                                           <div class="input-group m-b">
                                           <span class="input-group-addon">Item 2</span> 
                                           <input type="text" name="item2" class="form-control"> 
                                           </div>
                                           <div class="input-group m-b">
                                           <span class="input-group-addon">Kes</span> 
                                           <input type="text" name="itemprice2" placeholder="Price for item two" class="form-control"> 
                                           <span class="input-group-addon">.00</span></div>
                                       </div>
                                        <div class="form-inline">
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Item 3</span> 
                                           <input type="text" name="item3" class="form-control"> 
                                           </div>
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Kes</span> 
                                           <input type="text" name="itemprice3" placeholder="Price for item three" class="form-control"> 
                                           <span class="input-group-addon">.00</span></div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Item 4</span> 
                                           <input type="text" name="item4" class="form-control"> 
                                           </div>
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Kes</span> 
                                           <input type="text" name="itemprice4" placeholder="Price for item four" class="form-control"> 
                                           <span class="input-group-addon">.00</span></div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Item 5</span> 
                                           <input type="text" name="item5" class="form-control"> 
                                           </div>
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Kes</span> 
                                           <input type="text" name="itemprice5" placeholder="Price for item five" class="form-control"> 
                                           <span class="input-group-addon">.00</span></div>
                                        </div>
                                        <div class="form-inline">
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Item 6</span> 
                                           <input type="text" name="item6" class="form-control"> 
                                           </div>
                                            <div class="input-group m-b">
                                           <span class="input-group-addon">Kes</span> 
                                           <input type="text" name="itemprice6" placeholder="Price for item six" class="form-control"> 
                                           <span class="input-group-addon">.00</span></div>
                                        </div>

                                <!--Form-group ends with div below-->
                                </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="sent" value="submit">
                                        <strong>Generate Invoice</strong></button>
                                    </div>

                                    </form>


                </div>
                </div>
                </div>
                </div>

            </div>
            </div>
            <div class="col-md-2">
                           <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myStatus">Change Project status</a>
                 </div>
                <div id="myStatus" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="getProject.php">
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

            </div>
            </div>
            <div class="col-md-2">
            <div class="ibox-content">
            <div class="text-center">
            <a data-toggle="modal" class="btn btn-primary" onClick="milestoneDisplay();">Add Milestone</a>
            </div>
            </div>
            </div>
            <!------Project costs---->
            <div class="col-md-2">
                           <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myCosts">Add Costs</a>
                 </div>
                <div id="myCosts" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="projectCosts.php">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="hidden" name="projectId" value="<?php echo $id; ?>">
                                       <input type="text" name="name" placeholder="Enter Item name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                       <label>Enter amount</label>
                                       <input type="number" name="amount" placeholder="Enter Item cost" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                       <label>Description</label>
                                       <textarea type="text" name="description" placeholder="Enter Description of item" class="form-control" cols="40" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Choose milestone</label>
                                        <?php
                                        $query=queryMysql("select no,name from milestones where projectId='$id'");
                                        if($query->num_rows>0)
                                        {
                                            echo "<select name='milestone' class='form-control'>";
                                            while($row=$query->fetch_assoc())
                                            {
                                                echo "<option value=".$row['no'].">".$row['name']."</option>";
                                            }
                                            echo "</select>";
                                        }
                                        else
                                            echo "<input type='text' name='milestone' placeholder='Enter milestone name' class='form-control' required>";
                                        ?>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="sent" value="submit" >
                                        <strong>Register cost</strong></button>
                                    </div>

                                    </form>


                </div>
                </div>
                </div>
                </div>

            </div>
            </div>
             <div class="col-md-2">
                           <div class="ibox-content">
                 <div class="text-center">
                 <a data-toggle="modal" class="btn btn-primary" href="#myDocumentation">Add Files</a>
                 </div>
                <div id="myDocumentation" class="modal fade" aria-hidden="true">
                <div class= "modal-dialog">
                <div class= "modal-content">
                <div class= "modal-body">

                                <form method="POST" action="projectFiles.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="hidden" name="projectId" value="<?php echo $id; ?>">
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
            <!------Project costs---->
            </div>
            <br/>
            <!-----new row (milestone form)------>
            <div class="row" id="milestone">
                <div class="col-md-6">
                    <div class="ibox-content">
                     <?php
                    $deliverables=queryMysql("select name,no from deliverables where projectId='$id'");
                    if($deliverables->num_rows >0)
                    {?>

                    <form method="POST" action="addMilestone.php">
                    <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="projectId" value="<?php echo $id; ?>">
                    <?php
                    echo "<select class='form-control' name='deliverableId'>";
                    while($row=$deliverables->fetch_assoc())
                    {
                    echo "<option value=".$row['no'].">".$row['name']."</option>";

                    }
                    echo "</select>";
                    ?></div>
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter Milestone Name" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" placeholder="Enter Milestone Description" class="form-control" cols="40" rows="3"></textarea> 
                    </div>
                    <div class="form-group" id="data_5">
                    <label>Milestone Timeline</label>
                    <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" name="start" value="05/14/2015"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end" value="05/22/2015" />
                    </div>

                    </div>
                    <div class="form-group">
                    <label>Multi select</label>
                    <select name="users[]" data-placeholder="Choose a user...." class="chosen-select form-control" multiple style="width:100%;" tabindex="4">
                    <?php
                    $users=queryMysql("select * from users");
                    while($u=$users->fetch_assoc())
                    {
                    echo "<option value=".$u['no'].">".$u['name']."</option>";
                    }
                    ?>
                    </select>
                    </div>

                    <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="sent" value="submit" >
                    <strong>Create Project</strong></button>
                    </div>

                    </form>

                    <?php

                    }
                    else
                    {
                    echo "<div class='alert alert-info'>You have to add a deliverable first.</div>";
                    }
                    ?>
                    </div>

                </div>
            </div>
            <!-----new row(milestone form)------>
            <!-----Project description goes here ---->
                    <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <?php
                                        $projDetails=queryMysql("select *,name as Creator from project_data,users where project_id='$id' and projectManager=users.no");
                                        $projRow=$projDetails->fetch_assoc();
                                        ?>
                                        <h2><?php echo $projRow['project_name'] ?></h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary"><?php if ($projRow['status']!=100) echo "Active"; else echo "Completed"; ?></span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd><?php echo $projRow['Creator'] ?></dd>
                                        <dt>Client:</dt> <dd><a href="#" class="text-navy"> <?php echo $projRow['client_name'] ?></a> </dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd><?php echo $projRow['timeRecorded'] ?></dd>
                                        <dt>Created:</dt> <dd>  <?php echo $projRow['project_start'] ?> </dd>
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
<!----tabs ------>
                    <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-milestones" data-toggle="tab">Milestones</a></li>
                                            <li class=""><a href="#tab-deliverables" data-toggle="tab">Deliverables</a></li>
                                            <li class=""><a href="#tab-costs" data-toggle="tab">Project Costs</a></li>
                                            <li class=""><a href="#tab-teams" data-toggle="tab">Team</a></li>
                                            <li class=""><a href="#tab-components" data-toggle="tab" onClick="chartist();">Project Components</a></li>
                                            <li class=""><a href="#tab-documents" data-toggle="tab">Project Documents</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-milestones">
                    <!----milestones tab ---->
                                <?php

                                $listquery="SELECT * FROM milestones where projectId='$id' ORDER BY endDate DESC";
                                $kazifresh=queryMysql($listquery);
                                while ($row=$kazifresh->fetch_assoc()){
                                    echo '<div class="feed-activity-list">';
                                    //echo '<div class="ibox-content inspinia-timeline">';
                                    echo '<div class="timeline-item">';
                                    echo '<div class="row">';
                                    echo '<div class="col-xs-3 date">';
                                    echo '<i class="fa fa-briefcase">';
                                    echo '</i>';
                                    echo $row["endDate"];
                                    echo '</br>';
                                
                                    echo '<small class="text-navy">'.$row['deliverableId'].'</small>';
                                
                                echo '</div>';
                                echo '<div class="col-xs-7 content no-top-border">';
                                    echo '<p class="m-b-xs"><strong>'.$row['name'].'</strong></p>';
                                    echo "<a class='btn btn-primary btn-xs' href='getMilestone.php?id=".$row['no']."'>View details</a>";

                                    echo '<p>'.$row['description'].'</p>';
                                echo '</div></div></div></div>';
                                }

                                ?>
                                
                        

                    <!----milestones tab ---->
                                </div>
                                <div class="tab-pane" id="tab-deliverables">

        <!--------------------deliverables---->
                                            <div class="feed-activity-list">
                                        <div class="feed-element">
                <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                                        <tr>
                                            <th>Project ID</th>
                                            <th>Deliverable</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
    
                                        $sql = "SELECT * FROM deliverables where projectId='$id' ORDER BY no";
                                        $result= queryMysql($sql);

                                   while ($row = $result->fetch_assoc()) {
                                       echo "<tr class='gradeX'>";
                                       echo "<td>".$row['projectId']."</td>";
                                       echo "<td>".$row["name"]."</td>";
                                       echo "<td>".$row["description"]."</td>";
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
                                        </div>
                                    </div>
        <!--------------------deliverables---->


                                </div>
                                <div class="tab-pane" id="tab-costs">
                    <!----Costs tab ---->
                                                                <div class="feed-activity-list">
                                        <div class="feed-element">
                                            <div class="wrapper wrapper-content animated fadeInRight">
                                            <div class="row">
                                            <div class="col-lg-12">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-title">
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

                                                    <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                                    <tr>
                                                                        <th>Project ID</th>
                                                                        <th>Milestone</th>
                                                                        <th>Item</th>
                                                                        <th>Description</th>
                                                                        <th>Cost</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php

                                                                    $sql = "SELECT * FROM projectcosts where projectId='$id'";
                                                                    $result= queryMysql($sql);

                                                               while ($row = $result->fetch_assoc()) {
                                                                   echo "<tr class='gradeX'>";
                                                                   echo "<td>".$row['projectId']."</td>";
                                                                   echo "<td>".$row["milestoneId"]."</td>";
                                                                   echo "<td>".$row["item"]."</td>";
                                                                   echo "<td>".$row["description"]."</td>";
                                                                   echo "<td>".$row["amount"]."</td>";
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
                                        </div>
                                    </div>
                        

                    <!----Costs tab ---->
                                </div>

                                <div class="tab-pane" id="tab-teams">
                    <!---team tab ---->
                                
                                                                    <div class="feed-activity-list">
                                        <div class="feed-element">
                                        <!--tab content starts here-->

                                        <div class="ibox">
                                        <?php

                                        $majina = "SELECT * FROM project_data";
                                        $mayai= queryMysql($majina);
                                        while ($row = $mayai->fetch_assoc()) {


                                            echo '<div class="ibox-title">';
                                            echo '<h4>'.$row['project_name'].' team members</h4>';
                                            echo '</div>';
                                            $employees= "SELECT name FROM users,projectusers where projectId='$id' and employeeNo=users.no";
                                            $walewa= queryMysql($employees);
                                            while ($row2=$walewa->fetch_assoc()){
                                               
                                                echo '<h5>'.$row2['name'].'</h5>';
                                                
                                            }
                                        }
                                    
                                            ?>
                                        </div>

                                        </div>
                                    </div>
                        

                    <!----team tab ---->
                                </div>

                                <div class="tab-pane" id="tab-components">
                    <!----components tab ---->
                 <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Project Gantt chart&nbsp;&nbsp;</h5>
                            <?php
                            $sql=queryMysql("select datediff(endDate,startDate) as difference,name,startDate,endDate from milestones where projectId='$id'");
                            if($sql->num_rows>0)
                            { 
                                $i=-1;
                                while($row=$sql->fetch_assoc())
                                {
                                    $i++;
                                    $startdate[$i]=$row['startDate'];
                                    $enddate[$i]=$row['endDate'];
                                    $duration[$i]=$row['difference'];
                                    $label[$i]=$row['name'];
                                }
                                sort($startdate);
                                sort($enddate);
                                 $date1=date('M jS \'y g:ia', strtotime($startdate[0]));
                                 $date2=date('M jS \'y g:ia', strtotime($enddate[$i]));
                                echo "<h5>Project start date is $date1 and project end date is $date2</h5>";
                            }
                            else
                                echo "<h5>There are no milestones yet</h5>";
                            ?>
                        </div>
                        <div class="ibox-content">
                            <div id="ct-chart4" class="ct-perfect-fourth"></div>
                        </div>
                    </div>
                </div>
                    <!----components tab ---->
                                </div>

                    <div class="tab-pane" id="tab-documents">
                    <!----documents tab ---->
                            <div class="feed-activity-list">
                                        <div class="feed-element">
                                        <div class="table-responsive">
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
                                                                $sql = "SELECT * FROM projectdocuments where projectId='$id' ORDER BY uploadTime DESC";
                                                                $result= queryMysql($sql);

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
                                                        </div>

                                        </div>
                                    </div>
                    <!----documents tab ---->
                                </div>


                                </div>

                                </div>

                                </div>
                                </div>
                            </div>
<!----tabs ------>

                        </div></div></div></div>
                                    <div class="col-lg-3">
                <div class="wrapper wrapper-content project-manager">
                    <h4>Project description</h4>
                    <p class="small">
                       <?php echo $projRow['project_desc'] ?>
                    </p>
                    <p class="small font-bold">
                        <span><i class="fa fa-circle text-warning"></i> High priority</span>
                    </p>
                    <h5>Project files</h5>
                    <?php
                    $fileQuery=queryMysql("select * from projectdocuments where projectId='$id'");
                    if($fileQuery->num_rows > 0)
                    {
                        echo "<ul class='list-unstyled project-files'>";
                        while($fileRow=$fileQuery->fetch_assoc())
                        {
                            echo "<li><a href=".$fileRow['location']."><i class='fa fa-file'></i> ".$fileRow['name']."</a></li>";
                        }
                        echo "</ul>";

                    }
                    else
                        echo "<div class='alert sucess fade-in'>There are no files yet</div>"
                    ?>
                    <div class="text-center m-t-md">
                        <a class="btn btn-xs btn-primary" data-toggle="modal" href="#myDocumentation">Add files</a>

                    </div>
                </div>
            </div>
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
    <?php script($id); ?>
</body>
</html>
<?php
function script($id)
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

    <!-- Chartist -->
    <script src="../js/plugins/chartist/chartist.min.js"></script>

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

          
             $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

               $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true)

                // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

                simpleLoad(btn, false)
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


        });
        


    </script>

    <script>
            function milestoneDisplay()
            {
                var milestone=document.getElementById("milestone");
                if(milestone.style.display=="none")
                {
                    milestone.style.display= "block";
                }
                    
                else
                milestone.style.display= "none";

            }
            </script>
            <script>
   function hideElement()
    {
        var d=document.getElementById("milestone");
        d.style.display="none";
    }
    function chartist()
    {
        // Stocked horizontal bar
    <?php 
    ganttChart($id);
    ?>

            
    }
    </script>

<?php
}
?>