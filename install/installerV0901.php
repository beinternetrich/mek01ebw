<?php 
###############################################################
# MMTECHWORKS WEBSITE BUILDER - MMTW.V09.201017.2000
###############################################################
# By DigitalCrazy.biz
###############################################################
//ErrorLog
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('max_execution_time', 300); //temp max execution 5 mins
set_time_limit(600);
$flog = fopen("flog.log","a");
$flogt= "";
function getVar($name, $def = '') {	if (isset($_REQUEST[$name])) return $_REQUEST[$name]; else return $def;}
###############################################################
$skel    = "https://mmtw.s3.eu-west-2.amazonaws.com/dcrazy/mek01ebw/"; 
//$skel      = "https://digitalcrazy.biz/mek01ebw/";
$tpldbfresh= 'tpllocal.sql';
$dbimport  = 'dbimport.sql'; //T>E>M>P. Repeats later

//$doomain   =  $_SERVER['HTTP_HOST']; //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ "";
$doomain    =  isset($_REQUEST['dom'])?urlencode(urldecode($_REQUEST['dom'])):'dompost_error';
$doomain    =  getVar('dom', $doomain);
$doomainip =  getVar('dip', $doomain);
$doomaintag= "Tap Into The Secret Goldmine of PLR!";

$sepdomain =  explode(".", $doomain);
$webtitle  =  substr_replace($sepdomain[0], substr($sepdomain[0], 0, 1), 0, 1);
$webtitle  =  getVar('wbt', $webtitle);
$webtitle  =  str_replace(' ', '+', $webtitle);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sdr       =  $_SERVER['DOCUMENT_ROOT'];
$dbimport  =  $sdr  . '/install/'. $dbimport;											 
//$sepdirhome=  explode("/", $sdr);
//$dirhome =  $sepdirhome[1];
//$cpuser    =  ''; //$sepdirhome[2];
//$pubhtml =  $sepdirhome[3];
//$sdrfld    =  "/"; 
//$sdrfld    =  getVar('fdr', $sdrfld);
//$sdr     =  str_replace(' ', '+', $webtitle);
$cpuser    =  isset($_REQUEST['cpu'])?urlencode(urldecode($_REQUEST['cpu'])):'cpupost_error';
$cpuser    =  getVar('cpu', $cpuser);
$cppazz    =  isset($_REQUEST['cpk'])?urlencode(urldecode($_REQUEST['cpk'])):'cpkpost_error';
//$cppazz    =  'Ll3QrYm!y0U*2M$'; //******************@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$fwdeml    =  isset($_REQUEST['fwd'])?urlencode(urldecode($_REQUEST['fwd'])):'fwdpost_error';
$dbsffx    =  strtolower("A".substr(date("D"),0,2)).date("Hi"); //asu2323;
$dbsffx    =  getVar('dbx', $dbsffx);
$dbpazz    =  'Ll3QrYm!y0U*2M$'; //'P!55w0D4ec4LdBb';
$dbpazz    =  getVar('dpz', $dbpazz);

$cpskin    =  'paper_lantern';
$port      =  2083;
$htpp      =  'https';
$ssl       =  true;
$cppazzok  =  false;
$curl_path =  '/usr/bin/curl';

//$zip = new ZipArchive;
$rowsets = array(
	array("filenum",  "srcFiles", "copyto",    "unzipto"),
	array("nfile01",  "N1in.zip", "./", 	"./trash/"),
	array("nfile02",  "N2wp.zip", "./",   "./../"),
	array("nfile03",  "N3sh.zip", "./", 	"./../eShop/"),
	array("nfile04",  "N4sh.zip", "./", 	"./../eShop/"),
	array("nfile05",  "N5sh.zip", "./", 	"./../eShop/"),
	array("nfile06",  "N6sh.zip", "./", 	"./../eShop/")); 
###############################################################
$hasCPKey = false;
$do0_download = false;
$do1_copy = false;
$do3_SchRpl = true;
//remmed 
$do4_DBnMailSetup = true;
//remmed 
$do5_PopDb = true;					   
$file = '';


////==========================================================================/
////===U.N.L.I.N.K.  .H.T.A.C.C.E.S.S.=======================================PHASE 00===/
////==========================================================================/
//yif exist hta then do .... md
//$myloc = getcwd(); // Save the current directory
//chdir($sdr);
//$flogtu="";
//if(!unlink($sdr.'/.htaccess')) $flogtu .=""; else $flogtu .="\r\nShifted HTA"; echo $flogtu;
//chdir($myloc);   // Restore the old working directory 	
////==========================================================================/




