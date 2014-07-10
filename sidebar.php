				<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">
					<img src="http://placehold.it/317x247&text=Advertisement" alt="" class="page-block">
					<div class="sidebar-sticky-wrapper">
						<?php get_template_part( 'partials/content', 'newsletter-signup'); ?>
						<?php if(is_front_page()): ?>
							<div class="hidden-xs">
								<?php get_template_part( 'partials/content', 'sidebar-small-post-list'); ?>
							</div>
						<?php endif; ?>
						<div class="hidden-xs">
							<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular("limit=5&post_type=post"); ?>
						</div>
					</div>
				</div>