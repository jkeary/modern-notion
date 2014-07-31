<?php 
$tags = Array();
$tags_objects = wp_get_post_tags($post->ID);
$cat = get_the_category()[0];

if(!empty($tags_objects))  {
	$i = 0;
	foreach($tags_objects as $tag_object)  {
		$tags[$i] = $tag_object->count;
		$i++;
	}
	arsort($tags);
	$top_tag_object_id = current(array_keys($tags));
	$top_tag_object = $tags_objects[$top_tag_object_id];

	$color = 'black';
	$category_meta = get_option('category_meta'); 
	if(isset($category_meta[$cat->cat_ID])) {
		$color = $category_meta[$cat->cat_ID]['color']; 
	}
?>
<li>
	<a href="<?php home_url(); ?>/tag/<?php echo $top_tag_object->slug; ?>" class="top-tag" style="color: <?php echo $color;?>;"><?php echo $top_tag_object->name; ?></a>
</li>	
<?php } ?>