<?php

namespace Assely\Fielder\Field;

use Assely\Field\Field;
use Assely\Asset\AssetFactory;
use Assely\Support\Facades\Hook;
use Assely\Field\Support\HasAPreview;
use Assely\Field\Support\CanBeSanitized;
use Assely\Field\Support\CanBeValidated;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Media extends Field
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
        return $view->make('Fielder::Media/Media', [
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
        return $view->make('Fielder::Media/Preview', [
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
        $asset->add('fielder-media-styles', [
            'path' => FIELDER_URI.'public/css/media.css',
        ])->area('admin');

        $asset->add('fielder-media', [
            'path' => FIELDER_URI.'public/js/media.js',
            'dependences' => ['fielder'],
        ])->area('admin');

        Hook::action('admin_enqueue_scripts', function () {
            wp_enqueue_media();
        })->dispatch();
    }
}
