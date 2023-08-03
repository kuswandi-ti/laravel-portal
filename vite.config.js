import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // build: {
    //     outDir: './build/',
    //     manifest: 'manifest.json',
    // },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
            // buildDirectory: './build/',
        }),
    ],
});
