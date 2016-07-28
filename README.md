# Druid PHP driver

This library provider a [Druid](http://druid.io/) PHP Driver.

## [License](LICENSE)

## Instalation

Installation of this library uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Put the following into your composer.json

    {
        "require": {
            "pixelfederation/druid-php": "dev-master"
        }
    }

## Current State

Currently this driver supports only **GroupBy** aggregation type which is tested on out production environment.
Everybody is welcome to create pull requests to implement some of the missing things.

Also, some unit tests are bound to running on our internal Druid instance, there is plan to change it to docker container
with some testing data.

## Usage

### Average aggregation

```php
<?php

use Druid\Druid;
use Druid\Driver\Guzzle\Driver;
use Druid\Query\AbstractQuery;
use Druid\Query\Component\Granularity\PeriodGranularity;

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
$queryBuilder->addInterval(new \DateTime('2000-01-01'), new \DateTime());

$granularity = new PeriodGranularity('P1D', 'UTC');
$queryBuilder->setGranularity($granularity);

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

## Contribution

If you'd like to contribtue, we strongly recommend to run

```bash
./bin/setup-dev
```

from the project directory. This script will set up a commit hook, which checks the PSR/2 coding standards
using [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer) and also runs PHP linter and
PHP Mess Detector [PHPMD](http://phpmd.org/)

## TODO

1. **Query types**
    * Aggregation queries
        * TopN
        * Timeseries
    * Metadata Queries
        * Time Boundary
        * Segment Metadata
        * Datasource Metadata
2. **Components**
    * Data source
        * union
        * query
    * Aggregations
        * Cardinality aggregator
