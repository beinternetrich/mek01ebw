<?php require $_SERVER['DOCUMENT_ROOT'].'/install/installerV8-0.php';
//================================================================== 
//3:::::::::::::::::::::::==EXPAND==::::::::::::::::::::::::::::::::
if(!empty($cppazz)) {
	$proceed = true; 
	echo $flogt .= "\r\nPassword present. Continue to foreach!";
} else {
	echo $flogt .= "\r\nAborting File Expand!";
}
while ($proceed) {
	$i=0;  $res=false;
	foreach($rowsets as $rowset) { 
	$flogt .= "\r\nExpanding $rowset[1]";  
	echo $i;
	if ($i <= 1) {} else {   //continue; // Skip one iteration else continue..
//		$dlodsrc  = substr($rowset[0], 0, 1) === 'y'? true: false;
		$srcfile  = $rowset[1];
		$instpath = dirname(__FILE__).$rowset[2]; //$pathpath = getcwd()
		$destpath = dirname(__FILE__).$rowset[3];
		if(!empty($srcfile)) {
				if(!file_exists($instpath.$srcfile)) {
					$flogt .="\r\nError getting $skel$srcfile from local";
				} else { 
					$zip = new ZipArchive;
					$res = $zip->open($instpath.$srcfile);  ///REMREMREM
					if ($res === TRUE) {
						$zip->extractTo($destpath); 
						$zip->close();
						$flogt .="\r\nWOOT! $instpath$srcfile extracted to $destpath"; 
					} else { 
						$flogt .="\r\nDid not extract $instpath$srcfile to $destpath";
					}
				}
		} else {
			$flogt .="\r\nSkipping $srcfile. Next!!";
			echo fprintf($flog,"\r\n%s","A2".$flogt);
		}
	}
	$i++;
	} //endforeach
$flogt .= "\r\nInstall02 Files Expanded.";
echo "$flogt";
echo fprintf($flog,"\r\n%s","A1".$flogt);
$proceed = false;
exit;
} // endwhile
?>