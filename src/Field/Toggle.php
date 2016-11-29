<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\MayHaveChildren;
use Assely\Field\Support\HasAPreview;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Toggle extends Field
{
    use MayHaveChildren, HasAPreview;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        return $view->make('Fielder::Toggle.Toggle', [
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
        return $view->make('Fielder::Toggle/Preview', [
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
        $asset->add('fielder-toggle-styles', [
            'path' => FIELDER_URI.'public/css/toggle.css',
        ])->area('admin');

        $asset->add('fielder-toggle', [
            'path' => FIELDER_URI.'public/js/toggle.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
