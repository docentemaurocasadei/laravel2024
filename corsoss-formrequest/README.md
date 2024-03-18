composer create-project laravel/laravel:^10.0 corsoss-formrequest
php artisan make:controller WorkerController --resource
php artisan make:request WorkerRequest
npm install sass
npm install bootstrap
npm install vite-plugin-sass

configurare vite

creare viste
- layouts\app (includere bootstrap)
- workers\create

configurare route web.php

configurare controller metodi create e store

configurare WorkerRequest per controllare 
name required min: 5 
email required e valid

restituire per ko gli errori da mostrare in blade
restituire per ok un messaggio "campi validati con successo"


****** 2 parte
installare swal
npm install sweetalert2

includerlo nel js
import Swal from 'sweetalert2'