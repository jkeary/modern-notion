<article id="post-<?php the_ID(); ?>" <?php post_class( array('article-block', 'article-block-small') ); ?> role="article">
	<div class="img_wrapper">
		<?php if(get_the_post_thumbnail()): ?>
			<?php the_post_thumbnail('medium-square'); ?>
		<?php else: ?>
			<img src="http://placehold.it/391x391" alt="">
		<?php endif; ?>
		<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-medium">
			<?php get_template_part('partials/content', 'post-category-icon'); ?>
			<?php get_template_part('partials/content', 'post-format-icon'); ?>	
		</span>
		<?php get_template_part('partials/content', 'article-tab-link'); ?>
	</div>
	<div class="text-wrapper">
		<?php get_template_part('partials/content', 'article-block-title-and-meta'); ?>	
	</div>
</article>