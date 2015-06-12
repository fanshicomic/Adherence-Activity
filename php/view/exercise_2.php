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
    			<h1 style="color:yellow">Protocol 2</h1>
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
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 kaletra-1"><?php show_drug_taken_time(2, 'KALETRA', 1)?></div>
    				<p>
                        Your plan: <?php show_drug_planned_time(2, 'KALETRA', 1)?>:00
                    </p>
                    <div class="kaletra-update-1">
    					<?php show_update_button(2, "KALETRA", 1); ?>
    				</div>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 kaletra-2"><?php show_drug_taken_time(2, 'KALETRA', 2)?></div>
    				<p>
                        Your plan: <?php show_drug_planned_time(2, 'KALETRA', 2)?>:00
                    </p>
                    <div class="kaletra-update-2">
    					<?php show_update_button(2, "KALETRA", 2); ?>
    				</div>
    			</div>
    			<div class="col-lg-2">
    				<label class="drug-name">Combivir</label>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 combivir-1"><?php show_drug_taken_time(2, 'COMBIVIR', 1)?></div>
    				<p>
                        Your plan: <?php show_drug_planned_time(2, 'COMBIVIR', 1)?>:00
                    </p>
                    <div class="combivir-update-1">
    					<?php show_update_button(2, "COMBIVIR", 1); ?>
    				</div>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 combivir-2"><?php show_drug_taken_time(2, 'COMBIVIR', 2)?></div>
    				<p>
                        Your plan: <?php show_drug_planned_time(2, 'COMBIVIR', 2)?>:00
                    </p>
                    <div class="combivir-update-2">
    					<?php show_update_button(2, "COMBIVIR", 2); ?>
    				</div>
    			</div>
    			<div class="col-lg-2">
    				<label class="drug-name">Fuzeon</label>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 fuzeon-1"><?php show_drug_taken_time(2, 'FUZEON', 1)?></div>
    				<p>
                        Your plan: <?php show_drug_planned_time(2, 'FUZEON', 1)?>:00
                    </p>
                    <div class="fuzeon-update-1">
    					<?php show_update_button(2, "FUZEON", 1); ?>
    				</div>
    				<div class="hour-indicator col-lg-10 col-lg-offset-1 fuzeon-2"><?php show_drug_taken_time(2, 'FUZEON', 2)?></div>
    				<p>
                        Your plan: <?php show_drug_planned_time(2, 'FUZEON', 2)?>:00
                    </p>
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
    </section>

    <section id="activity-2" class="activity">
        <div class="container text-center">
            <embed src="../../pdf/HIV_day_2_activity.pdf" width="600vw" height="800vh">     
            <h2>References</h2>
            <p>
                <br><a href="http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(05)62505-6/fulltext">http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(05)62505-6/fulltext</a>
                <br><a href="https://www.aids.gov/hiv-aids-basics/just-diagnosed-with-hiv-aids/treatment-options/overview-of-hiv-treatments/">https://www.aids.gov/hiv-aids-basics/just-diagnosed-with-hiv-aids/treatment-options/overview-of-hiv-treatments/</a>
                <br><a href="http://www.ucsfhealth.org/conditions/aids/treatment.html">http://www.ucsfhealth.org/conditions/aids/treatment.html</a>
                <br><a href="http://www.sciencedirect.com/science/article/pii/S0042682209006813">http://www.sciencedirect.com/science/article/pii/S0042682209006813</a>
                <br><a href="http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(05)62505-6/fulltext">http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(05)62505-6/fulltext</a>
                <br><a href="http://www.aidsbeacon.com/news/2011/05/18/advances-and-barriers-to-a-cure-for-hiv-aids-part-4-obstacles-in-finding-a-cure/">http://www.aidsbeacon.com/news/2011/05/18/advances-and-barriers-to-a-cure-for-hiv-aids-part-4-obstacles-in-finding-a-cure/</a>
            </p>
            <h2>Video link:</h2>
            <p>See How HIV treatment works- Body & Soul Charity <a href="http://www.youtube.com/watch?v=06mQyXQlR08">http://www.youtube.com/watch?v=06mQyXQlR08</a>
                <br>See Mechanisms of Action of Nucleoside Reverse Transcriptase Inhibitors (NRTIs) 
                <br><a href="http://www.youtube.com/watch?v=cC9kyoAo1ac&list=PLMO1589WRspzDNTxlgE101XbH4tXeKZSU&index=1">http://www.youtube.com/watch?v=cC9kyoAo1ac&list=PLMO1589WRspzDNTxlgE101XbH4tXeKZSU&index=1</a>
                <br>See Mechanisms of Action of Non-Nucleoside Reverse Transcriptase Inhibitors (NNRTIs) <a href="http://www.youtube.com/watch?v=G9FeQKcxVZY">http://www.youtube.com/watch?v=G9FeQKcxVZY</a>
                <br>and <a href="http://www.youtube.com/watch?v=h7V1eVwxV_c">http://www.youtube.com/watch?v=h7V1eVwxV_c</a>
                <br>See Mechanisms of Action of Protease Inhibitors (PIs) <a href="http://www.youtube.com/watch?v=kdNljZkGqu8">http://www.youtube.com/watch?v=kdNljZkGqu8</a>
                <br>See CCR5 Antagonist <a href="http://www.youtube.com/watch?v=oneYI0fhGa0">http://www.youtube.com/watch?v=oneYI0fhGa0</a>
                <br>and <a href="http://www.youtube.com/watch?v=95J4dLHXEzM">http://www.youtube.com/watch?v=95J4dLHXEzM</a>
                <br>See Integrase Inhibitor <a href="http://www.youtube.com/watch?v=jUblObKMc8Q">http://www.youtube.com/watch?v=jUblObKMc8Q</a>
            </p>
        </div>
    </section>

    <section id="activity-3" class="activity">
        <div class="container text-center">
            <embed src="../../pdf/HIV_day_3_activity.pdf" width="600vw" height="800vh">     
            <h2>Matching Game</h2>
            <p>
                <br><a href="http://www.neuroepigenetics.com/pharmacology/games/php/view/matching_game/lec_7.php">http://www.neuroepigenetics.com/pharmacology/games/php/view/matching_game/lec_7.php</a>
            </p>
        </div>
    </section>

    <section id="activity-4" class="activity">
        <div class="container text-center">     
            <h2>PK-PD of HIV drugs</h2>
            <p class="col-xs-offset-3 col-xs-6">
                In adults, Atripla is taken once daily on an empty stomach. 
                Dosing at bedtime is recommended to improve tolerability of nervous system symptoms. 
                Atripla is not recommended for patients under 18 years of age.
            </p>
        </div>
    </section>

    <section id="activity-5" class="activity">
        <div class="container text-center">     
            <h2>PK-PD of HIV drugs</h2>
            <p class="col-xs-offset-3 col-xs-6">
                Atripla is the first multi-class antiretroviral drug available in the United States and represents the first collaboration between two U.S. pharmaceutical companies to combine their patented anti-HIV drugs into one product. 
                The drug retails in the United States for US$1,850 for a one-month supply. 
                An equivalent two pill regimen is available in developing countries at a price of about US$1.00 per day, as Gilead Sciences has licensed the patents covering emtricitabine/tenofovir to the Medicines Patent Pool and Merck and Co makes efavirenz available in developing countries at a reduced price. 
                It was approved by the U.S. FDA on July 12, 2006. In the UK, the drug cost to the NHS is £626.90 per month as of March 2012. 
                Combining the three drugs into a single, once-daily pill reduces pill burden and simplifies dosing schedules, and therefore has the potential to increase adherence to antiretroviral therapy.
            </p>
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
    <script type="text/javascript">show_activity(2);</script>
</body>
</html>