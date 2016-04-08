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
define('DB_NAME', 'texaspac_wo8484');

/** MySQL database username */
define('DB_USER', 'texaspac_wo8484');

/** MySQL database password */
define('DB_PASSWORD', 'XSwatPzLG1Y2');

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
define('AUTH_KEY', 'C{s*fhqCR*>BobKvu$jQfK/uysr%fBmPgnF||;T+MKwfiMF?Obb|mXwZTFfJJifAE]b%d=Yxrral@[<Mc@wMZk+YS)]OrK>z*y!&K<k%D!C<$]LHt<}Q-wuyMNE{O>CD');
define('SECURE_AUTH_KEY', 'bUt/XTu/;{Ngx+Q}$DA%Ij$<Z*W)mX<h=dq!UW@vxj$pb|[A|W<ZV/m&oz?FO?%dwf$kEj}J@?uj<l(UwA]@p^*bnLCb]nMO/NRQJ{(JOOHBDcQpqMa-eJZZjO?k{Yka');
define('LOGGED_IN_KEY', 'Vj/FiuycyVz+DNiZDZ|!wb&Ua%I$Gp|IQ_Ie^[@=K<qe!XanHDinFVHY]NJKVcstVBWP}MpjPLJFJeWCvPQKueZokUesgFjLu-ykeHa%c)Zu|ns)$S%Jx?(!qOM$u*;}');
define('NONCE_KEY', 'YQg^>Q_YqOHLK)[cAG|+G/-<>)MOAx&k!q<>sm[dHZHD|c%%Qr^oWTt$]Yjp/ERYP||T^FmU&>DJkg]SjXMXcV;hC?VKaOWSQK/MF>JrG+L%t[X)bW;tgGzrzBT+R^Qr');
define('AUTH_SALT', '%qpL]mHCf&dQE$NNr+E-{ws^fHOMhcm-)@&^d(bctf!HQLVnHP&<>>gbE$ifEGDY{CSlaJUpABa__<qhSflkhZlDCo>==BLE/z_pXYZ+FEfoKTr]kP=c}+e?KlFFAkbZ');
define('SECURE_AUTH_SALT', 'NiOX;o=}uT*RYY[XWSKsgeGfZ*%]qJZvT=uzSD=dxn%xp(-ohf+HD*M_/Cuk!/Hx%uCfv-!l-j+DnTtHEyZlwhH<W/OFVuwAXI|RaByARP@a$I|J*mNwl&[YViR>Sv[(');
define('LOGGED_IN_SALT', 'e(eT{JA?Uw^zqI&QvfOYnlEF)&D}=WeHK||-?MuA=vGDs$_{&OLvJzf?jqd=F/b(Z&|$Ke&>=!ciX!$HUK^QNJuhRejvXrH;h=vJB&eq=WMNBd*Hz|boLz;PSHf}SXK-');
define('NONCE_SALT', ']iV!rPf|*-Hps*)gcXzBcj(Sn$)qcnvWIVVV_}CmduQ]*BnaW[SX*j*(LVk_z*=Tk}|qO/HQfDe%vJyGXBx%/$tuV*zW>@-U)Dclt&G(=x(JuAhasi|bu$ouaUXwh<P>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_bcyw_';

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
