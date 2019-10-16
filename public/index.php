<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

\Lit\Runner\ZendSapi\BoltZendRunner::run(
    (require __DIR__ . '/../configuration.php') + \Todo\TodoAppConfiguration::default()
);
