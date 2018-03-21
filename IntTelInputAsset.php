<?php

namespace integready\inttelinput;

use yii\web\AssetBundle;

/**
 * Class IntTelInputAsset
 * @package integready\inttelinput
 */
class IntTelInputAsset extends AssetBundle
{
    public $sourcePath = '@integready/inttelinput/assets';
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
