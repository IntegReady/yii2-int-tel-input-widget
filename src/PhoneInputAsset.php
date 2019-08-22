<?php

namespace integready\extensions\phoneInput;

use yii\web\AssetBundle;

/**
 * Asset Bundle of the phone input widget. Registers required CSS and JS files.
 */
class PhoneInputAsset extends AssetBundle
{
    /** @var string */
    public $sourcePath = '@bower/intl-tel-input';

    /** @var array */
    public $css = ['build/css/intlTelInput.css'];

    /** @var array */
    public $js = [
        'build/js/intlTelInput-jquery.js',
        'build/js/intlTelInput.min.js',
        'build/js/utils.js',
    ];

    /** @var array */
    public $depends = ['yii\web\JqueryAsset'];
}
