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
define('FS_METHOD', 'direct');
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tarun_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Redhat@123' );

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
define( 'AUTH_KEY',         'C5IN+_%UzPua~K~F1v!Wkud$U8e_;_tXY3s6`F|23 o%YY }lcH+f$L|):a6#3Ku' );
define( 'SECURE_AUTH_KEY',  '!%1Qgm>+O09@3[wu(b{+{H 9YE2b[<&ei/y}>bIunOzg](l3xnP0>b)6jLt$JTTa' );
define( 'LOGGED_IN_KEY',    'KvTs+pnN={u!LgsQ{jg:~s#Sg65W:kae@JD3Ra5q8yE5ib_v1+7**A6A7W#4{!J|' );
define( 'NONCE_KEY',        'l}Q;h$(12?Mg%I_Vty5Y {UzjU!H:1{l>SHyo~v.=E,_j*W0SxE+E)v/#pZEZPc+' );
define( 'AUTH_SALT',        'JR6eod.[+qz(,_l5}zbEr,aW2fl^Y:puG 1;w73<@waD;/H5nZ4Kx*P^qR}%6nK3' );
define( 'SECURE_AUTH_SALT', '|g99mk;H ^*tS^iVREk+B!VxocXk,r}bE jhfu)/a7hEgjLiq4jw06r|Sg8Ux%HB' );
define( 'LOGGED_IN_SALT',   '`M)59MF8D>p8GJ-R;wYv}[m|t G_! ]7pdZ2/CmQE0 =]B{55&6vyx_c}o62HPgM' );
define( 'NONCE_SALT',       '-rmXN|eN&>ORBzHk%)9{VG|j0=8.IU<FaA-,vR{3lKU*xOUBf-`~Y[y*Lg*NYG%0' );

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
// define( 'FS_METHOD', 'direct' );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
