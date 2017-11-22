<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	
	$mk125_nom	= filter_var($_POST["ganNom"], FILTER_SANITIZE_STRING);
	$mk125_rut	= filter_var($_POST["ganRut"], FILTER_SANITIZE_STRING);
	$ganFec		= filter_var($_POST["ganFec"], FILTER_SANITIZE_STRING);
	$ganCod		= filter_var($_POST["ganCod"], FILTER_SANITIZE_STRING);
	$ganHor		= filter_var($_POST["ganHor"], FILTER_SANITIZE_STRING);
	

	$data = Array (
		"ganNom" 	=> $mk125_nom,
		"ganRut" 	=> $mk125_rut,
		"ganFec" 	=> $ganFec,
		"ganCod" 	=> $ganCod,
		"ganHor" 	=> $ganHor
	);
	
	if(isset($_POST['ganID'])){
		$ganID = $_POST['ganID'];
		$db->where("ganID", $ganID);
		$db->update('mckay125_ganadores', $data);
		echo 'ok';
	}else{
		$mk125_ID = $db->insert ('mckay125_ganadores', $data);		
		echo 'ok';
	}
}else{
	echo 'error';
}
?>