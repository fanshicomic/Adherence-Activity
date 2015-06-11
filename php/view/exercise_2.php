<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/navbar_controller.php');
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/exercise_view_controller.php');
	if(!isset($_SESSION)){
        session_start();
    }
	user_validation(2);
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

    <!-- SweetAlert -->
    <script src="../../plugin/SweetAlert/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../../plugin/SweetAlert/sweetalert.css">

	<!-- Customized Stylesheet -->
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/font.css">
	<link type="text/css" rel="stylesheet" href="../../stylesheet/css/exercise.css">
	
</head>

<body id="page-top" class="exercise-2-body" day="1">
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
    			<div class="text-left col-lg-6 col-lg-offset-3">
    				<div class="row text-center">
    					<div class="text-left">
    						<h4>Instructions:</h4>
		                	<p>Click the update button to update the drug taken time.</p>
		                </div>
		    			<table class="day-table" exercise="2">
		    				<tbody class="day-table-tbody">
		    					<?php show_day_table(2); ?>
		    				</tbody>
		    			</table>
	    			</div>
            	</div>
    		</div>
    	</div>
    </section>

    <section id="schedule-table" exercise="2" day="1">
    	<div class="container protocol-instruction-text">
    		<div class="row text-center">
    			<div class="col-lg-2 col-lg-offset-3">
    				<label class="drug-name">Kaletra</label>
    				<div class="hour-indicator col-lg-6 col-lg-offset-3 kaletra-1"><?php show_drug_taken_time(2, 'KALETRA', 1)?></div>
    				<div>
                        planned time: <?php show_drug_planned_time(2, 'KALETRA', 1)?>:00
                    </div>
                    <div class="kaletra-update-1">
    					<?php show_update_button(2, "KALETRA", 1); ?>
    				</div>
    				<div class="hour-indicator col-lg-6 col-lg-offset-3 kaletra-2"><?php show_drug_taken_time(2, 'KALETRA', 2)?></div>
    				<div>
                        planned time: <?php show_drug_planned_time(2, 'KALETRA', 2)?>:00
                    </div>
                    <div class="kaletra-update-2">
    					<?php show_update_button(2, "KALETRA", 2); ?>
    				</div>
    			</div>
    			<div class="col-lg-2">
    				<label class="drug-name">Combivir</label>
    				<div class="hour-indicator col-lg-6 col-lg-offset-3 combivir-1"><?php show_drug_taken_time(2, 'COMBIVIR', 1)?></div>
    				<div>
                        planned time: <?php show_drug_planned_time(2, 'COMBIVIR', 1)?>:00
                    </div>
                    <div class="combivir-update-1">
    					<?php show_update_button(2, "COMBIVIR", 1); ?>
    				</div>
    				<div class="hour-indicator col-lg-6 col-lg-offset-3 combivir-2"><?php show_drug_taken_time(2, 'COMBIVIR', 2)?></div>
    				<div>
                        planned time: <?php show_drug_planned_time(2, 'COMBIVIR', 2)?>:00
                    </div>
                    <div class="combivir-update-2">
    					<?php show_update_button(2, "COMBIVIR", 2); ?>
    				</div>
    			</div>
    			<div class="col-lg-2">
    				<label class="drug-name">Fuzeon</label>
    				<div class="hour-indicator col-lg-6 col-lg-offset-3 fuzeon-1"><?php show_drug_taken_time(2, 'FUZEON', 1)?></div>
    				<div>
                        planned time: <?php show_drug_planned_time(2, 'FUZEON', 1)?>:00
                    </div>
                    <div class="fuzeon-update-1">
    					<?php show_update_button(2, "FUZEON", 1); ?>
    				</div>
    				<div class="hour-indicator col-lg-6 col-lg-offset-3 fuzeon-2"><?php show_drug_taken_time(2, 'FUZEON', 2)?></div>
    				<div>
                        planned time: <?php show_drug_planned_time(2, 'FUZEON', 2)?>:00
                    </div>
                    <div class="fuzeon-update-2">
    					<?php show_update_button(2, "FUZEON", 2); ?>
    				</div>
    			</div>
    			<!-- <table class="table table-condensed table-hover">
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
				      <?php show_kaletra_table(); ?>
				      <?php show_combivir_table(); ?>
				      <?php show_fuzeon_table(); ?>
				    </tbody>
				  </table>
    		</div>
    		<div class="row text-center exercise-button-row">
    			<div class="col-lg-8 col-lg-offset-2 update-button">
    				
    			</div>
    		</div> -->
    	</div>
    </section>
    
    <!-- Plugin JavaScript -->
    <script src="../../javascript/creative/jquery.easing.min.js"></script>
    <script src="../../javascript/creative/jquery.fittext.js"></script>
    <script src="../../javascript/creative/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../javascript/creative/creative.js"></script>

    <!-- Custon JavaScript -->
    <script src="../../javascript/exercise/exercise.js"></script>
</body>
</html>