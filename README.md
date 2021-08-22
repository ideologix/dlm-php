# Digital Licnese Manager PHP Client


## Installation

The PHP package can be imported either with Composer or manually with including the `autoload.php` file:

```shell
composer install ideologix/dlm-php
```

or manually as follows:

```php
require_once 'path/to/dlm-php/autoload.php';
```

## How to use


### Initialize

To start using the classes and call the plugin endpoints first you need instance of the main class.

```php
use IdeoLogix\DigitalLicenseManagerClient\Service;
$service = new Service( 'http://dlm.test', 'ck_XXXX', 'cs_XXXX' );
```

### Retrieving Licenses

To retrieve list of licenses from the REST API you can do something like this:

```php
$response = $service->lisenses()->get(['per_page' => 10]);
var_dump($response->get_data());
```

##### Response

```php
array (size=9)
  0 => 
    array (size=16)
      'id' => int 2
      'order_id' => int 23
      'product_id' => int 12
      'user_id' => int 1
      'license_key' => string 'ABCZ-AC15-352C-21ZW' (length=19)
      'expires_at' => string '2021-06-07 00:00:00' (length=19)
      'valid_for' => int 365
      'source' => int 1
      'status' => int 1
      'times_activated' => int 0
      'activations_limit' => int 5
      'is_expired' => boolean true
      'created_at' => string '2021-06-07 00:31:32' (length=19)
      'created_by' => int 1
      'updated_at' => string '2021-07-07 14:03:08' (length=19)
      'updated_by' => int 1
  1 => 
    array (size=16)
      'id' => int 3
      'order_id' => int 24
      'product_id' => int 12
      'user_id' => int 1
      'license_key' => string 'W0Z2-5203-CCA1-Z055' (length=19)
      'expires_at' => string '2022-06-07 00:00:00' (length=19)
      'valid_for' => int 365
      'source' => int 1
      'status' => int 2
      'times_activated' => int 0
      'activations_limit' => int 5
      'is_expired' => boolean false
      'created_at' => string '2021-06-07 00:39:34' (length=19)
      'created_by' => int 1
      'updated_at' => string '2021-06-20 21:26:27' (length=19)
      'updated_by' => int 1
...
```

### Retrieving Single License

To retrieve single license from the REST API you can do something like this:

```php
$response = $api->licenses()->find( 'DWA9-AAZZ-3199-Z312' );
var_dump($response->get_data());
```

##### Output

```php
array (size=17)
  'id' => int 33
  'order_id' => int 56
  'product_id' => int 12
  'user_id' => int 1
  'license_key' => string 'DWA9-AAZZ-3199-Z312' (length=19)
  'expires_at' => string '2022-07-25 09:38:12' (length=19)
  'valid_for' => int 365
  'source' => int 1
  'status' => int 2
  'times_activated' => int 5
  'activations_limit' => int 5
  'is_expired' => boolean false
  'created_at' => string '2021-07-25 09:38:12' (length=19)
  'created_by' => int 1
  'updated_at' => string '2021-07-25 09:38:12' (length=19)
  'updated_by' => int 1
  'activations' => 
    array (size=5)
      0 => 
        array (size=11)
          'id' => int 11
          'token' => string 'fa587c7786608c8fef4684f2d5452578321a3635' (length=40)
          'license_id' => int 33
          'label' => null
          'source' => int 2
          'ip_address' => string '127.0.0.1' (length=9)
          'user_agent' => null
          'meta_data' => 
            array (size=0)
              ...
          'created_at' => string '2021-07-30 16:37:53' (length=19)
          'updated_at' => null
          'deactivated_at' => null
      1 => 
        array (size=11)
          'id' => int 12
          'token' => string '7ebb5cc3be72451894ce1241165de263731ee87e' (length=40)
          'license_id' => int 33
          'label' => null
          'source' => int 2
          'ip_address' => string '127.0.0.1' (length=9)
          'user_agent' => null
          'meta_data' => 
            array (size=0)
              ...
          'created_at' => string '2021-07-30 16:39:09' (length=19)
          'updated_at' => null
          'deactivated_at' => null
        ...
```

### Activating License

To activate a License through the REST API you can do something like this:

Note: Please store the token somewhere secure because it will be needed for deactivation and validation of the license.

```php
$response = $service->licenses()->activate('DWA9-AAZZ-3199-Z312');
var_dump($response->get_data());
```

##### Output

```php
array (size=12)
  'id' => int 15
  'token' => string '86a986960b5024d93eb7b023c3ffcc0092f2c8ee' (length=40)
  'license_id' => int 33
  'label' => null
  'source' => int 2
  'ip_address' => string '127.0.0.1' (length=9)
  'user_agent' => null
  'meta_data' => 
    array (size=0)
      empty
  'created_at' => string '2021-07-30 17:00:52' (length=19)
  'updated_at' => null
  'deactivated_at' => null
  'license' => 
    array (size=16)
      'id' => int 33
      'order_id' => int 56
      'product_id' => int 12
      'user_id' => int 1
      'license_key' => string 'DWA9-AAZZ-3199-Z312' (length=19)
      'expires_at' => string '2022-07-25 09:38:12' (length=19)
      'valid_for' => int 365
      'source' => int 1
      'status' => int 2
      'times_activated' => int 5
      'activations_limit' => int 5
      'is_expired' => boolean false
      'created_at' => string '2021-07-25 09:38:12' (length=19)
      'created_by' => int 1
      'updated_at' => string '2021-07-25 09:38:12' (length=19)
      'updated_by' => int 1
```
