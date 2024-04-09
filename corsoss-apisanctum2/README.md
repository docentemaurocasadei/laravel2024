creare una api con sancum - 2 esempio

composer create-project laravel/laravel:^10.0 corsoss-apisanctum2
cd .\corsoss-apisanctum2\
composer require laravel/sanctum
installare Provider: Laravel\Sanctum\SanctumServiceProvider ........................................................... 6

decommentare in kernel api 

\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
configurare .env
- database
php artisan migrate
php artisan tinker
User::create(['email' => 'admin@email.it', 'name' => 'admin', 'password' => Hash::make('password') ])->save()
User::create(['email' => 'admin2@email.it', 'name' => 'admin2', 'password' => Hash::make('password') ])->save()

creare con POSTMAN una route in POST che invia a /api/get-token utente e pwd e riceve token
creare con POSTMAN una route in GET che passa come authorization il token e riceve l'utente a cui corrisponde

