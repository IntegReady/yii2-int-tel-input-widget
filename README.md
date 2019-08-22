Yii2 International telephone numbers - Asset Bundle, Behavior, Validator, Widget
================================================================================

This extension uses 2 libraries:

- [A jQuery plugin for entering and validating international telephone numbers](https://github.com/Bluefieldscom/intl-tel-input)
- [PHP version of Google's phone number handling library](https://github.com/giggsey/libphonenumber-for-php)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require "integready/yii2-intl-tel-input" "~2.0.0"
```

or add

```
"integready/yii2-intl-tel-input": "~2.0.0"
```

to the `require` section of your `composer.json` file.

## Usage

Using as an `ActiveField` widget with the preferred countries on the top:

```php
use integready\extensions\phoneInput\PhoneInput;

echo $form->field($model, 'phone_number')->widget(PhoneInput::class, [
    'jsOptions' => [
        'preferredCountries' => ['no', 'pl', 'ua'],
    ]
]);
```

Using as a simple widget with the limited countries list:

```php
use integready\extensions\phoneInput\PhoneInput;

echo PhoneInput::widget([
    'name' => 'phone_number',
    'jsOptions' => [
        'allowExtensions' => true,
        'onlyCountries' => ['no', 'pl', 'ua'],
    ]
]);
```

Using phone validator in a model (validates the correct country code and phone format):

```php
namespace frontend\models;

use integready\extensions\phoneInput\PhoneInputValidator;

class Company extends Model
{
    public $phone;

    public function rules()
    {
        return [
            [['phone'], 'string'],
            [['phone'], PhoneInputValidator::class],
        ];
    }
}
```

or if you need to validate phones of some countries:

```php
namespace frontend\models;

use integready\extensions\phoneInput\PhoneInputValidator;

class Company extends Model
{
    public $phone;

    public function rules()
    {
        return [
            [['phone'], 'string'],
            // [['phone'], PhoneInputValidator::className(), 'region' => 'UA'],
            [['phone'], PhoneInputValidator::className(), 'region' => ['PL', 'UA']],
        ];
    }
}
```

Using phone behavior in a model (auto-formats phone string to the required phone format):

```php
namespace frontend\models;

use integready\extensions\phoneInput\PhoneInputBehavior;

class Company extends Model
{
    public $phone;

    public function behaviors()
    {
        return [
            'phoneInput' => PhoneInputBehavior::class,
        ];
    }
}
```

You can also thanks to this behavior save to database country code of the phone number. Just add your attribute as
 `countryCodeAttribute` and it'll be inserted into database with the phone number.


```php
namespace frontend\models;

use integready\extensions\phoneInput\PhoneInputBehavior;

class Company extends Model
{
    public $phone;
    public $countryCode;

    public function behaviors()
    {
        return [
            [
                'class'                => PhoneInputBehavior::class,
                'countryCodeAttribute' => 'countryCode',
            ],
        ];
    }
}
```

> Note: `nationalMode` option is very important! In case if you want to manage phone numbers with country/operator code
- you have to set `nationalMode: false` in widget options 
(for example, `PhoneInput::widget(...options, ['jsOptions' => ['nationalMode' => false]])`).
