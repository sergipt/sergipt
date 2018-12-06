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
define('DB_NAME', 'qzh568');

/** MySQL database username */
define('DB_USER', 'qzh568');

/** MySQL database password */
define('DB_PASSWORD', 'S3rg1ptS');

/** MySQL hostname */
define('DB_HOST', 'qzh568.sergipt.com');

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
define('AUTH_KEY',         'VU`1Y[&]KqJC.iS,<bdtw~mP*zU?%G5x(m3#SYEEXej+m);<HIP d7W3L-UbUhU[');
define('SECURE_AUTH_KEY',  '`HK[ftYGd@>#uu8AJG,vO<AGqQRS?T%|P{IuhG{O]O%rh0&/n8#$[:x*(xL55e<a');
define('LOGGED_IN_KEY',    'p$e!FxVe&>,!<sJlC&s)fdJY 5&tOD/;mxYO]x0nQ4B7&E)qS[jTv[ z:mUm!dr?');
define('NONCE_KEY',        '&SY92(o[at3iQ0w!~Mt6UgzMR,`1|Z$T6*wIETd/qZ;=|,qK)mBJo)SCH-4V+IKZ');
define('AUTH_SALT',        'T*7s1)t`ToxR|scvqtjo-S|iywqI.Jiy32{:6LFmCEFZGx4}+m0(Q*Uyc}Pt<q8L');
define('SECURE_AUTH_SALT', '$p+_Mv7 l0%p2cr)Z=:qUQ&RD-(Y0r?.b>&t/B@weSpAzK~y/A?(*o!TNt|^8&I8');
define('LOGGED_IN_SALT',   'bBG*Ccpu-gp?{{4Pft_~DEO@ASK{Ed#yoVj0Qj5#|1Xz]2XTjYeQeiKMtJ%N#jaI');
define('NONCE_SALT',       'Ls3km$}nmy9xT+[*+ce4[RKoS/dJ`MV?EY(,nX:Z)x+YooB*{Cg(;,YbQy8V1`b$');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
