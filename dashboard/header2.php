<!DOCTYPE html>
<html>
<head>
<?php  //$cal->loginAdmino('www.easytradex.com'); $cal->checkValueSET();?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php print @$title;?></title>
<link href="css2/bootstrap.min.css" rel="stylesheet">
<link href="css2/datepicker3.css" rel="stylesheet">
<link href="css2/styles.css" rel="stylesheet">
<script src="js2/lumino.glyphs.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<!--<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #FFF;" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header" style="padding-bottom:30px !important;">
			
				<a class="navbar-brand" href="../"><span><img class="img-responsive" src="../img/logo.png" width="70" height="70" alt="site-logo"></span></a>
				<ul class="user-menu" >
					<li class="dropdown pull-right">
						<a href="#" style="color: black;" class="dropdown-toggle" data-toggle="dropdown"><span style="color: black;"> </span> <span style="color: darkgoldenrod;"><?php //print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');?></span>  <span style="color: black;" class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="<?php //print @$active2;?>"><a href="my-account"><svg class="glyph stroked male user" style="color: black;"><use xlink:href="#stroked-male-user"/></svg> Profile</a></li>
			                  <li role="presentation" class="divider"></li>
							<li><a href="../end-current-session"><i class="fa fa-sign-out"></i>&nbsp; &nbsp; Sign Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div>
	</nav>
   <h1></h1>
   <h4 style="width:100% !important; margin-bottom:10px !important;"></h4>-->
   <?php $user =  $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'account_type');
	     if($user!='user'){
			 header("location:../end-current-session");
		 }
	?>