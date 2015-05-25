<?php
    require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/navbar_controller.php');
    if(!isset($_SESSION)){
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
	<link rel="icon" href="/pharmacy/project1/img/AA-icon.ico">

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
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/signup.css">
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
		                <div class="form-group form-signup col-lg-8 col-lg-offset-2">
		                	<h2 class="signup-welcome">Let's get started!</h2>
		                	<input id="signup-user-id" type="text" class="form-control signup-form-input" placeholder="User ID">
		                	<input id="signup-user-password" type="password" class="form-control signup-form-input" placeholder="Password">
		                	<input id="signup-user-password-confirmation" type="password" class="form-control signup-form-input" placeholder="Confirm Password">
		                	<div class="row text-center signup-button-row">
                                <p id="warning-msg"></p>
				    			<div class="col-lg-12">
				    				<a href="#" class="btn btn-primary btn-full btn-signup">Sign Up</a>
				    			</div>
				    			<div class="col-lg-12">
				    				<label>Already have an account?</label>
				    				<a href="signin.php">Sign In</a>
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