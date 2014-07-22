<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<div class="centered-image-text-header valign with-divider">
				<div>
					<div class="post-icon-wrapper post-icon-wrapper-largest">
						<?php get_template_part('partials/content', 'post-category-icon'); ?>
					</div>
				</div>
				<div>
					<?php
						$category = get_the_category(); 
						$cat_name = $category[0]->cat_name;
					?>
					<h1><?php echo $cat_name; ?></h1>
				</div>
			</div>
			<div class="with-divider">
				<img src="http://placehold.it/1080x200&text=Advertisement" alt="">
			</div>
			<div class="row default-layout">
				<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">
					<?php while (have_posts()) : the_post(); ?>
						<div class="with-short-hr-dividers">
							<?php get_template_part( 'partials/content', 'single-article'); ?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>