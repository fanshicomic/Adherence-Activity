<?php
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/navbar_controller.php');
	require_once($_SERVER['DOCUMENT_ROOT'] .'/pharmacy/project1/php/controller/exercise_view_controller.php');
	if(!isset($_SESSION)){
        session_start();
    }
	user_validation(1);
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

<body id="page-top" class="exercise-1-body" day="1">
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
    			<div class="text-left col-lg-6 col-lg-offset-3">
    				<div class="row text-center">
    					<div class="text-left">
    						<h4>Instructions:</h4>
		                	<p>Click the update button to update the drug taken time. There are several activities and references at the bottom, take your time to read them.</p>
		                </div>
		    			<table class="day-table" exercise="1">
		    				<tbody class="day-table-tbody">
		    					<?php show_day_table(1); ?>
		    				</tbody>
		    			</table>
	    			</div>
            	</div>
    		</div>
    	</div>
    </section>

    <section id="schedule-table" exercise="1" day="1"> 
    	<div class="container">
    		<div class="row text-center">
    			<div class="col-lg-2 col-lg-offset-3">
    				<label class="drug-name">Truvada</label>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 truvada-1">
                        <?php show_drug_taken_time(1, 'TRUVADA', 1)?>
                    </div>
                    <p>
                        Your plan: <?php show_drug_planned_time(1, 'TRUVADA', 1)?>:00
                    </p>
    				<div class="truvada-update">
    					<?php show_update_button(1, "TRUVADA", 1); ?>
    				</div>
    			</div>
    			<div class="col-lg-2">
    				<label class="drug-name">Reyataz</label>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 reyataz-1">
                        <?php show_drug_taken_time(1, 'REYATAZ', 1)?>
                    </div>
                    <p>
                        Your plan: <?php show_drug_planned_time(1, 'TRUVADA', 1)?>:00
                    </p>
    				<div class="reyataz-update">
    					<?php show_update_button(1, "REYATAZ", 1); ?>
    				</div>
    			</div>
    			<div class="col-lg-2">
    				<label class="drug-name">Norvir</label>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 norvir-1">
                        <?php show_drug_taken_time(1, 'NORVIR', 1)?>
                    </div>
                    <p>
                        Your plan: <?php show_drug_planned_time(1, 'TRUVADA', 1)?>:00
                    </p>
    				<div class="norvir-update">
    					<?php show_update_button(1, "NORVIR", 1); ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!-- <section id="schedule-table" exercise="1" day="1">
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
				      <?php show_truvada_table(); ?>
				      <?php show_reyataz_table(); ?>
				      <?php show_norvir_table(); ?>
				    </tbody>
				  </table>
    		</div>
    		<div class="row text-center exercise-button-row">
    			<div class="col-lg-8 col-lg-offset-2 update-button">
    				
    			</div>
    		</div>
    	</div>
    </section> -->
    <section id="activity-1" class="activity">
        <div class="container text-center">
            <embed src="../../pdf/HIV_day_1_activity.pdf" width="600vw" height="800vh">     
            <h2>References</h2>
            <p>
                <br><a href="http://aidsinfo.nih.gov/education-materials/fact-sheets/19/73/the-hiv-life-cycle">http://aidsinfo.nih.gov/education-materials/fact-sheets/19/73/the-hiv-life-cycle</a>
                <br><a href="http://www.ncbi.nlm.nih.gov/books/NBK19451/">http://www.ncbi.nlm.nih.gov/books/NBK19451/</a>
                <br><a href="http://www.ncbi.nlm.nih.gov/pmc/articles/PMC3234451/">http://www.ncbi.nlm.nih.gov/pmc/articles/PMC3234451/</a>
                <br><a href="https://www.aids.gov/hiv-aids-basics/hiv-aids-101/how-you-get-hiv-aids/">https://www.aids.gov/hiv-aids-basics/hiv-aids-101/how-you-get-hiv-aids/</a>
                <br><a href="http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(05)62505-6/fulltext">http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(05)62505-6/fulltext</a>
            </p>
            <h2>Video link:</h2>
            <label>See the HIV life cycle </label> <a href="http://www.hhmi.org/biointeractive/hiv-life-cycle">http://www.hhmi.org/biointeractive/hiv-life-cycle</a>
        </div>
    </setion>
    
    <!-- Plugin JavaScript -->
    <script src="../../javascript/creative/jquery.easing.min.js"></script>
    <script src="../../javascript/creative/jquery.fittext.js"></script>
    <script src="../../javascript/creative/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../javascript/creative/creative.js"></script>

    <!-- Custon JavaScript -->
    <script src="../../javascript/exercise/exercise.js"></script>
    <script type="text/javascript">show_activity(1);</script>
</body>
</html>