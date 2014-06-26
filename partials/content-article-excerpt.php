<section class="entry-content prose">								
	<?php if(get_field('dek')): ?>	
		<?php the_field('dek'); ?>
	<?php else: ?>
		<?php the_excerpt(); ?>
	<?php endif; ?>	
</section>