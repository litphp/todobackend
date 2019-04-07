<?php

declare(strict_types=1);

use Lit\Runner\ZendSapi\BoltZendRunner;

require __DIR__ . '/../vendor/autoload.php';

BoltZendRunner::run(require __DIR__ . '/../configuration.php');
