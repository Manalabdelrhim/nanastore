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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'store' );

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
define( 'AUTH_KEY',         '%.C*k`Qr2#_zraTX#,c-Zgul}>M4m?E>DL#Gr=ZjQ(=3WGCFcq`.PngJ5=kA A.@' );
define( 'SECURE_AUTH_KEY',  'MC_*(2hR5n#oE!6aV~@GSeMNl,g=!,fj O`MZPrS/2f5wO{,P^Rm}a=%c8F7.%e3' );
define( 'LOGGED_IN_KEY',    'C2=aT6L`j:kdJ=!`2%Zd^ ](R%D7F_eC>r6bg9-EY__#hFet]BMvXl$:~@;KIf#~' );
define( 'NONCE_KEY',        'P)F{iN[^|zRu(_I+4mk$P:!Zu2EctiHUmljX.2PJV1d$<`t-U``_pR[IM~Gw!iE ' );
define( 'AUTH_SALT',        '_C,yg}X0o.h#q<EG,qCwc+h5h<$jLoJhMW OmBSPX%QQK}sJYPqqJLlLMbhrX@st' );
define( 'SECURE_AUTH_SALT', 'yUf9<Z{vcmcL&@}`qX4c]rcY 5yu]X.Topy+Z;5.36TC,Df. ,]7 VrO#Nk5:*$d' );
define( 'LOGGED_IN_SALT',   '_LO)^=#2!:m}s>B%A(nv:yp|%){xDygluLDQ[fe8[LL$1{(x< u;3@/^o <Ich8`' );
define( 'NONCE_SALT',       'J6}|C S8k5Fhv1,l@<qa+MHIbKYrs2f@(a8rM]+[t|NXL=HmC<~WQ<g1scLT!T8 ' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
