<ul class="sidebar-small-post-list page-block">
	<?php 
	$category_slugs = array('science', 'history', 'innovation', 'life');
	foreach ($category_slugs as $category): 		
		$recent_post_in_category_query = new WP_Query( array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'category_name' => $category
		) ); ?>
		<?php if ( $recent_post_in_category_query->have_posts() ) : ?>				
		<?php while ( $recent_post_in_category_query->have_posts() ) : ?>
			<?php $recent_post_in_category_query->the_post(); ?>
			<li>
				<article <?php post_class(); ?>>
					<div class="post-icon-wrapper post-icon-wrapper-medium-large">				
						<?php //get_template_part('partials/content', 'post-category-icon'); ?>
						<div class="text-wrapper">
							<?php get_template_part('partials/content', 'article-block-title-and-meta'); ?>						
						</div>
					</div>
				</article>
			</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	<?php endforeach; ?>		
</ul>