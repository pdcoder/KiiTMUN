<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kiitmun');

/** MySQL database username */
define('DB_USER', 'kiitmun_user');

/** MySQL database password */
define('DB_PASSWORD', 'Xqre3_21');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'aB49?QgoBa-W6y&#?[-B8u|M_Yt2hf5Z~TMc:D9OB^abc1Cl,3hqoK_UP0[G-arT');
define('SECURE_AUTH_KEY',  'Wu))VbAE0]Lrrt[d@:sn%CIQW?e/Vf{(Yw/{(cd_ahb{r%/?(5%e:x1mu{x-}rUS');
define('LOGGED_IN_KEY',    '8_>&.as#lAwdnGSzP~={)*j@]1(+NnOYIL[Bq3EU:R+3mDh{N6z}_=hqkF^!k2XT');
define('NONCE_KEY',        'yOT%fWd]=~JB*}tt}?ZSw,GeCs{XU16THo1+S>L-%_92ssP4>jr&dqNXe~g@{f#A');
define('AUTH_SALT',        ']#JY?=+)`At>`A)(}**dkB|JK?B||OJQeg?8_x~{zS~dC>5-mrZKLLUF>7^JH+4%');
define('SECURE_AUTH_SALT', ' n^Z(ZeY9t9|Fbuzy#J{%WM16Z]_!FFJ^ZtQPn{HZG.[~D*aDQj:Mk~;.p!a1?P}');
define('LOGGED_IN_SALT',   'm6$22`Cf$@S^=p[ug!DOfWc6 nhnUal1zCyKA|zP`Y>R(e@+ 4,tuwsD({Lz)b2M');
define('NONCE_SALT',       'Y.m/&B=Xc* 1gdHX@s4)W#46ue`C|DU[AIl@SK9R3S4.HlTDi`ZI+z31}d/Hez)/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
//define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
