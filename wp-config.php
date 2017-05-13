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
define('DB_NAME', 'aksibobo_wp708');

/** MySQL database username */
define('DB_USER', 'aksibobo_wp708');

/** MySQL database password */
define('DB_PASSWORD', 'S37!7po!LR');

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
define('AUTH_KEY',         'qj5hwf8ixhxg8o4le12sylfmdjfitxjdovblaf4mxo18icel3rf9yb0pqxqbfwx6');
define('SECURE_AUTH_KEY',  'dbe69bribvdzhfsdxoqid8vlqyujrbtsgoiz1wrrr8spuahyvzfz4h0oyjb09auv');
define('LOGGED_IN_KEY',    'w4hlufgaxr7cli34f98rpwousronegogdcw6nl9ksuptb6li46h8vqb9bfdkhsti');
define('NONCE_KEY',        'mkgj5pstiry3yde5trincj60lbpunphreicuzitjteifnb856va7rvj2d71vztij');
define('AUTH_SALT',        'ulac27rwaa9ucqrkl0py1clw9y2jfimhtffc0ha2fs4axmpubjjxuocmrlx6r40p');
define('SECURE_AUTH_SALT', 'yqvw33zp7ugtfgrausj5goizhwc5orancnp1zzb6kapt40so7d9rfnfpk1rjolj1');
define('LOGGED_IN_SALT',   'yelynowm8qwq4jxmr4nkmpvksffa4gjpg3boekaa1oyaioufxdhuayapmtui90z2');
define('NONCE_SALT',       '6pcnuilbjvnmo6crpciiffb98he8iei7ho8sjc9awwf3kw682jpc7wfzweit8dj7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp8b_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
