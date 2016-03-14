<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\CanBeValidated;
use Assely\Field\Support\HasAPreview;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Radios extends Field
{
    use CanBeValidated, HasAPreview;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        return $view->make('Fielder::Radios/Radios', [
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
        return $view->make('Fielder::Radios/Preview', [
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
        $asset->add('fielder-radios-styles', [
            'path' => FIELDER_URI . 'public/css/radios.css',
        ])->area('admin');

        $asset->add('fielder-radios', [
            'path' => FIELDER_URI . 'public/js/radios.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
