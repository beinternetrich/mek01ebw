<?php
//===================================================== 
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$flog = fopen('flog.log','a');
$flogt= "\nCreateDb Echos<br>";
###############################################################
# cPanel Database Creator Build MMTW.V3.20200521.2300
###############################################################
# Visit https://www.freelancer.com/u/TakeReal for paid assistance
###############################################################
$doomain   =  $_SERVER['HTTP_HOST'];  //echo $_SERVER['SERVER_NAME'];
$doomain   =  getVar('idomain', $doomain);
$doomaintag= "Tap Into The Secret Goldmine of PLR!";

$sepdirhome=  explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));
$dirhome   =  $sepdirhome[1];
$cp_user   =  $sepdirhome[2];
$pubhtml   =  $sepdirhome[3];
$getcpuser =  getVar('cpu', $cp_user);

$getcppazz =  getVar('cpk', ""); //'cP4n3LP!55w0D'
//$getcppazz =  getVar('icppazz', $getcppazz); 

$proceed   =  false;
$dbuser    =  strtolower(substr("00".date("his"),-8,7));
$getdbsffx =  getVar('dbx', $dbuser); //(eg cpanlusr_003232)

$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
$getdbpazz =  getVar('dpz', $dbpazz); //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb', 'd4tabezP!55w0D';

$dbscript  =  $_SERVER['DOCUMENT_ROOT'].'/install/db02.sql';
$cp_skin   =  'paper_lantern';
$proceed=false;
	echo fprintf($flog, "\n%s", $flogt);
//==============================================================
// cPanel detail
$curl_path = '/usr/bin/curl';
////////////////////////////////////////////
////* Code below should not be changed *////
////////////////////////////////////////////
$result = "Db Creation...";
if(isset($getdbsffx) && !empty($getdbsffx) && isset($getcppazz) && !empty($getcppazz)) {
	$result .= execCommand("http://$getcpuser:$getcppazz@$doomain:2082/frontend/$cp_skin/sql/addb.html?db={$getdbsffx}");
	$result .= execCommand("http://$getcpuser:$getcppazz@$doomain:2082/frontend/$cp_skin/sql/adduser.html?user={$getdbsffx}&pass={$getdbpazz}");
	$result .= execCommand("http://$getcpuser:$getcppazz@$doomain:2082/frontend/$cp_skin/sql/addusertodb.html?user={$getcpuser}_{$getdbsffx}&db={$getcpuser}_{$getdbsffx}&privileges=ALL");
	$proceed=true;
  } else {
  	$result = "Usage: cpdbcreate.php?dbx=dbsuffix&dpz=dppword&cpu=cpanelusr&cpk=cpanelpass";
	$proceed=false;
}
	$flogt = $result;
	//echo $result;
	echo fprintf($flog, "\n%s", $flogt);
###############################################################
# Mysql Database Pop 1.0
###############################################################
if ($proceed) {
	$file3          = $dbscript;
	$mysql_host     = $_SERVER['HTTP_HOST']; //'localhost';
	$mysql_username = $getcpuser;   //$cp_user;
	$mysql_password = $getcppazz;
	$mysql_database = $getcpuser.'_'.$getdbsffx;  //$cp_user.'_'.$db_name;
	$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database); //connect to the MySQL server
	// check connection
	if (mysqli_connect_errno()) {
	  exit('<br/>Connecting to MySQL server failed: '. mysqli_connect_error());
	} else {
	  mysqli_query($conn, 'Use '.$mysql_database.';');
	  echo '<br/>Calm cool CONNECTED!!!';
	
	  if (!file_exists($file3)) {
		echo "\n" . $file3 . ' not exist.' . "\n";
	  }
	  else {
		$sql = '';   
		$lines = file($file3);  //read entire sql file	 
		foreach ($lines as $line_num => $line)   // loop through line
			{
			if (substr($line, 0, 2) != '--' &&  substr($line, 0, 15)!= 'CREATE DATABASE' &&  substr($line, 0, 3) != 'USE' &&  $line != '') // continue if not Commented
				{
				$sql .= $line;                              // add this line to current segment
				if (substr(trim($line), -1, 1) == ';')      // If semicolon at end, it's end of the query.
					{             			                // Perform $sql query populate the dbase
				 if (! mysqli_query($conn, $sql) ) {        //if (! $conn->query($sql) === TRUE) {
					  echo '<br />Error performing:' . $sql . ' -----  : ' . mysqli_error($conn);
					} else {
	//				  print('<br/>Performed query: ' . $sql);
					}
					$sql = '';
					}
				}
			} //end foreach
		} //end if!fileexist
	}
	mysqli_close($conn);
}
function execCommand($command) {
  global $curl_path;
  if (!empty($curl_path)) {
    return exec("$curl_path '$command'");
  } else {
    return file_get_contents($command);
  }
}
function getVar($name, $def = '') {
	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
	else return $def;
}
?>