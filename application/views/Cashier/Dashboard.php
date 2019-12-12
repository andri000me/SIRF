<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Chicken Resto</title>
		<!-- Bootstrap CSS CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<!-- Our Custom CSS -->
		<link rel="stylesheet" href="<?=base_url('assets/vendor/css/Dashboard.css')?>">
		<!-- Font Awesome JS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
		
	</head>
	<body>
		<div class="wrapper">
			<!-- Sidebar  -->
			<nav id="sidebar">
				<div class="sidebar-header">
					<h3>Chicken Resto</h3>
				</div>
				<ul class="list-unstyled components">
					<p>Dashboard</p>
					<li>
						<a href="<?php echo base_url()?>Cashier/Menu_List/<?php echo $username?>">Food List</a>
					</li>

					<li>
						<a href="<?php echo base_url()?>Cashier/Order/<?php echo $username?>" >Order</a>
					</li>

					<li>
						<a href="<?php echo base_url()?>Cashier/Order_List/<?php echo $username?>">Order Lists</a>
					</li>
				</ul>
			</nav>
			<!-- Page Content  -->
			<div id="content">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse" class="btn btn-info">
						<i class="fas fa-align-left"></i>
						<span>Menu</span>
						</button>
						<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-align-justify"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item active">
									<a class="nav-link" href="#"><?php echo $username ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url();?>Login/logout">Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
