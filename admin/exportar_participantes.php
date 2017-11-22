<?php
session_start();
require_once("_lib/config.php");
require_once("_lib/MysqliDb.php");
$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

/***** EDIT BELOW LINES *****/
$DB_Server 		= DBHOST; // MySQL Server
$DB_Username 	= DBUSER; // MySQL Username
$DB_Password 	= DBPASS; // MySQL Password
$DB_DBName 		= DBNAME; // MySQL Database Name
$DB_TBLName 	= "tareas"; // MySQL Table Name
$xls_filename 	= 'participantes_McKay125_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name


 
/***** DO NOT EDIT BELOW LINES *****/
// Create MySQL connection
$sql 		= "SELECT * FROM mckay125_participantes";
$Connect 	= @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());
// Select database
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());
// Execute query
$result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());
 
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
for ($i = 0; $i<mysql_num_fields($result); $i++) {
  echo mysql_field_name($result, $i) . "\t";
}
print("\n");
// End of printing column names
 
// Start while loop to get data
while($row = mysql_fetch_row($result))
{
  $schema_insert = "";
  for($j=0; $j<mysql_num_fields($result); $j++)
  {
    if(!isset($row[$j])) {
      $schema_insert .= "NULL".$sep;
    }
    elseif ($row[$j] != "") {
      $schema_insert .= "$row[$j]".$sep;
    }
    else {
      $schema_insert .= "".$sep;
    }
  }
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
}
?>