<?php

namespace integready\inttelinput;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Class IntTelInput
 * @package integready\inttelinput
 */
class IntTelInput extends InputWidget
{
    /**
     * @var boolean  Allow users to enter national numbers (and not have to think about international dial codes)
     * Default:true
     *
     */
    public $nationalMode = true;

    /**
     * @var array Specify the countries to appear at the top of the list.
     */

    public $preferredCountries = [];
    /**
     * @var array Don't display the countries you specify.
     */
    public $excludeCountries = [];

    public function init()
    {
        parent::init();
        $this->registerAssets();
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $nationalModeString       = ($this->nationalMode) ? 'true' : 'false';
        $intlTelInputParams       = "nationalMode: {$nationalModeString} ";
        $preferredCountriesString = (count($this->preferredCountries)) ? "'" . strtolower(implode("', '", $this->preferredCountries)) . "'" : '';
        $intlTelInputParams       .= ", preferredCountries: [{$preferredCountriesString}] ";
        $excludeCountriesString   = (count($this->excludeCountries)) ? "'" . strtolower(implode("', '", $this->excludeCountries)) . "'" : '';
        $intlTelInputParams       .= ", excludeCountries:[{$excludeCountriesString}]";

        IntTelInputAsset::register($this->view);
        Yii::$app->view->registerJs("jQuery('#" . $this->options['id'] . "').intlTelInput({{$intlTelInputParams}});");
    }

    /**
     * @return string
     */
    public function run()
    {
        Html::addCssClass($this->options, 'form-control');

        return Html::activeTextInput($this->model, $this->attribute, $this->options);
    }
}
