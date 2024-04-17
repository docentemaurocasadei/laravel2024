- creare un progetto con 2 modelli
Product
 - id, name, sku, price, category_id
Discount
- id, name, amount
OrderDetail
 - id, order_id, product_id, discount_id
impostare le relazioni tra i modelli (BelongsTo, HasMany, BelongsToMany)
non creare tabella orders
caricare alcuni dati da phpmyadmin

 creare una api per leggere tutti gli ordini e tutte le relazioni collegate e una per leggere un ordine con id passato in input e tutte le relazioni collegate
 creare OrderController
 farlo con 
 App\Models\Order::with(['order_details.product', 'order_details.discount'])->get(),
 e con 
 $order->order_details()->with('order_details')->with('product')->get(),

 installare sanctum e proteggere le route

 creare la request
 php artisan make:request TokenRequest 
 definire le regole di validazione
 creare utente


 creare un metodo get-token in un nuovo controller TokenController
 inserire uno user tramite tinker
App\Models\User::create(['email'=>'admin@admin.it', 'name'=> 'admin', 'password' => Hash::make('password')])   

lanciare OrderController e ritornare lista di ordini ma solo se 
