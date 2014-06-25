<?php get_header(); ?>
<?php // echo do_shortcode('[ssba_hide]' ); ?>
<?php // echo do_shortcode('[ssba]' ); ?>
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
						</div>
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
