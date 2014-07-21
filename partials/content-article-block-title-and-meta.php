<?php
global $popular_id;
if(!empty($popular_id))  {
	$post_id = $popular_id;
}
else  {
	$post_id = $post->ID;	
} ?>
<h2 class="h2 entry-title">
	<a href="<?php echo get_the_permalink($post_id) ?>" rel="bookmark" title="<?php the_title_attribute(array('post' => $post_id)); ?>">
		<?php echo get_the_title($post_id); ?>
	</a>
</h2>
<div class="meta children-with-dividers">
	<?php get_template_part('partials/content', 'author-full-name-link'); ?>				
	<?php get_template_part('partials/content', 'time-ago'); ?>	
</div>