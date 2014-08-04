<?php 
global $popular_id;
if(!empty($popular_id))  {
	$post_id = $popular_id;
}
else  {
	$post_id = $post->ID;	
}
$author_id = get_post_field( 'post_author', $post_id );	
?>
<?php if(get_the_author_meta('first_name', $author_id)): ?>	
	<?php the_author_meta('first_name', $author_id); ?>
<?php endif; ?>
<?php if(get_the_author_meta('last_name', $author_id)): ?>	
	<?php the_author_meta('last_name', $author_id); ?>
<?php endif; ?>