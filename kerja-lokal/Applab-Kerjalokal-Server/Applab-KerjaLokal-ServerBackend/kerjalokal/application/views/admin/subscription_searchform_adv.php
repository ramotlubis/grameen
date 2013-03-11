<?php
	$list_jobcat[0] = "ALL";
	foreach ($jobcats_title["results"] as $a)
	{ $list_jobcat[$a["jobcat_id"]] = $a["jobcat_title"]; }
	
	// lokasi KOTAMADYA
	$list_location1[0] = "All";
	foreach ($locations['KOTAMADYA'] as $location1)
	{ $list_location1[$location1["loc_id"]] = $location1["name"]; }	
	
	// lokasi KECAMATAN
	$list_location2[0] = "All";
	foreach ($locations['KECAMATAN'] as $location2)
	{ $list_location2[$location2["loc_id"]] = $location2["name"]; }
	
	// lokasi KELURAHAN
	$list_location3[0] = "All";
	foreach ($locations['KELURAHAN'] as $location3)
	{ $list_location3[$location3["loc_id"]] = $location3["name"]; }
	
	//print_r($list_location);
?>


<script src="<?php echo base_url(); ?>js/jquery.ui.core.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.datepicker.js"></script>
<!--script src="<?php echo base_url(); ?>js/date.js"></script-->
<!--script src="<?php echo base_url(); ?>js/jquery.datePicker.js"></script-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/datePicker.css">
<script type="text/javascript">
$(function() {
	$( ".date-pick" ).datepicker({ dateFormat: 'yy-mm-dd' });
	//getter
	var dateFormat = $( ".date-pick" ).datepicker( "option", "dateFormat" );
	//setter
	$( ".date-pick" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );	
	$(".lokasi").change(function() {
		$("#loc_title").val($(this).children("option:selected").text());
		console.log(this);
	});
	
});

function searchLocationByProvince(a) {
	//alert(a);
	$.ajax({
	  url: "<?php echo base_url(); ?>admin/jobpost/ajax_get_location_by_id/"+a+"",
	  dataType: "json",
	  success: function(data){
			//$("#results").append(data);
			$(".kotamadya_id").removeAttr("disabled");
			selectValues = data;
			$(".kotamadya_id").html("");
			//$(".kotamadya_id").attr("selected",a);
			$.each(selectValues, function(key, value) {   
				 $('.kotamadya_id')
					  .append($('<option>', { value : key })
					  .text(value)); 					
			});
			//alert(this.a);  
		}
		
	});
}
function searchLocationByKotamadya(a) {	
	$.ajax({
	  url: "<?php echo base_url(); ?>admin/jobpost/ajax_get_location_by_id/"+a+"",
	  dataType: "json",
	  success: function(data){
			//$("#results").append(data);
			$(".kecamatan_id").removeAttr("disabled");
			selectValues = data;
			$(".kecamatan_id").html("");
			//$(".kecamatan_id").attr("selected",a);
			$.each(selectValues, function(key, value) {   
				 $('.kecamatan_id')
					  .append($('<option>', { value : key })
					  .text(value)); 
			});
		}
	});
}
function searchLocationByKecamatan(a) {
	$.ajax({
	  url: "<?php echo base_url(); ?>admin/jobpost/ajax_get_location_by_id/"+a+"",
	  dataType: "json",
	  success: function(data){
			//$("#results").append(data);
			$(".kelurahan_id").removeAttr("disabled");
			selectValues = data;
			$(".kelurahan_id").html("");
			//$(".kelurahan_id").attr("selected",a);
			$.each(selectValues, function(key, value) {   
				 $('.kelurahan_id')
					  .append($('<option>', { value : key })
					  .text(value)); 
			});
		}
	});		
}
function searchLocationByKelurahan(a) {
	$.ajax({
	  url: "<?php echo base_url(); ?>admin/jobpost/ajax_get_location_by_id/"+a+"",
	  dataType: "json",
	  success: function(data){
			//$("#results").append(data);
			$(".kelurahan_id").removeAttr("disabled");
			selectValues = data;
			$(".kelurahan_id").html("");
			//$(".kelurahan_id").attr("selected",a);
			$.each(selectValues, function(key, value) {   
				 $('.kelurahan_id')
					  .append($('<option>', { value : key })
					  .text(value)); 
			});
		}
	});		
}

