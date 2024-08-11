import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import ViteYaml from '@modyfi/vite-plugin-yaml';

export default defineConfig({
    build: {
        chunkSizeWarningLimit: 4000,
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        ViteYaml()
    ],
    resolve: {
        alias: {
            '@assets': '/resources/', // Update this with the correct path to your images
            '@favicon': '/resources/images/', // Update this with the correct path to your images
        },
    },
});
