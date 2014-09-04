<?php
	if(!empty($_GET['ip'])) {
		$ip = $_GET['ip'];
	} else {
		$ip = "192.168.1.5:80"; // set static/default ip..  include port only if needed
	 }
	if(!empty($_GET['var1'])) {
		$var1 = $_GET['var1'];
	}	
	if(!empty($_GET['var2'])) {
		$var2 = $_GET['var2'];
	}

	
	
	
	echo "Example Response";  // just used for testing response
	
	$curlurl = "$ip/anything_here?request=$var1&command2=$var2&etc=etc";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, "$curlurl");
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 1);
	$output = curl_exec($ch);

	//output for testing
	echo "output:  $output";
	echo "--  output array:";
	print_r($output);
	$jsonoutput = json_decode($output,true);
	echo"--  json output: "; 
	print_r($jsonoutput);
?>