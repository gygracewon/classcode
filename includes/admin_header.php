<?php
require_once('subjectmanager.php');
require_once('view.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>16ADWE07 Web Journey</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="assets/stylesheets/base.css">
	<link rel="stylesheet" href="assets/stylesheets/skeleton.css">
	<link rel="stylesheet" href="assets/stylesheets/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">

</head>
<body class="admin">



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom">Our Web Journeys - Admin</h1>
			<h5>The web adventures of 15ADW07</h5>
			<hr />
		</div>
		<div class="one-third column">
			<!-- nav goes here --> 
			<!-- get data from model, (list of all subjects(pages)) and send data to view, renderAdminNav to construct navigation. -->
			<?php
			$aSubjects = Subjectmanager::getSubjects();
			echo View::renderAdminNav($aSubjects);
			?>
		</div>
		<!-- end of admin header -->