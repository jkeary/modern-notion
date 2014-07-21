<div id="slide-in" class="slide-in">
	<section class="clearfix">
		<p>Recommended for you</p>
		<a href="javascript:void(0);" class="close">
			<img class="icon" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/icons/recommended-icon.png" alt="Recommended for you" />
		</a>
	</section>
	<article class="clearfix">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('small-square'); ?>			
		</a>
		<h4>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h4>
		<p class="meta">
			<?php get_template_part("partials/content", "author-full-name-link"); ?> | 
			<?php the_date(); ?>
		</p>
	</article>
</div>