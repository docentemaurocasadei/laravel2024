obiettivo: realizzare una api per la visualizzazione di prodotti non protetta
GET non protetta: demo su http://localhost:8000/api/products

svolgimento
creare route api con 
Route::apiResource('products', ProductController::class);

creato models Product
creato controller ProductController
creata migration per table products
--creato seeder per popolare 50 prodotti oppure poloare da phpmyadmin
lanciare da POSTMAN url GET http://localhost:8000/api/products
