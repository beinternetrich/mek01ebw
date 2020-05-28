<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php'; 
###############################################################
# cPanel Email Creator Build MMTW.V4.20200528.0101
###############################################################
# Visit https://www.freelancer.com/u/TakeReal for paid assistance
###############################################################
$flogt= "\r\nCreateBzEmail Log~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
//---------------------------------------------------------------------
//$doomain   =  $_SERVER['HTTP_HOST'];
//$doomain   =  getVar('idomain', $doomain);
//$doomaintag= "Tap Into The Secret Goldmine of PLR!";
//
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
//$fwdemail  =  getVar('fwd', '');
//$dbsffx    =  strtolower("A".substr(date("D"),0,2)).date("Hi");//mo2323/substr("00".date("his"),-8,7);
//$dbsffx    =  getVar('dbx', $dbsffx);
//$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
//$dbpazz    =  getVar('dpz', $dbpazz);

//$cpskin   =  'paper_lantern';
//$proceed   =  false;
//$cppazzok  =  false;

//////////////////////////////**************==============remove below if above. Then delete above
// cPanel info
//$doomain   =  $_SERVER['HTTP_HOST'];  //echo $_SERVER['SERVER_NAME'];
//$doomain   =  getVar('idomain', $doomain);
//$doomaintag= "Tap Into The Secret Goldmine of PLR!";

//$sepdirhome=  explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));
//$dirhome   =  $sepdirhome[1];
//$cpuser    =  $sepdirhome[2];
//$pubhtml   =  $sepdirhome[3];
//$cpuser =  getVar('cpu', $cpuser);

//$cppazz =  getVar('cpk', ""); //'cP4n3LP!55w0D'
//$fwdeml =  getVar('fwd', ""); //'cP4n3LP!55w0D'

//$proceed   =  false;
//$dbuser    =  strtolower(substr("00".date("his"),-8,7));
//$getdbsffx =  getVar('dbx', $dbuser); //(eg cpanlusr_003232)

//$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
//$getdbpazz =  getVar('dpz', $dbpazz); //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb', 'd4tabezP!55w0D';

//$dbscript  =  $_SERVER['DOCUMENT_ROOT'].'/install/db02.sql';
//$cpskin   =  'paper_lantern';
//$proceed=false;
//	echo fprintf($flog, "\n%s", $flogt);
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
if(isset($fwdeml) && !empty($fwdeml) && isset($cppazz) && !empty($cppazz)) {
	$result .= execCommand("http://$cpuser:$cppazz@$doomain:2082/frontend/$cpskin/mail/doaddpop.html?email=support&domain={$doomain}&password={$cppazz}&quota=100");
	$result .= execCommand("http://$cpuser:$cppazz@$doomain:2082/frontend/$cpskin/mail/doaddfwd.html?email=support&domain={$doomain}&password={$cppazz}&fwdopt=fwd&fwdemail={$fwdeml}");
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
//function getVar($name, $def = '') {
//	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
//	else return $def;
//}
?>