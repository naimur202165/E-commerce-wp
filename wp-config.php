<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '}RtJa0&[C0d9JszZA]PrV[h$l]L0^[A@>~>0_F6!6LEGpH]UeoKDFRidf-F#THAc' );
define( 'SECURE_AUTH_KEY',   'fSuh-//vQM0g%)mn P%y5#}?$S:Cv1WeQp@DJRCa7V@y,MN!owp!a;P+P&J{=5mx' );
define( 'LOGGED_IN_KEY',     '{O+&$`Pw.U6*OAbYH9xO,N%T%$zXi%QtX#thK$.Ed>X;Q(%q-SU9ffEE1eOWpY=A' );
define( 'NONCE_KEY',         '*T7q0r%bZ;2,0JLIO@yxsYHE3HjP8>nAd=^gd ttIm[j%yFRw?[T;A^(F5}scLEL' );
define( 'AUTH_SALT',         '&Fi2NS3H+n|j~+G8JO~{N<|.<P]OXU #bs1c=y{N `[Q|8`$&%`<K/R8{[-8<1?f' );
define( 'SECURE_AUTH_SALT',  'J[yM(N^r8,op{hz+4HU65uVa]r*G{gbK%Z!+vIOLP#bQSZ|}_Ee;,<fXl9Tz]0<R' );
define( 'LOGGED_IN_SALT',    'E2$`~MtV0<yhs5!kW3Z,MX-{]}#;*@|z3qItEF(ik]3$F7]M#<) mRag9IM%V4To' );
define( 'NONCE_SALT',        ':qA r5nm(1dN0vAtavKuf|IPZ(4UH<]W]-#^-+]_b0~N8n<&xxPv`ADTHE!T03]a' );
define( 'WP_CACHE_KEY_SALT', ']pR!y>65tsOr|,l7]OGcH}<67Q|.<V&C6,;V2#/tni{.^D0lO7;5O$K}-K$#4s[U' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
