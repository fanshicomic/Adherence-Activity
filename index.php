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
    
	<title>Understanding HIV anti-HIV drugs and the importance of adherence</title>
	<link rel="icon" href="/pharmacology/project1/img/AA-icon.ico">

	<!-- JQuery -->
	<script src="plugin/jQuery/jquery-2.1.3.min.js"></script>

	<!--Bootstrap-->
    <link type="text/css" rel="stylesheet" href="plugin/Bootstrap/css/bootstrap.min.css">
    <script src="plugin/Bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Font Awesome -->
	<link type="text/css" rel="stylesheet" href="plugin/Font-Awesome/css/font-awesome.min.css">

	<!-- Plugin CSS -->
    <link rel="stylesheet" href="stylesheet/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="stylesheet/css/creative.css" type="text/css">

	<!-- Customized Stylesheet -->
	<link type="text/css" rel="stylesheet" href="stylesheet/css/font.css">
	<link type="text/css" rel="stylesheet" href="stylesheet/css/index.css">
</head>

<body id="page-top">

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
                <a class="navbar-brand page-scroll" href="#page-top">Home</a>
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
                <h2>Understanding HIV, anti-HIV drugs and the importance of adherence</h2>
                <hr>
                <p>The NUS department of pharmacology built a new online system to help the students quickly understand the importance of adherence.</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Learn More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h3 class="section-heading">Understanding HIV, anti-HIV drugs and the importance of adherence</h3>
                    <hr class="light">
                    <p class="text-faded">Every time you fall sick and visit the doctor, have you ever wondered why you have to complete your course of anti-biotic/anti-viral medication? What would happen if you did not adhere to the stipulated timings and/or missed a few drug dosages?</p>
                    <p class="text-faded">In the following activity, you will be simulating drug dosages daily where you will have to log in and take a (virtual) drug as if you were a real patient, using HIV as an example. We will take a look at the effects of HIV drugs and learn more about HIV as well in the daily activities which are required to be finished in order to “complete the drug dosage” for the day. At the end of the 7 days of activities you will be able to see an overview of how the drug works and the different outcomes depending on whether you adhered to the schedule, or if you missed a few dosages.</p>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h3 class="section-heading">Activity instructions</h3>
                    <hr class="light">
                    <p class="text-faded">In this activity, you will participate in a simulation of HIV antiretroviral drug therapy. You will experience firsthand how easy or difficult it is to fully adhere to a treatment program. You can choose one of three treatment protocols of varying complexity.</p>
                    <p class="text-faded">First, you will have to create an account with your matriculation number as a user name (e.g. A1234567Z) and your own preferred password. Next, select one of the three drug protocols for your drug simulation (note that there is no major difference between the drug protocols, 3 were made just for a wider variety of choices). After that, click on ‘New Exercise” and choose the timings by clicking the respective ticks in each drug row. Do take note of the different drug instructions (e.g. to be taken after meals, etc.) when selecting your timing. When all your timings have been selected, click on “Plan schedule and start” to begin the activity. (Choose 1 protocol and stick to the same protocol for the next 7 days).</p>
                    <p class="text-faded">Log in daily to take the drug protocol by clicking “Continue exercise”. Click the “Update” button on the respective drug to confirm ingestion of the drug. Please remember there are daily activities that have to be completed in addition to the drug simulation exercise!</p>
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12 text-center">
            		<a href="#protocol" id="btn-to-protocol" class="btn btn-default btn-xl page-scroll">Get Started!</a>
            	</div>
            </div>       
        </div>
    </section>

    <section id="protocol">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Choose an HIV and antiretroviral therapy Protocol</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="service-box">
                        <img class="protocol-image wow bounceIn text-primary" src="img/pills-blue-icon.png">
                        <h3>protocol 1</h3>
                        <p class="text-muted">Drug name: Truvada, Reyataz & Norvir</p>
                        <a href="php/view/protocol_1.php" class="btn btn-primary btn-md btn-protocol">View</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="service-box">
                        <img class="protocol-image wow bounceIn text-primary" src="img/pills-green-icon.png">
                        <h3>protocol 2</h3>
                        <p class="text-muted">Drug name: Fuzeon, Kaletra & Combivir</p>
                        <a href="php/view/protocol_2.php" class="btn btn-primary btn-md btn-protocol">View</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="service-box">
                        <img class="protocol-image wow bounceIn text-primary" src="img/pills-orange-icon.png">
                        <h3>protocol 3</h3>
                        <p class="text-muted">Drug name: Atripla</p>
                        <a href="php/view/protocol_3.php" class="btn btn-primary btn-md btn-protocol">View</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h3>Download our mobile app on the App store!</h3>
                <a href="#" class="btn btn-default btn-lg btn-download wow tada">Download Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>9864-6408</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">fanshicomic@gmail.com</a></p>
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