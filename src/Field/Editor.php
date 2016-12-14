<?php

namespace Assely\Fielder\Field;

use Assely\Field\Field;
use Assely\Asset\AssetFactory;
use Assely\Field\Support\CanBeSanitized;
use Assely\Field\Support\CanBeValidated;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Editor extends Field
{
    use CanBeValidated, CanBeSanitized;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        return $view->make('Fielder::Editor/Editor', [
            'fingerprint' => $this->getFingerprint(),
        ]);
    }

    /**
     * Add field assets.
     *
     * @param \Assely\Asset\AssetFactory $asset
     *
     * @todo Add Simditor assets via cdn
     *
     * @return void
     */
    public function assets(AssetFactory $asset)
    {
        $asset->add('simditor-simple-module', [
            'path' => 'https://cdn.rawgit.com/mycolorway/simple-module/master/dist/simple-module.min.js',
        ])->area('admin');

        $asset->add('simditor-simple-hotkeys', [
            'path' => 'https://cdn.rawgit.com/mycolorway/simple-hotkeys/master/lib/hotkeys.js',
        ])->area('admin');

        $asset->add('fielder-editor-simditor', [
            'path' => 'https://cdn.rawgit.com/mycolorway/simditor/master/lib/simditor.js',
        ])->area('admin');

        $asset->add('fielder-editor-styles', [
            'path' => FIELDER_URI.'public/css/editor.css',
        ])->area('admin');

        $asset->add('fielder-editor', [
            'path' => FIELDER_URI.'public/js/editor.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
