var elixir = require('laravel-elixir');
var rollup = require('laravel-elixir-rollup');
var buble = require('rollup-plugin-buble');

const components = [
    'checkboxes',
    'code',
    'colorpicker',
    'datepicker',
    'editor',
    'hidden',
    'media',
    'password',
    'radios',
    'readonly',
    'repeatable',
    'text',
    'textarea',
    'timepicker',
    'tinymce',
    'toggle',
];

const styles = [
    'checkboxes',
    'code',
    'colorpicker',
    'datepicker',
    'media',
    'radios',
    'timepicker',
    'toggle',
];

const globals = {
    fielder: 'Fielder',
    vue: 'Vue',
    underscore: '_',
    jquery: 'jQuery'
};

const vendors = [
];

elixir(function (mix) {
    mix.sass('fielder.scss');

    mix.scripts(vendors, './public/js/vendors.js');

    mix.rollup('fielder.js', null, {
        format: 'iife',
        moduleName: 'Fielder',
        globals: globals,
        plugins: [buble()]
    });

    components.forEach(function(component) {
        mix.rollup(`Fields/${component}.js`, null, {
            format: 'iife',
            globals: globals,
            plugins: [buble()]
        });
    });

    styles.forEach(function(style) {
        mix.sass(`Fields/${style}.scss`);
    });
});
