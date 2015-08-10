<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacology/project1/php/controller/navbar_controller.php');
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
    
	<title>Understanding HIV, anti-HIV drugs and the importance of adherence</title>
	<link rel="icon" href="/pharmacology/project1/img/AA-icon.ico">

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

    <!-- SweetAlert -->
    <script src="../../plugin/SweetAlert/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../../plugin/SweetAlert/sweetalert.css">

	<!-- Customized Stylesheet -->
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/font.css">
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/protocol.css">
	
</head>

<body id="page-top" class="protocol-1-body">
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
    			<h1>Protocol 1</h1>
    			<div class="text-left col-lg-8 col-lg-offset-2">
	    			<h3>Drug name: Truvada, Reyataz & Norvir</h3>
	                <h4>Instructions:</h4>
	                <p>Truvada: Take one tablet once a day with or without food.
	                <br>Reyataz: Take two tablets once a day with food.
	                <br>Norvir: Take one tablet once a day with Reyataz.
	                <br>In this protocol, you will have to ingest all 3 drugs as treatment. Hence, please plan your schedule according to the drug instructions given above and stick to the schedule planed.
	                <p class="warning-msg transparent">Your schedule seems violate some rules. Please read the instruction carefully.</p>
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
				    <tbody class="schedule-tbody">
				      <tr>
				        <td class="td-drug-name td-border-right hour">Drug Name</td>
				        <td class="td-hour hour">6</td>
				        <td class="td-hour hour">7</td>
				        <td class="td-hour hour">8</td>
				        <td class="td-hour hour">9</td>
				        <td class="td-hour hour">10</td>
				        <td class="td-hour td-border-right hour">11</td>
				        <td class="td-hour hour">12</td>
				        <td class="td-hour hour">13</td>
				        <td class="td-hour hour">14</td>
				        <td class="td-hour hour">15</td>
				        <td class="td-hour hour">16</td>
				        <td class="td-hour hour">17</td>
				        <td class="td-hour hour">18</td>
				        <td class="td-hour hour">19</td>
				        <td class="td-hour hour">20</td>
				        <td class="td-hour hour">21</td>
				        <td class="td-hour hour">22</td>
				        <td class="td-hour td-border-right hour">23</td>
				        <td class="td-hour hour">0</td>
				        <td class="td-hour hour">1</td>
				        <td class="td-hour hour">2</td>
				      </tr>
				      <tr>
				        <td class="td-drug-name td-border-right">Truvada</td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-border-right td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-border-right td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				        <td class="td-hour td-clickable truvada"></td>
				      </tr>
				      <tr>
				        <td class="td-drug-name td-border-right">Reyataz</td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-border-right td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-border-right td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				        <td class="td-hour td-clickable reyataz"></td>
				      </tr>
				      <tr>
				        <td class="td-drug-name td-border-right">Norvir</td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-border-right td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-border-right td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				        <td class="td-hour td-clickable norvir"></td>
				      </tr>
				    </tbody>
				  </table>
    		</div>
    		<div class="row text-center exercise-button-row">
    			<div class="col-lg-4 col-lg-offset-2">
    				<a href="#" class="btn btn-primary btn-lg btn-new-exercise" protocol='1'>New Exercise</a>
    			</div>
    			<div class="col-lg-4">
    				<a href="#" class="btn btn-default btn-lg btn-continue-exercise" protocol='1'>Continue Exercise</a>
    				<label>Already take this exercise?</label>
    			</div>
    		</div>
    	</div>
    </section>
    
    <!-- Plugin JavaScript -->
    <script src="../../javascript/creative/jquery.easing.min.js"></script>
    <script src="../../javascript/creative/jquery.fittext.js"></script>
    <script src="../../javascript/creative/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../javascript/creative/creative.js"></script>

    <!-- Custon JavaScript -->
    <script src="../../javascript/protocol/protocol.js"></script>
</body>
</html>