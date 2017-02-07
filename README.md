# Yext PHP

[![Latest Stable Version](https://poser.pugx.org/kevinem/yext-php/v/stable?format=flat-square)](https://packagist.org/packages/kevinem/yext-php)
[![License](https://poser.pugx.org/kevinem/yext-php/license?format=flat-square)](https://packagist.org/packages/kevinem/yext-php)
[![Build Status](https://travis-ci.org/kevinem/yext-php.svg?branch=master)](https://travis-ci.org/kevinem/yext-php)

## Installation

To install, use composer:

```
composer require kevinem/yext-php
```

## Documentation

https://www.yext.com/support/reseller-api/

## Example Usage

```php
$yext = new Yext([
  'api_key' => '',
  'env' => '',
]);

$customers = $yext->administrative()->getCustomers();

$customer = $yext->administrative()->getCustomer('customer_id');

```

## License 

The MIT License (MIT)
Copyright (c) 2017 Kevin Em

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of
the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.
