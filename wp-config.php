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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'RAq?U[48an;?xRY<P$$cA=lXw~TQnFP~_}2zR|@lR0O{y);VmD.2L0x{)6H*-O=b');
define('SECURE_AUTH_KEY',  'YC!%.Qe*_DXGV!&]FqZx)bxB#%qy3}}pPVM2p([PMPR{g96`h/flHN l<5:Hqsbd');
define('LOGGED_IN_KEY',    'Q$;SIMBDS$acjU;kF0Akn}Nfu!$cW+|Dt*WEbs];{a<_%2K!8 p]`aOF%?OKX`Q6');
define('NONCE_KEY',        'U-zD[I3ST_5N%|ykS2$$ySalzszwrK ?|]21fB5pc@bRH~{6%eFW_/]uu7g)9E^m');
define('AUTH_SALT',        '}H9e|/8i?gv%>p!`I+iw!nwbBK9%{&YL2K&31o|md(leP4@pR,01s=*sXOUIH*~2');
define('SECURE_AUTH_SALT', 'vSkm `o:0Pd @&f<I`?ImV_q*W`vQQxKa~[ywVP#>H$vL yp!ht896&3^CA_.hGf');
define('LOGGED_IN_SALT',   '^ggtxFLJwN2CF85PBL}CD{^,z./v8.IOu4=i#0V*n1_y.=lrJ8c!u_oLGF~EOu9l');
define('NONCE_SALT',       '/JR{j7//zwe./9`qDpN2P~^Zhj@yLXj6z3LO*w~[:23${=%=P$h5aI[wy~yzAe,Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');
define( 'POPPOP_SCRIPT', 'RokBox_PopPop_Script' );
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
