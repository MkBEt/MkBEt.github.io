<?php 
function get_download_count($file=null){
	$counters = './counters/';
	if($file == null) return 0;
	$count = 0;
	if(file_exists($counters.md5($file).'_counter.txt')){
		$fp = fopen($counters.md5($file).'_counter.txt', "r");
		$count = fread($fp, 1024);
		fclose($fp);
	}else{
		$fp = fopen($counters.md5($file).'_counter.txt', "w+");
		fwrite($fp, $count);
		fclose($fp);
	}
	return $count;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>

<body>

<a href="./download.php?file=exampleA.zip">exampleA.zip</a> (Downloaded <?php echo get_download_count('exampleA.zip');?> times)<br>
<a href="./download.php?file=exampleB.zip">exampleB.zip</a> (Downloaded <?php echo get_download_count('exampleB.zip');?> times)<br>

</body>
</html>