partendo dal progetto corsoss2
progetto con:
    utilizzare il progetto al corsoss2

implementare autenticazione

creare un database (es: corsoss-breeze)
installare LaravelBreeze
https://laravel.com/docs/10.x/starter-kits

composer require laravel/breeze --dev
php artisan breeze:install

php artisan migrate
npm install
npm run dev

******
installare laravel sanctum
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider" --tag="sanctum-migrations"
php artisan migrate
---
verificare di avere in app/Http/Kernel.php
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
---
your User model should use the Laravel\Sanctum\HasApiTokens

Create and Update LoginRegister Controller
php artisan make:controller Auth\LoginRegisterController
-- scrivere il LoginRegisterController
--Create and Update Product Model with Migration and API Resource Controller

Define API Endpoints in routes/api.php
/ Public routes of authtication
Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

    // Protected routes of product and logout
    Route::middleware('auth:sanctum')->group( function () {
        Route::post('/logout', [LoginRegisterController::class, 'logout']);
        Route::get('/utenti', function () {
            // Restituisci i dati degli utenti come JSON
            $utenti = json_decode(File::get(public_path('storage/utenti.json'), true));
            return response()->json($utenti);
        });
        Route::get('/utente/{id}', function (int $id) {
            // Restituisci i dati degli utenti come JSON
            $utenti = json_decode(File::get(public_path('storage/utenti.json'), true));
            $utenteTrovato = Arr::first($utenti, function ($utente) use ($id) {
                return $utente->id == $id;
            });

            if ($utenteTrovato) {
                return response()->json($utenteTrovato);
            } else {
                return response()->json(['message' => 'Utente non Trovato'], 404);
            }
        });
    });

postman
creare le chiamate tramite postman per
* registrazione
* login
* accesso ad utenti
* accesso a utente
