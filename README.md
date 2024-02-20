Installation

# Déplacement dans le dossier
cd garage_vparrot
# Installation des dépendances
composer install
# Création de la base de données
php bin/console doctrine:database:create
# Création des tables (migrations)
php bin/console doctrine:migrations:migrate
# Insertions des jeux de données (fixtures)
php bin/console doctrine:fixtures:load --no-interaction

OU 

Utiliser est importer le fichier "garageDBaucasou.sql" qui contient toutes les données

# Utilisation

symfony server:start

    Si vous utilisez Composer, il faut installer le Web Server Bundle :

composer require symfony/web-server-bundle --dev
php bin/console server:start

compte : admin = admin@admin.fr mdp=admin33
        
