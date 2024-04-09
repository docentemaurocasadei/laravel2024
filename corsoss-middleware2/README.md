obiettivo: creare un middleware per filtrare le richieste delle chiamate aventi un certo token negli headers
demo su 
http://127.0.0.1:8000/
http://localhost:8000/protected
http://localhost:8000/protected2
http://127.0.0.1:8000/protected?token=miotoken
http://127.0.0.1:8000/protected2?token=miotoken

utilizzare POSTMAN
mettere nell'headers della richiesta headers Authorization=authtoken
- 