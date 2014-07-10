<article id="post-<?php the_ID(); ?>" <?php post_class( array('article-block', 'article-block-large') ); ?> role="article">
	<div class="article-inner">
		<?php if(get_the_post_thumbnail()): ?>
			<?php the_post_thumbnail('article-main'); ?>
		<?php else: ?>
			<img src="http://placehold.it/808x500" alt="">
		<?php endif; ?>
		<div class="text_wrapper">
			<a href="<?php the_permalink(); ?>">
				<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-medium">
					<?php get_template_part('partials/content', 'post-category-icon'); ?>
					<?php 
						global $format; $format = get_post_format_string(get_post_format());
						get_template_part('partials/content', 'post-format-icon'); 
					?>	
				</span>		
			</a>
			<div class="hidden-xs">
				<?php get_template_part('partials/content', 'article-block-title-and-meta'); ?>	
			</div>
		</div>
		<?php get_template_part('partials/content', 'article-tab-link'); ?>	
	</div>
	<div class="visible-xs clearfix">
		<?php get_template_part('partials/content', 'article-block-title-and-meta'); ?>	
	</div>
</article>