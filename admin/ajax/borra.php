<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$db->where("id", $id);
		$db->delete('tuborg_ig');
		echo 'ok';
	}
}else{
	echo 'error';
}
?>