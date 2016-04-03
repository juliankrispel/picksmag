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
define('DB_NAME', 'picksmag');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         '60c!pjFAJG|WZ4bFnwk&)Or!%nLp^p3(!z61LgdKmYw]-&IOHU#r0q|`5G+T*Y-H');
define('SECURE_AUTH_KEY',  '3 nISJ;F47}+QIKaB~u055_(`p<cERNDaOlIf,jU,@xN3b|FK??;VI6#h(V,JTb0');
define('LOGGED_IN_KEY',    'O52QF^ihJ`EwTXn5px<s|>+u^XqozKC#_G+bt> C<3>4(;_[5^Sc@T$#}|&%_X=E');
define('NONCE_KEY',        'B/8;6F? OqfyR[;s,roZN$)<QG&j!;Ns&)3{S$-[qTCm,bdD >-Et9h(Q1l!.9$?');
define('AUTH_SALT',        'wWK[A[|S>wenew>N;RQ i+.+-!i9+mY_;7U<my:.zhO|CDmPM~I,Jjx~2^*~H-%k');
define('SECURE_AUTH_SALT', '7u[?.B`2G88^ELNyu6Qaq?A%`8&U=@bbRg->8BCP:`0zIZX7*Y&[Q ?QM#pod/3C');
define('LOGGED_IN_SALT',   'd,aj|Hp!x)J7#?iP32mDC`h*2 E<&<iq1|CY3~^/p~e,JdDMmJv_qhw74;B 4g3*');
define('NONCE_SALT',       'I^A^;[}EkE uynev`N3l]?`FNPqwNu(eTnC}bk,MTe(i$Ko{^rp$P^_Gj+7U0t{h');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
