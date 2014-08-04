<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap cf">
		<div class="row default-layout">			
			<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">
				<?php get_template_part('partials/content', 'article-block-large'); ?>
				<div class="visible-xs">
					<?php get_template_part( 'partials/content', 'sidebar-small-post-list'); ?>
				</div>
				<div id="infinite-scroll-wrapper">
					<?php $i = 1; $small_article_num_per_group = 10; ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php if($i ===1 ){ the_post(); } // temporary fix for double post, remove this ?>							
						<?php get_template_part('partials/content', 'article-block-small-row'); ?>
						<?php $i++; ?>								
					<?php endwhile; ?>
					<?php endif; ?>								
				</div> <!-- end #infinite-scroll-wrapper -->
				<img style="display:none;" id="article-loading" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/bx_loader.gif" alt="">
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<!-- Infinte template -->
<script id="entry-template" type="text/x-handlebars-template">
<div class="col-sm-6">
	<article id="post-{{ id }}" class="post-{{ id }} post type-post status-publish article-block article-block-small" role="article">
		<div class="img_wrapper">
			<a href="{{ url }}">
			<img 
				width="{{ thumbnail_images.medium-square.width }}" 
				height="{{ thumbnail_images.medium-square.height }}" 
				src="{{ thumbnail_images.medium-square.url }}" 
				data-lazy-type="image" 
				data-lazy-src="{{ thumbnail_images.medium-square.url }}" 
				class="lazy attachment-medium-square wp-post-image data-lazy-ready" 
				alt="{{ title }}" style="display: block;">						
			<span class="category-and-format-icons post-icon-wrapper post-icon-wrapper-medium">
				<span class="valign halign post-icon category-icon {{ categories.0.slug }} {{ categories.0.slug }}-bgcolored">
					<span>
						<span class="icon-font"></span>
						<span class="sr-only">{{ categories.0.slug }}</span>
					</span>
				</span>
				<span class="valign halign post-icon format-icon standard {{ categories.0.slug }}-bgcolored">
					<span>
						<span class="icon-font"></span>
						<span class="sr-only">standard</span>
					</span>		
				</span>			
			</span>
			</a>
			<div class="share-tab-wrapper">
				<div class="share-tab">
					<span class="icon-Share"></span>
				</div>
				<div class="share-buttons inline black-style">
					<span><a onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" class="twitter" href="http://twitter.com/share?url={{url}}&amp;text={{title}}" target="_blank"><span class="icon-twitter"></span><span class="text">Share on Twitter</span></a></span>
					<span><a onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" class="facebook" href="http://www.facebook.com/sharer.php?u={{url}}" target="_blank"><span class="icon-facebook"></span><span class="text">Share on Facebook</span></a></span>
					<span><a onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url}}" target="_blank"><span class="icon-linkedin"></span><span class="text">Share on LinkedIn</span></a></span>
					<span><a onclick="window.open(this.href, 'mywin','left=50,top=50,width=550,height=550,toolbar=1,resizable=0'); return false;" class="email" href="mailto:?Subject={{title}}&amp;Body=%20{{url}}" target="_blank"><span class="icon-Email"></span><span class="sr-only">Email</span></a></span>	
				</div>
			</div>	
		</div>

		<div class="text-wrapper">
			<h2 class="h2 entry-title">
				<a href="{{url}}" rel="bookmark" title="{{title}}">{{{title}}}</a>
			</h2>
			<div class="meta children-with-dividers">
				<span class="author">by <a href="{{author.url}}">{{author.name}}</a></span>				
				<span class="time-ago" title="{{date}}"></span>
				<script>jQuery("span.time-ago").timeago();</script>
			</div>	
		</div>	
	</article>
</div>
</script>

<?php get_footer(); ?>
