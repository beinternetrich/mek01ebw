<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php'; 
//MMTECHWORKS WEBSCRIPT - MMTW.V8.20200528.0101
###############################################################
# cPanel Database Creator Build MMTW.V3.20200521.2300
###############################################################
# Visit https://www.freelancer.com/u/TakeReal for paid assistance
###############################################################
$flogt= "\r\nCreateDb Log~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
//---------------------------------------------------------------------
//$doomain   =  $_SERVER['HTTP_HOST'];
//$doomaintag= "Tap Into The Secret Goldmine of PLR!";

//$sepdomain =  explode(".", $doomain);
//$webtitle  =  substr_replace($sepdomain[0], substr($sepdomain[0], 0, 1), 0, 1);
//$webtitle  =  getVar('wbt', $webtitle);
//$webtitle  =  str_replace(' ', '+', $webtitle);

//$sdr       =  $_SERVER['DOCUMENT_ROOT'];
//$sepdirhome=  explode("/", $sdr);
//$dirhome   =  $sepdirhome[1];
//$cpuser    =  $sepdirhome[2];
//$pubhtml   =  $sepdirhome[3];
//$cpuser    =  getVar('cpu', $cpuser);
//$cppazz    =  getVar('cpk', '');
////$fwdemail  =  getVar('fwd', '');

//$dbsffx    =  strtolower("A".substr(date("D"),0,2)).date("Hi");//mo2323/substr("00".date("his"),-8,7);
//$dbsffx    =  getVar('dbx', $dbsffx);
//$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
//$proceed   =  false;
////$cppazzok  =  false;


//////////////////////////////**************==============remove below if above. Then delete above
//$doomain   =  $_SERVER['HTTP_HOST'];  //echo $_SERVER['SERVER_NAME'];
//$doomain   =  getVar('idomain', $doomain);
//$doomaintag= "Tap Into The Secret Goldmine of PLR!";

//$sepdirhome=  explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));
//$dirhome   =  $sepdirhome[1];
//$cpuser   =  $sepdirhome[2];
//$pubhtml   =  $sepdirhome[3];
//$cpuser =  getVar('cpu', $cpuser);

//$cppazz =  getVar('cpk', ""); //'cP4n3LP!55w0D'
//$cppazz =  getVar('icppazz', $getcppazz); 

//$proceed   =  false;
//$dbuser    =  strtolower(substr("00".date("his"),-8,7));
//$getdbsffx =  getVar('dbx', $dbuser); //(eg cpanlusr_003232)

//$dbpazz    =  'Ll3QrYm!y0U*2M$';   //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
//$dbpazz =  getVar('dpz', $dbpazz); //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb', 'd4tabezP!55w0D';

//$dbscript  =  $_SERVER['DOCUMENT_ROOT'].'/install/'.$fsql;
//$cpskin   =  'paper_lantern';
//$proceed=false;
//echo fprintf($flog, "\n%s", $flogt);


//==============================================================
// cPanel detail
$dbscript  =  $_SERVER['DOCUMENT_ROOT'].'/install/'.$fsql;
$curl_path = '/usr/bin/curl';
////////////////////////////////////////////
////* Code below should not be changed *////
////////////////////////////////////////////
$result = "Db Creation...";
if(isset($dbsffx) && !empty($dbsffx) && isset($cppazz) && !empty($cppazz)) {
	$result .= execCommand("http://$cpuser:$cppazz@$doomain:2082/frontend/$cpskin/sql/addb.html?db={$dbsffx}");
	$result .= execCommand("http://$cpuser:$cppazz@$doomain:2082/frontend/$cpskin/sql/adduser.html?user={$dbsffx}&pass={$dbpazz}");
	$result .= execCommand("http://$cpuser:$cppazz@$doomain:2082/frontend/$cpskin/sql/addusertodb.html?user={$cpuser}_{$dbsffx}&db={$cpuser}_{$dbsffx}&privileges=ALL");
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
	$mysql_host     = $_SERVER['HTTP_HOST']; 
	$mysql_username = $cpuser;
	$mysql_password = $cppazz;
	$mysql_database = $cpuser.'_'.$dbsffx;
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
	echo fprintf($flog, "\n%s", $flogt);
}
function execCommand($command) {
  global $curl_path;
  if (!empty($curl_path)) {
    return exec("$curl_path '$command'");
  } else {
    return file_get_contents($command);
  }
}
//function getVar($name, $def = '') {
//	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
//	else return $def;
//}
?>