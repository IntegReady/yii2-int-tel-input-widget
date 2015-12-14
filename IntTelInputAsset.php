<?php
namespace bigferumdron\IntTelInput;

use yii\web\AssetBundle;


class IntTelInputAsset extends AssetBundle
{
    public $sourcePath;
    public $css        = [
        'css/intlTelInput.css',
    ];

    public $js      = [
        'js/intlTelInput.js',
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