<?php
if(get_the_category()): 
$category = get_the_category(); 
$cat_name = $category[0]->cat_name;
$cat_id = $category[0]->term_id;
$cat_url = get_category_link($cat_id);
$cat_slug = $category[0]->slug;
$href = '';
$title_attr = '';
global $icon_element;
if(empty($icon_element))  {
	$icon_element = 'span';
}
if($icon_element == 'a')  {
	$href = 'href="'. $cat_slug .'"';
	$title_attr = 'title="View all '.$cat_slug.' posts';
}
?>
<<?php echo $icon_element; ?> <?php echo $href; ?> class="valign halign post-icon category-icon <?php echo $cat_slug; ?> <?php echo $cat_slug; ?>-bgcolored" <?php echo $title_attr; ?>>
	<span>
		<span class="icon-font"></span>
		<span class="sr-only">
		<?php if($icon_element == 'a'): ?>
			View all <?php echo $cat_slug; ?> posts
		<?php else: ?>
			<?php echo $cat_slug; ?>
		<?php endif; ?>
		</span>
	</span>
</<?php echo $icon_element; ?>>
<?php endif; ?>