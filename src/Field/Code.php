<?php

namespace Assely\Fielder\Field;

use Assely\Asset\AssetFactory;
use Assely\Field\Field;
use Assely\Field\Support\CanBeSanitized;
use Assely\Field\Support\CanBeValidated;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Code extends Field
{
    use CanBeSanitized, CanBeValidated;

    /**
     * Render field template.
     *
     * @param \Assely\View\ViewFactory $view
     *
     * @return void
     */
    public function template(ViewFactory $view)
    {
        return $view->make('Fielder::Code/Code', [
            'fingerprint' => $this->getFingerprint(),
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
        $asset->add('fielder-ace', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js',
        ])->area('admin');

        $asset->add('fielder-ace-theme', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/theme-iplastic.js',
        ])->area('admin');

        $asset->add('fielder-ace-emmet', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ext-emmet.js',
        ])->area('admin');

        $asset->add('fielder-ace-langtools', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ext-language_tools.js',
        ])->area('admin');

        $asset->add('fielder-ace-modejavascript', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-javascript.js',
        ])->area('admin');

        $asset->add('fielder-ace-modecss', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-css.js',
        ])->area('admin');

        $asset->add('fielder-ace-modehtml', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-html.js',
        ])->area('admin');

        $asset->add('fielder-ace-modemarkdown', [
            'path' => 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-markdown.js',
        ])->area('admin');

        $asset->add('fielder-code-styles', [
            'path' => FIELDER_URI . 'public/css/code.css',
        ])->area('admin');

        $asset->add('fielder-code', [
            'path' => FIELDER_URI . 'public/js/code.js',
            'dependences' => ['fielder'],
        ])->area('admin');
    }
}
