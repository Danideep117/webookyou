<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webookyou' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+8ke?6+^JS?b?{u|$:@?W{^v!3L1}Sw%R Scr]6uAEm2<So:fhM ZCHlR}:=tllr' );
define( 'SECURE_AUTH_KEY',  '|$;p:y^%aS6^+!NeHmjK,rr<.c)6~b<VpG@cYMUxLiqjSp@OU%rk_2{+OBiMdIQ|' );
define( 'LOGGED_IN_KEY',    '&=1F+W{?mo)vNAEXM /?EBj?.D1]@qvY^nz!O++B[>zM_gO+`u|<Au@(ydsi9_hf' );
define( 'NONCE_KEY',        'h&Z?<yq6lTwmbG,v+=q/W?wVnsZo?6H}CbU&u;1d%`6km0)}=Pov1;rrvkS;c;&D' );
define( 'AUTH_SALT',        'v~<=iH7*8.tfTvW!b6s}1>!GoJu;a|KeObAHd (?amNtNZB|qED)Ku$U|6-^2i|N' );
define( 'SECURE_AUTH_SALT', 'RXw$kI&HGglPZ!f~#j!#0i+IJ?:1.a<@rV{qW#pYyu,/l70poDI]W wxNj/`i<MH' );
define( 'LOGGED_IN_SALT',   'b~%O Km)gk$%AXutEH0~oDD=;3Ll#6Rli1xuD{{/n,d!C+bFZ/~>1Hc?^*ps!VH_' );
define( 'NONCE_SALT',       'v%Q/LEAAHR#jmqCozp9%R:vOo79P4@fICXQ$a.3w>wJZ!dOH8C)_veV4xW^z/6z4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
