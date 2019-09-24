<?php
require_once('../../functions.php');
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
    <link href="../css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <link href="../css/plugins/codemirror/ambiance.css" rel="stylesheet">
    

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
                            <strong>Creatives</strong>
                        </li>
                    </ol>
                </div>
            </div>

                <!-----Content goes here---->
                    <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Code Editor</h5>
                        </div>
                        <div class="ibox-content">

                            <p  class="m-b-lg">
                                <strong>Code scratch board</strong></p>

<textarea id="code1">
<script>
    // Code goes here

    // For demo purpose - animation css script
    function animationHover(element, animation){
        element = $(element);
        element.hover(
                function() {
                    element.addClass('animated ' + animation);
                },
                function(){
                    //wait for animation to finish before removing classes
                    window.setTimeout( function(){
                        element.removeClass('animated ' + animation);
                    }, 2000);
                });
    }
</script>
</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Code Editor - Scratch board</h5>
                        </div>
                        <div class="ibox-content">

                            <p  class="m-b-lg">
                                <strong>Code scratch board</strong></p>
                            
<textarea id="code2">
    var SpeechApp = angular.module('SpeechApp', []);

    function VoiceCtrl($scope) {

        $scope.said='...';

        $scope.helloWorld = function() {
            $scope.said = "Hello world!";
        }

        $scope.commands = {
            'hello (world)': function() {
                if (typeof console !== "undefined") console.log('hello world!')
                $scope.$apply($scope.helloWorld);
            },
            'hey': function() {
                if (typeof console !== "undefined") console.log('hey!')
                $scope.$apply($scope.helloWorld);
            }
        };

        annyang.debug();
        annyang.init($scope.commands);
        annyang.start();
    }
</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Issue list</h5>
                            <div class="ibox-tools">
                                <a href="" class="btn btn-primary btn-xs">Add new issue</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="m-b-lg">

                                <div class="input-group">
                                    <input type="text" placeholder="Search issue by name..." class=" form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-white"> Search</button>
                                    </span>
                                </div>
                                <div class="m-t-md">

                                    <div class="pull-right">
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-comments"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-user"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-list"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-print"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-cogs"></i> </button>
                                    </div>

                                    <strong>Found 2 issues.</strong>



                                </div>

                            </div>

                            <div class="table-responsive">
                            <table class="table table-hover issue-tracker">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="label label-primary">Added</span>
                                    </td>
                                    <td class="issue-info">
                                        <a href="#">
                                            ISSUE-23
                                        </a>

                                        <small>
                                            This is issue with the coresponding note
                                        </small>
                                    </td>
                                    <td>
                                        Christopher Mucheke
                                    </td>
                                    <td>
                                        12.02.2015 10:00 am
                                    </td>
                                    <td>
                                        <span class="pie">0.52,1.041</span>
                                        2d
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-white btn-xs"> Tag</button>
                                        <button class="btn btn-white btn-xs"> Mag</button>
                                        <button class="btn btn-white btn-xs"> Rag</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="label label-primary">Added</span>
                                    </td>
                                    <td class="issue-info">
                                        <a href="#">
                                            ISSUE-17
                                        </a>

                                        <small>
                                            Desktop publishing packages and web page editors now use Lorem Ipsum as their default model text
                                        </small>
                                    </td>
                                    <td>
                                        Dennis Mararia
                                    </td>
                                    <td>
                                        10.02.2015 05:32 am
                                    </td>
                                    <td>
                                        <span class="pie">3,2</span>
                                        2d
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-white btn-xs"> Tag</button>
                                        <button class="btn btn-white btn-xs"> Rag</button>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                            </div>
                        </div>

                    </div>
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
    <!-- CodeMirror -->
    <script src="../js/plugins/codemirror/codemirror.js"></script>
    <script src="../js/plugins/codemirror/mode/javascript/javascript.js"></script>

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
        var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                 lineNumbers: true,
                 matchBrackets: true,
                 styleActiveLine: true,
                 theme:"ambiance"
             });

             var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
                 lineNumbers: true,
                 matchBrackets: true,
                 styleActiveLine: true
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