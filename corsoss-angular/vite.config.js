import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tsconfigPaths from 'vite-tsconfig-paths';
import angular from '@analogjs/vite-plugin-angular';
import path from 'path'; // Importa il modulo path

export default defineConfig({
    plugins: [
        laravel({
            input: ['./resources/css/app.css', 
            './corsoss-angular/src/styles.css',
            './resources/js/app.js', 
            './resources/js/module1.js', 
            './corsoss-angular/src/main.ts'
        ],
            refresh: true,
        }),
        vue(),
        angular(),
        tsconfigPaths(),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './corsoss-angular') // Percorso del progetto Angular
        },
        mainFields: ['module'],
    }
});
