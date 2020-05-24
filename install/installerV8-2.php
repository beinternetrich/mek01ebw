<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php'; 
//MMTECHWORKS WEBSCRIPT - MMTW.V8.20200524.0002
//3:::::::::::::::::::::::==EXPAND==::::::::::::::::::::::::::::::::
if(!empty($cppazz)) {
	$proceed = true; 
	echo $flogt .= "\r\nKey present. Continue foreach!";
} else {
	echo $flogt .= "\r\nKey failure. Aborting file expand!";
}
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
	$flogt .= "\r\nProceedure ends. ";
	echo "$flogt";
	echo fprintf($flog,"\r\n%s",$flogt);
	$proceed = false;
	exit;
	} // endwhile
?>