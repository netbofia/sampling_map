<?php header('content-type: text/html; charset: utf-8'); 
session_start();
?>
<html>
<head>
<!-- favicon -->
<link rel="shortcut icon" href="/logoLowResTrans.png" type="image/x-icon">
<link rel="icon" href="/favicon.gif" type="image/x-icon">
<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<meta property="fb:app_id" content="none"/>
<meta property="og:site_name" content="Sampling_map"/>
<meta property="og:image" content="https://farm3.staticflickr.com/2854/13677508394_107e70a809_o.png"/>
<meta property="og:type" content="website"/>
<meta property="og:locale" content="pt_PT"/>
<title>Express sampling map</title>
<html xmlns="http://www.w3.org/1999/xhtml"> 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47286927-4', 'infocosta.pt');
  ga('send', 'pageview');
</script>
</head>
<body>
<div class="row">
	<div class="col-md-12">
		<img class="img-responsive" src="assets/img/header.png"/>
	</div>
</div>
<div class="row">
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./#"><div class="logo" width="40px"/></div></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#chartdiv" role="tab" data-toggle="tab">Map</a></li>
        <li><a href="#data" role="tab" data-toggle="tab">Data</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div class="fluid-row">
	<!-- world-mapp -->
	<div class="col-md-8" style="height: 500px;">
		<div class="tab-pane fade active in thumbnail" id="chartdiv"></div>
		<div class="tab-pane fade" id="data">
			<div class="panel panel-primary">
  				<div class="panel-heading">
    					<h3 class="panel-title">Data input</h3>
  				</div>
  				<div class="panel-body">
    
					<div class="input-group">
  						<span class="input-group-addon">Latitude N</span>
						<div class="input-group-btn">
					 	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">N<span class="caret"></span></button>
        				 	<ul class="dropdown-menu" role="menu">
          				  	<li><a href="#">N</a></li>
          				  	<li><a href="#">S</a></li>
        				 	</ul>
      						</div><!-- /btn-group -->
						<input type="number" id="lat" pattern="[0-9].[0.9]" placeholder="0.00" class="form-control">
						<span class="input-group-addon">Longitude W</span>
						<input type="number" id="lon" placeholder="0.00" class="form-control">
			      			<span class="input-group-btn">
        					<button id="add" class="btn btn-primary" type="button">Add!</button>
      						</span>		
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Samples -->
	<div class="col-md-4 samples" style="height:500px; overflow:auto;">
		<h3>Current Samples</h3>
		<canvas id="test"></canvas>
		<button id="clear" class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Clear</button>
		<div class="panel panel-primary">
		  <div class="panel-heading">
    		    <h3 class="panel-title center-block">Set icon size</h3>
		  </div>
		  <div class="panel-body panel-default input-group icon-size">
	  	      <span class="input-group-addon">Width:</span>
	  	      <input type="text" id="width" placeholder="00px" class="form-control">
	  	      <span class="input-group-addon">Height:</span>
	  	      <input type="text" id="height" placeholder="00px" class="form-control">
	  	      <span class="input-group-btn">
	  	        <button id="set_icon_size" class="btn btn-primary" type="button">Set size</button>
	  	      </span>
		  </div>
		</div>
		<div id="delete_data" class="alert alert-danger fade in hide" role="alert">
      		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      		  <h4>You are attempting to delete all data!</h4>
      		  <p>This action cannot be reverted, please save your data to file before executing this action. Are you sure you want
      		  to deleate all your data?</p>
      		  <p>
        	    <button id="confirm" type="button" class="btn btn-danger">Confirm, delete all!</button>
        	    <button type="button" class="btn btn-default">Cancel</button>
      		  </p>
    		</div>
		<table class="samples table table-hover">
		</table>
	</div>
</div>
<!-- Jquery -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- Jquery Cycle-->
<script type="text/javascript" src="//cdn.jsdelivr.net/cycle/3.0.2/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/dough.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript" src="assets/charts/Chart.min.js"></script>
<script type="text/javascript" src="js/draw_chart.js"></script>
<!-- leaflet map -->
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script type="text/javascript" src="js/mapconfig.js"></script>
<script type="text/javascript" src="js/save_data.js"></script>
<script type="text/javascript" src="js/button_actions.js"></script>
</body>
</html>
