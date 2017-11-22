<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	
	$url	= filter_var($_POST["url"], FILTER_SANITIZE_STRING);
	

	$data = Array (
		"url" 	=> $url
	);
	
	$mk125_ID = $db->insert ('tuborg_ig', $data);		
	echo 'ok';
}else{
	echo 'error';
}
?>