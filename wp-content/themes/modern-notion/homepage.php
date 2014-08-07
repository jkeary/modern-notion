<?php 
/**
* Template name: Homepage	
*/
?>

<?php get_header(); ?>

<?php
	$hero = get_posts('meta_key=hp_slot&meta_value=hero&posts_per_page=1&orderby=modified');
	$top = get_posts('meta_key=hp_slot&meta_value=top&posts_per_page=3&orderby=modified'); 
	$middle = get_posts('meta_key=hp_slot&meta_value=middle&posts_per_page=2&orderby=modified'); 
	$mini = get_posts('meta_key=hp_slot&meta_value=mini&posts_per_page=4&orderby=modified');
	$category_meta = get_option('category_meta'); 
?>

<div id="main">
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<div class="row hidden-xs hidden-sm google">
				<div class="google-wrap-large">
				<?php if(WP_DEBUG) : ?>
					<img src="http://placehold.it/728x90&text=Advertisement" alt="">
				<?php else : ?>
					<!-- Homepage Top -->
					<ins class="adsbygoogle"
					style="display:inline-block;width:728px;height:90px"
					data-ad-client="ca-pub-5436367174279870"
					data-ad-slot="7434080947"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				<?php endif; ?>
				</div>
			</div>
			<div class="default-layout">
				<div id="main">
					<div class="cf">
						<div class="top headlining visible-lg">
							<table>
							<?php foreach($top as $post) : setup_postdata($post); $cat = get_the_category()[0]; ?>
								<tr><td>
								<article class="top-article">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="meta">
										<a href="<?php echo get_category_link($cat->cat_ID);?>" style="color: <?php echo $category_meta[$cat->cat_ID]['color']?>">
											<?php echo $cat->slug; ?>
										</a>
										By <?php the_author_posts_link(); ?>
									</p>
									<div class="sep"></div>
								</article>
								</td></tr>
							<?php endforeach; ?>	
							</table>										
						</div>												
						<div id="hero">
							<?php foreach($hero as $post) : setup_postdata($post); $cat = get_the_category(); $cat = $cat[0]; ?>					
								<article class="article-block">
									<div class="headline" style="background-color: <?php echo $category_meta[$cat->cat_ID]['color'];?>">
										<span><?php echo $cat->slug?></span>
										<h1>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<span class="arrow" style="border-left: 25px solid <?php echo $category_meta[$cat->cat_ID]['color'];?>"></span>
											<span class="arrow-up" style="border-bottom: 25px solid <?php echo $category_meta[$cat->cat_ID]['color'];?>"></span>
										</h1>
										<p class="meta">By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?></p>
									</div>
									<div class="img_wrapper">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('home-hero'); ?>
											<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
												<span 
													class="valign halign post-icon category-icon <?php echo $cat->slug; ?>" 
													style="background-color: <?php echo $category_meta[$cat->cat_ID]['color'];?>">
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
							<?php endforeach; ?>
						</div>
					</div>
					<div id="two-stories" class="cf hidden-xs">
						<?php 
							$x=0;
							foreach($middle as $post) : setup_postdata($post);  
							$side = ($x%2 === 0) ? 'left' : 'right'; $x++; 
							$cat = get_the_category()[0];
						?>
							<article class="article-block <?php echo $side; ?>">
								<div class="headline">
									<h2 style="background-color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="meta" style="background-color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>;">
										<a href="<?php echo get_category_link($cat->cat_ID);?>" class="category"><?php echo $cat->name; ?></a> 
										By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?>
									</p>
								</div>
								<div class="img_wrapper">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('home-' . $side); ?>
										<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
											<span 
												class="valign halign post-icon category-icon <?php echo $cat->slug; ?>" 
												style="background-color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>;">
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
						<?php endforeach; ?>						
					</div>					
				</div>
			</div>
		</div>

		<div id="mini-featured" class="hidden-sm hidden-xs">
			<div class="wrap">
				<div class="">
					<?php  ?>
					<?php foreach($mini as $post) : setup_postdata($post); $cat = get_the_category()[0]; ?>
						<article class="article-block">
							<div class="headline">
								<h2 style="background-color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>;">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
							</div>						
							<div class="img_wrapper">
								<a href="<?php the_permalink()?>">
									<?php the_post_thumbnail('home-mini'); ?>
								</a>
								<?php get_template_part('partials/content', 'article-tab-link'); ?>
							</div>							
						</article>
					<?php endforeach;  ?>
				</div>
			</div>
		</div>

		<div id="home-content" class="wrap">
			<div class="row">
				<div id="main-content" class="col-md-7 col-lg-8">
					<div id="articles" class="articles">
					<?php $recent = new WP_Query('posts_per_page=5'); ?>
					<?php while($recent->have_posts()) : $recent->the_post(); $cat = get_the_category()[0]; ?>
						<article class="article-block cf">
							<div class="img_wrapper col-md-3">
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail("home-mini"); ?>
									<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
										<span 
											class="valign halign post-icon category-icon <?php echo $cat->slug; ?>" 
											style="background-color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>;">
											<span>
												<span class="icon-font"></span>
												<span class="sr-only"><?php echo $cat->slug; ?></span>
											</span>
										</span>		
									</span>
								</a>
								<?php get_template_part('partials/content', 'article-tab-link'); ?>
							</div>
							<div class="article-content">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php if(get_field('dek')) : ?>
									<p><?php the_field('dek'); ?></p>
								<?php endif; ?>
								<p class="meta">
									<a href="<?php echo get_category_link($cat->cat_ID);?>" style="color: <?php echo $category_meta[$cat->cat_ID]['color']; ?>;">
										<?php echo $cat->slug; ?>
									</a> 
									By <?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?>
								</p>
							</div>
						</article>
					<?php endwhile; ?>
					</div>
					<div class="loading">
						<img style="display:none;" id="article-loading" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/bx_loader.gif" alt="">
						<a href="" class="load-more">Load More Stories</a>
					</div>
				</div>
				
				<div id="home-sidebar" class="col-md-5 col-lg-3 hidden-sm hidden-xs">
					<?php if(WP_DEBUG) : ?>
						<img src="http://placehold.it/300x247&text=Advertisement" alt="" class="hidden-sm">
					<?php else : ?>
						<!-- Homepage Sidebar -->
						<ins class="adsbygoogle"
						style="display:inline-block;width:300px;height:250px"
						data-ad-client="ca-pub-5436367174279870"
						data-ad-slot="8910814147"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					<?php endif; ?>
					<div id="recommended" class="cf">
						<h4>Recommended</h4>
						<div class="headlining">
							<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular("limit=3&post_type=post"); ?>
						</div>						
					</div>
					<div class="cf">
						<div class="page-block newsletter-signup">
							<h2><span class="icon-Logo_Icon"></span>Get Our Newsletter</h2>
							<?php get_template_part( 'partials/content', 'newsletter-signup-form'); ?>
						</div>			
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>

