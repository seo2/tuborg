<?php
session_start();

require_once("../_lib/config.php");
require_once("../_lib/MysqliDb.php");
$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

$email		= $_POST["email"];
$password 	= $_POST["pass"];

	$db->where ('usuMail', strtolower($email));
	$db->where ('usuPass',md5($password) );
	$user = $db->getOne ("mckay125_usuarios");
	
	if ($user['usuID'] == '') {
		$login = 0;
	}else{
	    $_SESSION['ccid'] 			= $user['usuID'];
		$_SESSION['ccnombre'] 		= $user['usuNom'];
	    $_SESSION['ccemail'] 		= $user['usuMail'];
	    $_SESSION['cclogged']  		= true;  
	    
	    $login = 1;
	    
	
	}

 echo $login;
        
?>