import { defineConfig } from 'vite';
import path from "path";
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig(({ command, mode }) => {
    const ci = process.env.CI;

    const aditionalPlugins = [];
    if (!ci) {
        aditionalPlugins.push(laravel({
            input: 'resources/js/app.tsx',
            refresh: true,
        }));
    }

    return {
        plugins: [
            aditionalPlugins,
            react(),
        ],
        resolve: {
            alias: {
                "@": path.resolve(__dirname, "./resources/js"),
            },
        },
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
    };
});
