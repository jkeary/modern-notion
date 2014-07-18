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
        
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
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

						<a href="<?php echo home_url(); ?>" rel="nofollow" class="header-logo"><span class="icon-Full_Logo visible-lg"></span><span class="icon-logo_type hidden-lg"></span><span class="sr-only logo-text">Modern Notion</span></a>

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