const mix = require("laravel-mix");
const path = require("path");

mix.disableNotifications();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css")
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve(__dirname, "resources", "js"),
                "@components": path.resolve(
                    __dirname,
                    "resources",
                    "js",
                    "components"
                ),
                "@pageComponents": path.resolve(
                    __dirname,
                    "resources",
                    "js",
                    "components",
                    "pages"
                ),
                "@api-backend": path.resolve(
                    __dirname,
                    "resources",
                    "js",
                    "api",
                    "backend"
                )
            }
        }
    });
