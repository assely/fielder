<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\CanBeSanitized;
use Assely\Field\Support\CanBeValidated;
use Assely\Field\Support\HasAPreview;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Colorpicker extends Field
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
        return $view->make('Fielder::Colorpicker/Colorpicker', [
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
        return $view->make('Fielder::Colorpicker/Preview', [
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

        $asset->load('wp-color-picker', [
            'type' => 'style',
        ])->area('admin');

        $asset->add('fielder-colorpicker-styles', [
            'path' => FIELDER_URI.'public/css/colorpicker.css',
        ])->area('admin');

        $asset->add('fielder-colorpicker', [
            'path' => FIELDER_URI.'public/js/colorpicker.js',
            'dependences' => ['fielder', 'wp-color-picker'],
        ])->area('admin');
    }
}
