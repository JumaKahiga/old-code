<?php
include ('base.php');
function reload($location)
{
echo <<<script
<script>location.replace("$location")</script>
script;
}
function titleHeader($title)
{
?>
<html>

<head>
    <!DOCTYPE html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

<?php

}
function footer()
{

}
function noScript()
{
?>
<noscript>
    <style type="text/css">
        .wrapper{display:none;}
    </style>
    <div class="noscriptmsg">
    You don't have javascript enabled. Enable javascript to use this site.
    </div>
</noscript>
<?php
}
function adminMenu($level)
{

	?>
<div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo $level;?>img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['userName']?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['title']?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo $level;?>profile.php">Profile</a></li>
                            <li><a href="<?php echo $level;?>contacts.php">Contacts</a></li>
                            <li><a href="<?php echo $level;?>mailbox/inbox.php">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $level;?>logOut.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CRM+
                    </div>
                </li>
                <li class="active">
                    <a href="<?php echo $level;?>index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <span class="fa arrow"></span></a>
                </li>
                <li>
                    <a href="<?php echo $level;?>mailbox/inbox.php"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">new</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>mailbox/inbox.php">Inbox</a></li>
                         <li><a href="<?php echo $level;?>mailbox/sentMail.php">Outbox</a></li>
                    </ul>
                </li>
                <?php
                    if($_SESSION['department']=="Finance"|| $_SESSION['level']==1)
                    {
                    ?>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Finance</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>finance/transactions.php">Transactions</a></li>
                        <li><a href="<?php echo $level;?>finance/invoice.php">Quotations and Invoices</a></li>
                       <li><a href="<?php echo $level;?>finance/payroll.php">Payroll</a></li>
                       <li><a href="<?php echo $level;?>finance/payrollReports.php">Payroll Reports</a></li>
                        <li><a href="<?php echo $level;?>finance/budget.php">Budgets</a></li>
                        <li><a href="<?php echo $level;?>finance/budgetReports.php">Budget Reports</a></li>
                        <li><a href="<?php echo $level;?>finance/forecasts.php">Forecasts</a></li>
                        <li><a href="<?php echo $level;?>finance/reports.php">Financial Reports</a></li>
                        <li><a href="<?php echo $level;?>finance/sales.php">Record sales</a></li>
                        <li><a href="<?php echo $level;?>finance/salesReport.php">Sales reports</a></li>
                        <li><a href="<?php echo $level;?>finance/csr.php">CSR</a></li>
                    </ul>
                </li>
                <?php
                }
                ?>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Human Resource</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>employees/profiles.php">Profile</a></li>
                        <li><a href="<?php echo $level;?>employees/payroll.php">Payroll</a></li>
                        <li><a href="<?php echo $level;?>employees/training.php">Training</a></li>
                        <li><a href="<?php echo $level;?>employees/recruitment.php">Recruitment</a></li>
                        <li><a href="<?php echo $level;?>employees/addUser.php">Add employee</a></li>
                        <li><a href="<?php echo $level;?>employees/view.php">View Employees</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Creatives</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>creatives/programming.php">IT & Programming</a></li>
                        <li><a href="<?php echo $level;?>creatives/feeds.php">Social Media Feed</a></li>
                        <li><a href="<?php echo $level;?>creatives/blog.php">Blogs</a></li>
                        <li><a href="<?php echo $level;?>creatives/campaigns.php">Campaigns</a></li>
                        <li><a href="<?php echo $level;?>creatives/products.php">Products & Services</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Project Management</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>projects/projects.php">View Projects</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Sales</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo $level;?>sales/leads.php">Leads</a>
                        </li>
                        <li><a href="<?php echo $level;?>sales/leadsReports.php">Lead Reports</a></li>
                        <li>
                            <a href="<?php echo $level;?>sales/adverts.php">Advertisements</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Contacts</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>contacts/addContact.php">Add a contact</a></li>
                        <li><a href="<?php echo $level;?>contacts/viewContacts.php">View contacts</a></li>
                    </ul>
                </li>
            </ul>

        </div>
<?php
}
function userMenu($level)
{
	?>
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo $level;?>img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['userName']?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['title']?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo $level;?>employees/profiles.php">Profile</a></li>
                            <li><a href="contacts.php">Contacts</a></li>
                            <li><a href="<?php echo $level;?>inbox.php">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $level;?>logOut.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CRM+
                    </div>
                </li>
                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <span class="fa arrow"></span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Finance</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="transactions.php">Transactions</a></li>
                        <li><a href="invoice.html">Quotations and Invoices</a></li>
                        <li><a href="<?php echo $level;?>finance/payroll.php">Payroll</a></li>
                        <li><a href="reports.php">Budgets & Forecasts</a></li>
                        <li><a href="reports.php">Financial Reports</a></li>
                        <li><a href="form_wizard.html">CSR</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Human Resource</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo $level;?>employees/profiles.php">Profile</a></li>
                        <li><a href="<?php echo $level;?>employees/appraisal.php">Appraisal</a></li>
                        <li><a href="form_wizard.html">Training</a></li>
                        <li><a href="<?php echo $level;?>employees/feedback.php">Staff Feedback</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Creatives</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="programming.html">IT & Programming</a></li>
                        <li><a href="feeds.html">Social Media Feed</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="blog.html">Blogs</a></li>
                        <li><a href="campaigns.html">Campaigns</a></li>
                        <li><a href="products.html">Products & Services</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Sales</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="#">Leads<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="leads.html">View Leads</a>
                                </li>
                                <li>
                                    <a href="leadReports.html">View Lead Reports</a>
                                </li>
                                <li>
                                    <a href="createLead.html">Create Leads</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="sales report.html">Sales Reports</a></li>
                        <li>
                            <a href="#">Advertisements</a></li>
                        <li>
                            <a href="contact.html">Contacts</a></li>
                    </ul>
                </li>
            </ul>

        </div>
<?php
}
function userHeader()
{
?>
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to MagnaCRM</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="logOut.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
<?php
}
function netIncome($date)
{
    $grossProfit=0;$netProfit=0;
    $salesAmount=$purchasesAmount=$expensesAmount=0;
    $expensesQuery="SELECT sum(amount) as 'amount' FROM transactions WHERE transaction='Credit' and YEAR(date)='$date' and category <> 'Purchases'";
    $salesQuery="SELECT sum(amount) as 'amount' from transactions where transaction='Debit' and category='Sales' and YEAR(date)='$date'";
    $purchasesQuery="SELECT sum(amount) as 'amount' from transactions where transaction='Credit' and category='Purchases' and YEAR(date)='$date'";
    $totalExpenses=queryMysql($expensesQuery);
    $sales=queryMysql($salesQuery);
    $purchases=queryMysql($purchasesQuery);
    if(($sales->num_rows >0))
    {
        $row=$sales->fetch_assoc();
        $salesAmount=$row['amount'];

    }
    else
        $salesAmount=0;
    if(($purchases->num_rows >0))
    {
        $row=$purchases->fetch_assoc();
        $purchasesAmount=$row['amount'];

    }
    else
        $purchasesAmount=0;
    if(($totalExpenses->num_rows >0))
    {
        $row=$totalExpenses->fetch_assoc();
        $expensesAmount=$row['amount'];

    }
    else
        $expensesAmount=0;
    $grossProfit=$salesAmount-$purchasesAmount;
    $netProfit=$grossProfit-$expensesAmount;
    return $netProfit;
}
function cashReceipts($date)
{
    $cash=0;
    $sql="SELECT sum(amount) as 'amount' from transactions where transaction='debit' and category='Sales' and YEAR(date)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function salesReceipts($date)
{
    $cash=0;
    $sql="SELECT sum(amount) as 'amount' from transactions where transaction='credit' and category='Purchases' and YEAR(date)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function payroll($date)
{
    $cash=0;
    $sql="SELECT sum(amount) as 'amount' from transactions where transaction='credit' and category like 'Payroll' and YEAR(date)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function assetPurchase($date)
{
    $cash=0;
    $sql="select sum(amount) as 'amount' from assets where flag='0' and year(dateAcquired)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function assetSale($date)
{
    $cash=0;
    $sql="select sum(amount) as 'amount' from assets where flag='1' and year(dateDisposed)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function dividend($date)
{
    $cash=0;
    $sql="select sum(amount) as 'amount' from transactions where transaction='credit' and category='Dividend' and year(date)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function loanPayment($date)
{
    $cash=0;
    $sql="select sum(amount) as 'amount' from transactions where transaction='credit' and category='Loan' and year(date)='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
function getCurrentCash($date)
{
    $cash=0;
    $sql="select sum(amount) as 'amount' from cash where year(date)-1='$date'";
    $results=queryMysql($sql);
    if($results->num_rows >0)
    {
        $row=$results->fetch_assoc();
        if ($row['amount']!=null)
        $cash=$row['amount'];
    else
        $cash=0;
    }
    else
        $cash=0;

return $cash;
}
?>