<?php 
if(!isset($author_id)) {
	$author_id = get_the_author_meta( 'ID' );	
}
?>
<?php if(get_the_author_meta('first_name', $author_id)): ?>	
	<?php the_author_meta('first_name', $author_id); ?>
<?php endif; ?>
<?php if(get_the_author_meta('last_name', $author_id)): ?>	
	<?php the_author_meta('last_name', $author_id); ?>
<?php endif; ?>