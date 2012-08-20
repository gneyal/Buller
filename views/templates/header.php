<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/23/12
 * Time: 11:29 AM
 * To change this template use File | Settings | File Templates.
 */

$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>application/CIFormTutorial/views/assets/css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url() ?>application/CIFormTutorial/views/assets/css/my_bootstrap_style.css" type="text/css" media="screen">
    <link href="<?php echo base_url() ?>application/CIFormTutorial/views/assets/css/bootstrap.css" rel="stylesheet">
    <link href="views/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="views/assets/css/docs.css" rel="stylesheet">
    <link href="views/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <title>Buller</title>
</head>
<body>
	<div class="main_div">
		<div>
			<nav>
				<div class="navbar navbar-fixed-top">
				  <div class="navbar-inner">
				    <div class="container">
				    	<a class="brand pull-left" href="#">
						  <strong>Buller</strong>
						</a>
						<?php if ($this->session->userdata('activeuser')) { ?>
					     <ul class="nav nav-pills pull-right">
						  <li><a href="/CodeIgniter_2.1.1/index.php/users/single/<?php echo $this->session->userdata('activeuser'); ?>">You</a></li>
					      <li><a href="/CodeIgniter_2.1.1/index.php/users/">Users</a></li>
					      <li><a href="/CodeIgniter_2.1.1/index.php/presentStocks/">Stocks</a></li>
					      <li><a href="/CodeIgniter_2.1.1/index.php/signup/logout">Logout</a></li>

						</ul>
						<?php } else { ?>
						 <ul class="nav nav-pills pull-right">
						  <!--<li><a href="/CodeIgniter_2.1.1/index.php/users/single/<?php echo $this->session->userdata('activeuser'); ?>">You</a></li> -->
					      <li><a  href="/CodeIgniter_2.1.1/index.php/signup/signups">
					      	<i class="icon-search icon-white"></i>
					      	Signup</a></li>
					      <li><a href="/CodeIgniter_2.1.1/index.php/signup/login">Login</a></li>

					     </ul>
					     <?php } ?>
				    </div>
				  </div>
				</div>
			</nav>
		</div>

		<div class="center-div">
			<div class="main-content-div">
		<!--following templates should close the open html tags -->
		<!--
		<nav class="nav">
			<h3 class="logo pull-left">Buller</h3>
			
			<ul class="nav nav-pills pull-right">
			  <li class="active">
			    <a href="#">You</a>
			  </li>
			  <li><a href="#">Users</a></li>
			  <li><a href="#">Stocks</a></li>
			</ul>
			<?php if ($this->session->userdata('activeuser')) { ?>
		    <ul>
		        <li><a href="/CodeIgniter_2.1.1/index.php/users/single/<?php echo $this->session->userdata('activeuser'); ?>"><?php echo $this->session->userdata('activeuser'); ?></a></li>
		        <li><a href="/CodeIgniter_2.1.1/index.php/users/">Users List</a></li>
		        <li><a href="/CodeIgniter_2.1.1/index.php/presentStocks/">Stocks List</a></li>
		        <li><a href="/CodeIgniter_2.1.1/index.php/signup/logout">Logout</a></li>
		    </ul>
		    <?php } ?>
		</nav>

		-->