if(!($cppazz=='cpkpost_error')) $hasCPKey = true; else $flogt .="\r\nKey failure. Aborting Download/Expand!";
while ($hasCPKey) {
	$i=0;  $zip_open=false; $zip_extract=false; $zip_close=false; $flogtf=""; $zip = new ZipArchive;
    
	foreach($rowsets as $rowset) { 
		$srcfile     = $rowset[1];
		$instpath  = $rowset[2]; 
		$destpath = $rowset[3];
		$flogt ="\r\n($i)Working on $srcfile."; echo $flogt;
		if ($i <= 0) {} else {

//==========================================================================/
//===C.O.P. Y.  .M.E.D.I.A.  .T.O.  .D.E.S.T.I.N.A.T.I.O.N========================PHASE 01===/
//==========================================================================/
			$do0_download  = substr($rowset[0], 0, 1) === 'y'? true: false;
            $flogt ="\r\nPrepping $skel"."$srcfile to $instpath"."$srcfile. "; echo $flogt;
			$file = $instpath.$srcfile;
			if($do0_download) {	
                $do1_copy = copy($skel.$srcfile, $instpath.$srcfile);
				if(!$do1_copy) {
					$flogt ="\r\nCouldn't copy $srcfile to $instpath"."$srcfile. "; echo $flogt;
				} else {
					$flogt ="\r\nCopied  $srcfile to $instpath"."$srcfile. "; echo $flogt;
                    //^$file = $instpath.$srcfile;
				}
			} else {
				$flogt ="\r\n($i)Skipped download - $srcfile. "; echo $flogt;
			}         

//==========================================================================/
//===U.N.P.A.C.K.  .M.E.D.I.A.==========================================PHASE  02===/
//==========================================================================/   
//            if(!file_exists("$instpath.$srcfile")) {
//                $flogt ="\r\nError locating $instpath"."$srcfile"; echo $flogt;
//            } else { 
//                $flogt ="\r\nLocated $instpath$srcfile. Setting ZipArchive. "; echo $flogt;
//					$zip = new ZipArchive;
                $zip_open = $zip->open($file);  
                if ($zip_open === TRUE) {
                    $flogt ="\r\nZipARCHIVE opened and  ready. "; echo $flogt;

                    $zip_extract = $zip->extractTo($destpath); 
                    if ($zip_extract === TRUE) {
                          $flogt ="\r\nWOOT! Opened $instpath$srcfile extracted to $destpath"; echo $flogt;
                    } else {
                         $flogt ="\r\nWOOTDROP! Couldnot exttract $instpath$srcfile  to $destpath"; echo $flogt;
                    }
					$zip_close = $zip->close();
                } else { 
                    //$flogtf .="\r\nBUMMER! Couldn't extract $instpath$srcfile";
                    $flogt ="\r\nBUMMER! Error opening $instpath$srcfile to extract to $destpath"; echo $flogt;
                }
//            }
		}//iteration skipped.
		$i++;
		echo fprintf($flog,"\r\n $i-%s",$flogt); $flogt ="";
	}//endforeach
//==========================================================================/
//==========================================================================/	
echo $flogt = "\r\nFile work done. Zip extracts expected: $i. >> ".htmlentities($cppazz); echo $flogt;
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";
//==========================================================================/
    
    
//==========================================================================/
//===S.E.A.R.C.H. .A.N.D. .R.E.P.L.A.C.E.==================================PHASE  03===/
//==========================================================================/
while ($do3_SchRpl) {
//::::::UNLINK HTA for SAFEGUARD ::::::::::::::::::::::::::::::::::
			$myloc = getcwd(); // Save the current directory
			chdir($sdr);
			$flogtu="";
			if(!unlink($sdr.'/.htaccess')) $flogtu .="\r\nCould not shift HTA"; else $flogtu .="\r\nShifted HTA"; echo $flogtu;
			chdir($myloc);   // Restore the old working directory 	
//::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::
			if(!copy($sdr .'/install/tplindx2root.php',   $sdr.'/install/PREindex.php')) echo "In-place ". $sdr.'/install/PREindex.php';
			if(!copy($sdr .'/install/tplhtaccss2root.txt',$sdr.'/install/.PREhtaccess')) echo "In-place ". $sdr.'/install/PREhtaccess.php';
			if(!copy($sdr .'/install/tplwpc0nfig.php', $sdr.'/install/PREwp-config.php')) echo "In-place ". $sdr.'/install/PREwp-config.php';
			if(!copy($sdr .'/install/tplpinc2et.php',  $sdr.'/install/PREmmtw-pincset.php')) echo "In-place ". $sdr.'/install/PREmmtw-pincset.php';
			if(!copy($sdr .'/install/'.$tpldbfresh,       $sdr.'/install/PREdb.sql')) echo "In-place ". $sdr.'/install/PREdb.sql';
//::::::SEARCH REPLACE Database & Webfiles:::::::::::::::::::::::::
			$s = "https://$doomainip/install/cp_PREsearchreplOLDsiteV2.php";
			$flogt .="\r\n-Sur point de>".$s;
			$f = file_get_contents($s);
			@fclose($f);
			$s = "https://$doomainip/install/cp_POSsearchreplNEWsiteV2.php?wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";
			$flogt .="\r\n-Sur point de>".$s;
			$f = file_get_contents($s);
			@fclose($f);
			$flogt .="\r\nPRE S&R should be completed.....";
//::::::RESTORE IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::
			copy($sdr .'/install/PREindex.php',    $sdr.'/index.php');
			copy($sdr .'/install/.PREhtaccess',    $sdr.'/.htaccess');
			copy($sdr .'/install/PREwp-config.php',$sdr.'/wp-config.php');
			copy($sdr .'/install/PREdb.sql',       $dbimport);
			copy($sdr .'/install/PREmmtw-pincset.php',$sdr.'/eShop/share/mmtw-pincset.php');
			$flogt .="\r\nPRE Destinations should be in place.....";
///	}//end ifconfigpressent
		echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";
$do3_SchRpl = false;
//	exit;
} // endwhile2-SEARCH-AND-REPLACE
// /*  REMMED FOR V15-ALLENCOMPASS TEST
//==========================================================================/
//===B.I.Z. .E.M.A.I.L. .&. .D.B.A.S.E. .S.E.T.U.P.==============PHASE 04===/
//==========================================================================/
if ($do4_DBnMailSetup) {
//::::::BIZ_EMAIL SETUP:::::::::::::::::::::::::::::::::::::::::::::::
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/email_accounts/index.html?quota=150&email=support@$doomain&domain=$doomain&password=$cppazz";
			$c = exec("$curl_path '$s'");
			$flogt=$s;  
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";				
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/mail/doaddfwd.html?fwdemail=$fwdeml&email=support@$doomain&domain=$doomain&password=$cppazz&fwdopt=fwd";
			$c = exec("$curl_path '$s'");
			$flogt .="\r\nBizEmail Forwarding should be completed.....";
			$flogt="$curl_path '$s'";
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";	
//::::::DATABASE SETUP::::::::::::::::::::::::::::::::::::::::::::::::
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/sql/addb.html?db=$dbsffx";
			$c = exec("$curl_path '$s'");
            if(!(isset($c) && !empty($c))) $flogt="FAILED - $curl_path '$s'";
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";		
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/sql/adduser.html?user=$dbsffx&pass=$dbpazz";
			$c = exec("$curl_path '$s'");
			if(!(isset($c) && !empty($c))) $flogt="FAILED - $curl_path '$s'";
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";		
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/sql/addusertodb.html?user=$cpuser"."_"."$dbsffx&db=$cpuser"."_"."$dbsffx&privileges=ALL";
			$c = exec("$curl_path '$s'");
			if(!(isset($c) && !empty($c))) $flogt="FAILED - $curl_path '$s'";
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";
			$flogt .="\r\nDb and Mail Section has run.....";
echo fprintf($flog,"\r\n%s",$flogt); $flogt ="";
}


//==========================================================================/
//===P.O.P.U.L.A.T.E. .D.A.T.A.B.A.S.E.==========================PHASE 05===/
//==========================================================================/    
if ($do5_PopDb) {
	$mydb_file     = $dbimport;
	$mydb_host     = $doomainip; 
	$mydb_uname    = $cpuser.'_'.$dbsffx; 
	$mydb_pword    = $dbpazz; 
	$mydb_dbase    = $cpuser.'_'.$dbsffx;
	$conn = new mysqli($mydb_host, $mydb_uname, $mydb_pword, $mydb_dbase); //connect to the MySQL server
	
	if (mysqli_connect_errno()) {
			exit('<br/>Connecting to MySQL server failed: '. mysqli_connect_error());
	} else {
			mysqli_query($conn, 'Use '.$mydb_dbase.';');
			echo '<br/>Calm cool CONNECTED!!!';

			if (!file_exists($mydb_file)) {
				echo "\n" . $mydb_file . ' not exist.' . "\n";
			} else {
				$sql = '';   
				$lines = file($mydb_file);  //read entire sql file	 
				foreach ($lines as $line_num => $line) { // loop through line
					if (substr($line, 0, 2) != '--' 
					&&  substr($line, 0, 15)!= 'CREATE DATABASE' 
					&&  substr($line, 0, 3) != 'USE' 
	//				&&  substr($line, 0, 2) != '//' 
	//				&&  substr($line, 0, 2) != '/*' 
					&&  $line != ''){ // continue if not Commented
						$sql .= $line;                              // add this line to current segment
						if (substr(trim($line), -1, 1) == ';') {    // semicolon ends a query
							if (! mysqli_query($conn, $sql) )  {    // if (! $conn->query($sql) === TRUE) {
								echo '<br />Error performing:' . $sql . ' -----  : ' . mysqli_error($conn);
							} //else {//print('<br/>Performed query: ' . $sql);	}
							$sql = '';
						}
					}
				} //end foreach
			} //end if!fileexist
		mysqli_close($conn);
	} //if no conn err
} //end DBPopulate       */						   

exit;
} // endwhile1
?>

