<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\CanBeValidated;
use Assely\Field\Support\HasAPreview;
use Assely\Field\Support\MayHaveChildren;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Repeatable extends Field
{
    use CanBeValidated, MayHaveChildren, HasAPreview;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        return $view->make('Fielder::Repeatable.Repeatable', [
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
        return $view->make('Fielder::Repeatable/Preview', [
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
        $asset->add('fielder-repeatable', [
            'path' => FIELDER_URI.'public/js/repeatable.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
