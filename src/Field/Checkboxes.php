<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\CanBeValidated;
use Assely\Field\Support\HasAPreview;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Checkboxes extends Field
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
        return $view->make('Fielder::Checkboxes/Checkboxes', [
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
        return $view->make('Fielder::Checkboxes/Preview', [
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
        $asset->add('fielder-chekcboxes-styles', [
            'path' => FIELDER_URI.'public/css/checkboxes.css',
        ])->area('admin');

        $asset->add('fielder-checkboxes', [
            'path' => FIELDER_URI.'public/js/checkboxes.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
