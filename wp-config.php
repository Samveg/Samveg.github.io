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
define('DB_NAME', 'mgc_website');

/** MySQL database username */
define('DB_USER', 'mgc_admin');

/** MySQL database password */
define('DB_PASSWORD', 'aFhC15+m');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
//define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
//define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q`b)M.4I 6e0at)/Qsx|7+WDLE;KnV4=o><OW&l|_q@.+z!#67Ecyo_}=>0#F<?e');
define('SECURE_AUTH_KEY',  '/0T$2E0,aegUPki+fcWk:hvn`ZtR<If_Pj7xu!LS0pwT]Q25X!vYClQCPqVnza/6');
define('LOGGED_IN_KEY',    ':i;71(gL=c?$`7o,dTvQg,Amyz%hgi&g5f0nqo%$B8_BLa]oR+lDrc>YoLu,X(#|');
define('NONCE_KEY',        'a9]n4Tq;/qfAbnE0;Zni9I3L5~km6_J_KpQ[$@ luJr#ify~T2Ta?k0gKLQ6wrM4');
define('AUTH_SALT',        '8k[*%)8eNoflSb;l=]Yl=P[v9u<nSt0NdsTbEJW>ScCot%j^5$Qv-eU?I|^koRrP');
define('SECURE_AUTH_SALT', 'tHrw6qdhCZ}*mIh4nE^utc;K1aE]RuHopj8R,yS[RmDXgm7!.TT@r0~od]o&1#^a');
define('LOGGED_IN_SALT',   '|)m,fO2;.HU|?[85ZmI_:zgO{+LxMV-Y9?wRG#;YFj._?yTt_E5:{Wor{-PS3~P ');
define('NONCE_SALT',       'C.sJ*w_f4><04_n|Sy/7!Wq0d!qkhVE@fP* 454}Nh7>O1r~F|ySI~O-^o7l@W >');

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
