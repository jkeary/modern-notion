<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post with-short-hr-dividers' ); ?> role="article">
	<?php if(get_the_post_thumbnail()): ?>
		<?php the_post_thumbnail('thumbnail'); ?>
	<?php endif; ?>
	<div class="text-wrapper">
		<header class="article-header post-icon-wrapper post-icon-wrapper-large">
			<?php get_template_part('partials/content', 'post-category-icon'); ?>
			<h3 class="entry-title text-wrapper"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>				
		</header>			
		<?php get_template_part('partials/content', 'article-excerpt'); ?>				
		<footer>
			<?php get_template_part('partials/content', 'post-date'); ?>	
		</footer>
	</div>
</article>