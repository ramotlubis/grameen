<!--<h3>Set current country</h3>-->
<?php
	$city 		= array("0"=>"--");
	$kotamadya 	= array("0"=>"--");
	$kecamatan 	= array("0"=>"--");
	$kelurahan 	= array("0"=>"--");
	
	$cities = file_get_contents(CORE_URL."get_city_all.php");
	$cities = json_decode($cities, true);
	foreach ($cities as $a)
	{ $city[$a["loc_id"]] = $a["name"]; }

	$country_list["0"] = "--";
	foreach ($countries as $country)
	{
		$country_list[$country["country_id"]] = $country["country_name"];
	}
	//echo "<pre>"; print_r($country_list); echo "</pre>";
	/*
	echo form_open(base_url()."admin/master/location/set_country")."\n";
	echo "<div class=\"row\">\n";
	echo "<div class=\"cell_key\">".form_label('Country', 'id')."</div>\n";
	echo "<div class=\"cell_val\">".form_dropdown("id", $country_list, $_SESSION["curr_country"])."</div>\n";
	echo "</div>\n</div>\n";
	echo form_submit("submit", "Submit");
	echo form_close();
	echo "<hr>";
	*/
?>
<!--
<div class="table">
	<div class="row">
		<div class=cell>
			<h3>Add Country</h3>
			<div class="table">
			<?php
				/*
				echo form_open(base_url()."admin/master/location/add_country")."\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Country ID', 'id')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("id", "" ,"size=40 maxlength=100")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Country Name', 'name')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("name", "" ,"size=40 maxlength=100")."</div>\n";
				echo "</div>\n</div>\n";
				echo form_submit("submit", "Submit");
				echo form_close();
				*/
			?>
		</div>
	</div>
</div>
<hr>
-->

			<h3>Add Province</h3>
			<div class="table">
			<?php
				//echo "<pre>"; print_r($option); echo "</pre>";
				echo form_open(base_url()."admin/master/location/add_location")."\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Country', 'country_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("country_id", $country_list, $_SESSION["curr_country"])."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Province', 'name')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("name", "" ,"size=40 maxlength=100")."</div>\n";
				echo "</div>\n</div>\n";
				echo form_hidden("type", "KOTA");
				echo form_submit("submit", "Submit");
				echo form_close();
			?>
<hr>

			<h3>Add Kotamadya</h3>
			<div class="table">
			<?php
				
				echo form_open(base_url()."admin/master/location/add_location")."\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Country', 'country_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("country_id", $country_list, "", "id=country1")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Province', 'parent_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("parent_id", array("0"=>"--"), "", "id=city1")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Kotamadya', 'name')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("name", "" ,"size=40 maxlength=100")."</div>\n";
				echo "</div>\n</div>\n";
				echo form_hidden("type", "KOTAMADYA");
				echo form_submit("submit", "Submit");
				echo form_close();
			?>
