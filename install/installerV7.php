<?php 
//I want to see all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
###############################################################
# MMTECHWORKS WEBSITE BUILDER - MMTW20200204.1300a
###############################################################
# Visit DigitalCrazy.biz
###############################################################
//$skel = "https://mmtw.s3.eu-west-2.amazonaws.com/dcrazy/mek01ebw/";
$skel   = "https://digitalcrazy.biz/mek01ebw/";
$file01 = 'N1in.zip';
$file02 = 'N2wp.zip';
$file03 = 'N3sh.zip';
$file04 = 'N4sh.zip';
$file05 = 'N5sh.zip';
$file06 = 'N6nu.zip';
$file07 = 'N7db.zip';
$fsql   = 'db02.sql';
$rowsets= array(
    array("dlodfilnum","srcfile","copyto",   "unzipto"),
    array("nyfile01", "N1in.zip", "/"        , "/"),
    array("nfile02", "N2wp.zip", "/install/", "/"),
	array("nfile03", "N3sh.zip", "/install/", "/eShop/"),
	array("yfile04", "N4sh.zip", "/install/", "/eShop/"),
	array("nfile05", "N5sh.zip", "/install/", "/eShop/"),
	array("nfile06", "N6nu.zip", "/install/", "/"),
	array("nfile07", "N7db.zip", "/install/", "/")
); 

