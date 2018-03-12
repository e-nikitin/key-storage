# KeyStorage

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)



## Install

``` bash
$ composer require nikitin/key-storage
```

Add Service Provider

``` php
...
 \nikitin\KeyStorage\KeyStorageServiceProvider::class
...
```
And run
``` bash
$ php artisan key-storage:create-table
```

## Usage

``` php
use nikitin\KeyStorage\Facades\KeyStorage;
...

KeyStorage::set('test', [1,2,3,4,5,'test'=>321]);

KeyStorage::get('test');
result: 
    array:6 [
          0 => 1
          1 => 2
          2 => 3
          3 => 4
          4 => 5
          "test" => 321
        ]
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/KeyStorage.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/KeyStorage/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/KeyStorage.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/KeyStorage.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/KeyStorage.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/nikitin/key-storage

