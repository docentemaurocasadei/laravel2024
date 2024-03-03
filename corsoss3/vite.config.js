import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/styles.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/scripts.js',
                'resources/scss/custom.scss'
            ],
            refresh: true,
        }),
        viteStaticCopy({ // <-- Add this code block
            targets: [
                { //For build
                    src: 'node_modules/bootstrap-icons/font/fonts/*',
                    dest: 'assets/fonts'
                },
                { // For Dev
                    src: 'node_modules/bootstrap-icons/font/fonts/*',
                    dest: 'resources/scss/fonts'
                },
                { // For Dev
                    src: 'resources/assets/*',
                    dest: './assets'
                },
            ],
        }),
    ],
});
