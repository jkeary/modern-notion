<?php


/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME') ?: 'modern');

/** MySQL database username */
define('DB_USER', getenv('DB_USER') ?: 'root');

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'root');

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Wr(JsyS8bpk8[<TnFKMnD.:BNZ4|RwYHc%=V&NqpQK[oz(*&[C88ByP%^Z~5[}1s');
define('SECURE_AUTH_KEY',  'bJ7zZ8ei[qH^J*U+Z:)6XYs|-4R8D]?k)tj%_f@kgjH%^WhLr;|tU5MZd*{5T(j,');
define('LOGGED_IN_KEY',    '>RAijW<]IpRIajMV>Vq4+@xrHb;3h--D_BXn!Z#,roU{a!ViL=r/GA]xVe&}W7sp');
define('NONCE_KEY',        '%T,iwMlkf0V++l>E:YQ/p:61^O|N1bjF&Qc{uesIa+}.t?`i( JY]c:m!c |pe>T');
define('AUTH_SALT',        '^NNCX%8A#.vRth.AX*OG6l(w& (,AG<HO%gm&ZA)6kHGET=|+-O.pe-EC9 f*#Ni');
define('SECURE_AUTH_SALT', 'Ycfl|a~}raVbQ*&0]a1b3Us?IjIlggKCe`JW[RL}[L7>G|v%trK0E-W3c=9ekCE|');
define('LOGGED_IN_SALT',   '*Er^6>2@@@-T=<9pJMwwn,.1]e$BTo4BS[nX%w+E%U8AxM@3pe[5GIMJA)o_wWz~');
define('NONCE_SALT',       '~F}g^}IW|Nv68n06VCFy9orh`_p%{@GrU}0]3Tw.hQ-pG|fa^ayF|-H5>DFfQ1Sa');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv('TABLE_PREFIX') ?: 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', getenv('WP_DEBUG') ?: true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
