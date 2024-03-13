https://kinsta.com/it/blog/api-laravel/


composer create-project laravel/laravel laravel-api-create-test
php artisan make:model Product -m

nella migration:
$table->string('title');
$table->longText('description');

nel model product
protected $fillable = ['title', 'description'];

php artisan make:controller ApiProductController --model=Product
dentro il controller:
$products = Product::all();
return response()->json([
	'status' => true,
	'products' => $products
]);

creare metodo store
public function store(StoreProductRequest $request)
 {
	$product = Product::create($request->all());

	return response()->json([
    	'status' => true,
    	'message' => "Product Created successfully!",
    	'product' => $product
	], 200);
 }

creare la request
 php artisan make:request StoreProductRequest

 in route/api.php
 Route::apiResource('products', ApiProductController::class);

 php artisan migrate

nella request:
 public function authorize(): bool
    {
        return true;
    }

lanciare:
http://127.0.0.1:8000/api/products/

si otterrà: {"status":true,"products":[]}

*********
autenticare un api con sanctum
*********

composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

----
dentro Kernel.php
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            //\Illuminate\Session\Middleware\AuthenticateSession::class.
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

	---
	php artisan make:controller UserController

	impostare il UserController
	 -----
	 aggiungere dentro route/api
	 use AppHttpControllersUserController;

Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::apiResource('products', ApiProductController::class);
});

Route::post("login",[UserController::class,'index']);
copiare il contenuto dello user

-----
ora con postman lanciare le api e copiare il token ricevuto da login e poi utilizzarlo come headers - authorization bearer

-----