$skelt     = "";
###############################################################
$doomain   =  $_SERVER['HTTP_HOST'];  
$doomaintag= "Tap Into The Secret Goldmine of PLR!";
$skelt    .= "<br>doomain   >".$doomain; 
$sepdomain =  explode(".", $doomain);
$webtitle  =  substr_replace($sepdomain[0], substr($sepdomain[0], 0, 1), 0, 1);
$skelt    .= "<br>webtitle  >".$webtitle;
$sepdirhome=  explode("/", $_SERVER['DOCUMENT_ROOT']);
$dirhome   =  strtolower($sepdirhome[1]);
$tmpstring1=  str_replace($dirhome."/", "", $_SERVER['DOCUMENT_ROOT']);
$tmpstring2=  str_replace("/public_html", "", $tmpstring1);
$cpuser    =  str_replace("/", "", $tmpstring2);     // cPanel username
$skelt    .= "<br>home / cpuser >".$dirhome." / ".$cpuser."<br/>";
###############################################################
// Validation check
$doomain   =  getVar('idomain', $doomain);
$cpuser    =  getVar('icpuser', $cpuser);
$webtitle  =  str_replace(' ', '+', getVar('iwebtit', $webtitle));
$cppazz    =  getVar('icppazz', '');
//$dbuser    =  strtolower(substr(date("yMD"),-8,7)); //'20aprsu'/'ec4L03';
$dbuser    =  strtolower(substr("00".date("his"),-8,7));
$maspaz    = 'Ll3QrYm!y0U*2M$'; //'Ll3QqYN!y0U*2$m'  //'P!55w0D4ec4LdB';  //ch4ng3m3EMLn0w!
$dbpazz    =  $maspaz;
$cppazzok  =  false;
$msg       = '';
$msgfinal  = '';
$dcrazy    = '';
###############################################################
# END OF SETTINGS
###############################################################
function getVar($name, $def = '') {
	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; 
		else return $def;
}
while (!empty($cppazz)) {
	$cppazzok=true;
//:::::::::::::::::::::::::==DOWNLOAD and EXPAND==::::::::::::::::::::
//:::::::::::::::::::::::::==DOWNLOAD and EXPAND==::::::::::::::::::::
//:::::::::::::::::::::::::==DOWNLOAD and EXPAND==::::::::::::::::::::
$i=0;
foreach($rowsets as $rowset) { 
$i++; 
if($i <= 1) continue; // Skip one iteration.
$dlodsrc  = substr($rowset[0], 0, 1) === 'y'? true: false;
$srcfile  = $rowset[1];
$instpath = dirname(__FILE__).$rowset[2];
$destpath = dirname(__FILE__).$rowset[3];

	if(!empty($srcfile) && $dlodsrc){
		if(!copy($skel.$srcfile, $instpath.$srcfile)) $skelt .="<br>Error copying $skel$srcfile to $instpath$srcfile";
		if(!file_exists($instpath.$srcfile)) {
			$skelt .="<br>Error getting $skel$srcfile from local";
		} else { 
			$zip = new ZipArchive; 		
			$res = $zip->open($instpath.$srcfile);
			if ($res === TRUE) {
				$zip->extractTo($destpath); 
				$zip->close();
				$skelt .="<br>WOOT! $instpath$srcfile extracted to $destpath"; 
			} else { 
				$skelt .="<br>Error extracting $instpath$srcfile to $destpath";
			}
		}
	} else {
		$skelt .="<br>Skipping $srcfile. Next!!";
	}
}
//::::::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::
$sdr=$_SERVER['DOCUMENT_ROOT'];
copy($sdr .'/install/indx2root.php',     $sdr.'/install/PREindex.php');
copy($sdr .'/install/.htaccss2root.txt', $sdr.'/install/.PREhtaccess');
copy($sdr .'/install/tplwpc0nfig.php',   $sdr.'/install/PREwp-config.php');
copy($sdr .'/install/tplpinc2et.php',    $sdr.'/install/PREmmtw-pincset.php');
copy($sdr .'/install/db02.sql',          $sdr.'/install/PREdb02.sql');
echo "<br/>Checks::::::::::::::::::::::::::::::::::::::::::::::::::::::<br/>";
############################################################################
while ($cppazzok) {
// Start pre-website config
	$s ="http://$doomain/install/cp_PREsearchreplOLDsite.php?wbt=$webtitle&dbu=$dbuser&dpz=$dbpazz&cpz=$cppazz";
		echo "<br>(L122)Running $s<br>";
		$f = file_get_contents($s);
		print "<br/>PRE SR Result: <br/>";
		print $f;
		print "<br/>Fin<br/>";
		@fclose($f);
// Start website config
	$s ="http://$doomain/install/cp_POSsearchreplNEWsite.php?wbt=$webtitle&dbu=$dbuser&dpz=$dbpazz&cpz=$cppazz";
		echo "<br>(L130)Running $s<br>";
		$f = file_get_contents($s);
		print "<br/>POST SR Result: <br/>";
		print $f;
		print "<br/>Fin<br/>";
		@fclose($f);
//::::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::::
//::::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::::
//::::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::::::
//$sdr        = $_SERVER['DOCUMENT_ROOT'];
//$getfile1   = $sdr.'/install/indx2root.php';
//$putfile1   = $sdr.'/index.php';
//$getfile2   = $sdr.'/install/.htaccss2root.txt';
//$putfile2   = $sdr.'/.htaccess'; //.htaccesss.txt'
//$getfile3   = $sdr.'/install/tplwpc0nfig.php';
//$putfile3   = $sdr.'/wp-config.php'; 
//$getfile4   = $sdr.'/install/tplpinc2et.php';
//$putfile4   = $sdr.'/eShop/share/mmtw-pincset.php'; 
copy($sdr.'/install/PREindex.php',     $sdr.'/index.php');
copy($sdr.'/install/.PREhtaccess',     $sdr.'/.htaccess');
copy($sdr.'/install/PREwp-config.php', $sdr.'/wp-config.php');
copy($sdr.'/install/PREmmtw-pincset.php',$sdr.'/eShop/share/mmtw-pincset.php');
copy($sdr.'/install/PREdb02.sql',      $sdr.'/install/db02.sql');

$skelt .="<br>Rootfiles copied ready for S&R"; 
echo "SkelTxt1<br>".$skelt."<br>";

// Setup Database Creation
	$s ="http://$doomain/install/cp_create_db2.php?".
		"db=$dbuser&".
		"user=$dbuser&".
		"dpz=$dbpazz&".
		"cpu=$cpuser&".
		"cpz=$cppazz&".
		"dbsql=$fsql";
			echo "<br>(L138)Running $s<br>";
			$f = file_get_contents($s);
			print "<br/>DBASE Result: <br/>";
			print $f;
			print "<br/>Fin<br/>";
			@fclose($f);
//###########################################################################
// Setup Email Forwarding
	//$cpcontact = $yoemail[0];
	//$f = fopen("http://$doomain/install/cp_fwd_bizemail.php?efwd=$cpcontact&cpz=$cppazz", "r");
	//@fclose($f);
//###########################################################################

//------------------------------------------------- break -------------------
$msg="YOUR MEMORY JOGGER";
$msgfinal .= "Your website setup is complete.<br><b><a target='_blank' href='/index.php'>CLICK HERE to enter your Site</a></b>";
$dcrazy   .= "http://"."digital"."crazy".".biz";
$msg      .= "".
"<table>".
"<tr><td colspan=\"2\"></td></tr>".
"<tr bgcolor=\"#0099ff\">"."<td colspan=\"2\" ><div align=\"left\"><strong>".$msgfinal."</strong></div></td>"."</tr>".
"<tr><td colspan=\"2\">&nbsp;</td></tr>".
"<tr>".
"<td colspan=\"2\" ><div align=\"center\"></div></td>".
"</tr>".
"</table>";
echo '<div style="text-align:left;" align="center" >'.$msg.'</div>';
$msg='';
// -----------------------------
exit;
}
}
?>
<!-- =====================================================xxx-->
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
<div style="font-family: Raleway, sans-serif;text-align:center;width:80%; margin: auto;">
<div style="color:#0099ff"><h1><?php echo strtoupper("$doomain") ?><br/>Your One-click Website Setup</h1></div>
</div>
<form method="post">
<table cellpadding="7" cellspacing="7" border="0" style="outline:#99CCff dotted medium; margin-left:auto;margin-right:auto;width:80%; height: 430px;">
<tbody>

