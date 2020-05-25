<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php'; 
//MMTECHWORKS WEBSCRIPT - MMTW.V8.20200525.0101
//:::::::::::::::::::::::::::EXPAND, SR, CREA::::::::::::::::::::::::::
echo $flogt .= "\r\nExpand, Search, Replace, Create Db Process.";
echo $flogt .= "\r\nCPK > $cppazz \r\nSDR > $sdr";
//---------------------------------------------------------------------
if(empty($cppazz)) {
	$flogt .= "\r\nKey failure. Aborting Expand & Dataset!";
} else {
	$flogt .= "\r\nKey present. Continue Foreach Dlod!";
	$proceed = true; 
//	$proceed = false; //DO.NOT.RUN DOWNLOAD/EXPAND
	while ($proceed) {
	$i=0;  $res=false;
		foreach($rowsets as $rowset) { 
			$srcfile  = $rowset[1];
			$instpath = dirname(__FILE__).$rowset[2]; //$pathpath = getcwd()
			$destpath = dirname(__FILE__).$rowset[3];
			$flogt .= "\r\nFor $srcfile";  
			if ($i <= 1) {} else {
				if(!empty($srcfile)) {
					if(!file_exists($instpath.$srcfile)) {
						$flogt .="\r\nError locating $srcfile";
					} else { 
						$zip = new ZipArchive;
						$res = $zip->open($instpath.$srcfile);  ///REMREMREM
						if ($res === TRUE) {
							$zip->extractTo($destpath); 
							$zip->close();
							$flogt .="\r\nWOOT! $srcfile extracted to $destpath"; 
						} else { 
							$flogt .="\r\nDid not extract $instpath$srcfile";
						}
					}
				} else {
					$flogt .="\r\nSourcefile value missing in array. Next!!";
				}
			}//iteration skipped.
		$i++;
		} //endforeach

	//Dump HTA======================================================
	$myloc = getcwd(); // Save the current directory
	chdir($sdr);
	if(!unlink($sdr.'/.htaccess')) $flogt .="\r\nCould not shift HTA";
		else $flogt .="\r\nShifted HTA";
	chdir($myloc); // Restore the old working directory 
	$proceed = false;
	echo $flogt .= "\r\nProceedure end: Expands should be completed.";
	//echo "$flogt";
//	echo fprintf($flog,"\r\n%s",$flogt);
//	exit;
	} // endwhile
//	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//	~~~Change to eShop/index.htm~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	if(!file_exists($sdr.'/wp-config.php')) {
		$flogt .="\r\n$sdr"."/wp-config.php Not Present....";
	} else {
//	$proceed = true; 
//	while ($proceed) {
//	if ($proceed) {
		echo $flogt .= "\r\nStarting Data Search and Set...............";
		//::::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::
			copy($sdr .'/install/indx2root.php',   $sdr.'/install/PREindex.php');
			copy($sdr .'/install/.htaccss2root.txt',$sdr.'/install/.PREhtaccess');
			copy($sdr .'/install/tplwpc0nfig.php', $sdr.'/install/PREwp-config.php');
			copy($sdr .'/install/tplpinc2et.php',  $sdr.'/install/PREmmtw-pincset.php');
			copy($sdr .'/install/freshdb02.sql',   $sdr.'/install/PREdb.sql');
			$flogt .="\r\nSafe PRE copies should be completed.....";
			//$flogt .="\r\nRefresh>>>>>>>>>>>>>>>>>>wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";

		//::::::::SEARCH REPLACE and BUILD Database & Webfiles:::::::::::::::
			$s = "https://$doomain/install/cp_PREsearchreplOLDsite.php";
			$f = file_get_contents($s);
			@fclose($f);
			$s ="https://$doomain/install/cp_POSsearchreplNEWsite.php?wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";
			$f = file_get_contents($s);
			@fclose($f);
			$flogt .="\r\nPRE S&R should be completed.....";

		//::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::
			copy($sdr .'/install/PREindex.php',    $sdr.'/index.php');
			copy($sdr .'/install/.PREhtaccess',    $sdr.'/.htaccess');
			copy($sdr .'/install/PREwp-config.php',$sdr.'/wp-config.php');
			copy($sdr .'/install/PREdb.sql',       $sdr.'/install/'.$fsql);
			copy($sdr .'/install/PREmmtw-pincset.php',$sdr.'/eShop/share/mmtw-pincset.php');
			$flogt .="\r\nPRE Destinations should be in place.....";

		//::::::::Setup Database Creation::::::::::::::::::::::::::::::::::::
			$s ="http://$doomain/install/cpdbcreateV3.php?dbx=$dbsffx&dpz=$dbpazz&cpu=$cpuser&cpk=$cppazz&dbsql=$fsql";
			$f = file_get_contents($s);
			@fclose($f);
			$flogt .="\r\nDbcreation should be completed.....";
//	} else { 
//		$flogt .= "\r\nSearchReplace and DbCreate did not start.";
//	}
	//	exit;
//	}// endwhile
	}//end ifconfigpressent
} //end Absent Key
echo $flogt .= "\r\nProceedure end - (Data:$dbsffx)";
echo fprintf($flog,"\r\n%s",$flogt);
?>