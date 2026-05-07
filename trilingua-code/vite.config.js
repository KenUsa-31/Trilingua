import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/base.css',
                'resources/css/layouts/app.css',
                'resources/css/layouts/guest.css',
                'resources/css/views/auth/login.css',
                'resources/css/views/auth/register.css',
                'resources/css/views/dashboard.css',
                'resources/css/views/settings.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
