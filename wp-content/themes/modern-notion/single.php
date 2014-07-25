<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<div class="row default-layout">
				<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">							
					<div id="infinite-scroll-wrapper">								
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>							
							<?php get_template_part( 'partials/content', 'single-article'); ?>
						<?php endwhile; ?>
						<?php endif; ?>															
					</div>
					<img 
						id="article-loading" 
						src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/bx_loader.gif" 
						alt=""
						style="opacity:0; position:relative; bottom: 0" />
					<div class="load"></div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>