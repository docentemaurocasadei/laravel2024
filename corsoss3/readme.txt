progetto con:
    utilizzare il progetto al corsoss2 leggendo l'array utenti nel file utenti.json inserito in storage/app/public e presentare una lista con dettaglio in blade

vedere:
- View
- Blade
- vite

-creare i file:
- resource\index.blade.php, resource/layout/app.blade.php, resource/page/utenti.blade.php

- inserire un layout bootstrap nel file app e le @yield
- inserire @extend e @section in utenti
- inserire ad esempio la favicon in public/build/assets e richiamarla dal layout blade con asset('build/assets/favicon.ico')

configurare il file vite.config.js
installare con:
npm install
npm install vite-plugin-static-copy --save-dev
npm install sass
vite build
