composer create-project laravel/laravel:^10.0 ripasso3
cd .\ripasso3\
php artisan make:model Product -m
php artisan migrate

//personalizzare il file routes/api.php

 php artisan make:controller ProductController -r