obiettivo: realizzare una api per la visualizzazione di prodotti protetta da sanctum
POST passando nel body un utente: demo su http://localhost:8000/api/sanctum/token
GET protetta da sanctum e passando token: demo su http://localhost:8000/api/products

svolgimento
creare route api con 
Route::apiResource('products', ProductController::class);

creato models Product
creato controller ProductController
creata migration per table products
creato seeder per popolare 50 prodotti

installato sanctum

creato utente da tinker

create route per fornire token e messa su POSTMAN
create route per lista prodotti richiamata da POSTMAN
