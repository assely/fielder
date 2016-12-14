<?php

namespace Assely\Fielder\Field;

use Assely\Field\Field;
use Assely\Asset\AssetFactory;
use Assely\Support\Facades\Hook;
use Assely\Field\Support\CanBeSanitized;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Tinymce extends Field
{
    use CanBeSanitized;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        $markup = $view->make('Fielder::Tinymce/Tinymce', [
            'fingerprint' => $this->getFingerprint(),
        ])->render();

        return str_replace('name=', ':name=', $markup);
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
        $asset->add('fielder-tinymce', [
            'path' => FIELDER_URI.'public/js/tinymce.js',
            'dependences' => ['fielder'],
        ])->area('admin');

        Hook::action('admin_enqueue_scripts', function () {
            wp_enqueue_media();
        })->dispatch();
    }
}
