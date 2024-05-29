<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Installation

Clone the repository

    git clone https://github.com/weblineindia/Laravel-Stripe-Payment-Integration.git

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Install stripe package for laravel by below commands

    composer require laravel/cashier

After installing the package, publish Cashier's migrations using the vendor:publish Artisan command:

    php artisan vendor:publish --tag="cashier-migrations"

Then, migrate your database:

    php artisan migrate

Add a user in table via seeder, run below command to add a user to users table:

    php artisan db:seed

Login to your Stripe dashboard and use the "Publishable key" & "Secret key", and add those to .env file STRIPE_KEY="Publishable key", STRIPE_SECRET="Secret key" like below:

    STRIPE_KEY="pk_xxxx_xxxxxxxx"
    STRIPE_SECRET="sk_xxxx_xxxxxxxx"

Add below code in config/services.php file
    
    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

**General command list**

    git clone https://github.com/weblineindia/Laravel-Stripe-Payment-Integration.git    
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    composer require laravel/passport
    php artisan migrate
    php artisan passport:install
    
- `php artisan down` -> This command will put the maintenance mode screen if any page is accessed but won't bypass any functionality.
- `php artisan up` -> This command will bring the website back online and functionality to access everything.

- Cache clear commands to use in root of the project if any changes done in routes folder files or clear cache for the project.


        php artisan cache:clear
        php artisan route:clear
        php artisan route:cache
        php artisan view:clear
        php artisan config:clear
        php artisan config:cache
## Database Set up

- Access the database using UI access or commandline and export it to some directory.
- Create new database on new database server.
- Update .env configuration file with database credentials.

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate

## Folders
### Laravel 
- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the code controllers
- `app/Http/Middleware` - Contains the auth middleware
- `database/migrations` - Contains all the database migrations
- `routes/web` - Contains all the web routes defined in web.php file

### Execute Laravel Code
- Use below command
    
        php artisan serve
- Above command will start laravel project running
- Use the URL from the terminal and paste it in the web browser
- Append "/checkout" after the URL pasted in the web browser

## Sample Cards for payment from Stripe document
    https://docs.stripe.com/testing

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
# Authentication
 
This applications uses OAuth Token to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about Passport.
 
- https://laravel.com/docs/10.x/passport

## Contact

We have built many other components and free resources for software development in various programming languages. Kindly click here to view our [Free Resources for Software Development](https://www.weblineindia.com/communities.html).

---

Happy coding! 😊
