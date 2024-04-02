esempio completo per API CRUD

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

creare model, controller, migration per product e category
es per category
 public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1', 'max:50'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validate();
        // $validatedData = Arr::only($validatedData, ['name','category_id']); può essere omesso, i dati validati sono già filtrati rispetto alla request
        $category = Category::create($validatedData);
        return response()->json(['message' => 'Categoria creata con successo', 'category' => $category], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:1', 'max:50'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $category = Category::findOrFail($category->id);
        $category->update($request->only('name'));
        return response()->json(['message' => 'Categoria aggiornata con successo', 'category' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Categoria eliminata con successo', 'category' => $category], 200);
    }

creare route
es per category
    Route::apiResource('category', CategoryController::class);
    Route::put('category', [CategoryController::class, 'update']);

creare in POSTMAN:
- GET lettura categorie
- PUT/PATCH aggiornamento categoria
- POST inserimento categoria
- DELETE cancellazione categoria
- GET lettura prodotti
- PUT/PATCH aggiornamento prodotto
- POST inserimento prodotto
- DELETE cancellazione prodotto

