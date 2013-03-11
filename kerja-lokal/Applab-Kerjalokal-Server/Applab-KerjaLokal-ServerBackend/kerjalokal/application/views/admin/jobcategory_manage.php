<?php echo form_open(base_url()."admin/jobcategory/manage"); ?>
<div style="display:table; width:100%;">
<div class="table">
<div class="row">
	<div class="cell table_head" style="width:50px"><a href="<?php echo base_url()."admin/jobcategory/manage/$page/$next_order"; ?>_jobcat_id">ID</a></div>	
	<div class="cell table_head"><a href="<?php echo base_url()."admin/jobcategory/manage/$page/$next_order"; ?>_jobcat_title">Title</a></div>
	<div class="cell table_head"><a href="<?php echo base_url()."admin/jobcategory/manage/$page/$next_order"; ?>_description">Descriptions</a></div>
	<div class="cell table_head">Date Register</div>
    <div class="cell table_head">Last Activity</div>
	<div class="cell table_head"><a href="<?php echo base_url()."admin/jobcategory/manage/$page/$next_order"; ?>_status">Status</a></div>
</div>
<?php
	$a = "";
	foreach ($results as $jobcategory)
	{
		echo "<div class=\"row\">\n";
		echo "<div class=\"cell table_cell\">".form_checkbox("del[]",$jobcategory["jobcat_id"],($jobcategory["status"]=="2") ? TRUE : "")." ".$jobcategory["jobcat_id"]."</div>\n";
		echo "<div class=\"cell table_cell\"><a href=\"".base_url()."admin/jobcategory/edit/".$jobcategory["jobcat_id"]."\">". $jobcategory["jobcat_title"]."</a></div>\n";
		echo "<div class=\"cell table_cell\">".$jobcategory["description"]."</div>\n";
		echo "<div class=\"cell table_cell\">".$jobcategory["date_add"]."</div>\n";
		echo "<div class=\"cell table_cell\">".$jobcategory["date_update"]."</div>\n";
		if ($jobcategory["status"] == "1")
			echo "<div class=\"cell table_cell\">Active</div>\n";
		else
			echo "<div class=\"cell table_cell\">Inactive</div>\n";
		
		echo "</div>\n";
		$a .= $jobcategory["jobcat_id"].",";
	}
	echo "</div>";	
	$a = substr($a, 0, strlen($a)-1);
	
	echo "</div>"; // CLOSE TABLE
	echo form_hidden("all_id", $a);
	
	$paging = "";
	if ($npage > 1)
		for ($a = 1; $a <=$npage; $a++) $paging .= "<a href=\"".base_url()."admin/jobscategory/manage/$a/".$this->session->userdata('order')."\">$a</a> - ";
	$paging = substr($paging,0,strlen($paging)-3);
	echo $paging."<br><br>";
	echo form_submit("submit", "Disabled selected category");
	echo form_close();
?>
</div>