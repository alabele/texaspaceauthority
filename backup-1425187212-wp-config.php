<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'texaspac_wo1309');

/** MySQL database username */
define('DB_USER', 'texaspac_wo1309');

/** MySQL database password */
define('DB_PASSWORD', 'k9jVs8QENztT');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', 'Xy/eL$<QqzXVB;XAcrOYkv(?|bUMHkQvFLkxjOhYdQvKe]Y}<hvg=lWm^CJT(vr;TmGQ==Ay/WbzT^csFoqbtYm])Ch=)eLJdqzQ}HlGtApj)jd?hXhUF%mYgG}o@uuz');
define('SECURE_AUTH_KEY', 'X}OQqc}ugCoAoXyDt[IjKEAZ)Yl|Zuuwv=?v@$ZyzX%uiMHgxdaixB*=VO+fFJhqbkpgMaZQ])pE|BdEkO|BAU$ytrOM)dGd@Tay-o$]*>@^j]]*TN|;*b_Gz[xLwyf!');
define('LOGGED_IN_KEY', 'sl%?nqk;K=|d^]tu%Z$;JWHsrTeoVSgXpuB=CqpFU>@X_Gbhg{>cRcf<XnI*-Wtre)iH|>J+;OLSJG[ZV&?tqpgCeqM*ss?ub{G!qRj)qX>qSoos!GWwlhlYy=zD+Bq/');
define('NONCE_KEY', '|eW$Dd-Dfs;%hLGuT<%ECHuTJmx!WJatXX|G{dSZAYY]^>V-vFK<bUjmenLA^sUnlWapg)S<TJKT&qcH;;x*|-@XTvYUqWGzr}itok%$v!BKFrsdfDpYrK!UfyitKW>y');
define('AUTH_SALT', 'K_fNu(|$=X]RBpYUe/|Gm{qA@bijE&U%^o*f%}$Vie=P<F_Rk%lF(khvUfwU-wi}XWx!y!*DlbeY)@bbLluPw>JXhvabWCSFL$Aab%s=A*wQJo(!>gfBOtkDaKVkzmp{');
define('SECURE_AUTH_SALT', 'C&O}nqkl^uQ-dG>HVSbMdAtaz;x%>(w{b]rJAgcv-j/snCFbmLYDE]CgysAZN*LgJUA$DNg|}D;iFd-dg+vCwd)&XyTm>yP(mnJWJC/X!h;KfHK=]*RDSHGA!xD@OtHN');
define('LOGGED_IN_SALT', '&Ylkke-&-SkV!_{Xy-LSXh^<YI;zjaH=U|W>PYB@cLYJ?c@E@w|f?;;ZZCASj=ur};@Hx;=Pa>)UgGxn/u&c*LKl&uJti@fM^VKwlB!qt@[;t<Pwc{^&%I@mf_Nh=S<C');
define('NONCE_SALT', 'T@NZ@*(+P}MgpSG*nE(zGO<L!Bw!DpuaL}d%deo?W@eKE$T]?R+Ag%n)Oj-WuNA+MfO|n^&&![^=m/vr/x-wp[ihADJ$$TRKL&ARvdQZ/;ntW]VA};F<pw_g]SFk$Qgj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_vztj_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
