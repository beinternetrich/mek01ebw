<?php
//===================================================== 
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$flog = fopen('flog.log','a');
$flogt= "\nCreateBzEmail Echos<br>";
###############################################################
# cPanel Email Creator Build MMTW.V3.20200525.1700
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
###############################################################
// cPanel info
$doomain   =  $_SERVER['HTTP_HOST'];  //echo $_SERVER['SERVER_NAME'];
$doomain   =  getVar('idomain', $doomain);
$doomaintag= "Tap Into The Secret Goldmine of PLR!";

$sepdirhome=  explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));
$dirhome   =  $sepdirhome[1];
$cpuser    =  $sepdirhome[2];
$pubhtml   =  $sepdirhome[3];
$getcpuser =  getVar('cpu', $cpuser);

$getcppazz =  getVar('cpk', ""); //'cP4n3LP!55w0D'
$getfwdeml =  getVar('fwd', ""); //'cP4n3LP!55w0D'

$proceed   =  false;
$dbuser    =  strtolower(substr("00".date("his"),-8,7));
$getdbsffx =  getVar('dbx', $dbuser); //(eg cpanlusr_003232)

$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
$getdbpazz =  getVar('dpz', $dbpazz); //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb', 'd4tabezP!55w0D';

$dbscript  =  $_SERVER['DOCUMENT_ROOT'].'/install/db02.sql';
$cpskin   =  'paper_lantern';
$proceed=false;
	echo fprintf($flog, "\n%s", $flogt);
###############################################################
# END OF SETTINGS
###############################################################
// cPanel detail
$curl_path = '/usr/bin/curl';
////////////////////////////////////////////
////* Code below should not be changed *////
////////////////////////////////////////////
$result = "BzEmail Creation...";
###############################################################
if(isset($getfwdeml) && !empty($getfwdeml) && isset($getcppazz) && !empty($getcppazz)) {
	$result .= execCommand("http://$getcpuser:$getcppazz@$doomain:2082/frontend/$cpskin/mail/doaddpop.html?email=support&domain={$doomain}&password={$getcppazz}&quota=100");
	$result .= execCommand("http://$getcpuser:$getcppazz@$doomain:2082/frontend/$cpskin/mail/doaddfwd.html?email=support&domain={$doomain}&password={$getcppazz}&fwdopt=fwd&fwdemail={$getfwdeml}");
	$proceed=true;
  } else {
	$result = "Usage: cpbzemailcreate.php?cpk=cppazz&fwd=fwdemail";
	$proceed=false;
}
	echo $flogt = $result;
	echo fprintf($flog, "\n%s", $flogt);
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