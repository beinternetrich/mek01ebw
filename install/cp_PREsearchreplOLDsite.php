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
$flogt= "\r\nPreSearch Log~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
// Init Vars
$startpath    = $_SERVER['DOCUMENT_ROOT'];
$sepdirhome   = explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));

$dirhomef1PRE = '/home/plrjatkj';
$dirhomef1    = '/HOM3D1R/CPUS3R';   //strtolower($sepdirhome[0]);
$dirhomef2PRE = '/home\\/plrjatkj';
$dirhomef2    = '/HOM3D1R\\/CPUS3R';   //strtolower($sepdirhome[0]);
//$tmpstring1   = str_replace($dirhome."/", "", $_SERVER['DOCUMENT_ROOT']);
//$tmpstring2   = str_replace("/public_html", "", $tmpstring1);

$cpuserPRE    = 'plrjatkj'; 
$cpuser       = 'CPUS3R';   //$cpuser    =  $sepdirhome[2];$pubhtml   =  $sepdirhome[3];

$defemailPRE  = 'support@plrjack.com'; $defemail2PRE = '&#066;&#117;&#115;&#105;&#110;&#101;&#115;&#115;&#064;&#068;&#105;&#103;&#105;&#116;&#097;&#108;&#067;&#114;&#097;&#122;&#121;&#046;&#098;&#105;&#122;';
$defemail     = 'DEF3ML';

$dldstickPRE  = 'https://d0wnload.digitalcrazy.biz/niches';
$dldstick     = 'DLDST1K';

$htadoomainPRE= 'plrjack\.com';
$htadoomain   = 'HTACPHoST';

$doomainPRE   = 'plrjack.com'; $doomain2PRE  = 'Plrjack.com'; $doomain3PRE  = 'PLRJack.com'; $doomain4PRE  = 'W3BTITLE.com';
$doomain      = 'CPH0ST'; 

$webtitlePRE  = 'PLR Jack';    $webtitle2PRE = 'PLRJack'; $webtitle3PRE = 'PLR&nbsp;Jack'; $webtitle4PRE = 'PLRJACK';   
$webtitle     = 'W3BTITLE';

$webphonePRE  = '&#043;&#052;&#052;&#040;&#048;&#041;&#055;&#055;&#050;&#050;&#048;&#057;&#049;&#050;&#051;&#055;';
$webphone     = 'W3BPH0NE';

$cppazzPRE    = 'Ll3QqYN!y0U*2$m';
$cppazz       = 'CPP455';

$dbpazzPRE    = 'Ll3QqYN!y0U*2$m'; 
$dbpazz       = 'DBP455';

$dbsufxPRE    = '_dc1911j';
$dbsufx       = '_DBSUFX';

$doomsslPRE   = 'https://CPH0ST';
$doomssl      = 'https://CPH0ST'; 
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
$defemailPRE  => $defemail, $defemail2PRE => $defemail,
$dldstickPRE  => $dldstick,
$htadoomainPRE=> $htadoomain,
$doomainPRE   => $doomain,  $doomain2PRE  => $doomain,  $doomain3PRE  => $doomain,  $doomain4PRE  => $doomain,
$webtitlePRE  => $webtitle, $webtitle2PRE => $webtitle, $webtitle3PRE => $webtitle, $webtitle4PRE => $webtitle, 
$webphonePRE  => $webphone, 
$cppazzPRE    => $cppazz,
$dbpazzPRE    => $dbpazz,
$dbsufxPRE    => $dbsufx,
$doomsslPRE   => $doomssl);

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
//$headers .= "From: "    . $reportto . "\r\n";
//$headers .= "Reply-To:" . $reportto . "\r\n";
//$headers .= 'X-Mailer: PHP/' . phpversion();
//$message = "Mitch,
// Replacement script was run. Please see results below:
// Files processed: $files_processed
// Files updated: $files_updated
// Files not updated (error ocurred): $files_not_updated
// Processing time: " . date('i:s',$etime - $stime);
//if ($reportto != '') {          // send email @
//  mail($reportto,               // TO email
//        'PRE Replace results',  // subject
//        $message . '\r\n' . $msgrepl,   // email text
//        $headers);              // headers
//}

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
		  if (fnmatch('cp_PREsearchreplOLDsite.php', $file)) {
		  }	else {
				file_replace($dirname.'/'.$file);
				echo $flogt .= "\r\nFile_replace (L123) $dirname."/".$file now";
//				echo "<br>File_replace (L113) $dirname $file now";
	  			}
		  }
    }
  }
} // dir_replace

function file_replace ($filename) {
  global $files_processed, $files_updated, $files_not_updated, $msgrepl, $replace;
  global $dirhomef1PRE, $dirhomef2PRE, $cpuserPRE, $defemailPRE, $dldstickPRE, $htadoomainPRE, $doomainPRE, $webtitlePRE, $webphonePRE, $cppazzPRE, $dbpazzPRE, $dbsufxPRE, $doomsslPRE; 
  global $defemail2PRE, $doomain2PRE, $doomain3PRE, $doomain4PRE, $webtitle2PRE, $webtitle3PRE, $webtitle4PRE; 
  $files_processed++; 

  $txt = file_get_contents($filename);    // get file contents
  $update = (strpos($txt,$dirhomef1PRE)!== FALSE) ||
			(strpos($txt,$dirhomef2PRE)!== FALSE) ||
			(strpos($txt,$cpuserPRE)   !== FALSE) ||
			(strpos($txt,$defemailPRE) !== FALSE) ||
			(strpos($txt,$defemail2PRE)!== FALSE) ||
			(strpos($txt,$dldstickPRE) !== FALSE) ||
			(strpos($txt,$htadoomainPRE)!==FALSE) ||
			(strpos($txt,$doomainPRE)  !== FALSE) ||
			(strpos($txt,$doomain2PRE) !== FALSE) ||
			(strpos($txt,$doomain3PRE) !== FALSE) ||
			(strpos($txt,$doomain4PRE) !== FALSE) ||
			(strpos($txt,$webtitlePRE) !== FALSE) ||
			(strpos($txt,$webtitle2PRE)!== FALSE) ||
			(strpos($txt,$webtitle3PRE)!== FALSE) ||
			(strpos($txt,$webtitle4PRE)!== FALSE) ||
			(strpos($txt,$webphonePRE) !== FALSE) ||
			(strpos($txt,$cppazzPRE)   !== FALSE) ||
			(strpos($txt,$dbpazzPRE)   !== FALSE) ||
			(strpos($txt,$dbsufxPRE)   !== FALSE) ||
			(strpos($txt,$doomsslPRE)  !== FALSE); //need replacement?

  if ($update) {
	$txt = str_replace_assoc($replace,$txt);       // replace file content
	$f = @fopen($filename,'w+');                   // open file for writing
	if ($f) {
      @fputs($f,$txt);                             // save file contents
      @fclose($f);
	  $msgrepl .= "<br>Updated file ".$filename."\r\n";
	  echo $flogt .= "\r\nUpdated file ".$filename;
	  
      $files_updated++;                            // increment updated files counter
    } else {
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
echo $flogt .= "\r\nPRESearch Complete";
echo fprintf($flog,"\r\n%s",$flogt);
?>