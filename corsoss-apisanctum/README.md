composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

creare database 

php artisan migrate

'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],

creare route 
Route::post('/get-token', [TokenController::class, 'getToken']);

creare controller e metodo per token:
class TokenController extends Controller
{
    public function getToken(Request $request){
        //controllo utente e pwd
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Se la validazione fallisce, ritorna un JSON di errore
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        // Tentativo di autenticazione
        // Esegui la validazione e ottieni i dati validati
        $validatedData = $validator->validate();

        // Tentativo di autenticazione
        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];
        if (Auth::attempt($credentials)) {
            Log::debug('valide');
            // Se le credenziali sono valide, genera un token
            $user = Auth::user();
            $token = $user->createToken('api')->plainTextToken;

            return response()->json(['token' => $token], 200);
        } else {
            Log::debug('errate');
            // Se le credenziali non sono valide, ritorna un errore
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}


da tinker:
DB::insert('insert into users (name,email,password) VALUES (:name, :email, :password)', ['password' => Hash::mak
e('password'), 'name' => 'Mauro', 'email' => 'email@admin.it'])  

creare una rotta protetta dal middleware auth:sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

creare in POSTMAN la richiesta ed eseguire prima il get-token e poi una rotta protetta da sanctum

