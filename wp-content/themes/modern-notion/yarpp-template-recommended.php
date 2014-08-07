<?php
/*
YARPP Template: Recommended Slide-In
Description: Recommended slide-in template
Author: JP
*/
?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<div id="slide-in" class="slide-in">
	<section class="clearfix">
		<p>Recommended for you</p>
		<a href="javascript:void(0);" class="close">
			<?php get_template_part("partials/content", "post-category-icon"); ?>
		</a>
	</section>
	<article class="clearfix">
		<a href="<?php the_permalink(); ?>">
			<?php
				$image_size = "small-square"; 
				$args = array(
					'alt' => esc_attr(get_the_title()), 
					'title' => esc_attr(get_the_title())
				); 
				$thumb = get_the_post_thumbnail( get_the_ID(), $image_size, $args);
				echo $thumb;  
			?>			
		</a>
		<h4>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h4>
		<p class="meta">
			<?php the_author_posts_link(); ?> | 
			<?php the_date(); ?>
		</p>
	</article>
</div>
<?php endwhile; endif; ?>