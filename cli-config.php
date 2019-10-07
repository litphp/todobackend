<?php

declare(strict_types=1);

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Lit\Air\Factory;
use Lit\Air\Psr\Container;

$factory = Factory::of(new Container(require 'configuration.php'));

return $factory->invoke([ConsoleRunner::class, 'createHelperSet']);
