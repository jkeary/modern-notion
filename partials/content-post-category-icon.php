<?php
$category = get_the_category(); 
$cat_name = $category[0]->cat_name;
$cat_id = $category[0]->term_id;
$cat_url = get_category_link($cat_id);
$cat_slug = $category[0]->slug;
?>
<a href="<?php echo $cat_url; ?>" class="valign halign post-icon category-icon <?php echo $cat_slug; ?> <?php echo $cat_slug; ?>-bgcolored" title="<?php echo $cat_name; ?>">
	<span>
		<span class="icon-font"></span>
		<span class="sr-only"><?php echo $cat_name; ?></span>
	</span>
</a>