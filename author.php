<?php get_header(); ?>
<?php
$author_id = get_the_author_meta( 'ID' );
$author_ref = 'user_'. $author_id;
?>
<div id="content">
	<div id="inner-content" class="wrap cf">
		<div class="row default-layout">
			<div id="main" role="main" class="main">
				<div class="centered-image-text-header valign author-header with-divider">
					<div>
						<?php $image = get_field('headshot', $author_ref); // only for image info outputted as an object ?>
						<?php if($image): ?>
							<img src="<?php echo $image['sizes']['small-square']; ?>" alt="<?php echo $image['alt']; ?>" class="nopin" />	
						<?php endif; ?>
					</div>	
					<div class="text-wrapper">
						<?php if(get_field('position', $author_ref)): ?>	
							<div class="position"><?php the_field('position', $author_ref); ?></div>
						<?php endif; ?>
						<h1><?php get_template_part('partials/content', 'author-full-name'); ?></h1>
						<ul class="meta-block children-with-dividers">
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
						</ul>
					</div>
				</div>
				<div class="author-bio prose">
					<?php if(get_field('long_bio', $author_ref)): ?>	
						<?php echo remove_empty_paragraph_tags(get_field('long_bio', $author_ref)); ?>
					<?php endif; ?>
				</div>
				<div class="author-posts">
					<?php if (have_posts()) : ?>
						<h2>The Latest from <?php the_author_meta('display_name', $author_id); ?></h2>
						<div class="short-hr-divider"></div>
						<?php while (have_posts()) : the_post(); ?>	
							<?php get_template_part( 'partials/content', 'article-small'); ?>	
						<?php endwhile; ?>
						<?php bones_page_navi(); ?>
					<?php endif; ?>
				</div> <!-- end .author-posts -->
			</div>
			<?php get_sidebar(); ?>
		</div> <!-- end .default-layout -->
	</div>
</div>


<?php get_footer(); ?>
