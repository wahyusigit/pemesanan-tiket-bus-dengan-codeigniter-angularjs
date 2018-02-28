<?php
	$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pelanggan - Start Bootstrap Template</title>

    <script src="<?php echo base_url();?>assets/plugins/angular/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/angular/angular-route.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.7/angular-material.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/angular/angular-animate.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/angular/angular-aria.min.js"></script>

    <!-- Helium Boostrap Template -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/scrolling-nav.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/helium/css/animate.css">

    <!-- Angular Material CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.7/angular-material.css">


    


  </head>
  <body>
  	
  	<!-- Navigation -->
  	<!-- <?php
  		$this->load->view('partials/navigation_landing');
  	?> -->
    <div class="top-menu top-menu-inverse">
      <p>
        <span class="left">
          <a href="#"><i class="fa fa-phone"></i> (+9) 123 456 789</a>
          <a href="#"><i class="fa fa-envelope"></i> email@gmail.com</a>
        </span>
        <span class="right hidden-sm-down">
          <label class="btn btn-top-menu-inverse"><a ng-href="login"><i class="fa fa-lock"></i> Sign In</a></label>
        </span>
      </p>
    </div>
    <nav class="navbar navbar-toggleable-sm navbar-light bg-black">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <!-- <span class="h1" style="color: #fafafa">Ladeva</span> -->
          <img src="http://preview.uideck.com/items/helium/img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar2">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" ng-href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" ng-href="/pesan">Pesan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" ng-href="/kontak">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  	<!-- End. Navigation -->
    <hr>
    <!-- Page Content -->
    <div class="container">
    	