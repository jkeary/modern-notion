
            <footer class="footer site-footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

					<div class="footer-logo-wrapper">						
						<a href="<?php echo home_url(); ?>" rel="nofollow" class="footer-logo icon-Logo_Icon"><span class="sr-only">Modern Notion homepage</span></a>
					</div>
					<div class="footer-site-nav-wrapper">
						<nav role="navigation" class="footer-only-nav">
							<?php wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
        			'after' => '',                                  // after the menu
        			'link_before' => '',                            // before each link
        			'link_after' => '',                             // after each link
        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
    					)); ?>
    				</nav>
    				<nav role="navigation" class="header-nav-in-footer">
    					<?php wp_nav_menu(array(
    					'container' => false,                           // remove nav container
    					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					'theme_location' => 'main-nav',                 // where it's located in the theme
    					'before' => '',                                 // before the menu
        			'after' => '',                                  // after the menu
        			'link_before' => '',                            // before each link
        			'link_after' => '',                             // after each link
        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => ''                             // fallback function (if there is one)
    					)); ?>

    				</nav>

                    <nav role="navigation" class="header-nav-in-footer">
                        <?php wp_nav_menu(array(
                        'container' => false,                           // remove nav container
                        'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                        'menu' => __( 'Legal', 'bonestheme' ),  // nav name
                        'menu_class' => 'nav top-nav cf',               // adding custom nav class
                        'theme_location' => 'legal',                 // where it's located in the theme
                        'before' => '',                                 // before the menu
                        'after' => '',                                  // after the menu
                        'link_before' => '',                            // before each link
                        'link_after' => '',                             // after each link
                        'depth' => 0,                                   // limit the depth of the nav
                        'fallback_cb' => ''                             // fallback function (if there is one)
                        )); ?>

                    </nav>                    
                                        

    			</div>
                
                <ul class="site-action-links">
                    <?php get_template_part('partials/content', 'site-social-rss-li-items'); ?>
                </ul>

    		</div>

    	</footer>

    </div>

    <?php 
        get_template_part("partials/modal", "newsletter-signup");
        get_template_part("partials/modal", "social-media"); 
        get_template_part("partials/modal", "slidein-social");  
    ?>   

    <?php // all js scripts are loaded in library/bones.php ?>
    <?php wp_footer(); ?>
    
    <!-- Taboola -->
    <script type="text/javascript">
        window._taboola = window._taboola || [];
        _taboola.push({flush: true});
    </script>   
    
    <?php if (!WP_DEBUG) : ?>
        <!-- GA -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-48164405-5', 'auto');
            ga('send', 'pageview');
        </script>         
        <!-- Crowdskout -->
        <script>
            (function(l,o,v,e) {
            l.ownerid = 6
            ;a=o.getElementsByTagName(v)[0];b=o.createElement(v);b.src=e;a.parentNode.insertBefore(b,a);
            })(window, document, 'script', 'https://api.crowdskout.com/analytics.js');
        </script>    
    <?php else : ?>
        <script src="//localhost:1337/livereload.js"></script>
        <!-- <script src="<?php //echo get_stylesheet_directory_uri(); ?>/library/js/plugins/modern.stick.js"></script> -->
    <?php endif; ?>      
    
</body>
</html> <!-- end of site. what a ride! -->
