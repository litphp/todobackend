<?php

declare(strict_types=1);

use Lit\Air\Configurator as C;

$configuration = [];

$configuration += [
    C::join(\Lit\Router\FastRoute\FastRouteRouter::class, 'notFound') =>  \Todo\Action\NotFoundAction::class
];
$configuration += \Lit\Router\FastRoute\FastRouteConfiguration::default(C::produce(\Todo\RouteDefinition::class));

return $configuration;
