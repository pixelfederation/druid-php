# Druid PHP driver

This library provider a [Druid](http://druid.io/) PHP Driver. 

## Requirements

## Instalation

Installation of this library uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Put the following into your composer.json

    {
        "require": {
            "sandrokeil/code-generator": "dev-master"
        }
    }
    
## Usage

```
<?php
$config = [
        'scheme' => 'http',
        'host' => 'localhost',
        'port' => '9999',
        'path' => '/druid/v2',
        'proxy' => null
];*
$druid = new \Druid\Druid(new \Druid\Driver\Guzzle\Driver(), $config);
```