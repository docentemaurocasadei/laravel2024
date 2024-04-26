

parte 1
implementare il file delle rotte api e il controller CarController con
- metodo per leggere tutti i modelli di auto con il brand
- metodo per leggere una sola car
- metodo per inserire una car
- metodo per aggiornare una car
- metodo per eliminare una car

implementare il file delle rotte api e il controller BrandController con
- metodo per leggere tutti i brand

testare le route create con POSTMAN

parte 2
- aggiungere il controllo dei campi con un CarRequest (validazione)

parte 3
- utilizzare laravel sanctum per proteggere le route
installare sanctum
creare metodo getToken in controller TokenController con regole di validazione TokenRequest
creare da tinker un utente
App\Models\User::create(['email' => 'admin@email.it', 'name' => 'admin', 'password' => H
ash::make('miapwd')]); 

php artisan make:seeder CarSeeder 
php artisan db:seed --class=CarSeeder