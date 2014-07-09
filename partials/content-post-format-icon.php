<?php 
global $format;
global $icon_element;
$format_slug = strtolower($format); 
$href = '';
$title_attr = '';
$category_colored_class = '';
if(empty($icon_element))  {
	$icon_element = 'span';
}
if($icon_element == 'a')  {
	$href = 'href="'.home_url().'/'.$format_slug.'-list"';
	$title_attr = 'title="View all '.$format_slug. ' posts';
}
if(get_the_category())  {
	$category_colored_class = top_category_slug() . '-bgcolored';
}
?>
<<?php echo $icon_element; ?> <?php echo $href; ?> class="valign halign post-icon format-icon <?php echo $format_slug; ?> <?php echo $category_colored_class; ?>" <?php echo $title_attr; ?>>
	<span>
		<span class="icon-font"></span>
		<span class="sr-only">
		<?php if($icon_element == 'a'): ?>
			View all <?php echo $format_slug; ?> posts
		<?php else: ?>
			<?php echo $format_slug; ?>
		<?php endif; ?>
		</span>
	</span>		
</<?php echo $icon_element; ?>>