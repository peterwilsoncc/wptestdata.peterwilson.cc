<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', '%%DB_NAME%%' );
	define( 'DB_USER', '%%DB_USER%%' );
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
	define( 'DB_HOST', '%%DB_HOST%%' ); // Probably 'localhost'
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================

if ( !defined( 'AUTH_KEY' ) ) {
	// These are backup values and should be defined local-config
	define('AUTH_KEY',         ':Pve?b+;S.`MrYtA=4ou+:P 4sYts3&FXq<-Iwto^mX{qWbU`x&S,$5Q=l!n-$4B');
	define('SECURE_AUTH_KEY',  'T(7JJp4l!@CBfm61JcJP-(wXvcEIzR|Ab*Yo.QtGYNR|-,)m_-IC-X](jbo]V1-G');
	define('LOGGED_IN_KEY',    '0FM<QM+u+L28qvmuAms]C(/7}E&`ZREt&W<Fs|bAQenGlCEUmC+3]k-4N1~eiZ9r');
	define('NONCE_KEY',        'C$J1O-!++y+hwa+5,gh34[35.=(B} E|~jGjZbw@Nu()#yFk,t;`Zl,B~)W/dV!%');
	define('AUTH_SALT',        '&?cM>];Z;z!dm^K%p3gc x}C-%,3}/Mg|05.Y}&v:tc?fIfyB~43Z{a`E+QtDRHh');
	define('SECURE_AUTH_SALT', 'YJ@d[h)$XY+mPTN[;6#.i>>#3-uMdNx(>zgf-Z1>]C#iQ||$mTJc[ I%+#s|CCW+');
	define('LOGGED_IN_SALT',   'fw(9@&wXs4>bEN~#xVq_vf(u.dT%~]&re{j-:lNu^rZTORrj8=p|4scQ$J%>mf).');
	define('NONCE_SALT',       'MbZdz_y0C)8ZIBT}.Ds|-o!(KM7,+X/X[AHgoYk+3D%?lH6J+gs^$p3h}<|#FT5w');
}

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
