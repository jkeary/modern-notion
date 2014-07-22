<?php $author_id = get_the_author_meta( 'ID' ); ?>
<?php if(get_the_author_meta('description', $author_id)): ?>	
	<?php the_author_meta('description', $author_id); ?>
<?php endif; ?>