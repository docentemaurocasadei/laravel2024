- creare un progetto con 2 modelli
Product
 - id, name, sku, price, category_id
Category
 - id, name
impostare le relazioni tra i due modelli
caricare alcuni dati da phpmyadmin

 creare una api per leggere tutti i prodotti e tutte le relazioni collegate
 farlo con Product::with('Category')->get()

 installare sanctum e proteggere le route

 creare la request
 php artisan make:request TokenRequest 
 definire le regole di validazione

 creare un metodo get-token in un nuovo controller TokenController
 inserire uno user tramite tinker

