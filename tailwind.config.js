import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#005D73',
                    light: '#F7F8FC',
                    medium: '#005d73',
                    dark: '',
                },
                secondary: {
                    DEFAULT: '#4CC0AD',
                    light: '#F7F8FC',
                    medium: '#005d73',
                    dark: '',
                },
                highlight: {
                    DEFAULT: '',
                    light: '',
                    medium: '',
                    dark: '',
                },
                success: {
                    DEFAULT: '',
                    light: '',
                    medium: '',
                    dark: '',
                },
                warning: {
                    DEFAULT: '',
                    light: '',
                    medium: '',
                    dark: '',
                },
                error: {
                    DEFAULT: "#E44132",
                    light: '',
                    medium: '',
                    dark: '',
                },
                neutral: {
                    low: {
                        DEFAULT: '#000000',
                        light: '#F0F0F0',
                        medium: '#C4C4C4',
                        dark: '#9F9F9F',
                    },
                    high: {
                        DEFAULT: '#FFFFFF',
                        light: '#F5F5F5',
                        medium: '',
                        dark: '',
                    },
                },
            },
        },
    },

    plugins: [forms, typography],
};
