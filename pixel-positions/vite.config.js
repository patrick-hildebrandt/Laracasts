// Fehler auf tailwindcss.com: import tailwindcss from '@tailwindcss/vite'
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            // Fehler auf tailwindcss.com: tailwindcss(),
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
