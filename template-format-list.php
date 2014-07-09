<?php /*
	Template Name: Post Format List
*/ ?>
<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<?php if(get_field('format')): ?>	
				<?php $post_format = get_field('format'); ?>			
				<div class="centered-image-text-header valign">
					<div>
						<div class="post-icon-wrapper post-icon-wrapper-largest">
							<?php global $format; $format = format_frontend($post_format); ?>
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
				<?php if($post_format == 'standard')  {
					$tax_query = array(
				        array(
				            'taxonomy' => 'post_format',
				            'field' => 'slug',
				            'terms' => array( 
				                'post-format-aside',
				                'post-format-audio',
				                'post-format-chat',
				                'post-format-gallery',
				                'post-format-image',
				                'post-format-link',
				                'post-format-quote',
				                'post-format-status',
				                'post-format-video'
				            ),
				            'operator' => 'NOT IN'
					    )
					);
				}
				else  {
					$tax_query = array(
				        array(
				            'taxonomy' => 'post_format',
				            'field' => 'slug',
				            'terms' => array( 'post-format-'.$post_format )
				        )
					);
				} 

				?>
				<?php $format_query = new WP_Query( array(
					'post_type' => 'post',
					'post_status' => 'publish',
				    'order' => 'DESC',
				    'tax_query' => $tax_query
				) ); ?>
				<?php if ( $format_query->have_posts() ) : ?>
				<ul class="three-col full-site-width">
					<?php $i = 1; ?>
				<?php while ( $format_query->have_posts() ) : ?>
					<li>
						<?php $format_query->the_post(); ?>
						<div <?php post_class( 'archive-post-tile' ); ?>>
							<h2>
								<a href="<?php the_permalink(); ?>">							
									<?php if('audio' == $post_format): ?>
										<?php global $aspect_ratio; $aspect_ratio = 'square'; ?>
										<?php get_template_part('partials/content', 'podcast-image'); ?>
									<?php else: ?>
										<span class="img_wrapper">
											<?php the_post_thumbnail('medium-square-no-sidebar'); ?>
										</span>
									<?php endif; ?>
									<span class="header">
										<span class="post-icon-wrapper post-icon-wrapper-medium">
											<?php get_template_part('partials/content', 'post-format-icon'); ?>	
											<span class="children-with-dividers text-wrapper meta">
												<?php if('audio' != $post_format): ?>
													<span><?php the_title(); ?></span>
												<?php endif; ?>
												<span class="byline vcard">
													<?php printf(' <time class="updated" datetime="%1$s" pubdate><span>%2$s</span>', get_the_time('Y-m-j g:i A'), get_the_time(get_option('date_format'))); ?>
												</span>
											</span>
										</span>
									</span>														
								</a>
							</h2>
						</div>
						<?php get_template_part('partials/content', 'article-excerpt'); ?>
					</li>
					<?php if($i % 3 == 0):  ?>
						<li class="clear visible-lg"></li>
					<?php endif; ?>
					<?php if($i % 2 == 0):  ?>
						<li class="clear visible-md"></li>
					<?php endif; ?>
					<?php $i++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>		
			<?php endif; ?>	
		</div>
	</div>
<?php get_footer(); ?>