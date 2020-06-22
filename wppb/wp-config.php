<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_plugin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!/Avyms/$,fHgz*x5RLl+vytVV0[7MW}=z`%a}vy,+)b5#vx?3#KO/sOw4L!X&<2' );
define( 'SECURE_AUTH_KEY',  'A+GmJnZ=^xyiH>O.`A6z8~>_v.R9`RzJ|?3/f4]dtq586iq9]_#;rzr5c@hlk$lR' );
define( 'LOGGED_IN_KEY',    'Kjj]:l8NiU.:GHX]R&K4%n1Ke)y2!n*92dtf:s$n-u`1P=!_yom j6tQ0$)nzV2/' );
define( 'NONCE_KEY',        'Uek2sDnJyv#=Zw #uJI3g-`8z SG^Zl%6[-MQ=0g<@h}^eJ+yp|M[tj@_h:wp%[i' );
define( 'AUTH_SALT',        '|&9$RD?s1~&gGOGH]t+{T!n`^%-VM7I:8wdT&TV>*.}9*o.DSh4>&ESS&zu4C:h-' );
define( 'SECURE_AUTH_SALT', '-p/]}#H8=UnW75:q?H;u[Iqs]T3TFA2^s?waptU@pqbx;kd;[8#|icuWf+3Fj/H!' );
define( 'LOGGED_IN_SALT',   'P-1|h==ioRyDX0nk`nbTwjA([)7Ni^;U&FZpC1PQj 5a?T@i/$9@Ys/PJb{Ckz1`' );
define( 'NONCE_SALT',       '[+u!`oPuV5| ;HA+&`lS2l8wx9(n7X-hTJer~KC7$#4Dbh-fzWsg7JiI0zyBee4Y' );
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
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
