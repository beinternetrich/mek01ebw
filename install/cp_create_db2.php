<?php
/* 
https://$doomain/install/cp_create_db.php?db=$dbuser&user=$dbuser&dpz=$dbpazz&cpu=$cpuser&cpz=$cppazz
*/
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
###############################################################
# cPanel Database Creator Build MMTW2.2
###############################################################
# Visit https://www.freelancer.com/u/TakeReal for paid assistance
###############################################################
$doomain     = $_SERVER['HTTP_HOST'];		//domain.tld
#$startpath   = $_SERVER['DOCUMENT_ROOT'];  	//domaine.com/  is used?
$sepdirhome  = explode('/', $_SERVER['DOCUMENT_ROOT']);
$dirhome     = strtolower($sepdirhome[1]);
$tmpstring1  = str_replace($dirhome.'/', '', $_SERVER['DOCUMENT_ROOT']);
$tmpstring2  = str_replace("/public_html", "", $tmpstring1);
#$cp_skin     = 'paper_lantern';
$cp_host     = $doomain;
$cp_user     = str_replace("/", "", $tmpstring2);
$getcpuser   = $_GET['cpu'];
$getcppazz   = $_GET['cpz']; //'cP4n3LP!55w0D'
$getdbuser   = $_GET['db'];  //'wp2019'    (eg cpanlusr_wp2019)
$getdbname   = $getdbuser;   //'wp2019'    (eg cpanlusr_wp2019)
$getdbpazz   = $_GET['dpz']; //'d4tabezP!55w0D'
$getdbsql    = $_GET['dbsql']; 		//'db.sql'
$dbscript    = $_SERVER['DOCUMENT_ROOT'].'/install/'.$getdbsql;
// Script will add user to db if values not empty. User will have ALL permissions
$db_uname    = '';
$db_upass    = '';
// Update this only if you are experienced user or if script does not work
// Path to cURL on your server. Usually /usr/bin/curl
$curl_path = '/usr/bin/curl';
////////////////////////////////////////////
///* Code below should not be changed */////
////////////////////////////////////////////
echo "<br>cp_user="    .$cp_user ;
echo "<br>getcpuser="  .$getcpuser;
//--

function execCommand($command) {
  global $curl_path;
  if (0 && !empty($curl_path)) {
    return exec("$curl_path '$command'");
  } else {
    return file_get_contents($command);
  }
}

if(isset($getdbname) && !empty($getdbname)) {
	$db_name = $getdbname;  
	$sPrefix = $getcpuser; // 2019.12.07
	$site = "http://$cp_user:$getcppazz@$cp_host:2082/execute/Mysql/";
	echo "{$site}create_database?name={$sPrefix}_{$db_name}"."<br>";
	$result = "\n" . '<br/>Add Database: ' . execCommand("{$site}create_database?name={$sPrefix}_{$db_name}");

if(isset($getdbuser) && !empty($getdbuser)) {
	$db_uname = $getdbuser;
	$db_upass = $getdbpazz;
	}
if (!empty($db_uname)) {
	$result .= "\n" . '<br/>Add User: ' . execCommand("{$site}create_user?name={$sPrefix}_{$db_uname}&password={$db_upass}");
	$result .= "\n" . '<br/>Add User to Database: ' . execCommand("{$site}set_privileges_on_database?user={$sPrefix}_{$db_uname}&database={$sPrefix}_{$db_name}&privileges=ALL");
	}
  
  $result = preg_replace('#<script(.*?)>(.*?)</script>#ism', '', $result);
  $result = preg_replace('#<header(.*?)>(.*?)</header>#ism', '', $result);
  $result = preg_replace('#<footer(.*?)>(.*?)</footer>#ism', '', $result);
  $result = preg_replace('#<title(.*?)>(.*?)</title>#ism', '', $result);
  $result = preg_replace('#<aside(.*?)>(.*?)</aside>#ism', '', $result);
  $result = preg_replace('#<a (.*?)>(.*?)</a>#ism', '', $result);
  $result = preg_replace('#<h1(.*?)>(.*?)</h1>#ism', '', $result);
  $result = preg_replace('#<h2(.*?)>(.*?)</h2>#ism', '', $result);
  $result = preg_replace('#<span\sclass\="page-title(.*?)>(.*?)</span>#ism', '', $result);
  $result = preg_replace('#<link(.*?)>#ism', '', $result);
  $result = preg_replace('#<meta(.*?)>#ism', '', $result);
  print "\n" . '<br/><b>Result</b>: ' . $result . '<br/><br/>' . "\n";
// echo $result;
  } else {
  echo "Usage: cp_create_db.php?db=dbnam&user=dbusrn&pass=dbpw&cpuser=cpusr&cpz=cppass&sql=script";
             //cp_create_db.php?db=$dbuser&user=$dbuser&dpz=$dbpazz&cpu=$cpuser&cpz=$cppazz
}

  
###############################################################
# Mysql Database Pop 1.0
###############################################################
# Visit Marcysecrets.com
############################################################### 
$file3          = $dbscript;
$mysql_host     = $_SERVER['HTTP_HOST']; //localhost; $_SERVER['HTTP_HOST'];
$mysql_username = $getcpuser; //$cp_user;
$mysql_password = $getcppazz;
//$mysql_database = $cp_user.'_'.$getdbname;
$mysql_database = $getcpuser.'_'.$getdbname;

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database); //connect to MySQL server
// check connection
if (mysqli_connect_errno()) {
  exit('<br>Connecting to MySQL server failed: '. mysqli_connect_error());
} else {
  mysqli_query($conn, 'Use '.$mysql_database.';');
  echo '<br>Calm cool CONNECTED!!!';

  if (!file_exists($file3)) {
    echo "\n" . $file3 . ' not exists.' . "\n";
  }
  else {
	$sql = '';   
	$lines = file($file3);  //read entire sql file	 
	foreach ($lines as $line_num => $line)	  	    	// loop through line
		{
		if (substr($line, 0, 2) != '--' && $line != '') // continue if not Commented
			{
			$sql .= $line;                              // add this line to current segment
			if (substr(trim($line), -1, 1) == ';')      // If semicolon at end, it's end of the query.
				{             			                // Perform $sql query populate the dbase
			 if (! mysqli_query($conn, $sql) ) {          //if (! $conn->query($sql) === TRUE) {
				  echo '<br>Error performing: ' . $sql . ' -----  : ' . mysqli_error($conn);
				} else {
				  print('<br>Performed query: ' . $sql);
				}
				$sql = '';
				}
			}
		}
	}
}  
mysqli_close($conn);
?>