const mix = require("laravel-mix");

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
    .js("resources/js/vanta.js", "public/js")
    .js("resources/js/exam-creator.js", "public/js")
    .js("resources/js/exam-session.js", "public/js")
    .css("resources/css/vanta.css", "public/css")
    .css("resources/css/exam-creator.css", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //
    ])
    .disableSuccessNotifications();
