
<div style="display:table; width:100%;">
<?php
	echo form_open($form_action);
	$mentor_id = isset($mentor_id) ? $mentor_id : "";
	echo "<input type='hidden' value='".$mentor_id."' name='id' id='id' />";
	echo "<div class='row'><div class='cell_key'>Name</div>\n";
	echo "<div class='cell_val'>$name</div></div>\n";
	echo "<div class='row'><div class='cell_key'>MDN</div>\n";
	echo "<div class='cell_val'>$mdn</div></div>\n";
	echo "<div class='row'><div class='cell_key'>".form_label('PIN', 'pin')."</div>\n";
	echo "<div class='cell_val'>".form_input("pin", $pin ,"size=6 maxlength=6 id=name").form_error('pin', '<div class="form_error" style="color:red">', '</div>')."</div></div>\n";
	echo "<div class='row'><div class='cell_key'></div><div class='cell_val'>".form_submit("submit", "Submit")."</div>";
	echo form_hidden("mentor_id", $mentor_id);
	echo form_close();
?>
</div>
