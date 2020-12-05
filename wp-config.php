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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shop_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3308' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ee%DUU1 gfgDYXGv*FI:7=t9~,$WUz!M-?(vtxR}Gxs?a;:iZaF+H+4#GL_i]bVn' );
define( 'SECURE_AUTH_KEY',  'BpY1A|Mvg)5 U($c-b1`8I.;RoSrz2&g<u SIq+Q@|m17s?|J^I{d&Wd<Kvy_W[b' );
define( 'LOGGED_IN_KEY',    '>4u;~vn4,t%kb;!dYCAx?GyEV}YPa^)FTs([u:^LI%c>Y!k+){~cX[Zoa&~sVPS:' );
define( 'NONCE_KEY',        ';0`&7nTOYC5Luz%c[T81EK>L^-39!^kMW#3t~63D:7e+ZGhv?|#%YN-`:xRQ:_(L' );
define( 'AUTH_SALT',        'i-`~Yo56 keKNZFax1skyo(j3^l$U(|JYJ)4*GCY#RxL6-VlK&;IFa{o1pK|L%p6' );
define( 'SECURE_AUTH_SALT', 'V)`[vA;5[=7vN!/C=7z;Y??iI/-acxzw.nd_Z>|)9=3b>4*Vo;lN,`phWy)I9_x.' );
define( 'LOGGED_IN_SALT',   '2$ZiR$Bk)l&q_N[eM[4.K@^q$i;`5BE?Bo:zUV,=SEBD~tt4[?uWDgvn*3/kIT ?' );
define( 'NONCE_SALT',       'ut)nT><:R^Qj>PW3h~tsR?TGcO8-48rSuY2$Whfx)Y{JC0y|nYDo$ArunYw$=K9!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
