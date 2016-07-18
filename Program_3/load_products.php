<?php
echo "<pre>";
$host = "localhost";
$username = "web-dev";
$password = "mwsumustangsmwsu";
$dbname = "web-dev";
$conn = mysql_connect($host, $username, $password) or die('Error in Connecting: ' . mysql_error($conn));
mysql_select_db("web-dev", $conn);

$filename = 'products_big.json';
$json = file_get_contents($filename);   
$json_array = json_decode($json, true);
//echo "<pre>";
//print_r($json_array);
foreach($json_array as $entry){ 
	$category = $entry['category'];
    $description = $entry['h2'];
    $price= $entry['price'];
	$imgs= $entry['img']; 
	$newimgs=str_replace("160","~", $entry[imgs][0]);
	$newprice=str_replace("$","", $entry[price]);
	//echo $newimgs; 
	$sql = "INSERT INTO products(`id`,`category`, `desc`, `price`, `img`)VALUES( '','$category', '$description', '$newprice', '$newimgs');"; 
	//print_r($sql);
	mysql_query($sql);
	//echo "<br>";
    //print_r(array_values($json_array)); 		 
} 
//print_r($json_array)
mysql_close($conn);
?>  
