<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

	
	if(isset($_POST['ganID'])){
		$ganID = $_POST['ganID'];
		$db->where("ganID", $ganID);
		$db->delete('mckay125_ganadores');
		echo 'ok';
	}
}else{
	echo 'error';
}
?>