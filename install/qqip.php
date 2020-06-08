<html>
<body>
WazzMyIP
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://api.ipify.org/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$contents = curl_exec ($ch);
curl_close ($ch);
echo "Your IP is: ".$contents;
?>
</body>
</html>