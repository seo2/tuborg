<?php
	/*
This script is use to upload any Excel file into database.
Here, you can browse your Excel file and upload it into 
your database.

Download Link: http://www.discussdesk.com/import-excel-file-data-in-mysql-database-using-PHP.htm

Website URL: http://www.discussdesk.com
*/

session_start();
require_once("../_lib/config.php");
require_once("../_lib/MysqliDb.php");
$db2 = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);


$link 	= mysql_connect(DBHOST, DBUSER, DBPASS) or die("Couldn't make connection.");
$db 	= mysql_select_db(DBNAME, $link) or die("Couldn't select database");

$databasetable = "tareas";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/



set_include_path(get_include_path() . PATH_SEPARATOR . 'classes/');
include 'PHPExcel/IOFactory.php';

		$sourcePath  = $_FILES['archivo']['tmp_name']; 
		$temp 		 = explode(".",$_FILES["archivo"]["name"]);
		$newfilename = sha1(uniqid(mt_rand(), TRUE)) . '.' .end($temp);
		$targetPath  = "uploads/".$newfilename; 
		move_uploaded_file($sourcePath,$targetPath) ;  
			
		$inputFileName = "uploads/".$newfilename;


// This is the file path to be uploaded.
//$inputFileName = 'test.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount 	= count($allDataInSheet);  // Here get total count of row in that Excel sheet

$u = 0;
for($i=2;$i<=$arrayCount;$i++){
	
	$loteDesc 		= utf8_decode(trim($allDataInSheet[$i]["A"]));
	$loteCe 		= trim($allDataInSheet[$i]["B"]); 
	$loteLote 		= trim($allDataInSheet[$i]["C"]); ;
	$loteCodigo 	= $loteCe.$loteLote; 
	$loteFec		= trim($allDataInSheet[$i]["D"]); 
	$loteHorIni		= trim($allDataInSheet[$i]["E"]); 
	$loteHorFin 	= trim($allDataInSheet[$i]["F"]); 

	$query = "insert into mckay125_lote (
		loteDesc,	
		loteCe,
		loteLote,
		loteCodigo,
		loteFec,	
		loteHorIni	,
		loteHorFin		
	) values(
		'".$loteDesc."',	
		'".$loteCe."',	
		'".$loteLote."',
		'".$loteCodigo."',
		'".$loteFec."',
		'".$loteHorIni."', 
		'".$loteHorFin."' 		
	)";
	
	//echo $query;
	$insertTable= mysql_query($query);
	$msg = 'ok';
			
	
}

echo $msg;
 

?>