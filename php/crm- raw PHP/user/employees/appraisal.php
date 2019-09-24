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
                                <form method="post" action="confirmappraisal.php">
                                    <table width="370" border="0" class="table">
                                        <tr>
                                            <td width="201">Name :</td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="text" name="namesfull" id="namesfull" maxlength="100" class="form-control" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Department : </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <select name="department" class="form-control">
                                                        <option value="Human Resource"> 1. Human Resource</option>
                                                        <option value="Finance"> 2. Finance</option>
                                                        <option value="Sales &amp; Marketing"> 3. Sales &amp; Marketing</option>
                                                        <option value="IT"> 4. Creatives : IT</option>
                                                        <option value="Branding"> 5. Creatives : Branding</option>
                                                    </select></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date of Appraisal :</td>
                                                <td>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="datepicker" name="datepicker" class="form-control"/>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <p>Please fill in the form below :</p>
                                        <p>1. Circle appropriate answers, and comment below:</p>
                                        <table width="923" border="0">
                                            <tr>
                                                <td width="746">a. Do you have an up-to-date job description?     </td>
                                                <td width="77">
                                                    <input type="radio" name="jobdesc" id="jobdesc" value="Yes" />
                                                    <label for="jobdescyes">Yes</label>
                                                </td>
                                                <td width="78">
                                                    <input type="radio" name="jobdesc" id="jobdesc" value="No" />
                                                    <label for="jobdescno">No</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>b. Do you have an up-to-date action plan? </td>
                                                <td>
                                                    <input type="radio" name="actionplan" id="actionplan" value="Yes" />
                                                    <label for="actionplanyes">Yes</label>
                                                </td>
                                                <td>
                                                    <input type="radio" name="actionplan" id="actionplan" value="No" />
                                                    <label for="actionplanno">No</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>c. On a scale of 1 to 10, how well matched do you feel are the tasks assigned to you and your skills/proficiency?</td>
                                                <td colspan="2">
                                                    <input type="text" name="skillrange" id="skillrange" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>d. Do you have regular opportunities to discuss your work, and action plans?   </td>
                                                <td>
                                                    <input type="radio" name="opportunities" id="opportunities" value="Yes" />
                                                    <label for="opportunitiesyes">Yes</label>
                                                </td>
                                                <td>
                                                    <input type="radio" name="opportunities" id="opportunities" value="No" />
                                                    <label for="opportunitiesno">No</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>e. Have you carried out the improvements agreed with your manager which were made at the last appropriate meeting? </td>
                                                <td>
                                                    <input type="radio" name="improvement" id="improvement" value="Yes" />
                                                    <label for="improvementyes">Yes</label>
                                                </td>
                                                <td>
                                                    <input type="radio" name="improvement" id="improvement" value="No" />
                                                    <label for="improvementno">No</label>
                                                </td>
                                            </tr>
                                        </table>
                                        <div>
                                            <p>2. What have you accomplished, over and above the minimum requirements of your job description, in the period under review (consider the early part of the period as well as more recent events)? Have you made any innovations?
                                                <br />
                                                <textarea name="accomplishments" id="accomplishments" cols="100" rows="8"></textarea>
                                                <br />
                                            </p>
                                        </div>
                                        <div>
                                            <p>3. List any difficulties you have in carrying out your work. Were there any obstacles outside your own control which prevented you from performing effectively?</p>
                                            <textarea name="difficulties" id="difficulties" cols="100" rows="8"></textarea>
                                        </div>
                                        <div>
                                            <p></p>
                                            <p></p>
                                            4. . What parts of your job, do you:
                                            <table width="976" border="0">
                                                <tr>
                                                    <td width="219">a. Do best :</td>
                                                    <td width="747" rowspan="2">
                                                        <label for="dobest"></label>
                                                        <textarea name="dobest" id="dobest" cols="100" rows="8"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>b. Do less well :</td>
                                                    <td rowspan="2">
                                                        <label for="doless"></label>
                                                        <textarea name="doless" id="doless" cols="100" rows="8"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>c. Have difficulty with:</td>
                                                    <td rowspan="2">
                                                        <label for="difficultywith"></label>
                                                        <textarea name="difficultywith" id="difficultywith" cols="100" rows="8"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>b. Fail to enjoy:</td>
                                                    <td rowspan="2">
                                                        <label for="failenjoy"></label>
                                                        <textarea name="failenjoy" id="failenjoy" cols="100" rows="8"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                            <p></p>
                                        </div>
                                        <div>
                                            <p></p>
                                            <p>5. Have you any skills, aptitudes, or knowledge not fully utilised in your job? If so, what are they and how could they be used?</p>
                                            <p>
                                                <textarea name="aptitudes" id="aptitudes" cols="100" rows="8"></textarea>
                                            </p>
                                        </div>
                                        <div>
                                            <p></p>
                                            <p> 6. Can you suggest training which would help to improve your performance or development?</p>
                                            <p>
                                                <textarea name="performance" id="performances" cols="100" rows="8"></textarea>
                                            </p>
                                        </div>
                                        <div>
                                            <p></p>
                                            <p>7. Additional remarks, notes, questions, or suggestions </p>
                                            <p>
                                                <textarea name="aob" id="aob" cols="100" rows="8"></textarea>
                                            </p>
                                        </div>
                                        <input type="reset" name="Clear" id="Clear" value="Clear" class="btn btn-outline btn-danger" />
                                        <input type="submit" name="Submit" id="Submit" value="Submit"  class="btn btn-outline btn-primary" />
                                    </form>
                            
                            <div class="footer">
                                <div class="pull-right">
                                </div>
                                <div>
                                    <strong>Copyright</strong> Magnaforte Enterprises © 2014-2015
                                </div>
                            </div></div>


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