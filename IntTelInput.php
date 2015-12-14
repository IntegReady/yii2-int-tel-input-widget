<?php
namespace bigferumdron\IntTelInput;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Created by PhpStorm.
 * User: Asus2
 * Date: 07-Dec-15
 * Time: 5:37 PM
 */
class IntTelInput extends InputWidget
{
    /**
     * @var bollean  Allow users to enter national numbers (and not have to think about international dial codes)
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
     * @return string
     */
    public function run()
    {
            Html::addCssClass($this->options, 'form-control');
            return Html::activeTextInput($this->model, $this->attribute, $this->options);
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $nationalModeString = ($this->nationalMode) ? 'true' : 'false';
        $intlTelInputParams = "nationalMode: {$nationalModeString} ";
        $preferredCountriesString = (count($this->preferredCountries)) ? "'" . strtolower(implode("', '", $this->preferredCountries)) . "'" : "";
        $intlTelInputParams .= ", preferredCountries: [{$preferredCountriesString}] ";
        $excludeCountriesString = (count($this->excludeCountries)) ? "'" . strtolower(implode("', '", $this->excludeCountries)) . "'" : "";
        $intlTelInputParams .= ", excludeCountries:[{$excludeCountriesString}]";


        IntTelInputAsset::register($this->view);
        Yii::$app->view->registerJs("jQuery('#" . $this->options['id'] . "').intlTelInput({{$intlTelInputParams}});");
    }

}