composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

php artisan migrate

'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

User::create(['email' => 'admin@admin.it', 'password' => Hash::make('password'), 'name' => 'admin']);  

creare api in postman

POST - http://127.0.0.1:8000/api/sanctum/token 
con email e pwd dell'utente creato

ricevo un token esempio: 1|nADnvgwO6HbNNX172OsQalKhxUM9HsWBHaCbVKNu196eed5f

--------------------------------
lettura dei dati:
creao route protetta:
Route::middleware('auth:sanctum')->get('/products', function (Request $request) {
    return response()->json(['ho letto tutti i prodotti']);
});

lancio route da postman con bearer token 