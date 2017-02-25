<?php

namespace integready\IntTelInput;

use yii\web\AssetBundle;

/**
 * Class IntTelInputAsset
 * @package integready\IntTelInput
 */
class IntTelInputAsset extends AssetBundle
{
    public $sourcePath = '@integready/IntTelInput/assets';
    public $css        = [
        'css/intlTelInput.css',
    ];

    public $js         = [
        'js/intlTelInput.js',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
    public $depends    = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
