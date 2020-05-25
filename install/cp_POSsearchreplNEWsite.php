<?php
###############################################################
# Recursive Text Replacer 2.03(MMTW)
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
############################################################### 
// I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('max_execution_time', 300); //temp max execution 5 mins
set_time_limit(300);
$flog = fopen("flog.log","a");
$flogt= "\r\nPostReplace Log~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
// Init Vars
$startpath    = $_SERVER['DOCUMENT_ROOT'];
$sepdirhome   = explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));

$dirhomef1PRE = '/HOM3D1R/CPUS3R';
$dirhomef1    = '/'.$sepdirhome[1].'/'.$sepdirhome[2];
$dirhomef2PRE = '/HOM3D1R\\/CPUS3R'; 
$dirhomef2    = '/'.$sepdirhome[1].'\\/'.$sepdirhome[2];
//$dirhomePRE   = 'HOM3D1R'; 
//$dirhome      = strtolower($sepdirhome[1]);
//$tmpstring1   = str_replace($dirhome."/", "", $_SERVER['DOCUMENT_ROOT']);
//$tmpstring2   = str_replace("/public_html", "", $tmpstring1); //$pubhtml   =  $sepdirhome[3];
$cpuserPRE    = 'CPUS3R';  
//$cpuser       = str_replace("/", "", $tmpstring2);
$cpuser       =  $sepdirhome[2];
$defemailPRE  = 'DEF3ML';
$defemail     = $cpuser.'@'.$_SERVER['HTTP_HOST'];
$dldstickPRE  = 'DLDST1K';
$dldstick     = 'https://d0wnload.digitalcrazy.biz/niches';
$htadoomainPRE= 'HTACPHoST'; 
$htadoomain   = str_replace(".", "\.", $_SERVER['HTTP_HOST']);
$doomainPRE   = 'CPH0ST'; 
$doomain      = strtolower($_SERVER['HTTP_HOST']);
$webtitlePRE  = 'W3BTITLE'; 
$webtitle     = str_replace('+', ' ', ucwords($_GET['wbt']));
$webphonePRE  = 'W3BPH0NE'; 
$webphone     = '+44(0)7123456789';
$cppazzPRE    = 'CPP455';
$cppazz       = $_GET['cpk'];
$dbpazzPRE    = 'DBP455';  
$dbpazz       = $_GET['dpz'];  //'Ll3QrYm!y0U*2M$'; //
$dbsufxPRE    = '_DBSUFX';  
$dbsufx       = '_'.$_GET['dbx'];
//$doomsslPRE   = 'http://CPH0ST';
//$doomssl      = 'http?://CPH0ST'; 
//--------------------------------------------

//echo "<br/>Checks::IN::POST::SR:::::::::::::::::::::::::::::::::::::::::::::::::::::::<br/>";
//echo "<br>cpz="   .$cppazz;
//echo "<br>dpz="   .$dbpazz;
//echo "<br>dbx="   .$dbsufx."<br/>";
//--------------------------------------------
$stime = time();
$files_processed = 0;
$files_updated = 0;
$files_not_updated = 0;
$msgrepl = '';

$replace = array(
$dirhomef1PRE => $dirhomef1,
$dirhomef2PRE => $dirhomef2,
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
  
//$reportto = "mitchymitchy"."33@gm"."ail.com";
define('RECURSE',true);
// _________________________________________________________________ //

if (!file_exists($startpath)) {
  die("Folder \"" . $startpath . "\" does not exist.");
}
dir_replace($startpath);     // start replacement
//$etime = time();             // record end time
//$headers  = "MIME-Version: 1.0\r\n";  // setup message and email results
//$headers .= "Content-type: text/plain; charset=\"us-ascii\"\r\n";
//$headers .= "From: " . $reportto . "\r\n";
//$headers .= "Reply-To: " . $reportto . "\r\n";
//$headers .= 'X-Mailer: PHP/' . phpversion();
//$message = "Mitch,
// Replacement script was run. Please see results below:
// Files processed: $files_processed
// Files updated: $files_updated
// Files not updated (error ocurred): $files_not_updated
// Processing time: " . date('i:s',$etime - $stime);
//
//if ($reportto != '') {          // send email @
//  mail($reportto,               // TO email
//        'POST Replace results', // subject
//        $message . '\r\n' . $msgrepl,   // email text
//        $headers);              // headers
//}
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
	fnmatch('PREwp-config.php',    $file) ||
	fnmatch('PREmmtw-pincset.php', $file) ||
	fnmatch('PREdb.sql', $file)) {
		if (fnmatch('cp_POSsearchreplNEWsite.php', $file)) {
		}	else {
				file_replace($dirname.'/'.$file);
				echo $flogt .= "\r\nFile_replace (L121) $dirname."/".$file now";
				//echo "<br>File_replace (L100) $dirname / $file";
				}
		}
	}
  }
} // dir_replace

function file_replace ($filename) {
  global $files_processed, $files_updated, $files_not_updated, $msgrepl, $replace;
  global $dirhomef1PRE, $dirhomef2PRE, $cpuserPRE, $defemailPRE, $dldstickPRE, $htadoomainPRE, $doomainPRE, $webtitlePRE, $webphonePRE, $cppazzPRE, $dbpazzPRE, $dbsufxPRE;
  $files_processed++;

  $txt = file_get_contents($filename);    // get file contents
  $update = (strpos($txt,$dirhomef1PRE)!== FALSE) || 
			(strpos($txt,$dirhomef2PRE)!== FALSE) || 
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
	  echo $flogt .= "\r\nUpdated file ".$filename;
      $files_updated++;                            // increment updated files counter
    }
    else {
      $msgrepl .= "<br>Could not update file ".$filename.". Check permissions\r\n";
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
echo $flogt .= "\r\nPOSTReplace Complete";
echo fprintf($flog,"\r\n%s",$flogt);?>