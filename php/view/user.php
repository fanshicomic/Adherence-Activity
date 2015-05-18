<?php
    require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/navbar_controller.php');
    require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/exercise_view_controller.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<title>Adherence Actitvity</title>
	<!-- <link rel="icon" href="image/favicon.ico"> -->

	<!-- JQuery -->
	<script src="../../plugin/jQuery/jquery-2.1.3.min.js"></script>

	<!--Bootstrap-->
    <link type="text/css" rel="stylesheet" href="../../plugin/Bootstrap/css/bootstrap.min.css">
    <script src="../../plugin/Bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Font Awesome -->
	<link type="text/css" rel="stylesheet" href="../../plugin/Font-Awesome/css/font-awesome.min.css">

	<!-- Plugin CSS -->
    <link rel="stylesheet" href="../../stylesheet/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="../../stylesheet/css/creative.css" type="text/css">

	<!-- Customized Stylesheet -->
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/font.css">
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/user.css">
</head>

<body>
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../../index.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php show_navbar(); ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
            	<div class="container-fluid">
            		<div class="row text-center">
		                <div class="form-group form-user col-lg-10 col-lg-offset-1">
		                	<h2 class="user-welcome">Hi <?php echo $_SESSION['uid'];?></h2>
		                	<div class="row exercise-row-1 text-left">
                                <div class="col-lg-4">
                                    <h3><a href="/pharmacy/project1/php/view/exercise_1.php">Exercise 1: </a></h3>
                                </div>
                                <div class="col-lg-6 col-day">
                                    <h4>You are now in Day <?php echo get_current_day(1);?></h4>
                                </div>
                                <div class="col-lg-2 col-trash">
                                    <i class="fa fa-trash-o fa-2x"></i>
                                </div>
                            </div>
                            <div class="row exercise-row-2 text-left">
                                <div class="col-lg-4">
                                    <h3><a href="/pharmacy/project1/php/view/exercise_2.php">Exercise 2: </a></h3>
                                </div>
                                <div class="col-lg-6 col-day">
                                    <h4>You are now in Day <?php echo get_current_day(1);?></h4>
                                </div>
                                <div class="col-lg-2 col-trash">
                                    <i class="fa fa-trash-o fa-2x"></i>
                                </div>
                            </div>
                            <div class="row exercise-row-3 text-left">
                                <div class="col-lg-4">
                                    <h3><a href="/pharmacy/project1/php/view/exercise_3.php">Exercise 3: </a></h3>
                                </div>
                                <div class="col-lg-6 col-day">
                                    <h4>You are now in Day <?php echo get_current_day(1);?></h4>
                                </div>
                                <div class="col-lg-2 col-trash">
                                    <i class="fa fa-trash-o fa-2x"></i>
                                </div>
                            </div>
		                </div>
		            </div>		            
		        </div>
            </div>
        </div>
    </header>

    <!-- Plugin JavaScript -->
    <script src="../../javascript/creative/jquery.easing.min.js"></script>
    <script src="../../javascript/creative/jquery.fittext.js"></script>
    <script src="../../javascript/creative/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../javascript/creative/creative.js"></script>

    <!-- Custom JavaScript -->
    <script src="../../javascript/signup/signup.js"></script>
</body>
</html>