<tr><td colspan="2">
<?php } ?>

<?php 
echo "<br>dbuser: $dbuser";
?>
</td></tr>

<tr>
<td colspan="2">
<p style="text-align: left;"><span >
In a few moments you will receive emails confirming your payment and welcoming you to your client area account and hosting account. 
Sometimes spam filters block automated emails, so if you do not find the emails in your inbox, please check your spam/bulk email folder.</span></p>
<p><span >
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
<br/><span style="font-size: medium;"><strong>&nbsp;&nbsp;<?php echo htmlentities($doomain); ?></strong></span>
<br/><input name="idomain" type="hidden" value="<?php echo htmlentities($doomain); ?>" />
<br/></td>
</tr>

<tr sstyle="visibility:hidden;display:none">
<td>
<br/><span style="font-size: small"><span style="font-size: medium;"><strong>Website Name:</strong></span><br />It will appear in your website policy documents and as the main title of your website. (You can change it after setup.)</span><br/>
<br/></td>
<td>
<br/><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="iwebtit" size="30" value="<?php echo 'PLR Haul'; //htmlentities($webtitle); ?>" /></span><br/><center>(One word only)</center></td>
</tr>

<tr sstyle="visibility:hidden;display:none">
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Username:</strong></span>
<br />Your account username that appears in your Hosting Account Welcome email.</span><br />
<br /></td>
<td>
<br/><br/><span style="font-size: medium;" ><strong>&nbsp;&nbsp;<?php echo htmlentities($cpuser); ?></strong></span>
<input name="icpuser" xtype="hidden" value="<?php echo htmlentities($cpuser); ?>" />
<br/></td>
</tr>

<tr>
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Password:</strong></span>
<br />
Enter the account password that appears in your Hosting Account Welcome email.</span><br />
<br /></td>
<td>
<br /><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="icppazz" size="30" xtype="password" 
value="C4V2fT4?_7u2P4w7?" /></span><br /></td>
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
<!-- ===================================================Capture Form  -->