</script>
<form action="<?php echo $form_submit; ?>" method="post">
<!--<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">-->

<div style="display:inline; width:1%;">
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Name</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">				
		<?php echo form_input("subscriber_name",($search['subscriber_name']!="_")? $search['subscriber_name']:""); ?>
		</div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Mentor</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">		
		<?php echo form_input("mentor_name",($search['mentor_name']!="_")? $search['mentor_name']:""); ?>
		</div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">MDN</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">
		<?php echo form_input("mdn",($search['mdn']!="_")? $search['mdn']:""); ?>
		</div>
	</div>
</div>	
<div style="display:inline; width:1%;">
	<div class="row">
	<?php 	
	if($search['date_add']!='_' && $search['date_add']!='') list($date_add_from, $date_add_to) = explode(":", $search['date_add']);		
	?>
		<div class="cell table_cell" style="border:0px; text-align:right;"><b>Subscription Date</b></div>
		<div class="cell table_cell" style="border:0px; text-align:left;">&nbsp;</div>
	</div>
	
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;"><i>Start</i></div>
		<div class="cell table_cell" style="border:0px; text-align:left;"><input type="text" name="date_add[from_date]" size="14" value="<?php if(isset($date_add_from)) echo $date_add_from ?>" maxlength="100" class="date-pick" id="SubDateFrom"></div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;"><i>End</i></div>
		<div class="cell table_cell" style="border:0px; text-align:left;"><input type="text" name="date_add[to_date]" size="14" value="<?php if(isset($date_add_to)) echo $date_add_to ?>" maxlength="50" class="date-pick" id="SubDateTo"></div>
	</div>	
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Status</div>
		<div class="cell table_cell" style="border:0px; text-align:left;"><?php echo form_dropdown("status", $list_status, $search['status']); ?></div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Job Category</div>
		<div class="cell table_cell" style="border:0px; text-align:left;"><?php echo form_dropdown("jobcat_id", $list_jobcat, $search['jobcat_id']); ?></div>
	</div>
</div>	
<div style="display:inline; width:1%;">
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;"><b>Location</b></div>
		<div class="cell table_cell" style="border:0px; text-align:left;"></div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Province</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">
		<div id="results"></div>	
			<?php 
				$attributes = 'onChange="searchLocationByProvince(this.value);$(\'#loc_title\').val(this.options[loc_id.selectedIndex].text);"';
				echo form_dropdown("loc_id", $location,$search['loc_id'],$attributes); 				
			?>
			<input type="text" name="loc_title" id="loc_title" style="display:none" >					
		</div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Kotamadya</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">
			<?php 
				$attributes = ($lokasi["kotamadya_id"]=="")? "disabled" : "";
				$attributes .= ' class="kotamadya_id" onChange="searchLocationByKotamadya(this.value);$(\'#loc_title\').val(this.options[kotamadya_id.selectedIndex].text);"';
				echo form_dropdown("kotamadya_id", $list_location1,$lokasi['kotamadya_id'],$attributes); 
			?>
		</div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Kecamatan</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">
			<?php 
				$attributes = ($lokasi["kecamatan_id"]=="")? "disabled" : "";
				$attributes .= ' class="kecamatan_id" onChange="searchLocationByKecamatan(this.value);$(\'#loc_title\').val(this.options[kecamatan_id.selectedIndex].text);"';
				echo form_dropdown("kecamatan_id", $list_location2,$lokasi["kecamatan_id"] ,$attributes);  
			?>
		</div>
	</div>
	<div class="row">
		<div class="cell table_cell" style="border:0px; text-align:right;">Kelurahan</div>
		<div class="cell table_cell" style="border:0px; text-align:left;">
			<?php 								
				$attributes = ($lokasi["kelurahan_id"]=="")? "disabled" : "";
				$attributes .= ' class="kelurahan_id" onChange="$(\'#loc_title\').val(this.options[kelurahan_id.selectedIndex].text);"';
				echo form_dropdown("kelurahan_id", $list_location3,$lokasi["kelurahan_id"] ,$attributes); 
			?>
		</div>
	</div>
	
</div>	

<div class="row">
	<div class="cell table_cell" style="border:0px; text-align:right;"></div>
	<div class="cell table_cell" style="border:0px; text-align:left;"><input type="submit" name="submit" value="View"></div>
</div>	
	

</form>