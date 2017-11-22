<?php 
session_start();

require_once("_lib/config.php");
require_once("_lib/MysqliDb.php");
$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

$link 	= mysql_connect(DBHOST, DBUSER, DBPASS) or die("Couldn't make connection.");
$db2 	= mysql_select_db(DBNAME, $link) or die("Couldn't select database");

function usuarioNom($id){
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	$db->where ('usuID', $id);
	$usuario = $db->getOne ("pfizer_usuarios");
    $nombreusuario		= $usuario['usuNom'];
    return $nombreusuario;
}

if($_SESSION['ccid']){
	setcookie('id', $_SESSION['ccid']);
	$db->where ('usuID', $_SESSION['ccid']);
	$usuario = $db->getOne ("sn_usuarios");
	
	$_usuID			= $usuario['usuID'];
    $_usuNom		= $usuario['usuNom'];
    $_usuMail		= $usuario['usuMail'];
    $_usuTipo		= $usuario['usuTipo'];
    $_usuEmp		= $usuario['usuEmp'];

 } elseif($_COOKIE['id']) { 
	 
	$db->where ('usuID', $_COOKIE['id']);
	$usuario = $db->getOne ("sn_usuarios");
	
	$_usuID			= $usuario['usuID'];
    $_usuNom		= $usuario['usuNom'];
    $_usuMail		= $usuario['usuMail'];
    $_usuTipo		= $usuario['usuTipo'];
    $_usuEmp		= $usuario['usuEmp'];

 }else{ ?>
 <script>
 		window.location.replace("login.php");
 </script>
 <?php exit; 
	 }  
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Real Admin - Bootstrap Admin Template">
		<meta name="author" content="Łukasz Holeczek">
		<meta name="keyword" content="Real, Admin, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	    <title>Administrador</title>

	    <!-- Bootstrap core CSS -->
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-style">
	
		<!-- Remove following comment to add Right to Left Support or add class rtl to body -->
		<!-- <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet"> -->
		
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet">
		<link href="assets/css/simple-line-icons.css" rel="stylesheet">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- page css files -->
		<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
		<link href="assets/plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet">
		<link href="assets/plugins/morris/css/morris.css" rel="stylesheet">
		<link href="assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

		<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet">

		<!-- page css files TABLAS -->
		<link href="assets/plugins/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
		<link href="assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet">


		<!-- page css files FORMULARIOS -->
		<link href="assets/plugins/select2/css/select2.css" rel="stylesheet">
		<link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet">
		<link href="assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet">


		<link href="assets/css/sweetalert.css" rel="stylesheet">	
	    <!-- Custom styles for this template -->
	    <link href="assets/css/style.min.css" rel="stylesheet" id="main-style">
		<link href="assets/css/add-ons.min.css" rel="stylesheet">

		<link href="assets/css/cloudcore.css" rel="stylesheet">
				
		<!-- Remove following comment to add Right to Left Support or add class rtl to body -->
		<!-- <link href="assets/css/style.rtl.min.css" rel="stylesheet"> -->

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	
	
	<!-- BODY options, add following classes to body to change options

		1. 'sidebar-minified'     - Switch sidebar to minified version (width 50px)
		2. 'sidebar-hidden'		  - Hide sidebar
		3. 'rtl'				  - Switch to Right to Left Mode
		4. 'container'			  - Boxed layout
		5. 'static-sidebar'		  - Static Sidebar
		6. 'static-header'		  - Static Header
	-->
	
	<body >
		
		
		<!-- start: Header -->
		<div class="navbar" role="navigation">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html#"><i class="icon-rocket"></i> <span>Admin</span></a>
				
			</div>
			<ul class="nav navbar-nav navbar-actions navbar-left">
				<li class="visible-md visible-lg"><a href="javascript:void();" id="main-menu-toggle"><i class="fa fa-bars"></i></a></li>
				<li class="visible-xs visible-sm"><a href="javascript:void();" id="sidebar-menu"><i class="fa fa-bars"></i></a></li>
			</ul>
	        <ul class="nav navbar-nav navbar-right visible-md visible-lg">
<!--
				<li><button class="btn btn-default">Preview</button></li>
				<li><button class="btn btn-success">Launch</button></li>
-->
				<li><span class="timer"><i class="icon-clock"></i> <span id="clock"><!-- JavaScript clock will be displayed here, if you want to remove clock delete parent <li> --></span></span></li>

			</ul>
		</div>
		<!-- end: Header -->