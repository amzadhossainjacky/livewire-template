import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/frontend_app.css', 'resources/js/frontend_app.js'],
            refresh: true,
            buildDirectory: '/frontend',
        }),

    ],
});

