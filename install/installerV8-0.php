<?php 
###############################################################
# MMTECHWORKS WEBSITE BUILDER - MMTW.V8.20200525.0330
###############################################################
# Visit DigitalCrazy.biz
###############################################################
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('max_execution_time', 300); //temp max execution 5 mins
set_time_limit(600);
$flog = fopen("flog.log","a");
$flogt= "";
//$flogt= "\r\nInit Logger~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
//$flogt .= "\r\n au fur et à mesure,\r\n du coup,\r\n à force de,\r\n dis donc,\r\n tant mieux,\r\n Tiens-moi au courant!,\r\n N'importe quoi!,\r\n Laisse tomber,\r\n ça roule,\r\n punaise puree,\r\n basta - j'en ai marre,\r\n quoi (you know)";
###############################################################
$skel = "https://mmtw.s3.eu-west-2.amazonaws.com/dcrazy/mek01ebw/";
//$skel   = "http://digitalcrazy.biz/mek01ebw/";
//$fsql   = 'db02.sql';
$dbimport=  $_SERVER['DOCUMENT_ROOT'].'/install/'.'dbimport.sql';
$rowsets= array(
	array("dlodfilnum","Srcfiles","copyto", "unzipto"),
//	array("nfile01",  "N1in.zip", "/"        , "/"),
	array("yfile02",  "N2wp.zip", "/", "/../"),
//	array("yfile03",  "N3sh.zip", "/", "/../eShop/"),
//	array("yfile04",  "N4sh.zip", "/", "/../eShop/"),
//	array("yfile05",  "N5sh.zip", "/", "/../eShop/"),
	array("yfile06",  "N6sh.zip", "/", "/../eShop/")); 
###############################################################
$doomain   =  $_SERVER['HTTP_HOST'];
$doomain   =  getVar('dom', $doomain);
$doomainip =  getVar('dip', $doomain);
$doomaintag= "Tap Into The Secret Goldmine of PLR!";

$sepdomain =  explode(".", $doomain);
$webtitle  =  substr_replace($sepdomain[0], substr($sepdomain[0], 0, 1), 0, 1);
$webtitle  =  getVar('wbt', $webtitle);
$webtitle  =  str_replace(' ', '+', $webtitle);

$sdr       =  $_SERVER['DOCUMENT_ROOT'];
$sepdirhome=  explode("/", $sdr);
$dirhome   =  $sepdirhome[1];
$cpuser    =  $sepdirhome[2];
$pubhtml   =  $sepdirhome[3];
$cpuser    =  getVar('cpu', $cpuser);
$cppazz    =  isset($_REQUEST['cpk'])?urlencode(urldecode($_REQUEST['cpk'])):'cpkpost_error';
if ($doomain=='scottbyfieldproperties.com') $cppazz = urlencode(urldecode('S?u1$o3@6~4p9bJ'));
if ($doomain=='jzubes.com')                 $cppazz = urlencode(urldecode('9@1d6D#h?q4$ZrU'));
$fwdeml    =  isset($_REQUEST['fwd'])?urlencode(urldecode($_REQUEST['fwd'])):'fwdpost_error';
$dbsffx    =  strtolower("A".substr(date("D"),0,2)).date("Hi");//mo2323/substr("00".date("his"),-8,7);
$dbsffx    =  getVar('dbx', $dbsffx);
$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
$dbpazz    =  getVar('dpz', $dbpazz);

$cpskin    =  'paper_lantern';
$port      =  2082;
$htpp      =  'http';
$ssl       =  false;
$proceed   =  false;
$cppazzok  =  false;
###############################################################
# END OF SETTINGS
###############################################################
function getVar($name, $def = '') {
	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; else return $def;}
function execCommand($command)  {
	global $curl_path;
	if (!empty($curl_path)) {
		return exec("$curl_path '$command'");
	} else {
		return file_get_contents($command);
	}
}
?>