<script id="entry-template" type="text/x-handlebars-template">
	<article class="article-block cf">
		<div class="img_wrapper col-md-3 col-sm-3">
			<a href="{{ url }}">
				<img src="{{ thumbnail_images.home-mini.url }}" />
				<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-fifty">
					<span class="valign halign post-icon category-icon {{categories.0.slug}} {{categories.0.slug}}-bgcolored">
						<span>
							<span class="icon-font"></span>
							<span class="sr-only">{{categories.0.slug}}</span>
						</span>
					</span>		
				</span>
			</a>
			<div class="share-tab-wrapper">
				<div class="share-tab">
					<span class="icon-Share"></span>
				</div>
				<div class="share-buttons inline black-style">
					<span><a 
						onclick="window.open(this.href, 'mywin', 'left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" 
						class="twitter" href="http://twitter.com/share?url={{ url }}&amp;text={{{ title }}}" 
						target="_blank"><span class="icon-twitter"></span><span class="text">Share on Twitter</span></a></span>
					<span><a 
						onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" 
						class="facebook" href="http://www.facebook.com/sharer.php?u={{ url }}" 
						target="_blank"><span class="icon-facebook"></span><span class="text">Share on Facebook</span></a></span>
					<span><a onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" 
						class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url }}" 
						target="_blank"><span class="icon-linkedin"></span><span class="text">Share on LinkedIn</span></a></span>
					<span><a 
						class="email" 
						href="mailto:?Subject={{ title }}&amp;Body=%20{{ url }}">
						<span class="icon-Email"></span><span class="sr-only">Email</span></a></span>
				</div>
			</div>
		</div>
		<div class="article-content">
			<h2><a href="{{ url }}">{{{ title }}}</a></h2>
			<p>{{{ custom_fields.dek.[0] }}}</p>
			<p class="meta">
				<a href="/category/{{categories.0.slug}}" class="{{categories.0.slug}}-colored">
					{{categories.0.title}}
				</a> 
				By <a href="/author/{{author.slug}}">{{author.name}}</a> | <time>{{date}}</time>
			</p>
		</div>
	</article>
</script>

<?php get_footer(); ?>