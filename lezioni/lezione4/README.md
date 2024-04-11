>composer create-project laravel/laravel:^10.0 lezione4

modificato .env

>php artisan serve

>php artisan make:controller AuthorApiController -r

aggiungere route /authors nel file delle rotte api.php

creiamo su POSTMAN le request per
- index, store, update, delete

validiamo il name e surname dell'author nel metodo store

da ogni metodo (index, store, update, delete) dovrà ritornare un json con il nome del metodo creato nella variabile 'message' e un returncode congruo

nel metodo store e update validare name e surname richiesti e minimo lunghi 5

php artisan migrate

creare tabella authors create_authors_table tramite migrate
> php artisan make:migration create_authors_table

> php artisan make:migration add_fields_to_authors_table      

> php artisan make:model Category --migration 
