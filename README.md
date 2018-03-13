# Laravel KeyStorage

[![Latest Stable Version](https://poser.pugx.org/nikitin/key-storage/v/stable)](https://packagist.org/packages/nikitin/key-storage)
[![Total Downloads](https://poser.pugx.org/nikitin/key-storage/downloads)](https://packagist.org/packages/nikitin/key-storage)
[![Latest Unstable Version](https://poser.pugx.org/nikitin/key-storage/v/unstable)](https://packagist.org/packages/nikitin/key-storage)
[![License](https://poser.pugx.org/nikitin/key-storage/license)](https://packagist.org/packages/nikitin/key-storage)

## Install

``` bash
$ composer require nikitin/key-storage
```

**Publish config file**

``` bash
$ php artisan vendor:publish --tag=key-storage
```

**Add Service Provider**

``` php
...
 \nikitin\KeyStorage\KeyStorageServiceProvider::class
...
```

**And run**
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
        
// If you need key type
  KeyStorage::getType('test');
  result: "array"

$inst = KeyStorage::getSelf();
$inst->set('key', 'value');
  or
$result = $inst->get('key');
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

