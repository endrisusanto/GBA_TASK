<div class="input_field">
<label style="margin-right:100px;"> Language</label>
<input type="checkbox" name "Language[]" value="hindi">
<?php
if (in_array(Hindi,$Language1))
{
	echo "checked";
}
?>
<label>Hindi</label>
<input type="checkbox" name "Language[]" value="hindi">
<?php
if (in_array(Hindi,$Language1))
{
	echo "checked";
}
?>
<label>Hindi</label>
<input type="checkbox" name "Language[]" value="hindi">
<?php
if (in_array(Hindi,$Language1))
{
	echo "checked";
}
?><label>Hindi</label>
<input type="checkbox" name "Language[]" value="hindi"><label>Hindi</label>
<input type="checkbox" name "Language[]" value="hindi"><label>Hindi</label>
</div>

$Language = $result['Language'];
$Language1 = explode(",",$Language);

<?php
if (in_array(Hindi,$Language1))
{
	echo "checked";
}
?>