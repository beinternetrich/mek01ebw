<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php'; 
//MMTECHWORKS WEBSCRIPT - MMTW.V8.20200528.0101
###############################################################
# Recursive Text Replacer 2.04(MMTW)
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
############################################################### 
$flogt .= "\r\nPostReplace Log~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
//---------------------------------------------------------------------
// Init Vars
$startpath    = $_SERVER['DOCUMENT_ROOT'];
$sepdirhome   = explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));

$dirhomef1PRE = '/HOM3D1R/CPUS3R';
$dirhomef1    = '/'.$sepdirhome[1].'/'.$sepdirhome[2];
$dirhomef2PRE = '/HOM3D1R\\/CPUS3R'; 
$dirhomef2    = '/'.$sepdirhome[1].'\\/'.$sepdirhome[2];

$defemailPRE  = 'DEF3ML';
$defemail     = 'support@'.$_SERVER['HTTP_HOST'];
$cpuserPRE    = 'CPUS3R';  
$cpuser       =  $sepdirhome[2];
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

define('RECURSE',true);
// _________________________________________________________________ //

if (!file_exists($startpath)) {
  die("Folder \"" . $startpath . "\" does not exist.");
}
dir_replace($startpath);     // start replacement

//-------------------------------------
// recurse folders
function dir_replace ($dirname, $recursive = RECURSE) {
	global $flogt;
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
					if (fnmatch('cp_POSsearchreplNEWsiteV2.php', $file)) {
					} else {
					file_replace($dirname.'/'.$file);
					$flogt .= "\r\nFile_replace (L99) $dirname $file now";
					}
			}
		}//endiffile
	}//endwhile
} // dir_replace

function file_replace ($filename) {
	global $flogt;
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
	  $msgrepl .= "\r\nUpdated file ".$filename;   echo " -Updated file ".$filename;
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
$flogt .= "\r\nPOSTReplace Complete";
echo fprintf($flog,"\r\n%s",$flogt);?>