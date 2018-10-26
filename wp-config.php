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
define('DB_NAME', 'stageup_test');

/** MySQL database username */
define('DB_USER', 'stageup_test');

/** MySQL database password */
define('DB_PASSWORD', 'kbgghwnz');

/** MySQL hostname */
define('DB_HOST', 'stageup.mysql.ukraine.com.ua');
//define('DB_HOST', 'localhost');
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
define('AUTH_KEY',         '. :6p(6Uh/^=L9~L(nDj52ZQItQfvd:-U%^/i1Ja&.mxmwGg)0b3[J1r^/]$NL^P');
define('SECURE_AUTH_KEY',  'K?HgKdx[60aw^?o^-0v}r3J>Tnr=LOwu=??Yn|C$kNuOXC=gH-!%Z9~(iwxaS=Z2');
define('LOGGED_IN_KEY',    '1pOM!3A2Oy~>pEIJoLADV+#/oz!R+?r*R-KuPxFWhMJh!UGX.n2/4*R.V=_~.0ZH');
define('NONCE_KEY',        'kS(Kjs(.zR)(~G&B#Mr/ |VuMm*Q;fzx=]X*fvZ$bk6.L88L/jnFNaG&3n0F`B~2');
define('AUTH_SALT',        'YCi,P($;hh0eaoeANzDsr;Q Ul^PP=G9N8(0tBzg&@1Y0/m!~J!A}Uf.o&m4CdPT');
define('SECURE_AUTH_SALT', 'X-?:G3A exAQI[ >Mj}RjGw!4Z764c${Gx/#u/l%HWogtfgrN$8US<X*P.JQ8C}:');
define('LOGGED_IN_SALT',   'o(c^b&K8:{)ay17+5!;S>C)?@@B>w8DTJY3m8zjLvU*_E<NJF}pxbxvCSzs0;e-}');
define('NONCE_SALT',       'r}zX{&C!]LRQx3y6]qEqtP`-?F0=`.9M)w?l_xy9dR-BJ`E_mm`y.uUxEnr.Vit8');

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
