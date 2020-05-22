<?php 
//===================================================== 
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$flog = fopen("flog.log","a");
$flogt= "<br>Log Install01 Echos<br>";
###############################################################
# MMTECHWORKS WEBSITE BUILDER - MMTW.V8.20200521.2300
###############################################################
# Visit DigitalCrazy.biz
###############################################################
//$skel = "https://mmtw.s3.eu-west-2.amazonaws.com/dcrazy/mek01ebw/";
$skel   = "https://digitalcrazy.biz/mek01ebw/";
//$fsql   = 'db02.sql';
$rowsets= array(
    array("dlodfilnum","srcfile","copyto",   "unzipto"),
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

$sepdirhome=  explode("/", strtolower($_SERVER['DOCUMENT_ROOT']));
$dirhome   =  $sepdirhome[1];
$cpuser    =  $sepdirhome[2];
$pubhtml   =  $sepdirhome[3];
$cpuser    =  getVar('cpu', $cpuser);
$cppazz    =  getVar('cpk', '');

$proceed   =  false;
$dbsffx    =  strtolower(substr("00".date("his"),-8,7));
$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$$m';  'P!55w0D4ec4LdBb';
$cppazzok=false;
//echo fprintf($flog,"\n%s","Stop1".$flogt);
###############################################################
# END OF SETTINGS
###############################################################
function getVar($name, $def = '') {
	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
	else return $def;}

//:::::::::::::::::::==DOWNLOAD and EXPAND==::::::::::::::::::::
//:::::::::::::::::::==DOWNLOAD and EXPAND==::::::::::::::::::::
if(!empty($cppazz)) $cppazzok=true;
while ($cppazzok) {
	$i=0;
	$res=false;
	foreach($rowsets as $rowset) { 
	echo fprintf($flog,"\n%s","Stop2");
		$i++;
		if($i <= 1) continue; // Skip one iteration else continue..
		$flogt="";
			$dlodsrc  = substr($rowset[0], 0, 1) === 'y'? true: false;
			$srcfile  = $rowset[1];
			$instpath = dirname(__FILE__).$rowset[2]; //$pathpath = getcwd()
			$destpath = dirname(__FILE__).$rowset[3];
			if(!empty($srcfile) && $dlodsrc) {
				if(!copy($skel.$srcfile, $instpath.$srcfile)) $flogt .="<br>Error copying $skel$srcfile to $instpath$srcfile";
				if(!file_exists($instpath.$srcfile)) {
					$flogt .="<br>Error getting $skel$srcfile from local";
				} else { 
					$zip = new ZipArchive;
					$res = $zip->open($instpath.$srcfile);  ///REMREMREM
					if ($res === TRUE) {
						$proceed = true;
						$zip->extractTo($destpath); 
						$zip->close();
						$flogt .="<br>WOOT! $instpath$srcfile extracted to $destpath"; 
					} else { 
						$flogt .="<br>Did not extract $instpath$srcfile to $destpath";
					}
				}
			} else {
				$flogt .="<br>Skipping $srcfile. Next!!";
			}
	} //endforeach
	echo fprintf($flog,"\n%s",$flogt);
	
//::::::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::
//::::::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::
	$sdr       = $_SERVER['DOCUMENT_ROOT'];
	copy($sdr .'/install/indx2root.php',   $sdr.'/install/PREindex.php');
	copy($sdr .'/install/.htaccss2root.txt',$sdr.'/install/.PREhtaccess');
	copy($sdr .'/install/tplwpc0nfig.php', $sdr.'/install/PREwp-config.php');
	copy($sdr .'/install/tplpinc2et.php',  $sdr.'/install/PREmmtw-pincset.php');
	copy($sdr .'/install/freshdb02.sql',   $sdr.'/install/PREdb.sql');
	$cppazzok=false;
//	exit;
} // endwhile
?>
<?php if (true) { ?>
<html>
<head><title>Your One-Click ECommerce Website Setup</title>
</head>
<body>
<style>
body {font-family: Arial,sans-serif; font-size:1.0em;}
.cssgbtag {
  	color: #000000;
  	text-shadow: 0 1px 1px rgba(0,0,0,.11);
  	font-family: 'Century Gothic',sans-serif;
  	font-size: 0.7em;
  	font-weight: bold;
  	margin-top: 5px;
  	margin-left:6px;
  }
.cssgblogo {
  	text-shadow: 0 2px 2px rgba(0,102,204,.4);
  	font-family: Raleway, sans-serif; 
  	font-weight: 700;
  	color: #ce1b28;
  	font-size: 1.4em;
  	line-height:20px;
  	margin-top: 5px;
  } 
.cssgblogoamp {font-size: .67em;}  
.csscircle {text-shadow: 0 2px 2px rgba(0,102,204,.4);
	width: 8px; height: 8px; background: #ce1b28; 
	-moz-border-radius: 60px; -webkit-border-radius: 60px; border-radius: 60px; } 
.xcsscircl2 {
	width: 12px; height: 6px; background: #ffffff; 
	-moz-border-radius: 30px; -webkit-border-radius: 30px; border-radius: 30px; 
    -moz-filter:    blur(0px);-webkit-filter: blur(0px);filter: blur(0px);} 
#circdn    {margin: 8px 0px 4px 10px; width:35px;}/*#xcircdn2x{margin: 5px 0px 4px 13px; width:37px;} */
.csstriangle-up   { 
	width: 0; height: 0; 
	border-left: 8px solid transparent; border-right: 8px solid transparent; 
	border-bottom: 24px solid #ce1b28; }
.csstriangle-down {text-shadow: 0 2px 2px rgba(0,102,204,.4); 
	width: 0; height: 0; 
	border-left: 8px solid transparent; border-right: 8px solid transparent; 
	border-top:    24px solid #ce1b28; }
#tridn            { position: absolute;  margin-left: 6px; }
#triup            { margin-left: 23px; }
</style>
<div id="logo" style="background-color:pink">
<a href="\">
<!-- MMHack_Start_GBCSSLogo -->
<div style="width:300px">
<div style="float:left">

<div style="width:27px"><div style="float:left">
<div style="float:left; width:22px"><div id="circdn"><div class="csscircle"></div></div></div>
<div style="float:right;width: 5px"><div id="circdn"><div class="xcsscircle"></div></div></div>
</div>

<div style="float:left;">
<div id="tridn"><div class="csstriangle-down"></div></div>
<div id="triup"><div class="xcsstriangle-up" ></div></div>
</div>
</div>
</div>
<div style="float:left">
<div class="cssgblogo"><?php echo $webtitle;?></div><div class="cssgbtag" ><?php echo $doomaintag;?></div>
</div>
</div>
<!-- MMHack_End_GBCSSLogo -->
</a>
</div>
<!-- ===================================================Capture Form  -->
<!-- ===================================================Capture Form  -->
<div style="font-family: Raleway, sans-serif;text-align:center;width:70%; margin: auto;">
<div style="color:#0099ff"><h3><?php echo strtoupper("$doomain") ?><br/>Your One-click Website Setup</h3></div>
</div>
<form method="post">
<table cellpadding="7" cellspacing="7" border="0" style="outline:#99CCff dotted medium; margin-left:auto;margin-right:auto;width:80%; height: 430px;">
<tbody>

<tr><td colspan="2">
<?php } 
//echo fprintf($flog,"\n%s","Stop6");
//echo "<br>No: $dbsffx";
?>
</td></tr>

<tr>
<td colspan="2">
<p style="text-align: left;"><span>
In a few moments you will receive emails confirming your payment and welcoming you to your client area account and hosting account. 
Sometimes spam filters block automated emails, so if you do not find the emails in your inbox, please check your spam/bulk email folder.</span></p>
<p><span -->
<span style="text-decoration: underline;"><span style="font-size: medium; color: #0099ff;"><strong>INSTRUCTIONS</strong></span></span><br />
<strong>To complete the setup of your website grab the password that appears in your Hosting Account Welcome email </strong>(NOT Client Account Welcome)<strong> and use it to complete the form below.</strong> </span></p>
<p><span><br /></span></p>
</td>
</tr>

<tr bgcolor="#99ccff">
<td width="468">
<br/><span style="font-size: medium; "><strong>Your Domain Name:</strong></span><br/>
<br/></td>
<td width="252">
<br/><span style="font-size: medium;"><strong>&nbsp;&nbsp;<?php echo htmlentities($doomain).'<br>&nbsp;&nbsp;'.$_SERVER['SERVER_PROTOCOL']; ?></strong></span>
<br/><input name="dom" type="hidden" value="<? echo !empty($_REQUEST['dom'])? htmlentities($_REQUEST['dom']): htmlentities($doomain);?>" />
<br/></td>
</tr>

<tr sstyle="visibility:hidden;display:none">
<td>
<br/><span style="font-size: small"><span style="font-size: medium;"><strong>Website Name:</strong></span><br />It will appear in your website policy documents and as the main title of your website. (You can change it after setup.)</span><br/>
<br/></td>
<td>
<br/><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="wbt" size="30" value="<? echo !empty($_REQUEST['wbt'])? htmlentities($_REQUEST['wbt']): htmlentities($webtitle);?>" /></span><br/><center></center></td>
</tr>

<tr sstyle="visibility:hidden;display:none">
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Username:</strong></span>
<br />Your account username that appears in your Hosting Account Welcome email.</span><br />
<br /></td>
<td>
<br/><br/><span style="font-size: medium;" ><strong>&nbsp;&nbsp;<?php echo str_replace(substr($cpuser,4,4), "****", htmlentities($cpuser)); ?></strong></span>
<input name="cpu" type="hidden" value="<? echo !empty($_REQUEST['cpu'])? htmlentities($_REQUEST['cpu']): htmlentities($cpuser);?>" />
<br/></td>
</tr>

<tr>
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Password:</strong></span>
<br />
Enter the account password that appears in your Hosting Account Welcome email.</span><br />
<br /></td>
<td>
<br /><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="cpk" size="30" ttype="password" 
value="<? echo !empty($_REQUEST['cpk'])? $_REQUEST['cpk']: 'cZh4ng3m3EMLn0w!';?>" /></span><br /></td>
</tr>
<tr>
<td style="text-align: center;" colspan="2">
<input style="font-size: medium; font-weight:600;" name="submit" type="submit" value="Thanks, Create My Website Now!" /><br/>
</td>
</tr>
</tbody>
</table>
</form>
</body>
</html>