<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<div class="centered-image-text-header valign with-divider">
				<div>
					<div class="post-icon-wrapper post-icon-wrapper-largest">
						<?php get_template_part('partials/content', 'post-category-icon'); ?>
					</div>
				</div>
				<div>
					<?php
						$category = get_the_category(); 
						$cat_name = $category[0]->cat_name;
					?>
					<h1><?php echo $cat_name; ?></h1>
				</div>
			</div>
			<div class="with-divider">
				<img src="http://placehold.it/1080x200&text=Advertisement" alt="">
			</div>
			<div class="row default-layout">
				<div id="main" class="m-all t-2of3 d-5of7 cf main" role="main">
					<img 
						id="article-loading" 
						src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/bx_loader.gif" 
						alt=""
						style="display:none; position:absolute; bottom: 0" />				
					<?php while (have_posts()) : the_post(); ?>
						<div class="with-short-hr-dividers">
							<?php get_template_part( 'partials/content', 'single-article'); ?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<!-- Infinte template -->
<script id="entry-template" type="text/x-handlebars-template">
<div class="with-short-hr-dividers">
	<article id="post-{{ id }}" class="post-{{ id }} post type-post status-publish format-standard has-post-thumbnail hentry category-life category-science tag-children tag-lgbt tag-marriage tag-study single-article" role="article" itemscope="" itemtype="http://schema.org/BlogPosting">								
    	<header class="article-header">
    		<div class="article-content-row top">
                <h2 class="entry-title single-title" itemprop="headline"><a href="{{ url }}">{{{ title }}}</a></h2>
                    <div class="main article-header-text-wrapper">        		
            	        <ul class="meta-block children-with-dividers">
            				<li>
								<a href="/tag/{{ tags.0.slug }}" class="top-tag {{ categories.0.slug }}-colored">{{{ tags.0.title }}}</a>
							</li>	
            				<li>
            					<p class="byline vcard">
	 								<time class="updated" datetime="{{ date }}" pubdate="">{{ date }}</time>
	 							</p>
            				</li>
            				<li>
            					<span class="author">by <a href="/author/{{ author.name }}/">{{ author.name }}</a></span>
            			    </li>
            			</ul>	
            		</div>	
        	</div>		
	        <div class="article-content-row bottom"> 
	            <div class="main article-header-text-wrapper"></div>
	        </div>        
	    </header>
    	<section class="entry-content single-entry-content" itemprop="articleBody">
       		<div class="article-top-panel">
       			{{#if custom_fields.video_embed_code }}
					<div class="responsive-iframe" style="padding-bottom: 56.311881188119%">
                    	{{{ custom_fields.video_embed_code }}}
                    </div>
       			{{else}}
	       			{{#if thumbnail_images.large }}
	                <img 
	                	width="{{ thumbnail_images.large.width }}" 
	                	height="{{ thumbnail_images.large.height }}" 
	                	src="{{ thumbnail_images.large.url }}" 
	                	data-lazy-type="image" 
	                	data-lazy-src="{{ thumbnail_images.large.url }}" 
	                	class="lazy attachment-large wp-post-image data-lazy-ready" 
	                	alt="{{{ title }}}" style="display: block;">
	                {{/if}}
                {{/if}}
        	</div>       
        </section> 
	</article> 
</div>
</script>	
<?php get_footer(); ?>