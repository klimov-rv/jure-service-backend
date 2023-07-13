const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// admin files... 
mix.js('resources/js/app.js', 'public/js').version()

mix.styles([
    'public/css/grid.min.css',
    'public/css/main.css',
], 'public/css/all.css');


mix.webpackConfig({
    module: {
      rules: [
        {
          test: /\.jsx?$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['es2015'] // default = env
            }
          }
        }
      ]
    }
  })