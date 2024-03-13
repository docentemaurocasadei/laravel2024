import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/scss/custom.scss',
                'resources/scss/app.scss',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
          // Alcuni alias comuni per risolvere i percorsi dei moduli
          '@': resolve(__dirname, 'src'),
          'vue': 'vue/dist/vue.esm-bundler.js',
          // Aggiungi un alias per SweetAlert2
          'sweetalert2': 'sweetalert2/dist/sweetalert2.all.js',
        },
      },
});
