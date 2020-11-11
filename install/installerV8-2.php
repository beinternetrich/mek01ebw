<?php 
require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php'; 
//require $_SERVER['DOCUMENT_ROOT'].'/install/cPanel.php';
//MMTECHWORKS WEBSCRIPT - MMTW.V8.20200525.0101
//:::::::::::::::::::::::::::EXPAND, SR, CREA::::::::::::::::::::::::::
$flogt .= "\r\n -cppazz) $cppazz<<<\r\n -fwdeml) $fwdeml<<<<";
//---------------------------------------------------------------------
$curl_path = '/usr/bin/curl';
if(empty($cppazz)) {  
	$flogt .= "\r\nKey fail > $cppazz"; //Key failure. Aborting!";  // Expand & Dataset!";
} else {
	$flogt .= "\r\nKey present> $cppazz"; //. Continue Foreach Dlod!";
	$proceed = true; 
//	$proceed = false; //DO.NOT.RUN DOWNLOAD/EXPAND
	$i=0;  $res=false; $flogtf="";
	while ($proceed && $i<=1) {
//	$i++;
	echo "\r\nIn while...";
//	$i=0;  $res=false; $flogtf="";
		foreach($rowsets as $rowset) { 
			$srcfile  = $rowset[1];
			$instpath = dirname(__FILE__).$rowset[2]; //$pathpath = getcwd()
			$destpath = dirname(__FILE__).$rowset[3];
			//$flogt .= "\r\nFor $srcfile";  
			if ($i <= 1) {} else {
				if(!empty($srcfile)) {
					if(!file_exists($instpath.$srcfile)) {
						$flogtf .="\r\nError locating $srcfile";
					} else { 
						$zip = new ZipArchive;
//Unpack the ZIP file =========================================================
						$res = $zip->open($instpath.$srcfile);  ///REMREMREM
						if ($res === TRUE) {
							$zip->extractTo($destpath); 
							$zip->close();
							$flogtf .="\r\nWOOT! $srcfile extracted to $destpath"; 
						} else { 
							$flogtf .="\r\nDid not extract $instpath$srcfile";
						}
					}
				} else {
					$flogtf .="\r\nSourcefile value missing in array. Next!!";
				}
			}//iteration skipped.
		$i++;
		} //endforeach

//Dump HTA======================================================
		$myloc = getcwd(); // Save the current directory
		chdir($sdr);
		$flogtu="";
		if(!unlink($sdr.'/.htaccess')) $flogtu .="\r\nCould not shift HTA"; else $flogtu .="\r\nShifted HTA";
		chdir($myloc);   // Restore the old working directory 
		$proceed = false;
		echo $flogt .= $flogtf.$flogtu."\r\nProceedure end: Expands should be completed.";
	//	exit;
	} // endwhile
//	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//	~~~Change to eShop/index.htm~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	if(!file_exists($sdr.'/wp-config.php')) {
		$flogt .="\r\n$sdr"."/wp-config.php Not Present....";
	} else {
		$flogt .="\r\n$sdr"."/wp-config.php IS found. Starting Search and Set...............";
		//::::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::
			copy($sdr .'/install/tplindx2root.php',   $sdr.'/install/PREindex.php');
			copy($sdr .'/install/tplhtaccss2root.txt',$sdr.'/install/.PREhtaccess');
			copy($sdr .'/install/tplwpc0nfig.php', $sdr.'/install/PREwp-config.php');
			copy($sdr .'/install/tplpinc2et.php',  $sdr.'/install/PREmmtw-pincset.php');
			copy($sdr .'/install/tpllocal.sql',   $sdr.'/install/PREdb.sql');
			$flogt .="\r\nSafe PRE copies should be completed.....";
			//$flogt .="\r\nRefresh>>>>>>>>>>>>>>>>>>wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";

		//::::::::SEARCH REPLACE and BUILD Database & Webfiles:::::::::::::::
			$s = "http://$doomainip/install/cp_PREsearchreplOLDsiteV2.php";
			$flogt .="\r\n-Sur point de>".$s;
			$f = file_get_contents($s);
			@fclose($f);
			$s ="http://$doomainip/install/cp_POSsearchreplNEWsiteV2.php?wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";
			$flogt .="\r\n-Sur point de>".$s;
			$f = file_get_contents($s);
			@fclose($f);
			$flogt .="\r\nPRE S&R should be completed.....";

		//::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::
			copy($sdr .'/install/PREindex.php',    $sdr.'/index.php');
			copy($sdr .'/install/.PREhtaccess',    $sdr.'/.htaccess');
			copy($sdr .'/install/PREwp-config.php',$sdr.'/wp-config.php');
			copy($sdr .'/install/PREdb.sql',       $sdr.'/install/dbimport.sql');
			copy($sdr .'/install/PREmmtw-pincset.php',$sdr.'/eShop/share/mmtw-pincset.php');
			$flogt .="\r\nPRE Destinations should be in place.....";

	$curl_path = '/usr/bin/curl';
	$proceed = true;
	if ($proceed) {
		//::::::::Setup BizEmail Forwarding::::::::::::::::::::::::::::::::::
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/email_accounts/index.html?email=support&domain=$doomain&password=$cppazz&quota=100";
			$c = exec("$curl_path '$s'");
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/mail/doaddfwd.html?email=support&domain=$doomain&password=$cppazz&fwdopt=fwd&fwdemail=$fwdeml";
			$c = exec("$curl_path '$s'");
			$flogt .="\r\nBizEmail Forwarding should be completed.....";


		//::::::::Setup Database Creation::::::::::::::::::::::::::::::::::::
//			$proceed = false;
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/sql/addb.html?db=$dbsffx";
			$c = exec("$curl_path '$s'");
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/sql/adduser.html?user=$dbsffx&pass=$dbpazz";
			$c = exec("$curl_path '$s'");
			$s = "$htpp://$cpuser:{" . $cppazz ."}@$doomainip:$port/frontend/$cpskin/sql/addusertodb.html?user=$cpuser"."_"."$dbsffx&db=$cpuser"."_"."$dbsffx&privileges=ALL";
			$c = exec("$curl_path '$s'");
			if(isset($c) && !empty($c)) $proceed = true;
			$flogt .="\r\nDbcreation should be completed.....";
	}
		################################################################
		# Mysql Database Pop 1.0 {{*Code below should not be changed*}}#
		################################################################
		$proceed = true;
		if ($proceed) {
			$file3          = $dbimport;
			$mysql_host     = $doomainip; 
			$mysql_uname    = $cpuser.'_'.$dbsffx; //$cpuser;
			$mysql_pword    = $dbpazz; //$cppazz;
			$mysql_dbase    = $cpuser.'_'.$dbsffx;
			$conn = new mysqli($mysql_host, $mysql_uname, $mysql_pword, $mysql_dbase); //connect to the MySQL server
			if (mysqli_connect_errno()) {
				exit('<br/>Connecting to MySQL server failed: '. mysqli_connect_error());
			} else {
				mysqli_query($conn, 'Use '.$mysql_dbase.';');
				echo '<br/>Calm cool CONNECTED!!!';
			
				if (!file_exists($file3)) {
					echo "\n" . $file3 . ' not exist.' . "\n";
				} else {
					$sql = '';   
					$lines = file($file3);  //read entire sql file	 
					foreach ($lines as $line_num => $line) { // loop through line
						if (substr($line, 0, 2) != '--' 
						&&  substr($line, 0, 15)!= 'CREATE DATABASE' 
						&&  substr($line, 0, 3) != 'USE' 
//						&&  substr($line, 0, 2) != '//' 
//						&&  substr($line, 0, 2) != '/*' 
						&&  $line != ''){ // continue if not Commented
							$sql .= $line;                              // add this line to current segment
							if (substr(trim($line), -1, 1) == ';') {    // semicolon ends a query
								if (! mysqli_query($conn, $sql) )  {    // if (! $conn->query($sql) === TRUE) {
									echo '<br />Error performing:' . $sql . ' -----  : ' . mysqli_error($conn);
								} else {
									//print('<br/>Performed query: ' . $sql);
								}
								$sql = '';
							}
						}
					} //end foreach
				} //end if!fileexist
			mysqli_close($conn);
			} //if no conn err
		}
	}//end ifconfigpressent
} //end Empty CPAZZ 

echo $flogt .= "\r\nProceedure end - (Data:$dbsffx)";
echo fprintf($flog,"\r\n%s",$flogt);
?>