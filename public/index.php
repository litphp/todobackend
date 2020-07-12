<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

\Lit\Runner\LaminasSapi\BoltLaminasRunner::run(
    (require __DIR__ . '/../configuration.php') + \Todo\TodoAppConfiguration::default()
);
