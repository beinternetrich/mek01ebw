<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php';
//===================================================================
//::::::::SAFE COPY IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::
	$sdr       = $_SERVER['DOCUMENT_ROOT'];
	copy($sdr .'/install/indx2root.php',   $sdr.'/install/PREindex.php');
	copy($sdr .'/install/.htaccss2root.txt',$sdr.'/install/.PREhtaccess');
	copy($sdr .'/install/tplwpc0nfig.php', $sdr.'/install/PREwp-config.php');
	copy($sdr .'/install/tplpinc2et.php',  $sdr.'/install/PREmmtw-pincset.php');
	copy($sdr .'/install/freshdb02.sql',   $sdr.'/install/PREdb.sql');

//::::::::SEARCH REPLACE and BUILD Database & Webfiles:::::::::::::::
	$s = "https://$doomain/install/cp_PREsearchreplOLDsite.php";
	$f = file_get_contents($s);
	@fclose($f);
	$s ="https://$doomain/install/cp_POSsearchreplNEWsite.php?wbt=$webtitle&dbx=$dbsffx&dpz=$dbpazz&cpk=$cppazz";
	$f = file_get_contents($s);
	@fclose($f);

//::::::::Replace IndexPHP, Db, HTAccess, WPConfig, PincSet::::::::::
	$sdr       = $_SERVER['DOCUMENT_ROOT'];
	copy($sdr .'/install/PREindex.php',    $sdr.'/index.php');
	copy($sdr .'/install/.PREhtaccess',    $sdr.'/.htaccess');
	copy($sdr .'/install/PREwp-config.php',$sdr.'/wp-config.php');
	copy($sdr .'/install/PREdb.sql',       $sdr.'/install/'.$fsql);
	copy($sdr .'/install/PREmmtw-pincset.php',$sdr.'/eShop/share/mmtw-pincset.php');

//::::::::Setup Database Creation::::::::::::::::::::::::::::::::::::
	$s ="http://$doomain/install/cpdbcreateV3.php?dbx=$dbsffx&dpz=$dbpazz&cpu=$cpuser&cpk=$cppazz&dbsql=$fsql";
	$f = file_get_contents($s);
	@fclose($f);

$flogt .= "\r\nInstall03 SearchReplace and DbCreate Completed.";
echo "$flogt";
echo fprintf($flog,"\r\n%s","A1".$flogt);
//$proceed = false;
exit;
?>