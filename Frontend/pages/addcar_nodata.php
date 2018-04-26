<?php
   include("../php/addcar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car2Car</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!--<script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


            <?php include("../php/addcar_data.php"); ?>
        <script>
        function UpdateFromPrevious(car) {
            var previous_values = {
                rego: "",
                manufacturer: "",
                make: "",
                model: "",
                year: "",
                doors: "",
                petrol: "",
                transmission: "",
                enginecc: "",
                kms: "",
                body: "",
                photo: ""
            };
            if(typeof car !== 'undefined')
            {
                previous_values = car;
            }

            if(previous_values.rego != "")
                $('#rego').val(previous_values.rego);
            if(previous_values.manufacturer != "")
                $('#manufacturer').val(previous_values.manufacturer);
            if(previous_values.make != "")
                $('#make').val(previous_values.make);
            if(previous_values.model != "")
                $('#model').val(previous_values.model);
            if(previous_values.year != "")
                $('#year').val(previous_values.year);
            if(previous_values.doors != "")
                $('#doors').val(previous_values.doors);
            if(previous_values.petrol != "")
                $('#petrol').val(previous_values.petrol);
            if(previous_values.transmission != "")
                $('#transmission').val(previous_values.transmission);
            if(previous_values.enginecc != "")
                $('#enginecc').val(previous_values.enginecc);
            if(previous_values.kms != "")
                $('#kms').val(previous_values.kms);
            if(previous_values.body != "")
                $('#body').val(previous_values.body);
            if(previous_values.photo != "")
                $('#photo').val(previous_values.photo);
        }
        
        function FormatMessage(message){
            var tag = '<li>';
            tag += '<a href="#">';
            tag += '<div>';
            tag += '<strong>' + message.name + '</strong>';
            tag += '<span class="pull-right text-muted">';
            tag += '<em>'+ message.time +'</em>';
            tag += '</span>';
            tag += '</div>';
            tag += '<div>' + message.message + '</div>';
            tag += '</a>';
            tag += '</li>';
            return tag;

        }

        function MapProgressToClass(progress) {
            if(progress>20)
                return "progress-bar-success";
            else
                return "progress-bar-info";
        }

        function FormatAlert(alert){
            var tag = "";
            tag += '<li> <a href="#"> <div>';
            tag += '<i class="fa fa-comment fa-fw"></i>' + alert.text;
            tag += '<span class="pull-right text-muted small">' + alert.time+ '</span>';
            tag += '</div> </a> </li>';

            return tag;
        }


        function FormatTask(task) {
            var tag = '<li><a href="#"><div><p><strong>'+task.name+' - '+task.rego+'</strong>';
            tag += '<span class="pull-right text-muted">'+task.percentage+'% Complete</span>';
            tag += '</p><div class="progress "><div class="progress-bar ' + MapProgressToClass(task.percentage) + '" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: ' + task.percentage+'%">';
            tag += '<span class="sr-only">'+ task.percentage +'% Complete (success)</span>';
            tag += '</div> </div> </div> </a> </li>';
            return tag;

        }
        function InsertMessages(messages, id, format){
            var first = true;
            messages.forEach(function(message){
                var tag = "";
                if(!first) {
                    tag += '<li class="divider"></li>'
                } else {
                    first = false;
                }
                tag += format(message);
                $("#" + id ).append(tag);

            });
        }

        $( document ).ready(function() {
            InsertMessages(Messages, "messages", FormatMessage);
            InsertMessages(Tasks, "tasks", FormatTask);
            InsertMessages(Alerts, "alerts", FormatAlert);
            if(typeof car !== 'undefined')
            {
                UpdateFromPrevious(car);
            }


        });

    </script>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Car2Car Member Platform</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages" id="messages">

                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks" id="tasks">
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts" id="alerts">
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="tables.php"><i class="fa fa-table fa-fw"></i> Recent Trips</a>
                        </li>
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Bookings</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a new car!</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--
                    <span>Fill in the below fields to add your vehicle you wish to rent.</span>
                    <br />
                    <br />
                    <form action"" method="post">
                        Registration Number: <input  type="text" name="Registration"><br>
                        Make: <input type="text" name="make"><br>
                        Model: <input type="text" name="model"><br>
                        Year: <input type="text" name="year"><br>
                        Seats: <input type="text" name="seats"><br>
                        Type: <input type="text" name="type"><br>
                        Fuel Type: <input type="text" name="Fuel Type"><br>
                        Description: <input type="text" name="Description"><br>
                        <
                    </form>-->
                    <div class="list-car-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">List Car</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action = "" method = "post" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="rego">Rego:</label>
                                            <input class="form-control" placeholder="Rego" name="rego" type="text" autofocus id="rego">
                                        </div>
                                        <div class="form-group">
                                            <label for="manufacturer">Manufacturer:</label>
                                            <input class="form-control" placeholder="Manufacturer" name="manufacturer" type="text" id="manufacturer">
                                        </div>
                                        <div class="form-group">
                                            <label for="make">Make:</label>
                                            <input class="form-control" placeholder="Make" name="make" type="text" id="make">
                                        </div>
                                        <div class="form-group">
                                            <label for="model">Model:</label>
                                            <input class="form-control" placeholder="Model" name="model" type="text" id="model">
                                        </div>
                                        <div class="form-group">
                                            <label for="year">Year:</label>
                                            <input class="form-control" placeholder="Year" name="year" type="text" id="year">
                                        </div>
                                        <div class="form-group">
                                            <label for="enginecc">Engine size (cc):</label>
                                            <input class="form-control" placeholder="cc" name="enginecc" type="text" id="enginecc">
                                        </div>
                                        <div class="form-group">
                                            <label for="kms">Odometer kms:</label>
                                            <input class="form-control" placeholder="kms" name="kms" type="text" id="kms">
                                        </div>
        
                                        <div class="form-group">
                                            <label for="doors">Doors:</label>
                                            <select class="custom-select" name="doors" id="doors">
                                                <option selected>Doors</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6+</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="petrol">Petrol:</label>
                                            <select class="custom-select" name="petrol" id="petrol">
                                                <option selected>Petrol</option>
                                                <option value="ron91">ron91</option>
                                                <option value="ron95">ron95</option>
                                                <option value="ron98">ron98</option>
                                                <option value="diesel">diesel</option>
                                                <option value="electric">electric</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="transmission">Transmission:</label>
                                            <select class="custom-select" name="transmission" id="transmission">
                                                <option selected>Tranmission</option>
                                                <option value="auto">auto</option>
                                                <option value="manual">manual</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Body:</label>
                                            <select class="custom-select" name="body" id="body">
                                                <option selected>Body</option>
                                                <option value="sedan">sedan</option>
                                                <option value="hatch">hatch</option>
                                                <option value="coupe">coupe</option>
                                                <option value="suv">suv</option>
                                            </select>
                                        </div>
        
                                        <div class="form-group">
                                            <label class="custom-file">
                                                <input type="file" id="file" class="custom-file-input" name="photo" id="photo">
                                                <span class="custom-file-control"></span>
                                            </label>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                        <button type="submit" class="btn btn-lg btn-success btn-block">List Car</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>