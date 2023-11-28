const mix = require('laravel-mix');
require('laravel-mix-copy-watched');

// Public path helper
const publicPath = (path) => `${mix.config.publicPath}/${path}`;

// Source path helper
const src = (path) => `web/app/themes/sage/resources/assets/${path}`;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

// Public Path
mix.setPublicPath('./web/app/themes/sage/public')
    .setResourceRoot('/app/themes/sage/public/')
    .webpackConfig({
        output: {
            publicPath: mix.config.resourceRoot,
            chunkFilename: '[name].[chunkhash].js',
        },
    });

// Browsersync
mix.browserSync('bridge.test');

// Styles
mix.sass(src`styles/app.scss`, 'styles')
    .sass(src`styles/styleguide.scss`, 'styles');

// Scripts
mix.js(src`scripts/app.js`, 'scripts');

// Assets
mix.copyWatched(src`images`, publicPath`images`, { base: src`images` })
    .copyWatched(src`fonts/**/*`, publicPath`fonts`);

// Options
mix.options({
    processCssUrls: false,
});

// Source maps
mix.sourceMaps(false, 'source-map');

// Versioning
if (mix.inProduction()) {
    mix.version();
}
