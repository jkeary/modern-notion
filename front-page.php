<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap cf">
		<div class="row default-layout">
			<div class="main">
				<?php get_template_part('partials/content', 'article-block-large'); ?>
			</div>
			<div class="sidebar">
				<?php get_template_part( 'partials/content', 'sidebar-small-post-list'); ?>
			</div>
		</div>
		<div class="row default-layout">			
			<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">
				<div id="infinte-scroll-wrapper">
					<?php $i = 1; $small_article_num_per_group = 10; ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>								
						<?php get_template_part('partials/content', 'article-block-small-row'); ?>																
						<?php $i++; ?>								
					<?php endwhile; ?>
					<?php endif; ?>								
				</div> <!-- end #infinite-scroll-wrapper -->
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
