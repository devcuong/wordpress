<?php
define( 'WP_ALLOW_MULTISITE', true );
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'T3CS;^P,.C)K])sN=>fU8>-@a&{By36*Lc)7Mrv@QC&`Bb[zh}YOwQoO1%yEJ[z+');
define('SECURE_AUTH_KEY',  '}rzD1k`#AsS1.JJjmDwl?_3)*:2YPa-eg]:3U!_v`%s5>RLx)S2JzxMsq~=}2-:Z');
define('LOGGED_IN_KEY',    ']%~-YIJF||wrHs/GvF8i5a@g,*DvMs)R[h~ay;a4oxCCq)Nc(y1E/=>YL{O&Vm@P');
define('NONCE_KEY',        'E31/]l+czB%nL,5$Lt&_&#+pDf+D,uhbR&Uuq0TYek5l@s:b,rfk{:J~4qXyy{ZR');
define('AUTH_SALT',        '|e-MK,]^$NmQaD>n7Mv<TLd?Ff2?IrLzZvJO8?A]Y^Gy}AO<b4H~@D-og94L5>+S');
define('SECURE_AUTH_SALT', ']z;x6TVWqGU<.<ZJXJ{<?T]Q.!q>(n?2)9*j4 VoQ/_liQt3C`U6m0c2m5|k3?Zf');
define('LOGGED_IN_SALT',   '`*zn9Gzs}hb^57F-l+Hh^N03sGKz[HLXR6c8HaWwcybIbJnUMQR*dsFN1vz%wCTv');
define('NONCE_SALT',       '7w{l/1ohB+n!_b9r$eUCSQU!F=;gPqTw[t60|^n>kd5qPsP(Z{=c;VIR%i/sQ1z;');

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
define('WP_DEBUG', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'dothi24h.abc');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
