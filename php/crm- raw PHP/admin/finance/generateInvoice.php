<?php
include ('../../functions.php');
if(isset($_REQUEST['no']))
{
	$invoiceNo=$_REQUEST['no'];
	queryMysql("update invoices set status=1 where invoiceNo='$invoiceNo'");
}
else
	echo "<script>location.replace('invoice.php')</script>";
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MagnaCRM :: Invoice</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body onLoad="hideElement();">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <?php adminMenu("../") ?>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <?php userHeader(); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Invoice</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            <strong>Invoice</strong>
                        </li>
                    </ol>
                </div>
                <!--Print invoice div starts-->
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="printInvoice.php?no=<?php echo $invoiceNo ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
                    </div>
                </div>
                <!--Print invoice div ends-->
            </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>
                                    <address>
                                        <strong>Magnaforte Enterprises</strong><br>
                                        Aqua Office Suites, 3rd Floor, Room 3<br>
                                        Murang'a Road, Opp KIE<br>
                                        finance@magnaforte.co.ke<br>Web: www.magnaforte.co.ke<br>
                                        <abbr title="Phone">P:</abbr> +254-(720)-020-381
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <?php
                                    $askInv= "SELECT * FROM invoices WHERE invoiceNo='$invoiceNo'";
                                    $ulizaInv= queryMysql($askInv);
                                    while ($row=$ulizaInv->fetch_assoc())
                                    {                                    
                                    echo '<h4 class="text-navy">INV-0015MG-'.$row["invoiceNo"].'</h4>';
                                    $nambayaclient= $row['clientNo'];
                                    $findClient= "SELECT * FROM contacts WHERE no='$nambayaclient'";
                                    $ulizaClient= queryMysql($findClient);
                                    while ($row2=$ulizaClient->fetch_assoc()){
                                    echo '<span>To:</span>';
                                    echo '<address>';
                                        echo '<strong>'.$row2["name"].'</strong><br>';
                                        echo $row2["address"];
                                        echo '<br>';
                                        echo '<abbr title="Phone">P: </abbr>';
                                        echo $row2["mobile"];
                                    echo '</address>';
                                }
                                    echo '<p>';
                                    
                                        echo '<span><strong>Invoice Date: </strong>' .$row["startDate"].'</span><br/>'; 
                                        echo '<span><strong>Due Date: </strong>'.$row["endDate"].'</span>';
                                    echo '</p>';
                                
                                    ?>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Item List</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    echo '<tr>';
                                        echo '<td><div>'.$row["item1"].'</div></td>';
                                        echo '<td>Kes '.$row["itemprice1"].'.00</td>';
                                    echo '</tr>';
                                    if($row["itemprice2"]==0)
                                    {

                                    }
                                    else
                                    {
                                        echo '<tr>';
                                        echo '<td><div>'.$row["item2"].'</div></td>';
                                        echo '<td>Kes '.$row["itemprice2"].'.00</td>';
                                        echo '</tr>';
                                    }
                                     if($row["itemprice3"]==0)
                                    {

                                    }
                                    else
                                    {
                                    echo '<tr>';
                                        echo '<td><div>'.$row["item3"].'</div></td>';
                                        echo '<td>Kes '.$row["itemprice3"].'.00</td>';
                                    echo '</tr>';
                                    }
                                     if($row["itemprice4"]==0)
                                    {

                                    }
                                    else
                                    {
                                        echo '<tr>';
                                        echo '<td><div>'.$row["item4"].'</div></td>';
                                        echo '<td>kes '.$row["itemprice4"].'.00</td>';
                                        echo '</tr>';
                                    }
                                     if($row["itemprice5"]==0)
                                    {

                                    }
                                    else
                                    {
                                    echo '<tr>';
                                        echo '<td><div>'.$row["item5"].'</div></td>';
                                        echo '<td>Kes '.$row["itemprice5"].'.00</td>';
                                    echo '</tr>';
                                    }
                                     if($row["itemprice6"]==0)
                                    {

                                    }
                                    else
                                    {
                                    echo '<tr>';
                                        echo '<td><div>'.$row["item6"].'</div></td>';
                                        echo '<td>Kes '.$row["itemprice6"].'.00</td>';
                                    echo '</tr>';
                                    }                        
                    
                                    ?>

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <?php
                                echo '<tr>';
                                    echo '<td><strong>Sub Total :</strong></td>';
                                    $subtotal= ($row['itemprice1'] + $row['itemprice2']+ $row['itemprice3']+ $row['itemprice4']+ $row['itemprice5']+ $row['itemprice6']);
                                    echo '<td>'.$subtotal.'.00</td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td><strong>TAX :</strong></td>';
                                    $vater= '0.16';
                                    $taxer= ($subtotal * $vater);
                                    echo '<td>'.$taxer.'.00</td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td><strong>TOTAL :</strong></td>';
                                    echo '<td>Kes '.($subtotal + $taxer).'.00</td>';
                                echo '</tr>';
                            }

                                ?>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                            </div>

                        </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Magnaforte Enterprises &copy; 2015-2016
            </div>
        </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>


</body>

</html>

