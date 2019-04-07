<?php

declare(strict_types=1);

namespace Todo;

use FastRoute\RouteCollector;
use Lit\Router\FastRoute\FastRouteDefinition;
use Todo\Action\HomeAction;

class RouteDefinition extends FastRouteDefinition
{
    public function __invoke(RouteCollector $routeCollector): void
    {
        $routeCollector->get('/', HomeAction::class);
    }
}