<hr>

			<h3>Add Kecamatan</h3>
			<div class="table">
			<?php
				
				echo form_open(base_url()."admin/master/location/add_location")."\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Country', 'country_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("country_id", $country_list, "", "id=country2")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class='cell_key'>".form_label('Province', 'city_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("city_id", array("0"=>"--"), "", "id=city2")."</div>\n";
				echo "</div>\n";
				
				echo "<div class=\"row\">\n";
				echo "<div class='cell_key'>".form_label('Kotamadya', 'parent_id')."</div>\n";
				echo "<div class='cell_val'>".form_dropdown("parent_id", array("0"=>"--") , "", "id=kotamadya2")."</div>";
				/*
				if(isset($id_kotamadya))
				{
					$tmp_arr = file_get_contents(CORE_URL."get_location_by_parent_id.php?id=".$id_city);
					$kotamadyas = json_decode($tmp_arr, true);
					foreach($kotamadyas as $tmp)
					{$kotamadya[$tmp['loc_id']] = $tmp['name'];}
					echo "<div class='cell_val'>".form_dropdown("kotamadya", $kotamadya ,$id_kotamadya, "id=kotamadya2")."</div>";
				}
				else
				{
					echo "<div class='cell_val'>".form_dropdown("kotamadya", $kotamadya ,"", "id=kotamadya")."</div>";
				}
				*/
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Kecamatan', 'name')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("name", "" ,"size=40 maxlength=100")."</div>\n";
				echo "</div>\n</div>\n";
				echo form_hidden("type", "KECAMATAN");
				echo form_submit("submit", "Submit");
				echo form_close();
			?>
<hr>

			<h3>Add Kelurahan</h3>
			<div class="table">
			<?php
				echo form_open(base_url()."admin/master/location/add_location")."\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Country', 'country_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("country_id", $country_list, "", "id=country3")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Province', 'city_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("city_id", array("0"=>"--"), "", "id=city3")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Kotamadya', 'kotamadya')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("kotamadya", array("0"=>"--"), "", "id=kotamadya3")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Kecamatan', 'parent_id')."</div>\n";
				echo "<div class=\"cell_val\">".form_dropdown("parent_id", array("0"=>"--"), "", "id=kecamatan3")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Kelurahan', 'name')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("name", "", "size=40 maxlength=100")."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('Zip Code', 'zipcode')."</div>\n";
				echo "<div class=\"cell_val\">".form_input("zipcode", "", "size=10 maxlength=10").form_error('zipcode', '<div class="form_error" style="color:red">', '</div>')."</div>\n";
				echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\"></div>\n";
				echo "<div class=\"cell_val\">".form_error('lat', '<div class="form_error" style="color:red">', '</div>')."<div id=\"map_canvas\" style=\"width:300px; height:300px;\"></div>";
				echo "</div>\n";
				echo "</div>\n";
				
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\"></div>\n";
				echo "<div class=\"cell_val\">".form_input("lat", "" ,"size=20 maxlength=50 id=lat")." ".form_input("lng", "","size=20 maxlength=50 id=lng")."</div>\n";
				echo "</div>\n";
				echo "</div>\n";
				echo form_hidden("type", "KELURAHAN");
				echo form_submit("submit", "Submit");
				echo form_close();
			?>
<hr>

<script>
var lat = <?php echo (!empty($pos_lat) && $pos_lat != "") ? $pos_lat : 0;  ?>;
var lng = <?php echo (!empty($pos_lng) && $pos_lng != "") ? $pos_lng : 0;  ?>;
	$(document).ready(function() {
		var region = $('#region').val();
		
		$('#byMap').css('display','block');
		$('#kelurahan').val("-");
		$('#zip').val("-");
		//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
		if(lat == 0 && lng == 0)
		{
			initialize();
		}
		if(lat !=0 || lng != 0)
		{
			setLatLng(lat,lng);
		}

		
		if(region == '3')
		{
			$('.by').css('display','none');
			$('#byMap').css('display','block');
			$('#kelurahan').val("-");
			$('#zip').val("-");
			//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
			if(lat == 0 && lng == 0)
			{
				initialize();
			}
			if(lat !=0 || lng != 0)
			{
				setLatLng(lat,lng);
			}
		}
		if(region == '1')
		{
			$('.by').css('display','none');
			//$('#lat').val("");
			//$('#lng').val("");
			$('#zip').val("-");
			$('#byRegion').css('display','block');
			//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
		}
		if(region == '2')
		{
			//$('#lat').val("");
			//$('#lng').val("");
			$('#kelurahan').val("");
			$('.by').css('display','none');
			$('#byZip').css('display','block');
			//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
		}
	});
	$('#region').change(function(){
		if($(this).val() == '3')
		{
			$('.by').css('display','none');
			$('#byMap').css('display','block');
			$('#kelurahan').val("-");
			$('#zip').val("-");
			//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
			if(lat == 0 && lng == 0)
			{
				initialize();
			}
			if(lat !=0 || lng != 0)
			{
				setLatLng(lat,lng);
			}
		}
		if($(this).val() == '1')
		{
			$('.by').css('display','none');
			//$('#lat').val("");
			//$('#lng').val("");
			$('#zip').val("-");
			$('#byRegion').css('display','block');
			//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
		}
		if($(this).val() == '2')
		{
			//$('#lat').val("");
			//$('#lng').val("");
			$('#kelurahan').val("");
			$('.by').css('display','none');
			$('#byZip').css('display','block');
			//alert("kelurahan id = "+$('#kelurahan').val()+" lat = "+$('#lat').val()+" lng = "+$('#lng').val()+" zip = "+$('#zip').val());
		}
	});
	$('#zip').change(function()
	{
		//alert($("#zip :selected").text());
		$('#hdnZip').val($("#zip :selected").text());
	});
</script>
<!-- Add ali -->
<div class="table">
	<div class="row">
		<div class=cell>
			<h3>Import From CSV File</h3>
			<div class="table">
			<?php
				//echo "<pre>"; print_r($option); echo "</pre>";
				echo form_open_multipart(base_url()."admin/master/location/import")."\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"cell_key\">".form_label('CSV File Name', 'csv_file')."</div>\n";
				echo "<div class=\"cell_val\"><input type='file' name='userfile' size='20' /></div>\n";							
				echo "</div>\n</div>\n";
				//echo form_hidden("type", "KECAMATAN");
				echo form_submit("submit", "Submit");
				echo form_close();
	?>
		</div>
	</div>
</div>
<hr>