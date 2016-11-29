<?php

namespace Assely\Fielder;

use Illuminate\Support\ServiceProvider;

class FielderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Collection of fields.
     *
     * @var array
     */
    protected $fields = [
        'checkboxes' => 'Assely\Fielder\Field\Checkboxes',
        'code' => 'Assely\Fielder\Field\Code',
        'colorpicker' => 'Assely\Fielder\Field\Colorpicker',
        'datepicker' => 'Assely\Fielder\Field\Datepicker',
        'editor' => 'Assely\Fielder\Field\Editor',
        'hidden' => 'Assely\Fielder\Field\Hidden',
        'media' => 'Assely\Fielder\Field\Media',
        'password' => 'Assely\Fielder\Field\Password',
        'radios' => 'Assely\Fielder\Field\Radios',
        'readonly' => 'Assely\Fielder\Field\Readonly',
        'repeatable' => 'Assely\Fielder\Field\Repeatable',
        'text' => 'Assely\Fielder\Field\Text',
        'textarea' => 'Assely\Fielder\Field\Textarea',
        'timepicker' => 'Assely\Fielder\Field\Timepicker',
        'tinymce' => 'Assely\Fielder\Field\Tinymce',
        'toggle' => 'Assely\Fielder\Field\Toggle',
    ];

    /**
     * Register fielder services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('fielder', function ($app) {
            $fielder = new Fielder($app);

            $fielder->register($this->fields);

            return $fielder;
        });

        $this->app->alias('fielder', Fielder::class);
    }

    /**
     * Boot fielder services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Fielder');

        $this->dispatchAssets();
    }

    /**
     * Dispatch fielder assets.
     *
     * @return void
     */
    public function dispatchAssets()
    {
        $this->app['asset.factory']->add('fielder-vendors', [
            'path' => FIELDER_URI.'public/js/vendors.js',
        ])->area('admin');

        $this->app['asset.factory']->add('fielder', [
            'path' => FIELDER_URI.'public/js/fielder.js',
            'dependences' => ['fielder-vendors'],
        ])->area('admin');

        $this->app['asset.factory']->add('fielder-style', [
            'path' => FIELDER_URI.'public/css/fielder.css',
        ])->area('admin');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fielder'];
    }
}
