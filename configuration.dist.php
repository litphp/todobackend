<?php

use Lit\Air\Configurator as C;
use Lit\Bolt\BoltApp;
use Psr\Http\Server\MiddlewareInterface;

$configuration = [
    C::join(BoltApp::class, MiddlewareInterface::class) => function (\Middlewares\JsonPayload $jsonPayload) {
        return $jsonPayload;
    },
    C::join(\Todo\BaseAction::class, '') => [
        'urlBase' => '/api',
    ],
];

$configuration += [
    \PDO::class => C::provideParameter(['sqlite:db.sqlite3', '', '', [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    ]]),
];

$configuration += \Lit\Router\FastRoute\FastRouteConfiguration::default(C::produce(\Todo\RouteDefinition::class));

return $configuration;
