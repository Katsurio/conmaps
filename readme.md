<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

### [ConMaps](https://github.com/Katsurio/conmaps)

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone https://github.com/Katsurio/havenagency.git

Switch to the repo folder

    cd havenagency

Install all the dependencies using composer

    composer install
    
Install all the front end dependencies using npm
    
    npm install

Use the environment file I included in the email to make use of the Google Maps API key

    .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
    
Import the MySQL dump file into your database to populate it with test contacts/data
    
    .sql

Start your preferred local development server (I used Homestead)

    e.g. php artisan serve

Compile all the front end assets using npm

    npm run dev
    

**TL;DR command list**

    git clone https://github.com/Katsurio/conmaps.git
    cd conmaps
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    import .sql into database
    start local server
    npm run dev


----------