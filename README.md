# Hiloxa trigger

This package adds state support to models.

To give you a feel about how this package can be used, let's look at a quick example.

## Installation

You can install the package via composer:

```bash
composer require hl/hiloxa-trigger
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="HL\HiloxaTrigger\HiloxaTriggerServiceProvider" --tag="hiloxa-trigger-config"
```

This is the content of the published config file:

```php
return [
    /*
     * Which base URL to use for trigger.
     */
    'base_url' => env('HILOXA_TRIGGER_BASE_URL', 'https://rest.gohighlevel.com/v1'),
    'api_key' => env('HILOXA_TRIGGER_API_KEY'),
    'trigger' => [
        'create' => true,
        'update' => true,
    ],

    'model_data' => \HL\HiloxaTrigger\DTO\CreateDTO::class
];
```

Imagine a model `Customer`, which has : `name`, `email` and `phone`. This package allows you to add your model to Hiloxa
Contact

For the sake of our example, let's say that,

Here's what the `Customer` model would look like:

```php
use HL\HiloxaTrigger\Trait\HiloxaTrigger;
use HL\HiloxaTrigger\Contracts\HiloxaAble;

class Customer extends Model implements HiloxaAble
{
    use HiloxaTrigger;

}
```

Here's a concrete implementation of data class, the `CustomerDTO` which refer to valid customer data:

```php
class Customer extends Model implements HiloxaAble
{
    use HiloxaTrigger;
    
    public function hiloxaDTO($model): HiloxaDTO
    {
        return new CustomerDTO($model);
    }
    
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
