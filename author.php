<?php get_header(); ?>
<?php
$author_id = get_the_author_meta( 'ID' );
$author_ref = 'user_'. $author_id;
?>
			<div id="content">

				<div id="inner-content" class="wrap cf">
<div class="row default-layout">
	<div id="main" role="main" class="main">

<div class="author-header with-divider">
	<?php $image = get_field('headshot', $author_ref); // only for image info outputted as an object ?>
	<?php if($image): ?>
		<img src="<?php echo $image['sizes']['small-square']; ?>" alt="<?php echo $image['alt']; ?>" />
	<?php endif; ?>
	<div class="text-wrapper">
		<?php if(get_field('position', $author_ref)): ?>	
			<div class="position"><?php the_field('position', $author_ref); ?></div>
		<?php endif; ?>
		<h1><?php get_template_part('partials/content', 'author-full-name'); ?></h1>
		<ul class="links">
			<li>
				<?php if(get_the_author_meta('twitter', $author_id)): ?>	
					<a href="https://twitter.com/<?php the_author_meta('twitter', $author_id); ?>" target="_blank">@<?php the_author_meta('twitter', $author_id); ?></a>
				<?php endif; ?>
			</li>
			<li>
				<?php if(get_the_author_meta('user_email', $author_id)): ?>	
					<a href="mailto:<?php the_author_meta('user_email', $author_id); ?>" target="_blank"><?php the_author_meta('user_email', $author_id); ?></a>
				<?php endif; ?>
			</li>
			<li>
				<?php if(get_the_author_meta('user_url', $author_id)): ?>	
					<a href="<?php the_author_meta('user_url', $author_id); ?>" target="_blank"><?php the_author_meta('user_url', $author_id); ?></a>
				<?php endif; ?>
			</li>
		</ul>
	</div>
</div>
<div class="author-bio">
	<?php if(get_field('long_bio', $author_ref)): ?>	
		<?php the_field('long_bio', $author_ref); ?>
	<?php endif; ?>
	<?php if(get_the_author_meta('description', $author_id)): ?>	
	<?php the_author_meta('description', $author_id); ?>
	<?php endif; ?>
</div>
<div class="author-posts">

	<?php if (have_posts()) : ?>
		<h2>The Latest from <?php the_author_meta('display_name', $author_id); ?></h2>
	<?php while (have_posts()) : the_post(); ?>	
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post' ); ?> role="article">
		
		<?php the_post_thumbnail('thumbnail'); ?>
		
		<div class="text-wrapper">
			<header class="article-header post-icon-wrapper post-icon-wrapper-large">
				<?php get_template_part('partials/content', 'post-category-icon'); ?>
				<h2 class="entry-title text-wrapper"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>				
			</header>

			<section class="entry-content cf">				
				<?php the_excerpt(); ?>
			</section>

			<footer class="article-footer cf">
				<?php get_template_part('partials/content', 'post-date'); ?>	
			</footer>
		</div>

	</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
</div> <!-- end .author-posts -->

						</div>

					<?php get_sidebar(); ?>

					</div> <!-- end .default-layout -->
				</div>

			</div>


<?php get_footer(); ?>
