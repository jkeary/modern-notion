<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // Google Chrome Frame for IE ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title(''); ?></title>

    <?php if(is_single()) :  ?>
        <?php
            $description = ""; 
            if(class_exists("WPSEO_Meta")){
                $description = esc_attr(WPSEO_Meta::get_value("metadesc"));
            }
            else if(get_field('dek')) {
                $description = esc_attr(wp_strip_all_tags(get_field('dek')));
            }
        ?>
        <!-- FB tags -->
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <meta property="fb:app_id" content="1453391324923585" />
        <meta property="og:type" content="article" />
        <meta property="og:description" content='<?php echo $description; ?>' />
        <meta property="article:publisher" content="https://www.facebook.com/modernnotion" />
        <?php if(get_the_post_thumbnail()) : ?>
            <meta property="og:image" content="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0]; ?>" />
        <?php endif; ?>
        <!-- Twitter tags -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="<?php the_title(); ?>" />
        <meta name="twitter:creator" content="@modernnotion" />
        <meta name="twitter:description" content="<?php if(get_field('dek')) the_field('dek'); ?>" />
        <meta name="twitter:image:src" content="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0]; ?>">        
        <meta name="twitter:url" content="<?php the_permalink(); ?>" />

        <script>
            var tags = <?php echo json_encode(get_the_tags()); ?>;
            var post = <?php echo json_encode($post); ?>;
        </script>
    <?php endif; ?>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v1">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<?php // or, set /favicon.ico for IE10 win ?>
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<?php // wordpress head functions ?>
			<?php wp_head(); ?>
			<?php // end of wordpress head ?>

			<?php // drop Google Analytics Here ?>
			<?php // end analytics ?>

        <script>
            var isSingle = "<?php echo is_single(); ?>";
            var isFront  = "<?php echo is_front_page(); ?>";
            var isCategory = "<?php echo is_category(); ?>";
            var isTag = "<?php echo is_tag(); ?>";
        </script>

        <script type='text/javascript'>
        /* <![CDATA[ */
        var page_info = {"template_url":"http:\/\/miltrosenberg.com\/wp-content\/themes\/milt-rosenberg"};
        /* ]]> */
        </script>
        
        <!-- Taboola -->
        <script type="text/javascript">
            window._taboola = window._taboola || [];
            _taboola.push({article:'auto'});
            !function (e, f, u) {
            e.async = 1;
            e.src = u;
            f.parentNode.insertBefore(e, f);
            }(document.createElement('script'),
            document.getElementsByTagName('script')[0],
            'http://cdn.taboola.com/libtrc/modernnotion/loader.js');
        </script>

        <!-- Google ads -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        <!-- GA -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-48164405-5', 'auto');
            ga('send', 'pageview');
        </script>         

		</head>

		<body <?php body_class(); ?>>

            
            <?php /*  */ ?>          
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=181203951950224&version=v2.0";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
			
            <div id="container">

				<header class="header site-header" role="banner">

					<div id="inner-header" class="wrap cf container">

						<a href="<?php echo home_url(); ?>" rel="nofollow" class="header-logo"><span class="icon-Full_Logo visible-lg"></span><span class="icon-logo_type hidden-lg"></span><span class="sr-only logo-text visible-lg">Modern Notion</span></a>

						<div class="header-links-wrapper">
							<nav role="navigation" class="site-nav">
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
            				<ul class="site-action-links">
            					<li>
            						<button type="button" data-toggle="collapse" data-target="#search-form-wrapper" class="icon-Search" title="Search"><span class="sr-only">Search</span></button>
            					</li>
            					<?php get_template_part('partials/content', 'site-social-rss-li-items'); ?>
                                <li class="hidden-lg">
                                    <a href="" class="menu-trigger" title="Open mobile menu"></a>
                                </li>
            				</ul>
                        </div>
                    </div>
                    <div class="collapse container" id="search-form-wrapper">
                        <form role="search" method="get" id="header-searchform" action="<?php echo home_url( '/' ); ?>">
                            <label class="sr-only" for="s">Search for:</label>
                            <input type="text" value="<?php if(isset($_GET['s'])) echo $_GET['s']; ?>" name="s" id="s" placeholder="Search" />
                            <a href="" class="clear-field">&times;</a>
                        </form>
                    </div>
                </header>            	