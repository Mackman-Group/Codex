<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

 if (file_exists(dirname( __FILE__ ) . '/local-config.php')) {
  include( dirname( __FILE__ ) . '/local-config.php' );
  define( 'WP_LOCAL_DEV', true ); // We'll talk about this later
} else {
 
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'codex');

/** MySQL database username */
define('DB_USER', 'codex');

/** MySQL database password */
define('DB_PASSWORD', '5bM6hK!V');

/** MySQL hostname */
define('DB_HOST', 'localhost');

}

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
define('AUTH_KEY',         'hcM|b3*S~CiqEYas|z-;7ny.&SPp?eV!C:-`D2zY/5IP_M^#LGk*H*;`x6Kr8(Xy');
define('SECURE_AUTH_KEY',  'mT@9Tr1twLf )mrciLg~,!xX{KX-IvHc|4eAE{1?o?&.7b7j #1gq)f60x,QoJ8=');
define('LOGGED_IN_KEY',    'H%X8$(w+E:s&$bQPGXijiGD3^(E%@~*v:)/a+^)U!NGCb+0wBq3wApj2$F:nq.8,');
define('NONCE_KEY',        'd(p&pf?ig27_%u^b)z!Vge@N!2F;qE,I!f42`#Gc(O`{]z7f0gN})]2))[C*{%+s');
define('AUTH_SALT',        '&bfa:W~]Mcw wglSz}7|-tQ+Kjg2@Fb^SAgIjDN&(|QmG[UbZm|5e-3Yu U9!:2.');
define('SECURE_AUTH_SALT', 'b1MGy},bAs?^zM+FIr54KgeEn/)7bY.,`6:.Dm6r}3}*(-z~[9R|YmS]IuV!}Y!0');
define('LOGGED_IN_SALT',   'I^q?Oa-{N/$aQi0wgR#cJo`8|iWZ8D *qIIUsJtPb(~|1qvK-EC[U!.FZ.9T|*6+');
define('NONCE_SALT',       '112_o)e$?+s^`v=Kt7%xFg!Irs3R&,:OPG[a2+[fE=JC4PIra>kyr n~KcH9rTD,');

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
