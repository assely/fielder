<?php

namespace Assely\Fielder\Field;

use Assely\Field\Field;
use Assely\Asset\AssetFactory;
use Assely\Field\Support\HasAPreview;
use Assely\Field\Support\CanBeSanitized;
use Assely\Field\Support\CanBeValidated;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Datepicker extends Field
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
        return $view->make('Fielder::Datepicker/Datepicker', [
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
        return $view->make('Fielder::Datepicker/Preview', [
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

        $asset->load('jquery-ui-datepicker', [
            'type' => 'script',
        ])->area('admin');

        $asset->add('jquery-ui-styles', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css',
        ])->area('admin');

        $asset->add('fielder-datepicker-styles', [
            'path' => FIELDER_URI.'public/css/datepicker.css',
        ])->area('admin');

        $asset->add('fielder-datepicker', [
            'path' => FIELDER_URI.'public/js/datepicker.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
