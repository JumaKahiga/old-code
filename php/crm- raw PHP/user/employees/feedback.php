<?php
include ('../../functions.php');
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
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>Messages</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <!-----Content goes here---->
                         <div class="wrapper wrapper-content">
                <div class=>
                    <form method="post" action="feedbackconfirm.php">
                        <div class="ibox-content" style="display: block;">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td><div class="col-sm-10"><input type="text" name="feedname" class="form-control"></div></td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td><div class="col-sm-10"><select name="feeddept" class="form-control">
                                    <option value="Human Resource"> 1. Human Resource</option>
                                    <option value="Finance"> 2. Finance</option>
                                    <option value="Sales &amp; Marketing"> 3. Sales &amp; Marketing</option>                                        
                                    <option value="IT"> 4. Creatives : IT</option>
                                    <option value="Branding"> 5. Creatives : Branding</option>
                                    </select></div></td>
                                </tr>
                                <tr>
                                    <td>Date :</td>
                                    <td><div class="col-sm-10"><input type="text" id="datepicker" name="feeddate" class="form-control"></div></td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <h2>Employee Job Satisfaction—Job Passion and Self-Evaluation</h2>
                            <p style="font-size: 12px; color: #424242; margin-top: 10px;" class="blog-text-description">We would like to ask you about the kinds of positive experiences you have in your organization.</p>
                            <table class="table" id="customerquestions" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="rowd">
                                        <td class="col1 cell"></td>
                                        <td class="col2 cell">Strongly Disagree</td>
                                        <td class="col3 cell">Somewhat Disagree</td>
                                        <td class="col4 cell">Neither Agree nor Disagree</td>
                                        <td class="col5 cell">Somewhat Agree</td>
                                        <td class="col6 cell">Strongly Agree</td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">I experience personal growth such as updating skills and learning different jobs</td>
                                        <td class="col2 cell"><input type="radio" name="personalgrowth" value="Strongly Disagree" /></td>
                                        <td class="col3 cell"><input type="radio" name="personalgrowth" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="personalgrowth" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="personalgrowth" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="personalgrowth" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">Management looks to me for suggestions and leadership</td>
                                        <td class="col2 cell"><input type="radio" name="leadership" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="leadership" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="leadership" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="leadership" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="leadership" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">Supervisors encourage me to be my best</td>
                                        <td class="col2 cell"><input type="radio" name="supervisor" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="supervisor" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="supervisor" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="supervisor" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="supervisor" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">I am rewarded for the quality of my efforts</td>
                                        <td class="col2 cell"><input type="radio" name="rewarded" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="rewarded" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="rewarded" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="rewarded" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="rewarded" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">I am valued by my supervisor</td>
                                        <td class="col2 cell"><input type="radio" name="valued" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="valued" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="valued" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="valued" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="valued" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">The company has a positive image to my friends and family.</td>
                                        <td class="col2 cell"><input type="radio" name="positive" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="positive" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="positive" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="positive" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="positive" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">My job makes a difference in the lives of others.</td>
                                        <td class="col2 cell"><input type="radio" name="changesd" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="changesd" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="changesd" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="changesd" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="changesd" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">I solve customers&#8217; problems</td>
                                        <td class="col2 cell"><input type="radio" name="solve" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="solve" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="solve" value="Neither Agreee nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="solve" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="solve" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">Overall, I am satisfied with my job.</td>
                                        <td class="col2 cell"><input type="radio" name="overall" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="overall" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="overall" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="overall" value="Strongly Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="overall" value="Strongly Agree"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style="font-size: 12px; color: #424242; margin-top: 10px;" class="blog-text-description">Next, we are interested in how you believe you perform on the job.</p>
                            <p style="font-size: 12px; color: #424242; margin-top: 10px;" class="blog-text-description">When answering these questions, please Compare yourself with an average employee in your position and rate your own productivity and quality of your work.</p>
                            <table class="table" id="customerquestions" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="rowc">
                                        <td class="col1 cell"></td>
                                        <td class="col2 cell">Upper 5%</td>
                                        <td class="col3 cell">Upper 10%</td>
                                        <td class="col4 cell">Upper 20%</td>
                                        <td class="col5 cell">Upper 30%</td>
                                        <td class="col6 cell">Middle 50%</td>
                                        <td class="col7 cell">Lower 30%</td>
                                        <td class="col8 cell">Bottom 20%</td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">Productive time spent working on the tasks assigned to me.</td>
                                        <td class="col2 cell"><input type="radio" name="productive" value="Upper 5%"/></td>
                                        <td class="col3 cell"><input type="radio" name="productive" value="Upper 10%"/></td>
                                        <td class="col4 cell"><input type="radio" name="productive" value="Upper 20%"/></td>
                                        <td class="col5 cell"><input type="radio" name="productive" value="Upper 30%"/></td>
                                        <td class="col6 cell"><input type="radio" name="productive" value="Middle 50%"/></td>
                                        <td class="col7 cell"><input type="radio" name="productive" value="Lower 30%"/></td>
                                        <td class="col8 cell"><input type="radio" name="productive" value="Bottom 20%"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">Meeting target quotas and goals</td>
                                        <td class="col2 cell"><input type="radio" name="quotas" value="Upper 5%"/></td>
                                        <td class="col3 cell"><input type="radio" name="quotas" value="Upper 10%"/></td>
                                        <td class="col4 cell"><input type="radio" name="quotas" value="Upper 20%"/></td>
                                        <td class="col5 cell"><input type="radio" name="quotas" value="Upper 30%"/></td>
                                        <td class="col6 cell"><input type="radio" name="quotas" value="Middle 50%"/></td>
                                        <td class="col7 cell"><input type="radio" name="quotas" value="Lower 30%"/></td>
                                        <td class="col8 cell"><input type="radio" name="quotas" value="Bottom 20%"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">Overall productivity in getting the job done</td>
                                        <td class="col2 cell"><input type="radio" name="jobproduction" value="Upper 5%"/></td>
                                        <td class="col3 cell"><input type="radio" name="jobproduction" value="Upper 10%"/></td>
                                        <td class="col4 cell"><input type="radio" name="jobproduction" value="Upper 20%"/></td>
                                        <td class="col5 cell"><input type="radio" name="jobproduction" value="Upper 30%"/></td>
                                        <td class="col6 cell"><input type="radio" name="jobproduction" value="Middle 50%"/></td>
                                        <td class="col7 cell"><input type="radio" name="jobproduction" value="Lower 30%"/></td>
                                        <td class="col8 cell"><input type="radio" name="jobproduction" value="Bottom 20%"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">Going beyond what is expected of me to make customers happy</td>
                                        <td class="col2 cell"><input type="radio" name="beyond" value="Upper 5%"/></td>
                                        <td class="col3 cell"><input type="radio" name="beyond" value="Upper 10%"/></td>
                                        <td class="col4 cell"><input type="radio" name="beyond" value="Upper 20%"/></td>
                                        <td class="col5 cell"><input type="radio" name="beyond" value="Upper 30%"/></td>
                                        <td class="col6 cell"><input type="radio" name="beyond" value="Middle 50%"/></td>
                                        <td class="col7 cell"><input type="radio" name="beyond" value="Lower 30%"/></td>
                                        <td class="col8 cell"><input type="radio" name="beyond" value="Bottom 20%"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">I respond quickly and courteously to fulfill customers&#8217; needs</td>
                                        <td class="col2 cell"><input type="radio" name="courteously" value="Upper 5%"/></td>
                                        <td class="col3 cell"><input type="radio" name="courteously" value="Upper 10%"/></td>
                                        <td class="col4 cell"><input type="radio" name="courteously" value="Upper 20%"/></td>
                                        <td class="col5 cell"><input type="radio" name="courteously" value="Upper 30%"/></td>
                                        <td class="col6 cell"><input type="radio" name="courteously" value="Middle 50%"/></td>
                                        <td class="col7 cell"><input type="radio" name="courteously" value="Lower 30%"/></td>
                                        <td class="col8 cell"><input type="radio" name="courteously" value="Bottom 20%"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">The overall quality of service that I provide</td>
                                        <td class="col2 cell"><input type="radio" name="qualityservice" value="Upper 5%"/></td>
                                        <td class="col3 cell"><input type="radio" name="qualityservice" value="Upper 10%"/></td>
                                        <td class="col4 cell"><input type="radio" name="qualityservice" value="Upper 20%"/></td>
                                        <td class="col5 cell"><input type="radio" name="qualityservice" value="Upper 30%"/></td>
                                        <td class="col6 cell"><input type="radio" name="qualityservice" value="Middle 50%"/></td>
                                        <td class="col7 cell"><input type="radio" name="qualityservice" value="Lower 30%"/></td>
                                        <td class="col8 cell"><input type="radio" name="qualityservice" value="Bottom 20%"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <p>&nbsp;</p>
                            <p style="font-size: 12px; color: #424242; margin-top: 10px;" class="blog-text-description">Please indicate your level of agreement with each of the following statements.</p>
                            <table class="table" id="customerquestions" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="rowc">
                                        <td class="col1 cell"></td>
                                        <td class="col2 cell">Strongly Disagree</td>
                                        <td class="col3 cell">Disagree</td>
                                        <td class="col4 cell">Neither Agree nor Disagree</td>
                                        <td class="col5 cell">Agree</td>
                                        <td class="col6 cell">Strongly Agree</td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">The company clearly communicates its goals and strategies to me.</td>
                                        <td class="col2 cell"><input type="radio" name="goals" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="goals" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="goals" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="goals" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="goals" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">I receive adequate opportunity to interact with other employees on a formal level.</td>
                                        <td class="col2 cell"><input type="radio" name="adequate" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="adequate" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="adequate" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="adequate" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="adequate" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowb">
                                        <td class="col1 cell" style="text-align: left;">I have a clear path for career advancement.</td>
                                        <td class="col2 cell"><input type="radio" name="careeradvance" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="careeradvance" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="careeradvance" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="careeradvance" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="careeradvance" value="Strongly Agree"/></td>
                                    </tr>
                                    <tr class="rowa">
                                        <td class="col1 cell" style="text-align: left;">My job requirements are clear.</td>
                                        <td class="col2 cell"><input type="radio" name="jobrequirements" value="Strongly Disagree"/></td>
                                        <td class="col3 cell"><input type="radio" name="jobrequirements" value="Somewhat Disagree"/></td>
                                        <td class="col4 cell"><input type="radio" name="jobrequirements" value="Neither Agree nor Disagree"/></td>
                                        <td class="col5 cell"><input type="radio" name="jobrequirements" value="Somewhat Agree"/></td>
                                        <td class="col6 cell"><input type="radio" name="jobrequirements" value="Strongly Agree"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="Submit" name="submit" value="submit"/>
                        </form>
                        
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
?>