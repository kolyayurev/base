const mix = require("laravel-mix");
const webpack = require('webpack');
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
    .vue({
        extractStyles: true
    })
    .js("resources/js/gallery.js", "public/js")
    .extract(["jquery","vue", "axios", "element-ui", "aos"])
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/voyager.scss", "public/css");

mix.webpackConfig({
    plugins: [
        new webpack.NormalModuleReplacementPlugin(
            /element-ui[\/\\]lib[\/\\]locale[\/\\]lang[\/\\]zh-CN/,
            "element-ui/lib/locale/lang/ru-RU"
        )
    ]
});

if (mix.inProduction()) {
    mix.version();
} else {
    // mix.eslint();
    // mix.sourceMaps();
}
