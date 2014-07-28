<?php 
/**
* Template name: Homepage	
*/
?>

<?php get_header(); ?>

<div id="main">
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<div class="row">
				<img src="http://placehold.it/645x78&text=Advertisement" alt="" class="top-ad">
			</div>
			<div class="row default-layout">
				<div id="main">
					<div class="headlining">
						<?php $headlines = new WP_Query('posts_per_page=3'); ?>
						<?php while($headlines->have_posts()) : $headlines->the_post(); $cat = get_the_category(); $cat = $cat[0]; ?>
							<article>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<p class="meta">
									<a href="<?php echo get_category_link($cat->cat_ID);?>" class="<?php echo $cat->slug; ?>-colored">
										<?php echo $cat->slug; ?>
									</a> 
									By <?php the_author_posts_link(); ?>
								<div class="sep"></div>
							</article>
						<?php endwhile; ?>											
					</div>												
					<div id="hero">
						<?php $hero = new WP_Query('posts_per_page=1&offset=2&category_name=life'); ?>
						<?php while($hero->have_posts()) : $hero->the_post(); $cat = get_the_category(); $cat = $cat[0]; ?>					
							<article class="article-block">
								<div class="headline <?php echo $cat->slug; ?>-bgcolored">
									<span><?php echo $cat->slug?></span>
									<h1>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<span class="arrow <?php echo $cat->slug; ?>-colored"></span>
									</h1>
									<p class="meta">By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?></p>
								</div>
								<div class="img_wrapper">
									<a href="">
										<?php the_post_thumbnail('home-hero'); ?>
										<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
											<span class="valign halign post-icon category-icon <?php echo $cat->slug; ?> <?php echo $cat->slug; ?>-bgcolored">
												<span>
													<span class="icon-font"></span>
													<span class="sr-only"><?php echo $cat->slug; ?></span>
												</span>
											</span>		
										</span>
									</a>
									<?php get_template_part('partials/content', 'article-tab-link'); ?>
								</div>							
							</article>
						<?php endwhile; ?>
					</div>
					<div id="two-stories" class="cf">
						<?php 
							$two = new WP_Query('posts_per_page=2'); $x=0;
							while($two->have_posts()) : $two->the_post(); 
							$side = ($x%2 === 0) ? 'left' : 'right'; $x++; 
							$cat = get_the_category()[0];
						?>
							<article class="article-block <?php echo $side; ?>">
								<div class="headline">
									<h2 class="<?php echo $cat->slug; ?>-bgcolored"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="meta <?php echo $cat->slug; ?>-bgcolored">
										<a href="<?php echo get_category_link($cat->cat_ID);?>" class="category"><?php echo $cat->name; ?></a> 
										By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?>
									</p>
								</div>
								<div class="img_wrapper">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('home-' . $side); ?>
										<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
											<span class="valign halign post-icon category-icon <?php echo $cat->slug; ?> <?php echo $cat->slug; ?>-bgcolored">
												<span>
													<span class="icon-font"></span>
													<span class="sr-only"><?php echo $cat->slug; ?></span>
												</span>
											</span>		
										</span>
									</a>
									<?php get_template_part('partials/content', 'article-tab-link'); ?>
								</div>							
							</article>
						<?php endwhile; ?>						
					</div>					
				</div>
			</div>
		</div>

		<div id="mini-featured">
			<div class="wrap">
				<div class="row">
					<?php $featured = new WP_Query('posts_per_page=4'); ?>
					<?php while($featured->have_posts()) : $featured->the_post(); $cat = get_the_category(); ?>
						<article class="article-block">
							<div class="headline">
								<h2 class="<?php echo $cat[0]->slug; ?>-bgcolored"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>						
							<div class="img_wrapper">
								<a href="<?php the_permalink()?>">
									<?php the_post_thumbnail('home-mini'); ?>
								</a>
								<?php get_template_part('partials/content', 'article-tab-link'); ?>
							</div>							
						</article>
					<?php endwhile;  ?>
				</div>
			</div>
		</div>

		<div id="home-content" class="wrap">
			<div class="row">
				<div id="main-content" class="col-md-9">
					<div class="articles">
					<?php $recent = new WP_Query('posts_per_page=3&offset=2'); ?>
					<?php while($recent->have_posts()) : $recent->the_post(); $cat = get_the_category(); $slug = $cat[0]->slug; //echo "<pre>";var_dump($cat); ?>
						<article class="article-block cf">
							<div class="img_wrapper">
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail("home-mini"); ?>
									<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
										<span class="valign halign post-icon category-icon <?php echo $slug; ?> <?php echo $slug; ?>-bgcolored">
											<span>
												<span class="icon-font"></span>
												<span class="sr-only"><?php echo $slug; ?></span>
											</span>
										</span>		
									</span>
								</a>
								<?php get_template_part('partials/content', 'article-tab-link'); ?>
							</div>
							<div class="article-content">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt(); ?></p>
								<p class="meta">
									<a href="<?php echo get_category_link($cat[0]->cat_ID);?>" class="<?php echo $slug; ?>-colored">
										<?php echo $slug; ?>
									</a> 
									By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?>
								</p>
							</div>
						</article>
					<?php endwhile; ?>
					</div>
					<a href="" class="load-more">Load More Stories</a>
					<img src="http://placehold.it/860x500&text=Advertisement" alt="" class="">
				</div>
				
				<div id="home-sidebar" class="col-md-3">
					<img src="http://placehold.it/300x247&text=Advertisement" alt="" class="">
					<div id="recommended">
						<h4>Recommended</h4>
						<div class="headlining">
							<?php $headlines = new WP_Query('posts_per_page=4'); ?>
							<?php while($headlines->have_posts()) : $headlines->the_post(); $cat = get_the_category(); $cat = $cat[0]; ?>
								<article>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<p class="meta">
										<a href="<?php echo get_category_link($cat->cat_ID);?>" class="<?php echo $cat->slug; ?>-colored">
											<?php echo $cat->slug; ?>
										</a> 
										By <?php the_author_posts_link(); ?>
									<div class="sep"></div>
								</article>
							<?php endwhile; ?>											
						</div>						
					</div>
					<div class="row">
						<div class="page-block newsletter-signup">
							<h2><span class="icon-Logo_Icon"></span>Our Newsletter</h2>
							<?php get_template_part( 'partials/content', 'newsletter-signup-form'); ?>
						</div>			
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>


<script src="//localhost:1337/livereload.js"></script>

<?php get_footer(); ?>