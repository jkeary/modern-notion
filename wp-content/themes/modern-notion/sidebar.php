<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">
	
	<div class="sidebar-sticky-wrappers" data-id="<?php echo $post->ID; ?>">

	    <div class="cf google">
	    	<?php if(WP_DEBUG) : ?>
				<img src="http://placehold.it/317x247&text=Advertisement" alt="" style="width:100%">
			<?php else : ?>
				<!-- Article Sidebar -->
				<ins class="adsbygoogle"
				style="display:inline-block;width:300px;height:250px"
				data-ad-client="ca-pub-5436367174279870"
				data-ad-slot="1387547345"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			<?php endif; ?>
		</div>
		
		<?php if(is_single()) : ?>
			<div class="hidden-xs">
				<?php $cat = get_the_category()[0]; ?>
				<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular("limit=2&post_type=post&pid=".$post->ID."&cat=".$cat->cat_ID); ?>
			</div>	
		<?php endif; ?>
		
		<div class="page-block newsletter-signup">
			<h2><span class="icon-Logo_Icon"></span>Get Our Newsletter</h2>
			<?php get_template_part( 'partials/content', 'newsletter-signup-form'); ?>
		</div>	
		
		<?php if(false) : ?>
		<?php //if(is_front_page()): ?>
			<div class="hidden-xs">
				<?php get_template_part( 'partials/content', 'sidebar-small-post-list'); ?>
			</div>
		<?php endif; ?>	

	    <div id="related">
	        <?php related_posts(); ?>
	    </div>						
	</div>	
</div>