<?php if (true) { ?>
<html>
<head><title>Your One-Click ECommerce Website Setup</title></head>
<body>
<style>body {font-family: Arial,sans-serif; font-size: 1.0em;}</style>
<!-- ===================================================Capture Form  -->
<div style="font-family: Raleway, sans-serif;text-align:center;width:70%; margin: auto;">
<div style="color:#0099ff"><h3><?php echo strtoupper("$doomain") ?><br/>Your One-click Website Setup</h3></div>
</div>
<form method="post">
<table cellpadding="7" cellspacing="7" border="0" style="outline:#99CCff dotted medium; margin-left:auto;margin-right:auto;width:80%; height: 430px;">
<tbody>
<tr><td colspan="2">
<!-- .?.php. //} .?. -->
<?php } ?>
</td></tr>

<tr>
<td colspan="2">
<p style="text-align: left;"><span>
In a few moments you will receive emails confirming your payment and welcoming you to your purchase. Sometimes spam filters block automated emails, so if you do not find the email in your inbox, please check your spam folder.</span></p>
<p>
<span style="text-decoration: underline;"><span style="font-size: medium; color: #0099ff;"><strong>INSTRUCTIONS</strong></span></span><br />
<strong>To setup your website grab the password details sent to you in the Hosting Account (CPanel) Welcome email from your provider</strong><strong> and complete the form below.</strong> </span></p>
</td>
</tr>

