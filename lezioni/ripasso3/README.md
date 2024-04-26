composer create-project laravel/laravel:^10.0 ripasso3
cd .\ripasso3\
php artisan make:model Product -m
php artisan migrate

//personalizzare il file routes/api.php

 php artisan make:controller ProductController -r

 php artisan make:model Category -m
 php artisan make:controller CategoryController -r 
 php artisan make:migration add_fields_to_products_table