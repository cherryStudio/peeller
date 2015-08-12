<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'peeller');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'BezrasH88');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'Y.d;Y?EkdS&gGKT@p+_~!kG8,i>-R(F39k+o`b{DBStpi4|zv3ffm}=y?WO7p%Fe');
define('SECURE_AUTH_KEY',  '%e-p?Lumm#v]QNs,~i[3cQH9EJGxG7AdJ8+un+c+a}L@b@v:|m#oj}[ST&+1./#F');
define('LOGGED_IN_KEY',    'ozZ^t8uM#A1EYVR8_?C88txbVDA6patOoi|Ht|RQ}To~Nc4Z;:D^3|UE{:[{uVkP');
define('NONCE_KEY',        'GY@|!cuhdBg&Oc_!89oxLRTEie?l*s0m9u,,F+{wn8tI4GTT+A!LbTFa^&$S jTM');
define('AUTH_SALT',        '~TDA.*&d[3Qy#w(fl50njpT)(y7%X8l&o!KX]#bnz5heBY8n}F:erg&-OW+Q&w1Z');
define('SECURE_AUTH_SALT', ',&?8iXnsvn&RL>-S99X(+z,bP|Cv}|U+~?|3YgaYBG]TzvE{8sLXXS6R|f2b7*=2');
define('LOGGED_IN_SALT',   'pF[ZOSV5VuL@3W;$EX3hj0(H-a}|knCFY S:)|(W-^+n/WC`l-u|F}hl~n&@W:P5');
define('NONCE_SALT',       'R*WU~ElAGP2!Y,+z4Ktgz$@x;WnH%mIPS)TflmZV0jTCDZvpO5.39Ga$LR5zh&wn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
