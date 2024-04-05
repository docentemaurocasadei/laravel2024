obiettivo: realizzare un sistema crud completo con lista in datatables
GET|HEAD        products ............................................ products.index › ProductController@index  
  POST            products ............................................ products.store › ProductController@store  
  GET|HEAD        products/create ................................... products.create › ProductController@create  
  GET|HEAD        products/{product} .................................... products.show › ProductController@show  
  PUT|PATCH       products/{product} ................................ products.update › ProductController@update  
  DELETE          products/{product} .............................. products.destroy › ProductController@destroy  
  GET|HEAD        products/{product}/edit ............................... products.edit › ProductController@edit


demo su http://localhost:8000/products


esempio di crud completo:
- laravel
- migration
- view
- route
- controller
- model
- blade
- vite
- datatables
- sass
- blade component


composer create-project --prefer-dist laravel/laravel corsoss4-crud
npm i laravel-datatables-vite --save-dev
php artisan make:controller ProductController --resource
composer require yajra/laravel-datatables-oracle

config/app.php.

.....
.....
'providers' => [
	....
	....
	Yajra\DataTables\DataTablesServiceProvider::class,
]
'aliases' => [
	....
	....
	'DataTables' => Yajra\DataTables\Facades\DataTables::class,
]
.....
.....

php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"

-------------
npm install bootstrap
npm install sass
npm install jquery

configurare i file dentro js, css, scss

-- creare diversi record
php artisan make:factory ProductFactory
php artisan make:seeder ProductSeeder

--- creare in controller metodi dei crud

** per delete installare swal
npm install sweetalert2

-- creare javascript per gestire swal
-- creare viste edit, create, show, index