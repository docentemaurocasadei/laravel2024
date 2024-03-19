creare una route /pubblica
creare una route /privata

rispondere alla route pubblica con un messaggio 
rispondere alla route privata con un messaggio 

creare un middleware che verifichi un token passato es 1234
php artisan make:middleware RichiestaValida

bloccare la route privata con questo token

praticamente
http://127.0.0.1:8000/privata?token=1234 ok
http://127.0.0.1:8000/privata errore 403
http://127.0.0.1:8000/pubblica ok