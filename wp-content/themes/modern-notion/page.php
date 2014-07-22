<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
	<div id="content">		
		<div id="inner-content" class="wrap cf">
			<div class="centered-image-text-header valign with-divider">
				<div>
					<div class="post-icon-wrapper post-icon-wrapper-largest">
						<?php global $format; $format = 'page'; ?>
						<?php get_template_part('partials/content', 'post-format-icon');  ?>
					</div>
				</div>
				<div>
					<h1><?php the_title(); ?></h1>
				</div>
				<div>
					<div class="pull-right">
						<img src="http://placehold.it/683x94&text=Advertisement" alt="">
					</div>
				</div>
			</div>
			<div class="row default-layout">
				<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">
					<?php if(get_field('dek')): ?>    
                        <div class="prose dek large-dek">
                            <?php the_field('dek'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="prose">
                    	<?php the_content(); ?>
                    </div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>	
<?php get_footer(); ?>