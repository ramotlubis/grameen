<?php

	require "conf.php";
	require "func.php";
	
	$mdn = isset($_GET["mdn"]) ? str_clean($_GET["mdn"]) : 0;
	$jobcat_key = isset($_GET["jobcat_key"]) ? str_clean($_GET["jobcat_key"]) : "";
	$status = isSet($_GET['status']) ? str_clean($_GET['status']) : "";
	
	$sql = "SELECT *, $t_rel_subscriber_cat.date_expired AS date_expired, $t_rel_subscriber_cat.status AS status
		FROM ($t_rel_subscriber_cat 		
		INNER JOIN $t_subscribers ON $t_rel_subscriber_cat.subscriber_id = $t_subscribers.subscriber_id) 
		WHERE mdn='$mdn' AND jobcat_key='$jobcat_key' AND $t_rel_subscriber_cat.status='$status'";
	//die($sql);
	$sql = mysql_query($sql) OR die(output(mysql_error()));	
	/*
	$arr["nfields"] = mysql_num_fields($sql);
	$arr["totaldata"] = mysql_num_rows($sql); 
	$arr["results"] = array();
	$temp = array();
	while ($row = mysql_fetch_assoc($sql))
	{
		for($j=0;$j<$arr['nfields'];$j++)
		{
			$temp[mysql_field_name($sql,$j)] = $row[mysql_field_name($sql,$j)];
		}
		array_push($arr["results"], $temp);
	}
	
	echo output($arr);
	*/
	
	$arr = array();
	$arr["totaldata"] = mysql_num_rows($sql); 
	$temp = "";
	while ($row = mysql_fetch_assoc($sql))
	{
		for($j=0;$j<mysql_num_fields($sql);$j++)
		{
			$arr[mysql_field_name($sql,$j)] = $row[mysql_field_name($sql,$j)];
		}
	}
	
	echo output($arr);
	
	
?>