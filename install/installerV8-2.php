<?php 
//===================================================== 
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$flog = fopen("flog.log","a");
//$flogt= "<br>Log Install02 Echos<br>";
###############################################################
# MMTECHWORKS WEBSITE BUILDER - MMTW.V8.20200521.2300
###############################################################
# Visit DigitalCrazy.biz
###############################################################
$fsql   =  getVar('fsql', 'db02.sql');
###############################################################
$doomain   =  $_SERVER['HTTP_HOST'];  //echo $_SERVER['SERVER_NAME'];
$doomain   =  getVar('dom', $doomain);

$sepdomain =  explode(".", $doomain);
$webtitle  =  substr_replace($sepdomain[0], substr($sepdomain[0], 0, 1), 0, 1);
$webtitle  =  getVar('wbt', $webtitle);
$webtitle  =  str_replace(' ', '+', $webtitle);

$sepdirhome=  explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));
$dirhome   =  $sepdirhome[1];
$cpuser    =  $sepdirhome[2];
$pubhtml   =  $sepdirhome[3];
$cpuser    =  getVar('cpu', $cpuser);

$cppazz    =  getVar('cpk', "");

$dbsffx    =  strtolower(substr("00".date("his"),-8,7));
$dbpazz    =  "Ll3QrYm!y0U*2M$"; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
$cppazzok=false;		
###############################################################
# END OF SETTINGS
###############################################################
function getVar($name, $def = '') {
	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
	else return $def;}

//:::::::::SEARCH REPLACE and BUILD Database & Webfiles::::::::::::::::::::	
	$s = "https://$doomain/install/cp_PREsearchreplOLDsite.php";
	$f = file_get_contents($s);
	@fclose($f);
	$s ="https://$doomain/install/cp_POSsearchreplNEWsite.php?wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";
	$f = file_get_contents($s);
	@fclose($f);

//::::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::::
	$sdr       = $_SERVER['DOCUMENT_ROOT'];
	copy($sdr.'/install/PREindex.php',    $sdr.'/index.php');
	copy($sdr.'/install/.PREhtaccess',    $sdr.'/.htaccess');
	copy($sdr.'/install/PREwp-config.php',$sdr.'/wp-config.php');
 	copy($sdr.'/install/PREdb.sql',       $sdr.'/install/'.$fsql);
    copy($sdr.'/install/PREmmtw-pincset.php',$sdr.'/eShop/share/mmtw-pincset.php');

//::::::::::Setup Database Creation::::::::::::::::::::::::::::::::::::::::
	$s ="http://$doomain/install/cpdbcreateV3.php?dbx=$dbsffx&dpz=$dbpazz&cpu=$cpuser&cpk=$cppazz&dbsql=$fsql";
	$f = file_get_contents($s);
	@fclose($f);

	// Setup Email Forwarding
	//$cpcontact = $yoemail[0];
	//$f = fopen("http://$doomain/install/cp_fwd_bizemail.php?efwd=$cpcontact&cpz=$cppazz", "r");
	//@fclose($f);
?>