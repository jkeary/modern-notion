<?php 
$format = get_post_format_string(get_post_format());
$format_slug = strtolower($format); 
$href = '';
$title_attr = '';
global $icon_element;
if(empty($icon_element))  {
	$icon_element = 'span';
}
if($icon_element == 'a')  {
	$href = 'href="<?php home_url(); ?>/<?php echo $format_slug; ?>-list"';
	$title_attr = 'title="View all <?php echo $format_slug; ?>';
}
?>
<<?php echo $icon_element; ?> <?php echo $href; ?> class="valign halign post-icon format-icon <?php echo $format_slug; ?> <?php echo top_category_slug(); ?>-bgcolored" <?php echo $title_attr; ?> posts">
	<span>
		<span class="icon-font"></span>
		<span class="sr-only">View all <?php echo $format_slug; ?> posts</span>
	</span>		
</<?php echo $icon_element; ?>>