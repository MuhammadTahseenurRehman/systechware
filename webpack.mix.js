const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()  // Important for Vue 3
    .postCss('resources/css/app.css', 'public/css', [
        require('@tailwindcss/postcss'),
    ])
    .version()
    .webpackConfig({
        plugins: [
            new (require('webpack')).DefinePlugin({
                __VUE_OPTIONS_API__: JSON.stringify(true),
                __VUE_PROD_DEVTOOLS__: JSON.stringify(false),
                __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: JSON.stringify(false)
            })
        ]
    });