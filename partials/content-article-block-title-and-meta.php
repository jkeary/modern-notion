<h2 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="meta children-with-dividers">
	<?php get_template_part('partials/content', 'author-full-name-link'); ?>				
	<?php get_template_part('partials/content', 'time-ago'); ?>	
</div>