<tr bgcolor="#99ccff">
<td width="468"><br/><span style="font-size: medium;"><strong>Your Domain Name:</strong></span><br /><br /></td>
<td width="252"><br/><span style="font-size: medium;">
<!-- strong>&nbsp;&nbsp;<.?.php echo htmlentities($doomain).'<br>&nbsp;&nbsp;'.$_SERVER['SERVER_PROTOCOL']; ?.></strong-->
	<input style="font-size: medium; font-weight:600;" name="dom" xtype="hidden" size="30" value="<? echo !empty($_REQUEST['dom'])? htmlentities($_REQUEST['dom']): htmlentities($doomain);?>" /></span></td>
</tr>

<tr style="visibility:hidden;display:none">
<td>
<br/><span style="font-size: small"><span style="font-size: medium;"><strong>Website Name:</strong></span><br />This appears in your website policy documents and as the main title of your website.</span><br/>
</td>
<td>
<br/><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="wbt" size="30" value="<? echo !empty($_REQUEST['wbt'])? htmlentities($_REQUEST['wbt']): htmlentities($webtitle);?>" /></span></td>
</tr>

<tr xstyle="visibility:hidden;display:none">
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Username:</strong></span><br />Your hosting account (cpanel) username.</span><br /></td>
<td>
<br/><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="cpu" size="30" value="<? echo !empty($_REQUEST['cpu'])? htmlentities($_REQUEST['cpu']): htmlentities($cpuser);?>" /></span></td>
</tr>
    
<!-- Password field -->
<tr>
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Password:</strong></span><br />Enter your hosting account (cpanel) password.</span><br /></td>
<td>
<br /><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="cpk" size="30" type="password" id="idpwdToggle" value="<? echo !empty($_REQUEST['cpk'])? $_REQUEST['cpk']: htmlentities($cppazz);?>" /></span>
<!-- Toggle password visibility --><input type="checkbox" onclick="pwdToggle()">Show
</td>
</tr>

<tr>
<td>
<br /><span style="font-size: small; "><span style="font-size: medium;"><strong>Email:</strong></span><br />Enter your best email address.</span><br /><!--br/--></td>
<td>
<br /><span>&nbsp;<input style="font-size: medium; font-weight:600;" name="fwd" size="30" value="<? echo !empty($_REQUEST['fwd'])? $_REQUEST['fwd']: 'support@'.htmlentities($doomain);?>" /></span></td>
</tr>

<tr>
<td style="text-align: center;" colspan="2">
<input style="font-size: medium; font-weight:600;" name="submit" type="submit" value="Thanks, Create My Website Now!" /><br/>
</td>
</tr>
</tbody>
</table>
</form>
<script>
function pwdToggle() {
  var fild = document.getElementById("idpwdToggle");
  if (fild.type === "password") {
    fild.type = "text";
  } else {
    fild.type = "password";
  }
}
</script>
</body>
</html>