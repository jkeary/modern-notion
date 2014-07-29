<?php 
	$slot = get_post_meta($post->ID, 'hp_slot', true);
	$positions = array(
		'hero', 
		'top', 
		'middle',
		'mini'
	);
?>
<h4>What position should this article show up on the homepage?</h4>
<table>
	<tr>
		<td><label for="position">Select position</label></td>
		<td>
			<select name="position" id="position">
			<option value="none">-</option>
			<?php foreach($positions as $position) : ?>	
				<option value="<?php echo $position; ?>" <?php selected($position, $slot); ?>><?php echo $position; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
</table>