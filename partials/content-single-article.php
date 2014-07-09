<article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">								
    <header class="article-header">
    	<div class="article-content-row top">
            <?php if(is_single()): ?>
                <div class="side post-icon-wrapper post-icon-wrapper-larger visible-xs">
                    <?php get_template_part('partials/content', 'post-category-icon'); ?>
                </div>
            <?php endif; ?>
            <?php if(!is_single()): ?>
                <h2 class="entry-title single-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php endif; ?>
        	<div class="main article-header-text-wrapper">        		
            	<?php $author_id = get_the_author_meta( 'ID' ); ?>
            	<ul class="meta-block children-with-dividers">
            		<?php get_template_part('partials/content', 'top-tag-li'); ?>
            		<li>
            			<?php get_template_part('partials/content', 'post-date-long'); ?>	
            		</li>
            		<li>
            			<span class="author">by <a href="<?php get_template_part('partials/content', 'author-permalink'); ?>"><?php get_template_part('partials/content', 'author-full-name'); ?></a></span>
            			<?php if(get_the_author_meta('twitter', $author_id)): ?>	
							<a href="https://twitter.com/<?php the_author_meta('twitter', $author_id); ?>" target="_blank" class="icon-twitter"><span class="sr-only">@<?php the_author_meta('twitter', $author_id); ?></span></a>
						<?php endif; ?>
            		</li>
            	</ul>	
            </div>	
        </div>		
        <div class="article-content-row bottom"> 
            <?php if(is_single()): ?>               	
    			<div class="side post-icon-wrapper post-icon-wrapper-larger hidden-xs">
    				<?php get_template_part('partials/content', 'post-category-icon'); ?>
    			</div>	
            <?php endif; ?>
			<div class="main article-header-text-wrapper">
                <?php if(is_single()): ?>
              		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>                                           
                    <?php echo do_shortcode('[ssba]'); ?> 
                    <?php /*
                    <?php if(get_field('dek')): ?>    
                        <hr class="short">
                        <div class="prose dek category-prose <?php echo top_category_slug(); ?>-styled">
                            <?php the_field('dek'); ?>
                        </div>
                    <?php endif; ?>
                    */ ?>                                   
                <?php endif; ?>
          	</div>
        </div>        
    </header> <?php // end article header ?>

    <section class="entry-content single-entry-content" itemprop="articleBody">
        <div class="article-top-panel">
            <?php if(get_field('video_embed_code')): ?>    
                <div class="responsive-iframe" style="padding-bottom: <?php echo get_responsive_iframe_bottom_pad(get_field('video_embed_code')); ?>">
                    <?php the_field('video_embed_code'); ?>
                </div> 
            <?php else: ?>
        	   <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>   
        </div>       
        <?php if(is_single()): ?>
            <div class="article-content-row article-text-wrapper" data-slug="<?php echo get_the_slug(); ?>">
                <div class="side">
                    <?php $author_id = get_the_author_meta( 'ID' );
                    $author_ref = 'user_'. $author_id; ?>
                    <?php $image = get_field('headshot', $author_ref); // only for image info outputted as an object ?>
                    <a href="<?php get_template_part('partials/content', 'author-permalink'); ?>" class="author">
                        <?php if($image): ?>
                            <img src="<?php echo $image['sizes']['smaller-square']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                        <span class="text"><?php get_template_part('partials/content', 'author-full-name'); ?></span>
                    </a>
                    <div class="share-panel" data-slug="<?php echo get_the_slug(); ?>">
                        <h2>Share</h2>
                        <?php echo do_shortcode('[ssba]'); ?>
                    </div>
                </div>
                <div class="main">
                    <?php if ( has_post_format( 'aside' )): ?>
                        <?php $values = get_field('list_items'); ?>
                        <?php if(get_field('list_number_order') == 'decreasing')  {
                            $list_num = count($values);
                        }
                        else  {
                            $list_num = 1;   
                        }  ?>
                        <?php if($values): ?>
                            <ol class="article-list-items category-prose <?php echo top_category_slug(); ?>-styled">
                            <?php foreach($values as $value): ?>
                                <li>
                                    <h2><span class="num"><?php echo $list_num; ?>.</span> <?php echo $value['title']; ?></h2>
                                    <?php $image = $value['image']; // only for image info outputted as an object 
                                    if($image):  ?>                                
                                        <img src="<?php echo $image['sizes']['article-main']; ?>" class="section-image" alt="<?php echo $image['alt']; ?>" />
                                    <?php endif; ?>
                                    <div class="prose">
                                        <?php echo $value['content']; ?>
                                    </div>                            
                                </li>
                                <?php if(get_field('list_number_order') == 'decreasing') {
                                    $list_num--;
                                } 
                                else {
                                    $list_num++;
                                } ?>                                                                        
                            <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if ( has_post_format( 'audio' ) && get_field('podcast')): ?>
                        <div class="podcast-content">
                            <?php global $aspect_ratio; $aspect_ratio = 'letterbox'; ?>
                            <?php get_template_part('partials/content', 'podcast-image'); ?>
                            <?php get_template_part('partials/content', 'podcast-player'); ?>                                            
                        </div>
                    <?php endif; ?>
                    <?php if(get_the_content()): ?>
                        <div class="prose standard-content category-prose <?php echo top_category_slug(); ?>-styled">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="article-footer">
                        <?php the_tags( '<div class="article-tags">', ' ', '</div>' ); ?>
                    </div> <?php // end article footer ?>
                    <?php /*
                    <section class="comments-wrapper">
                        <div class="comments-toggle-wrapper">
                            <button type="button" data-toggle="collapse" data-target="#comments-<?php echo get_the_slug(); ?>" class="comments-toggle">View Comments</button>
                        </div>
                        <div id="comments-<?php echo get_the_slug(); ?>" class="collapse">
                            <?php comments_template(); ?>
                        </div>
                    </section>
                    */ ?>
                     <?php $related_query = new WP_Query( array(
                        'post_type' => 'post',
                        'posts_per_page' => 3
                    ) ); ?>
                    <?php if ( $related_query->have_posts() ) : ?>
                    <section class="suggested-posts">
                        <div class="row">
                            <?php while ( $related_query->have_posts() ) : ?>
                                <?php $related_query->the_post(); ?>
                                <div class="col-md-4">
                                    <?php the_post_thumbnail(); ?>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </section>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>   
                    <img src="http://placehold.it/693x100&text=Advertisement" alt="" class="page-block">
                </div>
            </div>
        <?php endif; ?>
    </section> <?php // end article section ?>

</article> <?php // end article ?>
