<?php
require_once ('../../functions.php');
function messageBody()
{
?>
<div class="wrapper wrapper-content">
        <div class="row">
            <?php messageMenu() ?>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">

                <h2>
                    Inbox 
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                       

                    </div>
                    <a class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox" href="inbox.php"><i class="fa fa-refresh"></i> Refresh</a>

                </div>
            </div>
                <div class="mail-box">

               
                <tbody>
                    <?php
                    $user=$_SESSION['email'];
                     $query=queryMysql("select message.no,subject,name as 'sender',logtime,status from message,users where users.email=receiver and receiver='$user' order by logtime");
                     if($query)
                     {
                        $num=$query->num_rows;
                        if ($num==0)
                        {
                            echo "<div class='alert alert-info' role='alert'>You have no messages yet.</div>";
                        }
                        else
                        {
                            echo "<table class='table table-hover table-mail'><tbody>";
                            while ($row=$query->fetch_assoc())
                            { 
                                $row=mysql_fetch_row($query);
                                if ($row['status']==0)
                                    echo '<tr class="unread">';
                                else
                                    echo '<tr class="read">';
                     echo "<td class='mail-ontact'><a href='getMail.php?no=".$row['no']."'>".$row['sender']."</a></td>";
                    echo "<td class='mail-subject'><a href='getMail.php?no=".$row['no']."'>".$row['subject']."</a></td>";
                    echo "<td class='text-right mail-date'>".$row['logTime']."</td></tr>";
message;

                            }
                            echo "</tbody></table>";
                        }
                     }
                    ?>
               
                


                </div>
            </div>
        </div>
        </div>
<?php
}
function composeEmail($user)
{
?>
<div class="wrapper wrapper-content">
        <div class="row">
            <?php messageMenu() ?>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <h2>
                    Compose mail
                </h2>
            </div>
                <div class="mail-box">


                <div class="mail-body">

                    <form class="form-horizontal" method="post" action="sendMessage.php">
                        <div class="form-group"><label class="col-sm-2 control-label">To:</label>

                            <div class="col-sm-10">
                                <?php 
                                 $users=queryMysql("select name,email from users"); 
                                 if($users->num_rows>0)
                                 {
                                    echo "<select name='recepient' class='form-control'>";
                                    while ($row=$users->fetch_assoc())
                                    {
                                         echo "<option value='".$row['email']."'>".$row['name']."</option>";
                                    }
                                    echo "</select>";
                                 }
                                ?>
                                <input type="hidden" name="from" value="<?php echo $user; ?>">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>

                            <div class="col-sm-10"><input type="text" name="subject" class="form-control" value=""></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Message:</label>

                            <div class="col-sm-10"><textarea col="50" rows="5" type="text" name="message" class="form-control" value="" placeholder="Enter the message here...."></textarea></div>
                        </div>
                        

                </div>

  
                    <div class="mail-body text-right tooltip-demo">
                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</a></button>
                        <button type="reset" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</button>
                    </div>
                    </form>
                    <div class="clearfix"></div>



                </div>
            </div>
        </div>
        </div>
<?php
}
function messageMenu()
{
?>
<div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <a class="btn btn-block btn-primary compose-mail" href="mail_compose.php">Compose Mail</a>
                            <div class="space-25"></div>
                            <h5>Folders</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="mailbox.php"> <i class="fa fa-inbox "></i> Inbox</a></li>
                                <li><a href="sentMail.php"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
<?php
}
function sentMessage()
{
?>
<div class="wrapper wrapper-content">
        <div class="row">
            <?php messageMenu() ?>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">

                <h2>
                    Inbox 
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                       

                    </div>
                    <a class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh sent box" href="inbox.php"><i class="fa fa-refresh"></i> Refresh</a>

                </div>
            </div>
                <div class="mail-box">

               
                <tbody>
                    <?php
                    $user=$_SESSION['email'];
                     $query=queryMysql("select message.no,subject,name as 'receiver',logtime,status from message,users where users.email=sender and sender='$user' order by logtime");
                     if($query)
                     {
                        $num=$query->num_rows;
                        if ($num==0)
                        {
                            echo "<div class='alert alert-info' role='alert'>You have no messages yet.</div>";
                        }
                        else
                        {
                            echo "<table class='table table-hover table-mail'><tbody>";
                            while ($row=$query->fetch_assoc())
                            { 
                                
                                if ($row['status']==0)
                                    echo '<tr class="unread">';
                                else
                                    echo '<tr class="read">';
                    echo "<td class='mail-ontact'><a href='getMail.php?no=".$row['no']."'>".$row['sender']."</a></td>";
                    echo "<td class='mail-subject'><a href='getMail.php?no=".$row['no']."'>".$row['subject']."</a></td>";
                    echo "<td class='text-right mail-date'>".$row['logTime']."</td></tr>";

                            }
                            echo "</tbody></table>";
                        }
                     }
                    ?>
               
                


                </div>
            </div>
        </div>
        </div>
<?php
}
function messageDetails($query)
{
    $row=$query->fetch_assoc();
?>
        <div class="wrapper wrapper-content">
        <div class="row">
            <?php messageMenu();?>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="mail_compose.php" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                </div>
                <h2>
                    View Message
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">


                    <h3>
                        <span class="font-noraml">Subject: </span><?php echo $row['subject']; ?>
                    </h3>
                    <h5>
                        <span class="pull-right font-noraml"><?php echo $row['logTime']; ?></span>
                        <span class="font-noraml">From: </span><?php echo $row['sender']; ?>
                    </h5>
                </div>
            </div>
                <div class="mail-box">


                <div class="mail-body">
                    <p>
                       <?php echo nl2br($row['message']); ?>
                    </p>
                </div>
                        <div class="mail-body text-right tooltip-demo">
                                <a class="btn btn-sm btn-white" href="mail_compose.php"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                        <div class="clearfix"></div>


                </div>
            </div>
        </div>
        </div>
<?php
}
?>