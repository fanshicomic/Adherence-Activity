<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/navbar_controller.php');
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
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/protocol.css">
	
</head>

<body id="page-top" class="protocol-2-body">
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-protocol">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll protocol-to-home" href="../../index.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php show_navbar(); ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <section id="instruction">
    	<div class="container protocol-instruction-text">
    		<div class="row text-center">
    			<h1>Protocol 2</h1>
    			<div class="text-left col-lg-8 col-lg-offset-2">
	    			<h3>Drug name: Fuzeon, Kaletra & Combivir</h3>
	                <p>Instructions: Take one tablet each every 12 hourly.</p>
            	</div>
    		</div>
    	</div>
    </section>

    <section id="schedule-table">
    	<div class="container protocol-instruction-text">
    		<div class="row text-center">
    			<table class="table table-condensed table-hover">
				    <thead>
				      <tr>
				      	<th class="td-drug-name"></th>
				        <th class="td-hour" colspan="6">AM</th>
				        <th class="td-hour" colspan="12">PM</th>
				        <th class="td-hour" colspan="3">AM</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td class="td-drug-name td-border-right">Drug Name</td>
				        <td class="td-hour">6</td>
				        <td class="td-hour">7</td>
				        <td class="td-hour">8</td>
				        <td class="td-hour">9</td>
				        <td class="td-hour">10</td>
				        <td class="td-hour td-border-right">11</td>
				        <td class="td-hour">12</td>
				        <td class="td-hour">1</td>
				        <td class="td-hour">2</td>
				        <td class="td-hour">3</td>
				        <td class="td-hour">4</td>
				        <td class="td-hour">5</td>
				        <td class="td-hour">6</td>
				        <td class="td-hour">7</td>
				        <td class="td-hour">8</td>
				        <td class="td-hour">9</td>
				        <td class="td-hour">10</td>
				        <td class="td-hour td-border-right">11</td>
				        <td class="td-hour">12</td>
				        <td class="td-hour">1</td>
				        <td class="td-hour ">2</td>
				      </tr>
				      <tr>
				        <td class="td-drug-name td-border-right">Truvada (citrus twist tic tac): Take or discard one tablet once a day with or without food.</td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour td-border-right"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour td-border-right"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				      </tr>
				      <tr>
				        <td class="td-drug-name td-border-right">Reyataz (orange tic tac): Take or discard two tablets once a day with food.</td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour td-border-right"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour td-border-right"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				      </tr>
				      <tr>
				        <td class="td-drug-name td-border-right">Norvir (wintergreen tic tac): Take or discard one tablet once a day with Reyataz.</td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour td-border-right"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour td-border-right"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				        <td class="td-hour"></td>
				      </tr>
				    </tbody>
				  </table>
    		</div>
    		<div class="row text-center exercise-button-row">
    			<div class="col-lg-4 col-lg-offset-2">
    				<a href="#" class="btn btn-primary btn-lg">New Exercise</a>
    			</div>
    			<div class="col-lg-4">
    				<a href="#" class="btn btn-default btn-lg">Continue Exercise</a>
    				<label>Already take this exercise?</label>
    			</div>
    		</div>
    	</div>
    </section>

    <!-- Plugin JavaScript -->
    <script src="javascript/creative/jquery.easing.min.js"></script>
    <script src="javascript/creative/jquery.fittext.js"></script>
    <script src="javascript/creative/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="javascript/creative/creative.js"></script>
</body>
</html>