const mix = require('laravel-mix');

mix
    .setPublicPath('public')
    .postCss('resources/css/app.css', 'public/assets')
    .options({
        postCss: require('./postcss.config'),
        fileLoaderDirs: {
            fonts: 'assets/fonts',
            images: 'assets/images',
        }
    })
    .webpackConfig(require('./webpack.config'))
    .version();
