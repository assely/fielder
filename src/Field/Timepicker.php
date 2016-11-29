<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\CanBeSanitized;
use Assely\Field\Support\CanBeValidated;
use Assely\Field\Support\HasAPreview;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Timepicker extends Field
{
    use CanBeValidated, CanBeSanitized, HasAPreview;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        return $view->make('Fielder::Timepicker/Timepicker', [
            'fingerprint' => $this->getFingerprint(),
        ]);
    }

    /**
     * Render field preview.
     *
     * @param \Assely\View\ViewFactory $view
     * @param mixed $value
     *
     * @return void
     */
    public function preview(ViewFactory $view, $value)
    {
        return $view->make('Fielder::Timepicker/Preview', [
            'value' => $value,
        ]);
    }

    /**
     * Add field assets.
     *
     * @param \Assely\Asset\AssetFactory $asset
     *
     * @return void
     */
    public function assets(AssetFactory $asset)
    {
        $asset->load('jquery', [
            'type' => 'script',
        ])->area('admin');

        $asset->load('jquery-ui-core', [
            'type' => 'script',
        ])->area('admin');

        $asset->add('jquery-ui-styles', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css',
        ])->area('admin');

        $asset->add('jquery-ui-timepicker-addon', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.1/jquery-ui-timepicker-addon.min.js',
        ])->area('admin');

        $asset->add('jquery-ui-timepicker-addon-i18n', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.1/i18n/jquery-ui-timepicker-addon-i18n.min.js',
        ])->area('admin');

        $asset->add('fielder-timepicker-styles', [
            'path' => FIELDER_URI.'public/css/timepicker.css',
        ])->area('admin');

        $asset->add('fielder-timepicker', [
            'path' => FIELDER_URI.'public/js/timepicker.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
