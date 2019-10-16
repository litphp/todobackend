<?php

use Lit\Air\Configurator as C;

$configuration = [];

$configuration += [
    \PDO::class => C::provideParameter(['sqlite:db.sqlite3', '', '', [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    ]]),
];

return $configuration;
