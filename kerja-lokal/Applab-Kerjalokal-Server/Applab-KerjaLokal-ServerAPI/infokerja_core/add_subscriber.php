<?php
require "conf.php";
require "func.php";

$data = array();
$del_key = array("tx_id");

$birthday = isset($_GET['birthday']) ? str_clean($_GET['birthday']) : "";

foreach ($_GET as $key => $value)
{ 
	if ($key == "lat") $key = "pos_lat";
	if ($key == "lng") $key = "pos_lng";
	if (!in_array($key, $del_key)) $data[$key] = str_clean($value); 
}

//echo "<pre>"; print_r($data); echo "</pre>";

$var_k = "";
$var_v = "";
foreach ($data as $key => $value)
{ 
	$var_k .= $key.", "; 
	$var_v .= "\"$value\", "; 
}
$var_k = substr($var_k,0, strlen($var_k)-2);
$var_v = substr($var_v,0, strlen($var_v)-2);

$sql = "INSERT INTO $t_subscribers ($var_k) VALUES ($var_v)";
//die($sql); 
$r = mysql_query($sql) OR die(output(mysql_error()));

	$subscriber_id = mysql_insert_id();
	$data = array(
		"subscriber_id" => (string)$subscriber_id,
		"status" => "2",
		"mdn" => (string)$mdn
	);
	echo output($data);



?>