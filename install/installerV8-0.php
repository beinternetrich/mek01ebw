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
set_time_limit(300);
$flog = fopen("flog.log","a");
$flogt= "\r\nInit Logger~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
###############################################################
//$skel = "https://mmtw.s3.eu-west-2.amazonaws.com/dcrazy/mek01ebw/";
$skel   = "https://digitalcrazy.biz/mek01ebw/";
$fsql   = 'db02.sql';
$rowsets= array(
	array("dlodfilnum","Srcfiles","copyto", "unzipto"),
	array("nfile01",  "N1in.zip", "/"        , "/"),
	array("yfile02",  "N2wp.zip", "/", "/../"),
	array("yfile03",  "N3sh.zip", "/", "/../eShop/"),
	array("yfile04",  "N4sh.zip", "/", "/../eShop/"),
	array("yfile05",  "N5sh.zip", "/", "/../eShop/"),
	array("nfile06",  "N6sh.zip", "/", "/../eShop/")); 
###############################################################
$doomain   =  $_SERVER['HTTP_HOST'];
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
$cppazz    =  getVar('cpk', '');

$dbsffx    =  strtolower("A".substr(date("D"),0,2)).date("Hi");//mo2323/substr("00".date("his"),-8,7);
$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
$proceed   =  false;
$cppazzok  =  false;
###############################################################
# END OF SETTINGS
###############################################################
function getVar($name, $def = '') {
	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
	else return $def;}
?>