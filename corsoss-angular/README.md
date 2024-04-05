creare una api con laravel con
- model Product
- controller ProductController
- migration con i campi name e price

creare progetto angular
npm install -g @angular/cli 

ng new corsosss-angular --minimal
se errore di execution policy da amministratore:
Set-ExecutionPolicy unrestricted

npm install @vitejs/plugin-vue --legacy-peer-deps
npm install vite-tsconfig-paths --save-dev --legacy-peer-deps
npm install @analogjs/vite-plugin-angular --save-dev --legacy-peer-deps
npm install path --save-dev --force

configurare vite.config.js

npm install tsconfig-paths -D

cd corsoss-angular
ng generate component product-list

modificare component product-list.component.ts

creare la vista blade per avviare il componente angular

ng serve (su progetto angular) per verificare se esiste
ng build (su progetto angular) = abbiamo creato la dist con i file main polyfills e styles 
copio la dist in public e metto i link nella vista blade
