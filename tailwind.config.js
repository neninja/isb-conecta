const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                "3xs": "10px",
                "2xs": "12px",
                xs: "14px",
                sm: "16px",
                base: "18px",
                md: "18px",
                lg: "22px",
                xl: "26px",
                "2xl": "32px",
                "3xl": "48px",
                "4xl": "64px",
                "5xl": "96px",
            },
            spacing: {
                1: "4px",
                2: "8px",
                3: "12px",
                4: "16px",
                5: "24px",
                6: "32px",
                7: "40px",
                8: "48px",
                9: "56px",
                10: "64px",
                11: "80px",
                12: "120px",
                13: "160px",
                14: "200px",
            },
            borderRadius: {
                xs: "2px",
                sm: "4px",
                md: "6px",
                lg: "8px",
                xl: "12px",
                "2xl": "16px",
            },
            boxShadow: {
                1: "0px 2px 4px rgba(0, 0, 0, 0.32)",
                2: " 0px 8px 16px rgba(0, 0, 0, 0.16)",
                3: "0px 16px 24px rgba(0, 0, 0, 0.16)",
                4: "0px 16px 32px rgba(0, 0, 0, 0.16)",
            },
            colors: {
                highlight: {
                    DEFAULT: "#FF51A0",
                    light: "#FFC0DC",
                    medium: "#B10E58",
                    dark: "#5A042B",
                },
                success: {
                    DEFAULT: "#0087FF",
                    light: "#C2EDFF",
                    medium: "#0573B0",
                    dark: "#024054",
                },
                warning: {
                    DEFAULT: "#FDC800",
                    light: "#FFEFB2",
                    medium: "#A98D21",
                    dark: "#463907",
                },
                error: {
                    DEFAULT: "#FF0000",
                    light: "#FFC2C2",
                    medium: "#CC0000",
                    dark: "#7A0000",
                },
                neutral: {
                    low: {
                        DEFAULT: "#000000",
                        light: "#A3A3A3",
                        medium: "#666666",
                        dark: "#292929",
                    },
                    high: {
                        DEFAULT: "#FFFFFF",
                        light: "#F5F5F5",
                        medium: "#E0E0E0",
                        dark: "#CCCCCC",
                    },
                },
                primary: {
                    DEFAULT: "#009B97",
                    light: "#9BD0CE",
                    medium: "#0E7572",
                    dark: "#0A4A49",
                },
                secondary: {
                    DEFAULT: "#C98F55",
                    light: "#E0BA94",
                    medium: "#BA6E22",
                    dark: "#321A02",
                },
                tertiary: "#333145",
                light: "#f3f3f2",
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
