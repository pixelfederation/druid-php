# Druid PHP driver

This library provider a [Druid](http://druid.io/) PHP Driver. 

## Instalation

Installation of this library uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Put the following into your composer.json

    {
        "require": {
            "pixelfederation/druid-php": "dev-master"
        }
    }
    
## Usage

### Average aggregation

```php
<?php

use Druid\Druid;
use Druid\Driver\Guzzle\Driver;
use Druid\Query\AbstractQuery;

$druid = new Druid(
    new Driver(),
    [
        'scheme' => 'http',
        'host' => 'localhost',
        'port' => '9999',
        'path' => '/druid/v2',
        'proxy' => 'tcp://127.0.0.1:8080' // default null
    ]
);

$queryBuilder = $druid->createQueryBuilder(AbstractQuery::TYPE_GROUP_BY);

$queryBuilder->setDataSource('kpi_registrations_v1');
$queryBuilder->setGranularity('P1D', 'UTC');
$queryBuilder->addInterval(new \DateTime('2000-01-01'), new \DateTime());


$queryBuilder->addAggregator($queryBuilder->aggregator()->count('count_rows'));
$queryBuilder->addAggregator($queryBuilder->aggregator()->doubleSum('sum_rows', 'event_count_metric'));
$queryBuilder->addAggregator($queryBuilder->aggregator()->hyperUnique('registrations', 'registrations'));

$queryBuilder->addDimension('project', 'project');

$queryBuilder->addPostAggregator(
    $queryBuilder->postAggregator()->arithmeticPostAggregator(
        'average',
        '/',
        [
            $queryBuilder->postAggregator()->fieldAccessPostAggregator('sum_rows', 'sum_rows'),
            $queryBuilder->postAggregator()->fieldAccessPostAggregator('count_rows', 'count_rows')
        ]
    )
);

$response = $druid->send($queryBuilder->getQuery());
```