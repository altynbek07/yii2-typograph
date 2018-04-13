# Yii2 Typograph

[Yii2](http://www.yiiframework.com) typograph behavior

## Installation

### Composer

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run ```composer require altynbek07/yii2-typograph:^0.1```

or add ```"altynbek07/yii2-typograph": "^0.1"``` to the require section of your ```composer.json```

### Using

Attach the behavior in your model:

```php
public function behaviors()
{
    return [
        'typograph' => [
            'class' => 'altynbek07\yii2Typograph\Typograph',
            'attributes' => 'text',
        ]
    ];
}
```

Typograph multiple attributes:

```php
public function behaviors()
{
    return [
        'typograph' => [
            ...
            'attributes' => ['text', 'name'],
            ...
        ]
    ];
}
```

## Author

[Altynbek Kazezov](https://github.com/altynbek07/), e-mail: [altinbek__97@mail.ru](mailto:altinbek__97@mail.ru)
