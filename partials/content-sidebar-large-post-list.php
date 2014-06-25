<?php $recent_posts_query = new WP_Query( array(
	'post_type' => 'post',
	'posts_per_page' => 5
	) ); ?>
	<?php if ( $recent_posts_query->have_posts() ) : ?>
		<ul class="sidebar-large-post-list page-block">					
	<?php while ( $recent_posts_query->have_posts() ) : ?>
		<?php $recent_posts_query->the_post(); ?>
		<li>	
			<article>
				<?php if(get_the_post_thumbnail()): ?>
					<?php the_post_thumbnail('medium-rectangle'); ?>
				<?php else: ?>
					<img src="http://placehold.it/391x139" alt="">
				<?php endif; ?>
				<div class="post-icon-wrapper post-icon-wrapper-medium-large">				
					<?php get_template_part('partials/content', 'post-category-icon'); ?>
					<div class="text-wrapper">
						<?php get_template_part('partials/content', 'article-block-title-and-meta'); ?>						
					</div>
				</div>
			</article>
		</li>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
		</ul>
<?php endif; ?>