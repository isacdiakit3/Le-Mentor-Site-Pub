<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'press' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'Isac' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '72430494izoo' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'RFinw!$XKIpf7#v+5Q<&i2* 0n~lFodaetS;^(|.o tENjwjA*8:0IwbNsB~k!z{' );
define( 'SECURE_AUTH_KEY',  ' 3oK:|_t+hD_nT190jD!nm*c1C8iVbhC|6gIUG,a%F2LgMvM]mk+s`~>F(-]t*K;' );
define( 'LOGGED_IN_KEY',    '#AoWxf!G9<Ur.$Pvw0e8@aFEK<0G17d mzuHG.)A9Vk}3{U;.]{6;sIQvcij9:Su' );
define( 'NONCE_KEY',        '[7*tjU%l)/rt!aZBD[jPvd~6iMLYi,tuOzz`Gm<ng@GS=Z2auh:P3eq]4xrou%&/' );
define( 'AUTH_SALT',        'e*Fg//R}`XP_i=fmA#vK0g%Q$.<uO)94$~pgpF0DB5Z]F/Ip[ESM1Er>Xye)~9%V' );
define( 'SECURE_AUTH_SALT', 'MTNo+*FKYnP;S W41`C4OMI2Th+`n[wgSJe}pQhTl#epA;36jh_~wv~Y+l}@aqzp' );
define( 'LOGGED_IN_SALT',   'UuPo%ew1PciBDz]0 #:|(o/bEWAb<68K[>L(f Q Ulfs6<9gZ#ZU2#H=uP%/fu,}' );
define( 'NONCE_SALT',       'Xn/?Y:Vg0Y{W)-x7gw43}-zMO-Z+nC5m-?`7jAWPp`$iz?S;XS f5}W2zC62xF76' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
