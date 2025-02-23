# 🏡 Gestion de Réservations Immobilières

Un projet Laravel permettant la gestion des réservations immobilières avec une interface utilisateur moderne et un tableau de bord d'administration.

---

## 🚀 Fonctionnalités

- ✅ **Authentification avec Laravel Breeze** (Inscription, Connexion, Déconnexion, Réinitialisation de mot de passe)
- ✅ **Gestion des propriétés** (CRUD des propriétés avec Livewire)
- ✅ **Réservation en temps réel** (Composants dynamiques Livewire)
- ✅ **Dashboard administrateur** avec **Filament**
- ✅ **Design responsive avec TailwindCSS**

---

## 🛠️ Technologies utilisées

- **Laravel** - Backend PHP
- **Laravel Breeze** - Gestion de l'authentification
- **Livewire** - Composants dynamiques
- **Filament** - Interface administrateur
- **TailwindCSS** - Stylisation rapide et moderne
- **MySQL / PostgreSQL** - Base de données
- **NPM / Vite** - Gestion des assets

---

## 🎯 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- [PHP 8+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js & npm](https://nodejs.org/)
- Une base de données (MySQL, PostgreSQL ou SQLite)

---

## 📦 Installation du projet

1️⃣ **Cloner le projet**
```sh
git clone https://github.com/sonia3004/laravel-test.git
cd laravel-test

2️⃣ Installer les dépendances PHP

composer install

3️⃣ Créer le fichier .env et générer la clé d'application

cp .env.example .env
php artisan key:generate

4️⃣ Configurer la base de données
Dans le fichier .env, renseignez les informations de votre base de données :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_la_db
DB_USERNAME=root
DB_PASSWORD=mot_de_passe

5️⃣ Exécuter les migrations

php artisan migrate --seed

6️⃣ Installer Laravel Breeze

composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run dev
php artisan migrate

7️⃣ Lancer le serveur

php artisan serve

Accédez à l'application sur :
🔗 http://127.0.0.1:8000
🔑 Accès à l'Administration (Filament)

Si vous utilisez Filament, accédez à l'interface administrateur via :

http://127.0.0.1:8000/admin

Pour créer un administrateur :

php artisan make:filament-user

---

## 🛠️ Commandes utiles

⚡ Mettre à jour les dépendances

composer update
npm update

🔄 Vider le cache

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

🎨 Compiler les assets TailwindCSS

    npm run dev

