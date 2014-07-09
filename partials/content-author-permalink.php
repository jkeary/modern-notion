<?php
global $popular_id;
if(!empty($popular_id))  {
	$post_id = $popular_id;
}
else  {
	$post_id = $post->ID;	
}
$author_id = get_post_field( 'post_author', $post_id );	
echo get_author_posts_url($author_id);
?>