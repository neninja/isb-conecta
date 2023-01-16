import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            refresh: true,
        }),
        react(),
    ],
    test: {
        include: ["resources/**/*.spec.{ts,tsx,js,jsx}"],
        watchExclude: [
            "**/node_modules/**",
            "**/dist/**",
            "**/vendor/**",
            "**/public/**",
            "**/app/**",
            "**/bootstrap/**",
            "**/config/**",
            "**/database/**",
            "**/docker/**",
            "**/domain/**",
            "**/lang/**",
            "**/php/**",
            "**/routes/**",
            "**/storage/**",
            "**/tests/**",
        ],
        globals: true,
        environment: "jsdom",
        open: false,
    },
});
