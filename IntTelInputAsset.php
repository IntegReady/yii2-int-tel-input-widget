<?php
namespace bigferumdron\IntTelInput;

use yii\web\AssetBundle;


class IntTelInputAsset extends AssetBundle
{
    public $sourcePath = '@bigferumdron/IntTelInput/assets';
    public $css        = [
        'css/intlTelInput.css',
    ];

    public $js      = [
        'js/intlTelInput.min.js',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}