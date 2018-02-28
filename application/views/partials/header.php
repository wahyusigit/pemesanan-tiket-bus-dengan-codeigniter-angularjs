<?php
	$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  </head>
  <body>
  	
  	<!-- Navigation -->
  	<?php
  		$this->load->view('partials/navigation');
  	?>
  	<!-- End. Navigation -->

    <!-- Page Content -->
    <div class="container">
    	<div class="row">
    		<div class="col-md-3">
    			<ul class="card nav flex-column">
				  <li class="nav-item">
				    <a class="nav-link" href="#">User</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Pemesanan</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Rute / Trayek</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Bus / Armada</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Supir</a>
				  </li>
				</ul>
    		</div>
    		<div class="col-md-9">
    			<!-- Content -->