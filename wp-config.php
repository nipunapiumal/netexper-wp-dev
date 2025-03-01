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
define( 'DB_NAME', 'netexper_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'KCXI_W<pCJ1#$ rsd4yK@{m78t$QqA(gSD8w/I>)D!(dnhAW WJcm4@ZrXHxpQni' );
define( 'SECURE_AUTH_KEY',  '!M1_;tyy:S_-2]5if.Ks=R,V7zXtk/lRZY=_p?9`SppYwbO:rnR%2_OxT!?K]#?q' );
define( 'LOGGED_IN_KEY',    ' x2B$GU9I4u`g >LHa0?<4)]| gP[7@K/~$a&34I<s0Fu8bR+O ~y0<0 KJnskIH' );
define( 'NONCE_KEY',        'm4g28?zAOy4MF9#a&t8|31~ryaZm*kEFi@-KWlhmi`@XAVa_I5i1ILX(A|,wp]RT' );
define( 'AUTH_SALT',        '8iAaGHPi{(>PG#^Hg9_}_8QfI(#j(k}c:eq(z&W!Dm,7tf6/IO1SCW1;jJ-xza2D' );
define( 'SECURE_AUTH_SALT', '1I!9wO5jhE*D3Y>iE.(R>u$a81W~++B4O;~$`rkqD.f7e$#=tR>P|}3ZQMsXaFn*' );
define( 'LOGGED_IN_SALT',   'mq(aT5oLU`&ek XwR$17/3kGM3B425=spqjiyhz/,TB@GD$_1qj<z74iF= VOCSP' );
define( 'NONCE_SALT',       '3];;S0zjiv43bPv&s|K;m(.Bg&A6DIs6)vN{`Z[mjh-gM[n~@s^e942Zsyr[N|/@' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('UPLOADS', 'wp-content/uploads');

define('FS_METHOD', 'direct');
