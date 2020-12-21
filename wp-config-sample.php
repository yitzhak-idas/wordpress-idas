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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6Qv5Rl5SJgbIYJRjIs4CPKJGp/TOcMVEeJg9nBHAlkcY5O0wL22B7kuadGPp5ChYd/Nik84b0HN8N/fW20Ixow==');
define('SECURE_AUTH_KEY',  'uGYVDRQda3trram+YspLyncKW/ptcMqYitg+8aQrsmRRfPvwL03XQhKZsJcDqgJK/jvTey1YossuCXnU97hR4w==');
define('LOGGED_IN_KEY',    'XkmU2Oz1U0qkucvu5CflQ3TuyxBdiunSdKzbxvEsE27Lc+TfONhkjpHFW+VSXbmaaWGemcYD40GMghqws2t/4Q==');
define('NONCE_KEY',        'AaPFtwX7VTbP6wIxCWGxzQn96Wa8g3oPmOUM+JhvWc6lQ67tWNA0cpVh5oikSmtt64lgpJq0nVKLQdsFFxOsKg==');
define('AUTH_SALT',        'bMD8VX2dTyZAw0sXqabeHdkyUMcDL0HFqRiH44jBLi7zCpdB+YG6TxXhwEB8jFwMnwhQLlE5t2gUcwJ2Vje2aA==');
define('SECURE_AUTH_SALT', 'qDLYXp49Eqhs4+4oeUiJVuYvfWFCsSxjW5boRoGI+fY6yiwC5vwtJBAC8PO5lVoIj1P7P7TJjDJTJbBinTuntQ==');
define('LOGGED_IN_SALT',   'GjtvInUhiBugwsRrEAzQrQJU+89btWcOrAfbGIClUVdYMiIDF/6pXCDnrUlhushTVZwyFe01ru66AMUrQbFzWQ==');
define('NONCE_SALT',       'SUUWMibq8DArv80hmKBKG85kvcCPSd3MParO94+Za6sKnI47PXH+IJgKc/8mh3uHS7IdqOP8VPR+yrcm8Qty3g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
