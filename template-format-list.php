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
						<?php $format = get_post_format_string($post_format); ?>
						<?php $format_slug = strtolower($format); ?>
						<div class="post-icon-wrapper post-icon-wrapper-largest">
							<span class="valign halign post-icon format-icon <?php echo $format_slug; ?>">
								<span>
									<span class="icon-font"></span>
									<span class="sr-only">View all <?php echo $format_slug; ?> posts</span>
								</span>		
							</span>
						</div>
					</div>
					<div>
						<h1><?php the_title(); ?></h1>
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
						<div class="archive-post-tile">
							<?php $format_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>">							
								<?php if('audio' == $post_format): ?>
									<?php global $aspect_ratio; $aspect_ratio = 'square'; ?>
									<?php get_template_part('partials/content', 'podcast-image'); ?>
								<?php else: ?>
									<?php the_post_thumbnail('medium-square'); ?>
								<?php endif; ?>
								<span class="header">
									<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-medium">
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
						</div>
						<?php get_template_part('partials/content', 'article-excerpt'); ?>
					</li>
					<?php if($i % 3 == 0) ?>
						<li class="clear"></li>
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