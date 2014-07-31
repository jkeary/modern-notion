<?php
global $popular_id;
if(!empty($popular_id))  {
	$post_id = $popular_id;
}
else  {
	$post_id = $post->ID;	
}

$tax = get_queried_object(); 
if($tax->taxonomy === 'category'){
	$cat_name = $tax->cat_name;
	$cat_id = $tax->term_id;
	$cat_url = get_category_link($cat_id);
	$cat_slug = $tax->slug;
}

else{
	$category = get_the_category($post_id)[0]; 
	$cat_name = $category->cat_name; 
	$cat_id = $category->term_id; 
	$cat_url = get_category_link($cat_id);
	$cat_slug = $category->slug; 
}

//var_dump($category); 

$category_meta = get_option('category_meta');
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
<<?php echo $icon_element; ?> <?php echo $href; ?> class="valign halign post-icon category-icon <?php echo $cat_slug;?>" style="background-color:<?php echo $category_meta[$cat_id]['color']; ?>;" <?php echo $title_attr; ?>>
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