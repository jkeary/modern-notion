<?php get_header(); ?>
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
					<h1>Search Results: <?php echo $_GET['s']; ?></h1>
				</div>
			</div>
			<div class="row default-layout">
				<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">
					<?php if(have_posts()): ?>
						<?php while (have_posts()) : the_post(); ?>	
							<?php get_template_part( 'partials/content', 'article-small'); ?>	
						<?php endwhile; ?>
						<?php bones_page_navi(); ?>
					<?php else: ?>
						<p>No Search Results Found</p>
					<?php endif; ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>