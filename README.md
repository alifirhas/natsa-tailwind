# NatSa - Laravel 8.0+ Jetstream and Tailwind CSS

Project ini Dibuat dengan bantuan template
- Admin Template oleh [Miten5 Larawind](https://github.com/miten5/larawind)

## Requirements

- Laravel installer
- Composer
- Npm installer

## Installation

```
# Clone the repository from GitHub and open the directory:
git clone https://github.com/alifirhas/natsa-tailwind

# cd into your project directory
cd natsa-tailwind

#install composer and npm packages
composer install
npm install && npm run dev

# Start prepare the environment:
cp .env.example .env // setup database credentials
php artisan key:generate
php artisan migrate
php artisan storage:link

# Run your server
php artisan serve

```
### Project made possible thanks to:

- [Miten5 Larawind](https://github.com/miten5/larawind)
- [Laravel Jetstream](https://jetstream.laravel.com/1.x/introduction.html)
- [Tailwind CSS](https://tailwindcss.com/)
- [Windmill Dashboard](https://windmill-dashboard.vercel.app/)
