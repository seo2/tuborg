<?php
session_start();

// store session data
if (isset($_SESSION['ccid'])){
	    $_SESSION['ccid'] 		= $_SESSION['ccid'];
	    $_SESSION['ccLogged']  	= true;  
}else{
	//echo('nope');
}
?>