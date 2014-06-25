<?php 
if(!isset($author_id)) {
	$author_id = get_the_author_meta( 'ID' );	
}
echo get_author_posts_url($author_id);
?>