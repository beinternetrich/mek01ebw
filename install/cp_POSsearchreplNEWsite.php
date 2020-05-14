<?php
###############################################################
# Recursive Text Replacer 1.0
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
############################################################### 
// I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Init Vars
$startpath    = $_SERVER['DOCUMENT_ROOT'];
$sepdirhome   = explode("/", $_SERVER['DOCUMENT_ROOT']);
$dirhomePRE   = 'HOM3D1R'; 
$dirhome      = strtolower($sepdirhome[1]);
$tmpstring1   = str_replace($dirhome."/", "", $_SERVER['DOCUMENT_ROOT']);
$tmpstring2   = str_replace("/public_html", "", $tmpstring1);
$cpuserPRE    = 'CPUS3R';  
$cpuser       = str_replace("/", "", $tmpstring2);
$defemailPRE  = 'DEF3ML';
$defemail     = $cpuser.'@'.$_SERVER['HTTP_HOST'];
$dldstickPRE  = 'DLDST1K';
$dldstick     = 'https://d0wnload.digitalcrazy.biz/niches';
$htadoomainPRE= 'HTACPHoST'; 
$htadoomain   = str_replace(".", "\.", $_SERVER['HTTP_HOST']);
$doomainPRE   = 'CPH0ST'; 
$doomain      = strtolower($_SERVER['HTTP_HOST']);
$webtitlePRE  = 'W3BTITLE'; 
$webtitle     = ucwords($_GET['wbt']); //ucfirst ($_GET['wbt']);
$webphonePRE  = 'W3BPH0NE'; 
$webphone     = '+44(0)7123456789';
$cppazzPRE    = 'CPP455';
$cppazz       = $_GET['cpz'];
$dbpazzPRE    = 'DBP455';  
$dbpazz       = $_GET['dpz'];
$dbsufxPRE    = '_DBSUFX';  
$dbsufx       = '_'.$_GET['dbu'];
//$doomsslPRE   = 'http://CPH0ST';
//$doomssl      = 'http?://CPH0ST'; 
//--------------------------------------------
echo "<br/>Checks::IN::POST::SR:::::::::::::::::::::::::::::::::::::::::::::::::::::::<br/>";
echo "<br>cpz="   .$cppazz;
echo "<br>dpz="   .$dbpazz;
echo "<br>dbu="   .$dbsufx."<br/>";
//--------------------------------------------
$stime = time();
$files_processed = 0;
$files_updated = 0;
$files_not_updated = 0;
$msgrepl = '';

$replace = array(
$dirhomePRE   => $dirhome,
$cpuserPRE    => $cpuser, 
$defemailPRE  => $defemail,
$dldstickPRE  => $dldstick,
$htadoomainPRE=> $htadoomain,
$doomainPRE   => $doomain,
$webtitlePRE  => $webtitle,  
$webphonePRE  => $webphone, 
$cppazzPRE    => $cppazz,
$dbpazzPRE    => $dbpazz,
$dbsufxPRE    => $dbsufx);
  
$reportto = "mitchymitchy"."33@gm"."ail.com";
define('RECURSE',true);
// _________________________________________________________________ //

if (!file_exists($startpath)) {
  die("Folder \"" . $startpath . "\" does not exist.");
}
dir_replace($startpath);     // start replacement
$etime = time();             // record end time
$headers  = "MIME-Version: 1.0\r\n";  // setup message and email results
$headers .= "Content-type: text/plain; charset=\"us-ascii\"\r\n";
$headers .= "From: " . $reportto . "\r\n";
$headers .= "Reply-To: " . $reportto . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
$message = "Mitch,
 Replacement script was run. Please see results below:
 Files processed: $files_processed
 Files updated: $files_updated
 Files not updated (error ocurred): $files_not_updated
 Processing time: " . date('i:s',$etime - $stime);

if ($reportto != '') {          // send email @
  mail($reportto,               // TO email
        'POST Replace results', // subject
        $message . '\r\n' . $msgrepl,   // email text
        $headers);              // headers
}
//-------------------------------------
// recurse folders
function dir_replace ($dirname, $recursive = RECURSE) {
  $dir = opendir($dirname);
  while ($file = readdir($dir)) {
    if ($file != '.' && $file != '..') {
      if (is_dir($dirname.'/'.$file)) {
        if ($recursive) {
          dir_replace($dirname.'/'.$file);
        }
      } else if (
//	  fnmatch('wp-config.php',    $file) ||
//	  fnmatch('mmtw-pincset.php', $file) ||
	  fnmatch('PREwp-config.php',    $file) ||
	  fnmatch('PREmmtw-pincset.php', $file) ||
	  fnmatch('PREdb02.sql', $file)) {
		  if (fnmatch('*cp_POSsearchreplNEWsite.php', $file)) {
		  }	else {
				file_replace($dirname.'/'.$file);
				echo "<br>File_replace (L100) $dirname / $file";
		 		 }
		 }
    }
  }
} // dir_replace

function file_replace ($filename) {
  global $files_processed, $files_updated, $files_not_updated, $msgrepl, $replace;
  global $dirhomePRE, $cpuserPRE, $defemailPRE, $dldstickPRE, $htadoomainPRE, $doomainPRE, $webtitlePRE, $webphonePRE, $cppazzPRE, $dbpazzPRE, $dbsufxPRE;
  $files_processed++;

  $txt = file_get_contents($filename);    // get file contents
  $update = (strpos($txt,$dirhomePRE)  !== FALSE) ||
			(strpos($txt,$cpuserPRE)   !== FALSE) ||
			(strpos($txt,$defemailPRE) !== FALSE) ||
    		(strpos($txt,$dldstickPRE) !== FALSE) || 
  			(strpos($txt,$htadoomainPRE)!==FALSE) ||
			(strpos($txt,$doomainPRE)  !== FALSE) ||
  			(strpos($txt,$webtitlePRE) !== FALSE) ||
			(strpos($txt,$webphonePRE) !== FALSE) || 
			(strpos($txt,$cppazzPRE)   !== FALSE) || 
			(strpos($txt,$dbpazzPRE)   !== FALSE) || 
			(strpos($txt,$dbsufxPRE)   !== FALSE); //need replacement?

  if ($update) {
	$txt = str_replace_assoc($replace,$txt);       // replace file content
	$f = @fopen($filename,'w+');                   // open file for writing
	if ($f) {
      @fputs($f,$txt);                             // save file contents
      @fclose($f);
	  $msgrepl .= "<br>Updated file ".$filename."\r\n";
	  echo "<br>(L132) $msgrepl";
      $files_updated++;                            // increment updated files counter
    }
    else {
      $msgrepl .= "<br>Could not update file ".$filename.". Check permissions\r\n";
	  echo "<br>(L137) $msgrepl";
      $files_not_updated++;
    }
  }// if ($update)
}  // file_replace

function str_replace_assoc($array,$string){
    $from_array = array();
    $to_array = array();
   
    foreach($array as $k => $v){
        $from_array[] = $k;
        $to_array[] = $v;
    }
    return str_replace($from_array,$to_array,$string);
}
// _________________________________________________________________ //
// echo nl2br($message . '<br/>' . $msgrepl);   // if script runs in browser, output to browser too.
// header("Location: http://$doomain/install/cp_create_bizemail.php?cpz=$cppazz&epz=ch4ng3m3EMLn0w!");
?>