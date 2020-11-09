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
define( 'DB_NAME', 'webtry' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1TCQpUqFKZb50m5eWWcpm9C1God8nHsMepMtMgtYu7cWp2emcTzF1b8SqSFnoNzY' );
define( 'SECURE_AUTH_KEY',  'dIa28Il53Ww7jINKAurr482T5MLiEkXyc5CbIjSK4hZkfWLVQgJVIAunSj08g5rt' );
define( 'LOGGED_IN_KEY',    'UrV14xVTpKbZokyFz9icgeodCR3Ddv82at27WoZtznW11QorybR8VPaQ0p8rt5Ki' );
define( 'NONCE_KEY',        'QNoyaxfpdNZFCHaz02zUDluou3zApjChqL30kZEa8l4g7S2VLUb7qXl0nY35bQ00' );
define( 'AUTH_SALT',        '4CXJSmaOvKkGM3T6NAOXkkSgSr7LGW94ppTQg33WGwQEWMxuqglm8mJDPqwO482E' );
define( 'SECURE_AUTH_SALT', 'pLSbbLs42le73fx7fLhtBNDzVoMgLnjK31yBNQccf9JjsLzwP27wtdRyfBuIGirF' );
define( 'LOGGED_IN_SALT',   'KTNEuaJiwV0whtc7GWJ1TgnRYkrKQPtqFBdmjEnsPKCZYJBzeMRHP4ZsGMsCjsRG' );
define( 'NONCE_SALT',       '4dm3oVbkYQFkLsCuGIE02RxjQ9kFt4ZoTIGBsvlAoZY74VKuHHXnhyq2RwOJfUT6' );

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
